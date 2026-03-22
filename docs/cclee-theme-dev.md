---
paths:
  - wp/wordpress/wp-content/themes/cclee-theme/**
---

# CCLEE Theme 开发文档

> **角色**：主题开发协作者 | **风格**：B 端/企业场景
> **约束**：文件职责边界 > 开发约定 > 具体实现 | **禁止**：臆测未记录功能

FSE 主题，WordPress 6.4+ / PHP 8.0+

**版本：** 1.1.1

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
| `after_switch_theme` | 主题激活时创建默认导航菜单（Primary/Footer） |

**Theme Support：** `wp-block-styles`, `editor-styles`, `post-thumbnails`, `responsive-embeds`, `title-tag`, `custom-logo`

**菜单位置：** `primary`, `footer`

**自动创建导航：** 激活主题时检测是否存在 `wp_navigation` 帖子，不存在则自动创建 Primary Menu（Home/About/Products/Blog/Contact）和 Footer Menu（About/Contact/Blog）

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

| 钩子/过滤器 | 作用 |
|-------------|------|
| `after_setup_theme` | 声明 Woo 支持（zoom/lightbox/slider）|
| `wp_enqueue_scripts` | 条件加载 `assets/css/woocommerce.css` |
| `woocommerce_enqueue_styles` | 移除 Woo 默认样式（保留 general）|
| `woocommerce_before_main_content` | 替换包装器为主题布局 |
| `gettext` | B2B 文字替换（Shop → Products）|
| `woocommerce_page_title` | 修改归档页标题 |
| `woocommerce_helper_suppress_admin_notice` | 隐藏 WooCommerce.com 登录提示 |

**设计原则：** 主题管样式，Woo 管功能；不重写 Woo 模板文件，仅通过 CSS 覆盖

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
| Colors | `primary`, `secondary`, `accent`, `base`, `contrast`, `surface` |
| Neutral | `neutral-50` ~ `neutral-900`（10 级）|
| Gradients | `primary-gradient`, `accent-gradient`, `hero-gradient`, `subtle-gradient`, `glass-gradient`, `warm-gradient`, `cool-gradient` |
| Shadows | `sm`, `md`, `lg`, `soft`, `elevated`, `card`, `glow`, `inner-glow` |
| Font Families | `heading`(DM Serif Display), `body`(Inter), `system`, `mono` |
| Font Sizes | `small`, `medium`, `large`, `x-large`, `xx-large`, `h1`~`h6` |
| Spacing | `10`(0.25rem) ~ `100`(8rem) |
| Layout | `contentSize: 800px`, `wideSize: 1200px` |

**Custom Tokens（CSS 变量）：**
| Token | 值 |
|-------|-----|
| `--wp--custom--breakpoints--mobile` | 640px |
| `--wp--custom--breakpoints--tablet` | 768px |
| `--wp--custom--breakpoints--desktop` | 1024px |
| `--wp--custom--breakpoints--wide` | 1280px |
| `--wp--custom--border--radius--sm/md/lg/full` | 4px/8px/12px/9999px |
| `--wp--custom--transition--fast/normal/slow` | 150ms/250ms/400ms |
| `--wp--custom--easing--default/bounce` | cubic-bezier 曲线 |

**颜色语义：**
| Token | 用途 |
|-------|------|
| `primary` | 品牌主色（Logo、主按钮、强调文字） |
| `secondary` | 次要元素 |
| `accent` | 行动召唤（CTA 按钮、链接） |
| `base` | 页面主背景 |
| `contrast` | 与 base 形成对比的区块背景（浅色场景） |
| `surface` | 深色区块背景（Footer、暗色 CTA、暗色 Hero） |

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
│   ├── archive-product.html       # WooCommerce 产品归档
│   ├── front-page.html
│   ├── home.html
│   ├── index.html
│   ├── page.html
│   ├── page-about-us.html
│   ├── page-contact.html
│   ├── page-design-preview.html   # 设计预览入口
│   ├── page-no-sidebar.html
│   ├── page-pattern-preview.html  # Patterns 集中展示
│   ├── search.html
│   ├── single.html
│   └── single-product.html        # WooCommerce 单品页
│
├── parts/
│   ├── header.html        # 含 skip-to-content 无障碍链接
│   ├── footer.html
│   └── sidebar.html
│
├── patterns/              # 16 个预制区块
│   ├── ai-content-block.php
│   ├── contact.php
│   ├── cta-banner.php
│   ├── faq.php
│   ├── features-grid.php
│   ├── footer-columns.php
│   ├── hero-centered.php
│   ├── hero-simple.php
│   ├── logo-cloud.php
│   ├── portfolio.php
│   ├── pricing.php
│   ├── services.php
│   ├── stats.php
│   ├── team.php
│   ├── testimonial.php
│   └── timeline.php
│
├── styles/                # Style Variations
│   ├── commerce.json      # 商务蓝
│   ├── industrial.json    # 工业灰
│   ├── nature.json        # 自然绿
│   ├── professional.json  # 专业黑
│   └── tech.json          # 科技紫
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

- `parts/header.html` 包含 Skip to Content 链接
- 所有模板主内容区 `anchor:"main"`

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

## WooCommerce 测试数据

### 导入官方样本数据

```bash
# 安装导入器插件
docker exec wp_wordpress mkdir -p /var/www/html/wp-content/upgrade
docker exec -u root wp_wordpress chown -R www-data:www-data /var/www/html/wp-content/upgrade
docker exec wp_cli wp plugin install wordpress-importer --activate --allow-root

# 导入 WooCommerce 样本产品（约 18 个产品）
docker exec wp_cli wp import /var/www/html/wp-content/plugins/woocommerce/sample-data/sample_products.xml --authors=create --allow-root
```

### 样本数据包含

| 类型 | 数量 |
|------|------|
| 产品 | 18 个 |
| 分类 | 7 个（Clothing, Accessories, Decor, Music 等）|
| 属性 | 颜色、尺寸 |

**注意：** 样本数据不包含实际图片，需手动补充或使用占位图。

### 产品图片导入

从免费图库下载并导入：

```bash
# 创建临时目录
docker exec wp_wordpress mkdir -p /var/www/html/wp-content/uploads/2026/03/products

# 下载图片（Pexels 免费图片）
docker exec wp_wordpress curl -L "https://images.pexels.com/photos/XXX/pexels-photo-XXX.jpeg?w=800" -o /var/www/html/wp-content/uploads/2026/03/products/product-name.jpg

# 导入到媒体库（需要 PHP 脚本）
# 详见项目记录
```

---

## 功能清单

> 由 `/sync-theme-doc` 技能自动生成，反映代码实际状态

### 模板能力矩阵

| 模板 | 用途 | Header | Footer | 布局 | 特性 |
|------|------|--------|--------|------|------|
| `front-page.html` | 静态首页 | ✅ | ✅ | Pattern 组装 | hero-centered + features-grid + cta-banner |
| `home.html` | 博客列表首页 | ✅ | ✅ | 3列网格 | hero-simple + post-grid + cta-banner + 分页 + 空状态 |
| `index.html` | 通用回退 | ✅ | ✅ | 3列网格 | post-grid + 分页 + 空状态 |
| `archive.html` | 归档页（分类/标签/日期） | ✅ | ✅ | 3列网格 | 标题 + post-grid + 分页 + 空状态 |
| `search.html` | 搜索结果 | ✅ | ✅ | 3列网格 | 搜索标题 + post-grid + **空状态含二次搜索** |
| `single.html` | 单篇文章 | ✅ | ✅ | 70/30 两栏 | 标题 + 日期/分类 + 特色图 + 内容 + **上下篇导航** + **评论** + sidebar |
| `page.html` | 通用页面 | ✅ | ✅ | 单栏 | 标题 + 特色图 + 内容 |
| `page-no-sidebar.html` | 无侧边栏页面 | ✅ | ✅ | 单栏 | 标题 + 特色图 + 内容（全宽） |
| `page-about-us.html` | 关于我们 | ✅ | ✅ | Pattern 组装 | hero-simple + content + features-grid + cta-banner |
| `page-contact.html` | 联系我们 | ✅ | ✅ | Pattern 组装 | hero-simple + contact form + cta-banner |
| `page-landing.html` | Landing Page | ❌ | ❌ | Pattern 组装 | 无 header/footer，最小导航 + 微型页脚 |
| `page-design-preview.html` | 设计预览入口 | ✅ | ✅ | 单栏 | 模板/Pattern 导航索引 |
| `page-pattern-preview.html` | Pattern 集中展示 | ✅ | ✅ | Pattern 组装 | 展示全部 16 个 Patterns |
| `404.html` | 404 页面 | ✅ | ✅ | 单栏 | 标题 + 描述 + **搜索框** |
| `archive-product.html` | WooCommerce 产品归档 | ✅ | ✅ | 70/30 两栏 | hero-simple + **3列产品网格** + sidebar（分类/价格过滤）+ cta-banner |
| `single-product.html` | WooCommerce 单品页 | ✅ | ✅ | 单栏 | legacy-template + **相关产品** + cta-banner |
| `cart.html` | WooCommerce 购物车 | ✅ | ✅ | 65/35 两栏 | progress-steps + cart + order-summary + trust-badges |
| `checkout.html` | WooCommerce 结算 | ✅ | ✅ | 60/40 两栏 | progress-steps + checkout + order-summary + trust-badges |

### Patterns 清单

| Pattern | Slug | 分类 | 用途 |
|---------|------|------|------|
| Hero Centered | `cclee-theme/hero-centered` | featured | 居中大标题，渐变背景，装饰元素 |
| Hero Simple | `cclee-theme/hero-simple` | featured | 左对齐简单 Hero，浅色背景 |
| Features Grid | `cclee-theme/features-grid` | featured | 三列特性卡片网格 |
| Services | `cclee-theme/services` | - | 垂直服务列表，图标+描述 |
| Stats Section | `cclee-theme/stats` | featured | 关键数据展示，渐变背景 |
| Portfolio | `cclee-theme/portfolio` | - | 项目展示网格，卡片+标签 |
| Logo Cloud | `cclee-theme/logo-cloud` | featured | 合作伙伴 Logo 静态展示，hover 缩放效果 |
| Team Members | `cclee-theme/team` | featured | 四列团队成员卡片 |
| Testimonials | `cclee-theme/testimonial` | featured | 三列客户评价卡片 |
| Pricing Table | `cclee-theme/pricing` | featured | 三列价格表 |
| Timeline Section | `cclee-theme/timeline` | featured | 公司历程/里程碑时间线 |
| FAQ Section | `cclee-theme/faq` | featured | 手风琴式常见问题，原生 details 元素 |
| Contact Section | `cclee-theme/contact` | featured | 联系表单 + 信息区块 |
| CTA Banner | `cclee-theme/cta-banner` | featured | 全宽行动召唤横幅 |
| Footer Columns | `cclee-theme/footer-columns` | footer | 四列页脚区块（可独立使用） |
| AI Content Block | `cclee-theme/ai-content-block` | featured | AI 辅助内容区块示例 |
| Landing Hero with Form | `cclee-theme/landing-hero-form` | featured | Hero + 侧边线索收集表单 |
| Landing Video Hero | `cclee-theme/landing-video-hero` | featured | 全屏视频背景 Hero |
| Landing Trust Bar | `cclee-theme/landing-trust-bar` | featured | 信任徽章横条 |
| Landing Countdown | `cclee-theme/landing-countdown` | featured | 限时优惠倒计时 |
| WooCommerce Progress Steps | `cclee-theme/woo-progress-steps` | woocommerce | 结算进度条（购物车 → 结算 → 完成） |
| WooCommerce Trust Badges | `cclee-theme/woo-trust-badges` | woocommerce | 信任徽章（安全支付/退换货/快速配送） |

### Parts 清单

| Part | 用途 | 特性 |
|------|------|------|
| `header.html` | 站点头部 | skip-link + sticky + site-title + navigation + loginout + mini-cart |
| `footer.html` | 站点底部 | site-title + tagline + navigation + 版权 |
| `sidebar.html` | 侧边栏 | 搜索框 + 分类列表 + 最新文章 + 归档 |

### 已实现功能特性

| 特性 | 状态 | 说明 |
|------|------|------|
| 空状态设计 | ✅ | search.html 含二次搜索框，其他模板含提示文字 |
| 分页 | ✅ | query-pagination 块 |
| 文章导航 | ✅ | single.html 上下篇导航 |
| 评论区 | ✅ | single.html comments 块 |
| WooCommerce 兼容 | ✅ | 产品归档/单品页 + mini-cart |
| 无障碍 | ✅ | skip-link + anchor:main |
| SEO | ✅ | OG/Twitter Card + JSON-LD |
| AI 编辑器辅助 | ✅ | 侧边栏 + REST API 代理 |

### 缺口清单

| 缺失 | 影响 | 优先级 | 建议 |
|------|------|--------|------|
| ~~Landing Page 模板~~ | ~~投放页/活动页无法实现~~ | ✅ **已完成** | `page-landing.html` + 4 个 Landing Patterns |
| Case Study 详情模板 | B 端客户案例转化页缺失 | **P1** | 新建 `single-case-study.html` + CPT + ACF 字段 |
| ~~WooCommerce Cart/Checkout~~ | ~~购物车/结算页未定制~~ | ✅ **已完成** | `cart.html` / `checkout.html` + 2 个 Woo Patterns |
| Author/Date 归档 | 无专属模板，回退到 archive.html | P2 | 可选，archive.html 已足够 |
| 归档布局变体 | 仅 3 列网格，无列表/杂志布局 | P2 | 新建 pattern 变体 |

---

## Links

- [GitHub](https://github.com/cclee-hub/cclee-theme)
