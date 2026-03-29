# 约定记录

> v1.3 · 2026-03-28

## 通用规范 [所有 WP 项目]

### 代码安全
- **前缀 ≥ 4 字母**：functions、options、handles、image sizes 等所有 public namespace
- **输出必须 escape**：`esc_html()`, `esc_attr()`, `esc_url()`
- **输入必须 sanitize**：`sanitize_text_field()`, `absint()` 等
- **字符串可翻译**：`__('String', 'text-domain')`, `_e('String', 'text-domain')`

### WP-CLI
- 长内容禁止内联传参，用临时文件
- 命令必须加 `--allow-root`

### 浏览器操作
- 截图、控制台日志采集等浏览器操作统一使用 **Playwright**
- 脚本路径：`~/scripts/playwright-tools/console-capture.js`
- 配置：项目级 `.playwright.config.json`，全局 `~/.playwright.config.json`（不存在则以项目级为准）
- Playwright 不支持自动登录 wp-admin，可复用 Puppeteer cookies 文件：`--cookies .puppeteer/cookies/localhost-8080.json`

### 禁止项
- 禁止在代码/文档中使用 emoji（状态标识除外）

---

## 主题规范 [Themes]

### FSE 架构
- 使用 theme.json + patterns + templates + parts
- 样式通过 theme.json 设计 token 配置，禁止硬编码数值
- style.css 仅主题声明头，不写样式

### custom.css
- `::before` 伪元素做装饰纹理时，必须同时设置 `opacity`、`z-index: -1`、`pointer-events: none`，缺一不可

### Pattern 开发

#### HTML 与 JSON 同步
- **禁止在 HTML 中手写样式**：颜色类、字号类、间距/边框 style、layout 类禁止手动写入
- JSON 有声明 → HTML 必须有对应输出；HTML 有 style/class → JSON 必须有对应声明
- JSON shorthand padding → HTML 必须用 shorthand；JSON 展开对象 → HTML 必须用展开形式；禁止混用
- JSON 声明 `style.border.*` 或 `style.spacing.padding/margin` → HTML 必须包含对应 inline style；`style.spacing.blockGap` 除外
- JSON 声明 `"width":"X%"`（core/column）→ HTML 必须包含 `style="flex-basis:X%"`

#### JSON 规范
- **必须通过 `json.loads()` 验证**；禁止单引号、尾随逗号、重复 key
- `style.border` 必须与 `style.spacing` 并列，禁止嵌套在 `spacing` 内部
- `fontSize` 禁止嵌套在 `style.typography` 内，必须作为顶层属性；自定义值需先在 theme.json `settings.typography.fontSizes` 添加 preset
- `border.radius` 只接受纯数值（如 `"8px"`），禁止 `var()`
- 有 `borderColor` 时禁止同时用 `style.border.{top/right/bottom/left}`
- 声明 `backgroundColor` 的 group 块必须显式设置 `style.spacing.padding` 全方向为 0

#### save 函数限制
- `className` 在 `core/group`、`core/button` 中不输出到 HTML，禁止依赖
- `fontSize` preset 禁止 HTML 手写 `style="font-size:var(...)"`

#### 颜色与 gradient
- 有效颜色 slug：`primary` `secondary` `accent` `base` `contrast` `surface` `neutral-50` ~ `neutral-900`
- gradient slug 禁止 `-gradient` 后缀；有 gradient 时完整序列：`has-{slug} has-{slug}-background has-text-color has-background`
- gradient 背景必须同时声明 textColor

#### HTML 结构规范
- 禁止 `<span>` 出现在 `wp:paragraph` 块内
- 禁止 HTML 注释放在 block 容器内
- 自闭合块：`<!-- wp:xxx /-->`（`/-->` 前有空格）；容器块必须成对
- 文件必须包含注释头：Title/Slug/Categories
- 写入 style 属性后必须逐个清点 `var(` 与 `)` 数量是否相等
- 自定义 CSS 类样式放入 custom.css（如 sticky、maxWidth、z-index）

#### 块结构规则
- core/button：HTML 结构为 `<div class="wp-block-button"><a ...>...</a></div>`，禁止直接写 `<a>`；`<div>` 与 `<a>` 均需 `has-{slug}-font-size`，`<a>` 还需 `has-custom-font-size wp-element-button`
- core/separator：带颜色时 HTML 必须包含 `has-alpha-channel-opacity`
- core/paragraph + elements.link：JSON 声明 `style.elements.link.color.text` 时，HTML 必须包含 `has-link-color`
- core/table：padding 放 `<figure>`，border-style/width/radius 放 `<table>`；禁止反向；必须包含 `has-fixed-layout` 和 border-color classes
- SSR 块（`html: false`）可自闭合；save 返回 placeholder HTML 时禁止自闭合，HTML 必须与 save 输出完全匹配；需 inline style 时在 JSON 中声明

### FSE 决策
- 模板优先级：front-page > home > index；商品用 archive-product / single-product / single-product-wide / product-search，非商品用 archive / search
- 导航：主题发布时禁止指定 `ref`
- Group 块精确尺寸：设置 `"layout":{"type":"default"}`
- site-title 块：必须设置 `{"isLink":true}`（品牌区域始终可点击回首页，配合 site-logo 块使用）
- Skip to content：禁止删除，用 CSS 隐藏

### 发布要求（Block Theme）
- **必须文件**：style.css、readme.txt、theme.json、templates/index.html、screenshot.png（1200×900px）
- **禁止项**：
  - Patterns 中禁止远程资源（`http(s)://` 外部图片/视频，Google Fonts 例外）
  - 插件级功能（CPT、Shortcode、Analytics、SEO、Contact Forms、外部 API）
  - 前端版权链接最多 1 个

---

## WooCommerce 规范 [WooCommerce]

- 商店导航用 `/products/`，禁止 `?page_id=X`
