# 约定记录

<!-- 使用 /note-convention 追加新记录 -->

## 命名规范
- WP 页面 ID：Home=5, About Us=6, Contact=9, Blog=8, Products=18, Cart=19, Checkout=20, My Account=21

## 代码规范
- WP 主题：FSE 模式，使用 theme.json + patterns + templates + parts
- 样式优先通过 theme.json 设计 token 配置（color、typography、spacing）
- style.css 仅主题声明头，不写样式
- 禁止使用 emoji

## 任务分类

### 功能层 [主题]
- templates、parts、patterns（HTML 模板结构）
- functions.php / inc/（PHP 逻辑）
- theme.json 的能力配置（appearanceTools、settings.blocks）

### 样式层 [主题]
- theme.json 的设计 token（color、typography、spacing）

### 内容层 [Yougu 专属]
- 页面内容、产品数据
- 站点级样式覆盖 → 写入子主题 `yougu-cclee`

## 仓库边界

### CCLEE 主题（独立仓库）
- 仓库：https://github.com/cclee-hub/cclee-theme
- 本地路径：`wp/wordpress/wp-content/themes/cclee-theme/`
- 以独立 git repo 存在，非 submodule；wordpress 仓库 .gitignore 排除该路径
- 内容：通用设计系统、可复用 patterns、基础模板结构
- 判断标准：**能否被其他项目复用？能 → 放主题**

### Yougu 子主题（站点定制）
- 子主题名：`yougu-cclee`
- 本地路径：`wp/wordpress/wp-content/themes/yougu-cclee/`
- 父主题：`cclee-theme`
- 内容：Yougu 专属样式、站点级 theme.json 覆盖、业务相关定制
- 判断标准：**只适用于焊接工具站？是 → 放子主题**

### Yougu 主仓库
- 仓库：https://github.com/cclee-hub/wordpress
- 包含：yougu-cclee 子主题、wp 环境配置、docs

## FSE 架构决策

### 首页模式
- `show_on_front = 'posts'`
- 首页内容由 `front-page.html` 模板 + Patterns 托管，不依赖页面内容
- 原因：FSE 设计哲学（内容与模板分离）、Site Editor 预览兼容、版本可控

### 导航模式
- **主题发布**：模板中 `wp:navigation` 不指定 `ref`，用户在 Site Editor 中选择导航
- `setup.php` 的 `after_switch_theme` 创建默认导航供用户选择
- **单站点定制**：可使用 `ref` 绑定特定导航 ID（但 ID 因站点而异）
- **注意**：`location` 是传统菜单属性，不是 FSE `wp:navigation` 块的有效属性

## 开发阶段强制规范

### 文件要求
- **必须文件**：`style.css`、`readme.txt`、`theme.json`、`templates/index.html`、`languages/`、`screenshot.png`
- **style.css 头部**：必须包含 Theme Name、Author、Description、Version、Requires at least、Tested up to、Requires PHP、License、Text Domain
- **screenshot.png**：1200×900px，4:3 比例
- **theme.json**：`version: 3`（WP 6.6+）

### 禁止项（会导致被拒）
- **Patterns 中禁止远程资源**：不能使用 `http(s)://` 外部图片/视频 URL（Google Fonts 例外）
- **插件级功能**：禁止 CPT、Shortcode、Analytics、SEO、Contact Forms、外部 API 调用
- **前端版权链接**：最多 1 个，指向 Theme URI 或 Author URI

### 代码规范（发布要求）
- **前缀 ≥ 4 字母**：functions、options、handles、image sizes 等所有 public namespace
- **输出必须 escape**：`esc_html()`, `esc_attr()`, `esc_url()`
- **输入必须 sanitize**：`sanitize_text_field()`, `absint()` 等
- **字符串可翻译**：`__('String', 'cclee-theme')`, `_e('String', 'cclee-theme')`

### 资源规范
- 新增字体 → 同步添加到 `readme.txt` 的 `== Resources ==`
- 格式：`* FontName, Source/Author, License, URL`
