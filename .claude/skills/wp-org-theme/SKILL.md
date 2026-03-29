---
name: wp-org-theme
description: 提交主题到 WordPress.org 和/或 Woo Marketplace 前的完整审核。触发词：/wp-org-submit、/woo-submit、主题上架、wp org directory submit、woo marketplace submit。一套代码双平台上架。
---

## 执行流程

### Step 1：确定审查范围

使用 AskUserQuestion 依次提问：

**问题 1 -- 目标平台（必须）：**

| 选项 | 检查范围 |
|------|---------|
| WP.org + Woo Marketplace (推荐) | A1-A14 全部检查项 |
| WP.org only | A1-A12, A14（跳过 A13） |
| Woo Marketplace only | A1-A5（部分）+ A13 |

**问题 2 -- 检查深度（必须）：**

| 选项 | 说明 |
|------|------|
| Full audit | 首次提交前全量检查，逐项审查 |
| Changed files only | 增量修改后复查，只检查 git diff 涉及文件相关的维度 |
| Specific areas | 手动选择要检查的维度分组 |

**问题 3 -- 检查维度（仅 Specific areas 时）：**

```
多选：
[x] A1 Licensing & Copyright     [ ] A2 Privacy
[ ] A3 Accessibility             [ ] A4 Code Quality
[ ] A5 Functionality & Hooks     [ ] A6 Plugins
[ ] A7 Naming & Trademarks       [ ] A8 i18n
[ ] A9 Files & Resources         [ ] A10 Block Theme Structure
[ ] A11 Settings & Onboarding    [ ] A12 Credits & Links
[ ] A13 WooCommerce Marketplace  [ ] A14 Author & Upload
```

### Step 2：定位主题目录

```bash
find . -name "style.css" -path "*/themes/*" -maxdepth 5 | head -5
```

确认主题目录路径，从 style.css 读取主题 slug 和基本信息。

### Step 3：执行审查

按下方检查清单逐项执行。

### Step 4：输出报告

1. **通过项** -- 列表，简要备注
2. **未通过项** -- 具体文件:行号 + 问题描述 + 修复建议
3. **待手动确认** -- 需人工判断的项
4. **总结** -- 通过率 + 阻塞性问题数量 + 建议优先修复项

报告写入：`docs/review-reports/{YYYY-MM-DD}-{scope}.md`

### Step 5：修复指导

如果有未通过项，逐项给出：
- 具体文件和行号
- 当前代码
- 建议修复后的代码
- 是否阻塞提交 (blocker)

---

## 审查范围映射

| 平台选择 | 清单编号 |
|---------|---------|
| WP.org only | A1-A12, A14 |
| Woo only | A1-A5（部分）+ A13 |
| Both | A1-A14 全部 |

| 深度选择 | 行为 |
|---------|------|
| Full | 执行所有选定范围内的检查项 |
| Changed files | `git diff --name-only HEAD~N` 获取变更文件，按下方映射只执行相关维度 |
| Specific areas | 只执行选中的维度分组 |

**Changed files 映射规则：**

| 变更文件 | 触发检查维度 |
|---------|-------------|
| `style.css` | A1, A4, A7, A8 |
| `theme.json` | A4, A10 |
| `readme.txt` | A1, A2, A7, A8, A9 |
| `templates/*.html` | A10, A11 |
| `parts/*.html` | A3, A10, A12 |
| `patterns/*.php` | A4, A5, A9, A10 |
| `inc/*.php` | A4, A5, A6, A8, A11 |
| `assets/css/*` | A3 |
| `assets/js/*` | A4 |
| `screenshot.png` | A9 |
| `functions.php` | A4, A5, A6, A8, A11 |

---

## 检查清单

> 来源：WP.org Theme Review Required (14 大类) + Woo Marketplace Theme Standards + Woo Design & UX Guidelines
> 已逐项对照官方文档验证，禁止臆测添加

### A1 Licensing & Copyright

> 来源：WP.org Required #1 Licensing / #9 Illegally / Woo Marketplace Standards

| # | 检查项 | 自动化 | 说明 |
|---|--------|--------|------|
| 1 | style.css 声明 `License: GPLv2 or later` | grep | WP.org 强烈推荐 GPLv2+ |
| 2 | 所有代码、图片、字体均为 GPL 兼容 | 手动 | 包括第三方库，参考 gnu.org GPL-Compatible 列表 |
| 3 | readme.txt 含 `== Resources ==` 段 | grep | 列明所有第三方资源来源、许可、URL |
| 4 | 无克隆/抄袭设计 | 手动 | Woo 明确禁止抄袭已有主题 |
| 5 | 前端只显示用户版权 | grep | 主题作者版权仅限 footer 1 个链接 |
| 6 | 所有资源已获得分发许可 | 手动 | 字体/图片/图标/音频等 |

### A2 Privacy

> 来源：WP.org Required #2 Privacy

| # | 检查项 | 自动化 | 说明 |
|---|--------|--------|------|
| 7 | 用户数据收集默认关闭 | grep | opt-in 模式，不可默认开启 |
| 8 | 追踪/分析代码默认不加载 | grep | 需用户主动启用 |
| 9 | readme.txt 说明数据收集方式 | grep | 含隐私政策说明 |

### A3 Accessibility

> 来源：WP.org Required #3 Accessibility / Woo Design & UX Guidelines

| # | 检查项 | 自动化 | 说明 |
|---|--------|--------|------|
| 10 | 文本对比度 >= 4.5:1（正常文本） | 半自动 | WCAG AA 标准 |
| 11 | 大文本对比度 >= 3:1 | 半自动 | >= 18px 粗体或 >= 24px |
| 12 | 内容链接有下划线 | grep | WP 审核唯一接受的链接区分方式 |
| 13 | 键盘导航有 focus 高亮 | 半自动 | 2px solid + outline-offset |
| 14 | Block Theme 提供 skip link | 自动 | `<main>` 标签自动生成 |
| 15 | 表单 input 关联 label | grep | 可用 aria-label |
| 16 | 图片有 alt 属性 | grep | 装饰性图片 alt="" |

### A4 Code Quality

> 来源：WP.org Required #4 Code / Plugin Guidelines #13

| # | 检查项 | 自动化 | 说明 |
|---|--------|--------|------|
| 17 | 前缀 >= 4 字母 | grep | functions/options/handles/image sizes 等 |
| 18 | 输出 escape（esc_html/esc_attr/esc_url） | grep | 所有输出 |
| 19 | 输入 sanitize（sanitize_text_field/absint） | grep | 所有输入 |
| 20 | 无 deprecated 函数 | grep | WP Check 会报错 |
| 21 | 使用 WP 内置库 | grep | 不重复打包 jQuery 等 |
| 22 | 无 PHP/JS errors/warnings/notices | 半自动 | PHPCS 无 error/warning/notice |
| 23 | 代码无混淆 | grep | 不允许 packer/uglify mangle |
| 24 | 字符串可翻译 | grep | `__('String', 'text-domain')` |

### A5 Functionality & Hooks

> 来源：WP.org Required #5 Functionality

| # | 检查项 | 自动化 | 说明 |
|---|--------|--------|------|
| 25 | 无 CPT / Shortcodes / Custom Blocks | grep | 属于插件职能 |
| 26 | 无 Analytics / SEO / Contact Forms / Social buttons | grep | 属于插件职能 |
| 27 | 无外部 API 调用 | grep | 含 AI 代理功能 |
| 28 | 无自动安装插件 | grep | 禁止捆绑安装 |
| 29 | 无捆绑主题框架 | grep | 禁止 Theme Framework |
| 30 | 禁止移除非展示性 hooks | grep | WP 列出 13 个禁止移除的 hook |
| 31 | Admin notices 可关闭 | grep | 必须可 dismiss |

**WP.org 禁止移除的 hooks 列表：**
```
wp_head
wp_enqueue_scripts
admin_enqueue_scripts
wp_footer
admin_footer
login_head
login_footer
wp_meta
sidebar_admin_setup
admin_menu
wp_before_admin_bar_render
wp_after_admin_bar_render
customize_register
```
> 仅限展示性用途可移除（如移除 unnecessary meta），功能性的禁止移除。

### A6 Plugins

> 来源：WP.org Required #6 Plugins

| # | 检查项 | 自动化 | 说明 |
|---|--------|--------|------|
| 32 | 无 `tgmpa` / `TGM_Plugin_Activation` | grep | 禁止推荐/安装插件 |
| 33 | 无 `is_plugin_active` / `activate_plugin` 调用 | grep | 禁止代码内安装/激活 |

### A7 Naming & Trademarks

> 来源：WP.org Required #7 Naming / Plugin Guidelines #17

| # | 检查项 | 自动化 | 说明 |
|---|--------|--------|------|
| 34 | 正确拼写 "WordPress"（W 和 P 大写） | grep | 禁止 "Wordpress"/"wordpress" |
| 35 | 主题名不含 WordPress / Theme / Twenty* | grep | 命名规范 |
| 36 | Subject 标签 <= 3 个 | grep | readme.txt tags 限制 |

### A8 i18n

> 来源：WP.org Required #8 Internationalization

| # | 检查项 | 自动化 | 说明 |
|---|--------|--------|------|
| 37 | Text Domain = theme slug | grep | 一致性 |
| 38 | PHP 字符串包裹翻译函数 | grep | `__()` / `_e()` / `_x()` 等 |
| 39 | HTML 模板字符串暂免翻译 | 手动 | Block Theme 豁免 |
| 40 | 最多 2 个 text-domain | grep | 主体 + 子模块 |

### A9 Files & Resources

> 来源：WP.org Required #9 Files / Woo Marketplace Standards

| # | 检查项 | 自动化 | 说明 |
|---|--------|--------|------|
| 41 | style.css 存在且头部完整 | 自动 | Theme Name/Version/Requires/License/Text Domain |
| 42 | readme.txt 存在且格式正确 | 自动 | Contributors/Requires/Tested/License |
| 43 | templates/index.html 存在 | 自动 | Block Theme 必须 |
| 44 | screenshot.png 存在 (1200x900) | 自动 | 4:3 比例 |
| 45 | theme.json 存在且 JSON 合法 | 自动 | version: 3 |
| 46 | 无禁止文件 | glob | 见下方清单 |
| 47 | 无远程资源引用 | grep | 仅 Google Fonts 例外 |
| 48 | 行尾统一 | 半自动 | LF 或 CRLF 一致 |

**禁止文件列表：**
```
thumbs.db          # Windows
desktop.ini        # Windows
project.properties # NetBeans
project.xml        # NetBeans
.kpf               # Komodo
php.ini            # PHP 配置
dwsync.xml         # Dreamweaver
error_log          # PHP 错误日志
web.config         # IIS
.sql               # SQL 导出
__MACOSX           # macOS
.lubith            # Lubith
.wie               # Widget 导入
.dat               # Customizer 导入
.sh                # Shell 脚本
favicon.ico        # 网站图标
.git/.svn/.hg/.bzr # 版本控制
Zip files          # 压缩包
```

**允许的 XML 文件：** `wpml-config.xml`、`loco.xml`、`phpcs.xml`

### A10 Block Theme Structure

> 来源：WP.org Required #11 Block Themes

| # | 检查项 | 自动化 | 说明 |
|---|--------|--------|------|
| 49 | 模板文件完整 | 自动 | 每个模板有对应 HTML |
| 50 | 块注释闭合正确 | 半自动 | 自闭合 `<!-- wp:xxx /-->` 容器成对 |
| 51 | Pattern 文件含注释头 | grep | Title/Slug/Categories |
| 52 | style.css 仅主题声明头 | grep | 不写样式规则 |
| 53 | 无 Site Editor 残留 | grep | 开发期禁止保存导致数据库残留 |

### A11 Settings & Onboarding

> 来源：WP.org Required #12 Settings / Woo Design & UX Guidelines

| # | 检查项 | 自动化 | 说明 |
|---|--------|--------|------|
| 54 | Admin page 仅限 Appearance 子页面 | grep | 禁止顶级菜单 |
| 55 | 单 option 存储 | grep | 不创建多个 options |
| 56 | 无 demo import | grep | 禁止一键导入 |
| 57 | 无 external calls on activation | grep | 激活时不发起外部请求 |
| 58 | 无 tracking on activation | grep | 激活时不追踪用户 |
| 59 | 激活后不跳转 | grep | 遵循 WP 标准激活流程（Woo 明确禁止） |
| 60 | Customizer 为唯一自定义入口 | grep | Woo 明确禁止独立 onboarding 流程 |

### A12 Credits & Links

> 来源：WP.org Required #13 Selling/Credits/Links / Plugin Guidelines #10, #12

| # | 检查项 | 自动化 | 说明 |
|---|--------|--------|------|
| 61 | 前端最多 1 个 credit link | grep | 指向 Theme URI 或 Author URI |
| 62 | 可额外 1 个指向 WordPress.org | grep | |
| 63 | 无 SEO 堆砌/竞品标签 | grep | readme.txt 无 spam |
| 64 | Affiliate links 已披露 | grep | 必须直接链接，禁止跳转/伪装 |
| 65 | 无 front-facing upselling | grep | 前台禁止推销 |

### A13 WooCommerce Marketplace

> 来源：Woo Marketplace Theme Standards + Woo Design & UX Guidelines
> WP.org 不涉及此项

| # | 检查项 | 自动化 | 说明 |
|---|--------|--------|------|
| 66 | 兼容 WooCommerce Cart & Checkout Blocks | 手动 | 当前默认购物体验 |
| 67 | 兼容 HPOS | grep | 无直接操作订单表代码，使用 WC CRUD |
| 68 | 兼容主流 Woo 扩展 | 手动 | 无冲突 |
| 69 | 兼容最新 2 个 WP + Woo 主版本 | grep | requires/tested 版本号 |
| 70 | QIT 7 项测试通过 | 手动 | API/E2E/Activation/Security/PHPCompatibility/Malware/Validation，需外部执行 |
| 71 | 定价不高于其他渠道同款 | 手动 | |
| 72 | 无 Spam/联盟链接 | grep | |
| 73 | 无站外付费产品推销 | grep | |
| 74 | PHP 7.4+ 兼容（建议 8.3+） | 半自动 | 7.4 最低，推荐 8.3 |
| 75 | Admin 界面无品牌/推销材料 | grep | Woo 明确禁止 notices/banners/large logos |
| 76 | 字体不超过 2 种 | 手动 | Woo Design & UX Guidelines 原文 |
| 77 | 示例素材无 "库存照片" 感 | 手动 | Woo 原文："refrain from using imagery that looks like 'stock photography'" |
| 78 | 示例内容 family-friendly | 手动 | 适合所有年龄段 |
| 79 | 主题可独立运行，不依赖插件 | 手动 | Woo 原文："should not bundle or require the installation of additional plugins" |
| 80 | 响应式，移动端优先 | 半自动 | 覆盖 laptop/tablet/smartphone |
| 81 | 颜色方案统一且 WCAG AA | 半自动 | primary + 1-2 secondary + neutral |

### A14 Author & Upload

> 来源：WP.org Required #14 Author & Upload Restrictions

| # | 检查项 | 自动化 | 说明 |
|---|--------|--------|------|
| 82 | 一次只提交一个新主题 | 手动 | 审核完成后才能提交下一个 |
| 83 | 联系信息准确 | 手动 | WordPress.org 个人资料 |
| 84 | 无自动回复邮箱 | 手动 | 不使用路由到支持系统的邮箱 |

---

## 审核流程对比

| 阶段 | WP.org | Woo Marketplace |
|------|--------|-----------------|
| 1 | 代码审核 | 商业审核（30天内） |
| 2 | 上线 | 代码审核 |
| 3 | -- | UX 审核 |
| 4 | -- | 上线准备 |

> Woo 完整流程可能超过 30 天；被拒可修改后重新提交。

---

## 注意事项

- 审查前先确认主题目录有写权限
- 检查 `style.css` 中的 `Tested up to` 和 `Requires at least` 是否为当前值
- Woo Marketplace 审查需额外确认 QIT 测试已在外部执行
- 报告中的 blocker 问题必须全部修复才能提交
- WP.org 使用 SVN 提交，不是 git push
