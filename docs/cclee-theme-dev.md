---
paths:
  - wp/wordpress/wp-content/themes/cclee-theme/**
---

# CCLEE Theme 开发文档

> **角色**：主题开发协作者 | **风格**：B 端/企业场景
> **约束**：文件职责边界 > 开发约定 > 具体实现 | **禁止**：臆测未记录功能

FSE 主题，WordPress 6.4+ / PHP 8.0+

**版本：** 1.1.1 | **Tested up to:** 6.7

---

## 模块加载顺序

```
functions.php
    ├─→ inc/setup.php           # 主题基础设置（最先）
    ├─→ inc/block-styles.php    # 块样式变体
    ├─→ inc/block-patterns.php  # Pattern 分类注册
    ├─→ inc/seo.php             # SEO 输出
    ├─→ inc/woocommerce.php     # WooCommerce 兼容
    └─→ inc/editor-ai.php       # AI 编辑器辅助
```

---

## inc/ 模块职责

### setup.php

| 钩子 | 作用 |
|------|------|
| `after_setup_theme` | 注册 theme support、导航菜单 |
| `wp_enqueue_scripts` | 加载 `assets/css/custom.css` |
| `wp_footer:99` | 触发 `cclee_float_widget` hook |

**Theme Support：** `wp-block-styles`, `editor-styles`, `post-thumbnails`, `responsive-embeds`, `title-tag`, `custom-logo`

**菜单位置：** `primary`, `footer`

---

### block-styles.php

| 块 | 样式名 |
|----|--------|
| `core/button` | `outline` |
| `core/group` | `card` |
| `core/separator` | `thick` |
| `core/quote` | `accent-border` |

---

### block-patterns.php

注册 `cclee-theme` pattern 分类

---

### seo.php

`wp_head:1` 输出 OG + Twitter Card，`wp_head:2` 输出 JSON-LD Schema

---

### woocommerce.php

声明 Woo 支持（zoom/lightbox/slider），条件加载 `assets/css/woocommerce.css`

---

### editor-ai.php

| 钩子 | 作用 |
|------|------|
| `enqueue_block_editor_assets` | 加载 `assets/js/editor-ai.js` |
| `admin_menu` | 设置页面：设置 → CCLEE AI |
| `rest_api_init` | 代理路由 `POST /wp-json/cclee/v1/ai/generate` |

**设置选项：** `cclee_ai_api_key`, `cclee_ai_enabled`

**安全：** API Key 存服务端，前端通过 nonce + REST API 代理调用

---

## Design System (theme.json)

| Token | Slugs |
|-------|-------|
| Colors | `primary`, `secondary`, `accent`, `base`, `contrast` |
| Neutral | `neutral-50` ~ `neutral-900`（10 级）|
| Font Families | `system`, `mono` |
| Font Sizes | `small`, `medium`, `large`, `x-large`, `xx-large`, `h1`~`h6` |
| Spacing | `10`(0.25rem) ~ `100`(8rem) |
| Layout | `contentSize: 800px`, `wideSize: 1200px` |
| Transitions | `fast`(150ms), `normal`(250ms), `slow`(400ms) |

**CSS 变量引用：**
```css
color: var(--wp--preset--color--primary);
font-size: var(--wp--preset--font-size--large);
padding: var(--wp--preset--spacing--40);
```

---

## 文件结构

```
cclee-theme/
├── style.css              # 主题声明（无业务样式）
├── theme.json             # 设计系统
├── functions.php          # 入口（仅 require）
├── index.php              # 兼容占位
│
├── templates/
│   ├── 404.html
│   ├── archive.html
│   ├── front-page.html
│   ├── index.html
│   ├── page.html
│   ├── search.html
│   └── single.html
│
├── parts/
│   ├── header.html        # 含 skip-to-content 无障碍链接
│   ├── footer.html
│   └── sidebar.html
│
├── patterns/              # 10 个预制区块
│   ├── hero-simple.php
│   ├── hero-centered.php
│   ├── features-grid.php
│   ├── cta-banner.php
│   ├── footer-columns.php
│   ├── contact.php
│   ├── testimonial.php
│   ├── pricing.php
│   ├── team.php
│   └── ai-content-block.php
│
├── styles/                # Style Variations
│   ├── midnight.json      # 深色
│   ├── ocean.json         # 蓝绿
│   └── warm.json          # 暖色
│
├── assets/
│   ├── css/
│   │   ├── custom.css     # 补充样式
│   │   └── woocommerce.css
│   └── js/
│       ├── theme.js       # 占位
│       └── editor-ai.js   # AI 编辑器侧边栏
│
└── inc/
    ├── setup.php
    ├── block-styles.php
    ├── block-patterns.php
    ├── seo.php
    ├── woocommerce.php
    └── editor-ai.php
```

---

## 文件职责边界

| 文件 | 职责 | 禁止 |
|------|------|------|
| `theme.json` | 设计 token | PHP、CSS |
| `style.css` | 主题声明头 | 业务样式 |
| `functions.php` | 仅 require | 功能代码 |
| `templates/*.html` | 页面结构 | PHP 逻辑 |
| `parts/*.html` | 模板片段 | 完整页面 |
| `patterns/*.php` | 预制区块 | 必须含注释头 |
| `assets/css/custom.css` | 补充样式 | 重复 theme.json |

---

## 命名规范

| 类型 | 前缀 | 示例 |
|------|------|------|
| Pattern slug | `cclee-theme/` | `cclee-theme/hero-simple` |
| Pattern 分类 | `cclee-theme` | - |
| CSS handle | `cclee-` | `cclee-custom` |
| JS handle | `cclee-` | `cclee-editor-ai` |
| 选项名 | `cclee_` | `cclee_ai_api_key` |
| Text domain | `cclee-theme` | - |

---

## 无障碍

**Skip to Content：** `parts/header.html` 包含跳转链接，`custom.css` 隐藏（focus 时显示）

**模板锚点：** 所有模板主内容区 `anchor:"main"`

---

## 开发命令

```bash
cd wp && docker-compose up -d
# 访问 http://localhost:8080

# WP-CLI
docker exec wp_cli wp [command] --allow-root

# 清除缓存
docker exec wp_cli wp cache flush --allow-root

# 激活主题
docker exec wp_cli wp theme activate cclee-theme --allow-root
```

---

## 子主题扩展

```css
/* style.css */
Theme Name: Your Child Theme
Template: cclee-theme
```

```php
/* functions.php */
add_action('wp_enqueue_scripts', function() {
    wp_enqueue_style('child-style', get_stylesheet_uri(), ['cclee-custom']);
});
```

---

## 常见问题

> 详细排查流程见 `.claude/rules/wp-theme-errors.md` 和 `.claude/rules/gotchas.md`

| 问题 | 原因 | 解决 |
|------|------|------|
| Pattern 验证失败 | 颜色 slug 不存在 | 使用 `neutral-100/200/500` |
| 导航显示所有页面 | `wp_navigation` 帖子干扰 | 删除帖子，清除缓存 |
| 块属性 JSON 错误 | 重复 key 或格式错误 | 合并属性，验证 JSON |

---

## Links

- [GitHub](https://github.com/cclee-hub/cclee-theme)
