# 约定记录

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
- **HTML 只写结构，不写样式**：颜色类、字号类、间距/边框 style、layout 类全部由 Gutenberg 根据 JSON 属性自动生成，禁止手动写入 HTML
- JSON 与 HTML 属性必须双向同步：JSON 有声明 → HTML 必须有对应输出；HTML 有 style/class → JSON 必须有对应声明
- 自定义 CSS 类样式放入 custom.css（Gutenberg 不支持的属性如 sticky、maxWidth、z-index）
- 有效颜色 slug：`primary` `secondary` `accent` `base` `contrast` `surface` `neutral-50` ~ `neutral-900`
- gradient slug 禁止 `-gradient` 后缀；有 gradient 时完整序列：`has-{slug} has-{slug}-background has-text-color has-background`
- `<span>` 禁止出现在 `wp:paragraph` 块内
- HTML 注释禁止放在 block 容器内（Gutenberg 当作内容解析导致验证失败）
- 自闭合块：`<!-- wp:xxx /-->`（`/-->` 前有空格）；容器块必须成对
- 禁止 JSON 使用单引号或尾随逗号
- 文件必须包含注释头：Title/Slug/Categories
- 写入 style 属性后，必须逐个清点 `var(` 与 `)` 数量是否相等
- 有 `borderColor` 时禁止同时用 `style.border.{top/right/bottom/left}`（子边框样式由 CSS class 处理）

### JSON 属性规则
- `style.border` 必须与 `style.spacing` **并列**，禁止嵌套在 `spacing` 内部
- 禁止 JSON 中出现重复 key（如两个 `"spacing"`）
- 禁止仅凭花括号数量判断 JSON 合法性，必须用 `json.loads()` 验证
- `fontSize` 禁止嵌套在 `style.typography` 内，必须作为 JSON 顶层属性
- 自定义 fontSize 值（如 16px）需先在 theme.json `settings.typography.fontSizes` 添加 preset
- gradient 背景必须同时设置 textColor，确保 `has-text-color` class 存在
- `border.radius` 只接受纯数值（如 `"8px"`），禁止使用 `var()` CSS 变量
- `className` 在 `core/group`、`core/button` 中不被 save 函数输出到 HTML，禁止依赖

### 块属性同步规则
- JSON 声明 `style.border.*` 或 `style.spacing.padding/margin` 后，HTML 必须包含对应 inline style
- JSON shorthand padding → HTML 必须用 shorthand；JSON 展开对象 → HTML 必须用展开形式；禁止混用
- JSON 声明 `"width":"X%"`（core/column）时，HTML 必须包含 `style="flex-basis:X%"`

### 块结构规则
- core/table：padding 放 `<figure>`，border-style/width/radius 放 `<table>`；禁止反向
- core/table：禁止缺少 `has-fixed-layout` 和 border-color classes
- SSR 块 save 返回 null（`html: false`）可自闭合；save 返回 placeholder HTML 禁止自闭合，HTML 必须与 save 输出完全匹配
- SSR 块需 inline style 时优先在 JSON 中声明（服务端渲染处理）

### FSE 决策
- 首页：`show_on_front = 'posts'`，由 `front-page.html` + Patterns 托管
- 导航：主题发布时不指定 `ref`，用户在 Site Editor 选择
- Group 块精确尺寸：设置 `"layout":{"type":"default"}`
- site-title 块：必须设置 `{"isLink":false}`
- Skip to content：禁止删除（WCAG），用 CSS 隐藏

### 发布要求（Block Theme）
- **必须文件**：style.css、readme.txt、theme.json、templates/index.html、screenshot.png（1200×900px）
- **禁止项**：
  - Patterns 中禁止远程资源（`http(s)://` 外部图片/视频，Google Fonts 例外）
  - 插件级功能（CPT、Shortcode、Analytics、SEO、Contact Forms、外部 API）
  - 前端版权链接最多 1 个

### 仓库边界
- CCLEE 主题：独立仓库 https://github.com/cclee-hub/cclee-theme
- 本地路径：`wp/wordpress/wp-content/themes/cclee-theme/`
- 判断标准：**能否被其他项目复用？能 → 放主题**

---

## WooCommerce 规范 [WooCommerce]

- 商店导航用 `/shop/`，禁止 `?page_id=X`
