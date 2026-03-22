# 约定记录

<!-- 使用 /note-convention 追加新记录 -->

## 命名规范
- WP 页面 ID：Home=18, About Us=20, Contact=22, Blog=32

## 代码规范
- WP 主题：FSE 模式，使用 theme.json + patterns + templates + parts
- 样式优先通过 theme.json 设计 token 配置（color、typography、spacing）
- style.css 仅主题声明头，不写样式

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
- 以独立 git repo 存在，非 submodule；yougu 仓库 .gitignore 排除该路径
- 内容：通用设计系统、可复用 patterns、基础模板结构
- 判断标准：**能否被其他项目复用？能 → 放主题**

### Yougu 子主题（站点定制）
- 子主题名：`yougu-cclee`
- 本地路径：`wp/wordpress/wp-content/themes/yougu-cclee/`
- 父主题：`cclee-theme`
- 内容：Yougu 专属样式、站点级 theme.json 覆盖、业务相关定制
- 判断标准：**只适用于焊接工具站？是 → 放子主题**

### Yougu 主仓库
- 仓库：https://github.com/cclee-hub/yougu
- 包含：yougu-cclee 子主题、wp 环境配置、docs

## FSE 架构决策

### 首页模式
- `show_on_front = 'posts'`
- 首页内容由 `front-page.html` 模板 + Patterns 托管，不依赖页面内容
- 原因：FSE 设计哲学（内容与模板分离）、Site Editor 预览兼容、版本可控

## 操作约定
- 修改通用主题 → 进入 cclee-theme 目录，`git commit && git push`
- 修改站点定制 → 在 yougu-cclee 子主题目录操作，提交至 yougu 主仓库
- 主题更新后，服务器执行 `git pull` 同步