# cclee-theme — AI 可执行规格文档

> v2.1 | 供 Code AI 使用 | 人类说明文档见 README.md

---

## CONSTRAINTS（优先级最高，所有任务前先读）

```
NEVER:
- 引入任何第三方 PHP 库
- 使用 Customizer API
- 硬编码颜色 / 字体值（必须使用 var(--wp--preset--*)）
- 在 theme.json 之外定义设计 token
- 为可视化功能添加 PHP 逻辑层
- 在前端加载 editor-ai.js
- 操作 Site Editor 的内容 iframe（技术限制，不可为）
- 在 functions.php 引入非 WP 核心 hook

ALWAYS:
- PHP >= 8.0 语法
- WordPress >= 6.4 API
- 函数前缀：cclee_
- 文本域：cclee-theme
- pattern 文件顶部必须含标准注释块（见 PATTERN_HEADER_TEMPLATE）
- 语义化 HTML5 标签：<article> <main> <nav> <aside>
- 所有模板使用 block markup（.html），不写 PHP 模板

SIZE LIMITS:
- custom.css <= 100 行
- theme.js <= 50 行（无框架，原生 JS）
- editor-ai.js <= 80 行（仅编辑器 UI 层）
- functions.php <= 120 行（仅 require 和 hook 注册）
```

---

## FILE_TREE（权威结构，不得新增未列出的目录）

```
cclee-theme/
├── style.css                        # 主题元数据头部，无样式内容
├── theme.json                       # 唯一设计 token 来源
├── functions.php                    # 仅 require + hook 注册，<= 120 行
├── index.php                        # 空文件，WP 规范要求
│
├── templates/
│   ├── index.html
│   ├── single.html
│   ├── page.html
│   ├── archive.html
│   ├── search.html
│   └── 404.html
│
├── parts/
│   ├── header.html
│   ├── footer.html
│   └── sidebar.html
│
├── patterns/
│   ├── hero-simple.php
│   ├── hero-centered.php
│   ├── features-grid.php
│   ├── cta-banner.php
│   ├── footer-columns.php
│   └── ai-content-block.php
│
├── assets/
│   ├── css/custom.css               # <= 100 行，补充 theme.json 无法覆盖的细节
│   ├── js/
│   │   ├── theme.js                 # <= 50 行，无框架
│   │   └── editor-ai.js             # 仅编辑器 UI，<= 80 行
│   └── images/
│
└── inc/
    ├── setup.php                    # add_theme_support 注册
    ├── block-styles.php             # register_block_style，按需注册
    ├── block-patterns.php           # register_block_pattern_category
    └── seo.php                      # OG tags + 基础 schema 输出
```

---

## PATTERN_HEADER_TEMPLATE

每个 `patterns/*.php` 文件顶部必须原样复制此结构，替换大写占位符：

```php
<?php
/**
 * Title: PATTERN_TITLE
 * Slug: cclee-theme/PATTERN_SLUG
 * Categories: cclee-featured
 * Description: PATTERN_DESCRIPTION
 */
```

---

## THEME_JSON_RULES

```
- layout.contentSize: "800px"
- layout.wideSize: "1200px"
- 所有颜色在 settings.color.palette 定义，slug 用 kebab-case
- 所有字体在 settings.typography.fontFamilies 定义
- 间距 scale 在 settings.spacing.spacingScale 定义
- 禁止在 styles 块内写 hardcoded hex 值，必须引用 palette slug
```

---

## ENQUEUE_RULES

```php
// functions.php 中 enqueue 规则：

// theme.js → wp_enqueue_scripts（前端）
// editor-ai.js → enqueue_block_editor_assets（仅编辑器，父级 window）
// custom.css → wp_enqueue_scripts（前端）

// editor-ai.js 操作范围：
// - 仅操作编辑器父级 window 的侧边栏 Panel
// - 禁止操作 contentWindow（iframe 内容区）
// - 禁止 document.querySelector('#editor iframe')
```

---

## SEO_SPEC（inc/seo.php 输出要求）

```
输出内容（wp_head hook）：
- og:title        → get_the_title()
- og:description  → get_the_excerpt() 或 get_bloginfo('description')
- og:url          → get_permalink()
- og:type         → 'article'（singular）/ 'website'（其他）
- og:image        → get_the_post_thumbnail_url()，无图时跳过
- twitter:card    → 'summary_large_image'

禁止输出：
- 任何已由 WordPress core 输出的 meta
- generator tag
- 多余空行

页面 title 结构：
- 由 add_theme_support('title-tag') 控制
- 格式：文章标题 | 站点名
```

---

## RESPONSIVE_RULES

```
断点策略：
- 完全依赖 WP block editor 原生响应式
- 唯一宽度基准：theme.json layout.contentSize / layout.wideSize
- columns 布局使用 core/columns 响应式堆叠
- 禁止在 custom.css 写主布局媒体查询
- custom.css 仅补充 theme.json 无法覆盖的细节断点

验收标准：
- 375px：单列，触控可用
- 768px：自适应过渡无断裂
- 1200px+：宽布局正常展开
```

---

## AI_FEATURE_SPEC

### editor-ai.js（第一层，随主题发布）

```
加载位置：enqueue_block_editor_assets（父级 window）
操作范围：编辑器侧边栏 Panel（PluginSidebarMoreMenuItem / PluginSidebar）
禁止操作：内容 iframe、内容区块属性
输出：侧边栏按钮 + prompt 提示面板
内容插入：由用户手动完成，AI 不自动写入内容区

文件大小上限：80 行
依赖：仅 @wordpress/plugins @wordpress/edit-post @wordpress/components（wp.* 全局变量）
```

### ai-content-block.php（可运行最小示例）

```
Pattern 用途：演示 API 调用，不作为生产功能
必须包含：
- 预填 prompt 模板（HTML 注释形式）
- API 调用示例代码（内联 <script>，用户替换 API Key 即可跑通）
- 明确注释标注"替换 YOUR_API_KEY"位置
禁止：硬编码任何真实 API Key
```

---

## WOOCOMMERCE_COMPAT_SCOPE

```
范围：引入 WooCommerce 后核心页面样式不崩
实现方式：custom.css 修复布局 / 间距
禁止：
- 重写 WooCommerce 模板文件
- 在 cclee-theme 内实现完整电商体验（属于 cclee-theme-woo 子主题）
验收：shop / product / cart / checkout 页面无明显布局错乱
```

---

## TARGET_USER

```
目标用户：开发者（代理商 / 自由职业者 / 独立开发者）
非目标用户：普通站长、初学者、需要可视化建站的用户

含义：
- 不需要解决"普通用户做出漂亮 UI"的问题
- pattern 质量由主题保证，用户负责自己的内容替换
- 文档面向开发者，无需新手引导
```

---

## BUILD_PHASES

### Phase 1 — 核心可用
- [ ] templates/ 所有 .html 完成 parts 引用
- [ ] theme.json 色彩中性化（无强色彩倾向）
- [ ] custom.css 极简重置（<= 100 行）
- [ ] inc/seo.php 按 SEO_SPEC 实现

### Phase 2 — 轻量化验证
- [ ] 页面总体积 < 20KB（不含图片）
- [ ] block-styles.php 按需注册，无冗余
- [ ] theme.js 精简或移除（验证是否必要）
- [ ] Core Web Vitals 目标：LCP < 2.5s，CLS < 0.1，页面体积 < 20KB（不含图片）
- [ ] 性能实现路径：woo-compat.css 条件加载，theme.js 验证是否必要，block-styles.php 无冗余注册

### Phase 3 — 扩展性
- [ ] Style Variations 2-3 套（在 theme.json variations/ 目录）
- [ ] patterns 补充：testimonial / pricing / team
- [ ] WooCommerce 兼容（按 WOOCOMMERCE_COMPAT_SCOPE）
- [ ] editor-ai.js + ai-content-block.php（按 AI_FEATURE_SPEC）

### Phase 4 — 发布
- [ ] README.md（双语，含开发者入门示例）
- [ ] screenshot.png（1200x900）
- [ ] GitHub Release v1.0.0
- [ ] WordPress.org 规范审查（可选）

---

## NAMING_CONVENTIONS

```
text-domain:      cclee-theme
function-prefix:  cclee_
css-custom-props: var(--wp--preset--*) 优先，自定义属性用 --cclee-* 前缀
php-version:      >= 8.0
wp-version:       >= 6.4
```

---

*v2.1 — 从策略说明文档重构为 AI 可执行规格文档*
