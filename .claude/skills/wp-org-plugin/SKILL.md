---
name: wp-org-plugin
description: 提交插件到 WordPress.org 前的完整审核。触发词：/wp-plugin-submit、插件上架、wp org plugin submit。仅当明确要提交到官方目录时使用。
---

## 执行流程

### Step 1：确定审查范围

使用 AskUserQuestion 依次提问：

**问题 1 -- 插件类型（必须）：**

| 选项 | 适用规范 |
|------|---------|
| Standard plugin | B1-B6 全部检查项 |
| Block-specific plugin | B1-B6 + B7 Block 专项 |
| Companion plugin for theme | B1-B6 + CP1-CP5 主题关联 |
| WooCommerce extension | B1-B6 + WC1-WC5 |

**问题 2 -- 检查深度（必须）：**

| 选项 | 说明 |
|------|------|
| Full audit | 首次提交前全量检查 |
| Changed files only | 增量修改后复查 |
| Specific areas | 手动选择检查维度 |

**问题 3 -- 检查维度（仅 Specific areas 时）：**

```
多选：
[ ] B1 Licensing              [ ] B2 Distribution
[ ] B3 Code Quality           [ ] B4 Business Model
[ ] B5 User Experience        [ ] B6 Submission
[ ] B7 Block Plugin           [ ] B8 WooCommerce
```

### Step 2：定位插件目录

```bash
find . -name "*.php" -path "*/plugins/*" -exec grep -l "Plugin Name:" {} \; | head -5
```

确认插件目录路径，从主文件头部读取插件 slug 和基本信息。

### Step 3：执行审查

按下方检查清单逐项执行。

### Step 4：输出报告

1. **通过项** -- 列表
2. **未通过项** -- 文件:行号 + 问题 + 修复建议
3. **待手动确认** -- 需人工判断的项
4. **总结** -- 通过率 + blocker 数量

报告写入：`docs/review-reports/{YYYY-MM-DD}-plugin-{scope}.md`

### Step 5：修复指导

逐项给修复建议（同 wp-org-theme）。

---

## 检查清单

> 来源：WP.org Detailed Plugin Guidelines (18 条) + Block Specific Plugin Guidelines (8 条)
> 已逐项对照官方文档验证，禁止臆测添加

### B1 Licensing

> 来源：Plugin Guidelines #1

| # | 检查项 | 自动化 | 说明 |
|---|--------|--------|------|
| 1 | 主文件声明 GPL 兼容许可 | grep | 推荐 GPLv2 or later |
| 2 | 所有代码、图片、库 GPL 兼容 | 手动 | 包括第三方 |
| 3 | readme.txt 含 `== Resources ==` | grep | 列明第三方资源 |
| 4 | 第三方库许可已确认 | 手动 | 无许可的库不可使用 |

### B2 Distribution

> 来源：Plugin Guidelines #3, #14, #15, #16

| # | 检查项 | 自动化 | 说明 |
|---|--------|--------|------|
| 5 | 稳定版本在 SVN 目录中可用 | 手动 | WP.org 只分发目录中的版本 |
| 6 | 不通过其他渠道独占分发 | 手动 | 目录版本必须与别处同步 |
| 7 | SVN 提交信息有意义 | 手动 | 禁止 "update"/"cleanup" |
| 8 | 版本号每次递增 | grep | 主文件 Version + readme Stable tag |
| 9 | 提交时插件功能完整 | 手动 | 不接受半成品，不可保留名称 |

### B3 Code Quality

> 来源：Plugin Guidelines #4, #8, #13

| # | 检查项 | 自动化 | 说明 |
|---|--------|--------|------|
| 10 | 代码可读，无混淆 | grep | 禁止 packer/uglify mangle/不明命名 |
| 11 | 提供源码或构建说明 | 手动 | readme 链接或内嵌源码 |
| 12 | 使用 WP 内置库 | grep | 不重复打包 jQuery/PHPMailer 等 |
| 13 | 前缀 >= 4 字母 | grep | 函数/选项/handle/图片尺寸等 |
| 14 | 输出 escape | grep | esc_html/esc_attr/esc_url |
| 15 | 输入 sanitize | grep | sanitize_text_field/absint |
| 16 | 无 PHP/JS errors/warnings/notices | 半自动 | Plugin Check 扫描 |
| 17 | 不加载外部可执行代码 | grep | 仅服务型可远程加载，其他禁止 |
| 18 | JS/CSS 本地包含 | grep | 非服务相关必须本地，字体例外 |

### B4 Business Model

> 来源：Plugin Guidelines #5, #6, #9, #10

| # | 检查项 | 自动化 | 说明 |
|---|--------|--------|------|
| 19 | 无 Trialware | grep | 禁止功能锁定/试用期/配额限制 |
| 20 | SaaS 功能有实质（非空壳） | 手动 | readme 说明服务内容 + Terms of Use 链接 |
| 21 | 无虚假 SaaS（移出代码伪装服务） | 手动 | 禁止把本可本地运行的代码移到服务端 |
| 22 | 无违法/不诚实行为 | 手动 | 黑帽SEO/虚假评论/sockpuppeting 等 |
| 23 | 前台链接默认关闭 | grep | "Powered By" 必须 opt-in |
| 24 | 前台链接不可强制显示 | grep | 不显示也能正常使用 |
| 25 | 链接仅在设置页配置 | grep | 不可在前台自动插入 |

### B5 User Experience

> 来源：Plugin Guidelines #7, #11, #12

| # | 检查项 | 自动化 | 说明 |
|---|--------|--------|------|
| 26 | 用户追踪需 opt-in | grep | 禁止未授权收集数据 |
| 27 | 追踪文档写在 readme | grep | 含隐私政策 |
| 28 | Admin notices 可关闭 | grep | 必须 dismissible |
| 29 | 错误提示含解决方案 | 手动 | 且解决后自动消失 |
| 30 | 无全站通知 | grep | 限定在设置页或上下文 |
| 31 | Admin 无广告 | 手动 | 追踪推荐链接违反 #7 |
| 32 | readme 无 spam | grep | 5 tags 以内，无竞品标签，无关键词堆砌 |
| 33 | Affiliate links 已披露 | grep | 直接链接，禁止跳转/伪装 |

### B6 Submission

> 来源：Plugin Guidelines #2, #17, #18

| # | 检查项 | 自动化 | 说明 |
|---|--------|--------|------|
| 34 | 开发者对所有内容负责 | 手动 | 含第三方库许可 |
| 35 | slug 不含他人商标 | grep | 禁止以他人产品名开头 |
| 36 | 正确拼写 "WordPress" | grep | W 和 P 大写 |
| 37 | WordPress.org 账号开 2FA | 手动 | 2024-10 起强制 |
| 38 | 联系邮箱准确且无自动回复 | 手动 | 不路由到支持系统 |
| 39 | zip 文件 < 10MB | bash | 超过拒绝 |
| 40 | 单次只能提交一个插件 | 手动 | 等当前审核完成 |

### B7 Block Plugin (如适用)

> 来源：Block Specific Plugin Guidelines

| # | 检查项 | 自动化 | 说明 |
|---|--------|--------|------|
| 41 | 含 block.json | glob | 每个 block 必须有 |
| 42 | 独立运行，不依赖主题 | 手动 | 任何主题下都能工作 |
| 43 | 无 wp-admin UX | grep | Block Plugin 禁止自定义 admin 页面 |
| 44 | PHP 代码最小化 | 手动 | 逻辑优先在 JS/React 中处理 |
| 45 | 服务端渲染正确 | 手动 | SSR block 的 save 返回 null |
| 46 | 样式用 block.json / editor style | grep | 不在 PHP 中内联样式 |
| 47 | 无 `plugin_action_links` 修改 | grep | 不修改插件列表页行为 |
| 48 | 不依赖特定页面/文章 | 手动 | 任何位置都能渲染 |

### B8 WooCommerce Extension (如适用)

> 来源：Woo Marketplace Standards

| # | 检查项 | 自动化 | 说明 |
|---|--------|--------|------|
| 49 | 兼容最新 2 个 WP + Woo 主版本 | grep | requires/tested 版本号 |
| 50 | QIT 7 项测试通过 | 手动 | 需外部执行确认 |
| 51 | HPOS 兼容 | grep | 使用 WC CRUD，不直接操作订单表 |
| 52 | Cart/Checkout Blocks 兼容 | 手动 | shortcode 需提供 block 版本 |
| 53 | Freemium 双版本流程正确 | 手动 | 两个独立提交，后续合并为单产品页 |

---

## Companion Plugin 附加检查

> 当选择 "Companion plugin for theme" 时执行

| # | 检查项 | 自动化 | 说明 |
|---|--------|--------|------|
| CP1 | 插件 text-domain 与主题独立 | grep | 两个不同 text-domain |
| CP2 | 主题无插件时不崩溃 | 手动 | 禁用插件后前台正常 |
| CP3 | 插件无主题时不崩溃 | 手动 | 纯 WP 环境下插件不报错 |
| CP4 | 功能边界清晰 | 手动 | 主题管展示，插件管功能 |
| CP5 | 无循环依赖 | grep | 插件不依赖主题函数，反之亦然 |

---

## Plugin Check CLI 扫描

> 执行前确保 Docker 环境已启动

```bash
# 完整检查
docker exec wp_cli wp plugin check <plugin-slug> --allow-root

# 只看错误
docker exec wp_cli wp plugin check <plugin-slug> --ignore-warnings --allow-root

# JSON 输出
docker exec wp_cli wp plugin check <plugin-slug> --format=json --allow-root

# 检查特定项
docker exec wp_cli wp plugin check <plugin-slug> --checks=late_escaping,i18n_usage --allow-root
```

| 检查项 | 说明 |
|--------|------|
| `late_escaping` | 输出转义 |
| `i18n_usage` | 国际化 |
| `plugin_header` | 插件头部规范 |
| `code_obfuscation` | 代码混淆检测 |

---

## 注意事项

- 插件提交到 WP.org 使用 SVN，不是 git push
- Block Plugin 要求更严格（PHP 最小化，无 admin UX）
- Trialware 是最常见的拒绝原因，重点检查
- Freemium 需两个独立提交（免费版 + 付费版各自 zip）
- 审查前确认 readme.txt Stable tag 与主文件 Version 一致
- slug 提交后不可更改，命名前确认
- 首次审核 14 天内，后续回复 10 个工作日内
