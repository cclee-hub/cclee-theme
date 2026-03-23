---
name: wp-org-plugin
description: 提交插件到 WordPress.org 前的完整审核。触发词：/wp-plugin-submit、插件上架、wp org plugin submit。仅当明确要提交到官方目录时使用。
---

# WordPress.org 插件审核要求

## 目标插件

| 属性 | 值 |
|------|------|
| **插件名称** | CCLEE Toolkit |
| **Slug** | `cclee-toolkit` |
| **本地路径** | `wp/wordpress/wp-content/plugins/cclee-toolkit/` |
| **主文件** | `cclee-toolkit.php` |
| **Text Domain** | `cclee-toolkit` |
| **功能定位** | 从 cclee-theme 提取的 plugin-territory 功能（Custom Post Types、Taxonomies、Shortcodes、AI 模块等） |

执行此技能时，**默认检查 `cclee-toolkit` 插件**，除非用户明确指定其他插件。



## 基础合规要求

| 规则 | 说明 |
|------|------|
| **GPL 兼容许可** | 所有代码、图片、库必须 GPL 兼容，推荐 GPLv2 or later |
| **代码可读** | 不允许混淆（packer/uglify mangle），需提供源码或构建说明链接 |
| **功能完整** | 提交时插件必须可用，不接受半成品或仅 sandbox 访问的 API 插件 |
| **不允许 Trialware** | 不可锁定功能待付费解锁，不可在试用期后禁用功能 |



| 文件 | 要求 |
|------|------|
| `plugin-slug.php` | 完整头部声明（Plugin Name, Author, Description, Version, Requires at least, Tested up to, Requires PHP, License, Text Domain） |
| `readme.txt` | 标准格式，含 `== Resources ==` 声明第三方资源 |

## 高风险项（常见被拒原因）

| 风险 | 说明 | 处理 |
|------|------|------|
| **代码混淆** | 不允许 packer/uglify mangle 等混淆手段 | 提供可读源码 |
| **外部资源** | 不允许加载与服务无关的外部资源 | 移除或改为本地 |
| **框架/库插件** | 不接受纯框架或需其他插件修改才能用的插件 | 将依赖打包进插件 |
| **重复核心功能** | 不接受 100% 复制他人或核心已有功能 | 确保有差异化价值 |
| **未声明外部调用** | 外部 API 调用需在 readme.txt 说明 | 添加隐私/数据说明节 |
| **前缀过短** | 所有 public namespace 最少 4 字母 | 检查函数名/选项名/handle |
| **slug 含商标词** | 不可使用他人商标（如 woocommerce、acf） | 提交前确认命名 |
| **前台 "Powered By" 链接** | 前台链接必须默认关闭，用户 opt-in 才能显示 | 提供设置开关 |
| **后台通知不可关闭** | 全站通知必须可关闭，错误提示需含解决方案 | 添加 dismiss 按钮 |

## 外部 API / SaaS 特殊规则

> 适用于 `cclee-ai` 类需要第三方 API Key 的插件

- ✅ 用户主动安装、激活、填写 API Key 后视为授权同意
- ✅ 通讯必须使用 HTTPS
- ✅ readme.txt 必须说明调用哪个外部服务、传输哪些数据
- ❌ 不可在用户未配置前自动发起外部请求
- ❌ 不可追踪用户行为（追踪须默认关闭，opt-in）

## 前台链接与后台通知规则

### 前台 "Powered By" 链接（Rule 10）

| 规则 | 说明 |
|------|------|
| **默认关闭** | 前台 credit 链接必须默认不显示 |
| **用户 opt-in** | 必须用户主动开启才能显示 |
| **不可强制** | 不可要求显示链接才能使用插件功能 |
| **仅限设置页** | 链接只能出现在插件设置页，不可在前台页面插入 |

### 后台通知（Rule 11）

| 规则 | 说明 |
|------|------|
| **可关闭** | 所有 admin notice 必须可关闭（dismiss） |
| **自动消失** | 错误提示应在问题解决后自动消失 |
| **含解决方案** | 错误提示必须告诉用户如何解决问题 |
| **禁止全站** | 不可显示与当前页面无关的全站通知 |

## SVN 发布与版本管理

### SVN 仓库规则（Rule 14）

| 规则 | 说明 |
|------|------|
| **SVN 是发布仓库** | 不是开发仓库，避免频繁小改动提交 |
| **目录结构** | `trunk/`（当前版本）、`tags/`（历史版本）、`assets/`（截图图标） |
| **禁止删除** | 已发布版本不可从 tags 删除 |
| **测试后提交** | 确保 trunk 测试通过后再 copy 到 tags |

### 版本号规则（Rule 15）

| 规则 | 说明 |
|------|------|
| **每次递增** | 每次发布必须递增版本号（主文件头部 + readme.txt stable tag） |
| **语义化版本** | 推荐 `主版本.功能版本.修复版本`（如 1.2.3） |
| **同步更新** | 主插件文件 `Version:` 和 readme.txt `Stable tag:` 必须一致 |

## 提交流程与时效

| 阶段 | 时限 | 说明 |
|------|------|------|
| **首次审核** | 14 天内 | 提交后审核团队会在 14 天内初审 |
| **后续回复** | 10 个工作日 | 审核意见发出后 10 个工作日内需回复 |
| **单次提交限制** | 普通开发者一次只能提交一个插件 | 等当前插件审核完成才能提交下一个 |
| **zip 大小限制** | < 10MB | 超过 10MB 的 zip 会被拒绝 |

> **注意**：Plugin Review Team 成员无此限制

## 提交前检查清单

### 账号
- [ ] WordPress.org 账号已开启 **2FA**（2024年10月起强制要求）
- [ ] 以个人账号提交（不可用组织账号代提）

### 文件
- [ ] 删除 `.git`、`.svn`、`thumbs.db`、`.DS_Store` 等文件
- [ ] Minified 文件附带原始文件及构建说明
- [ ] 无禁止文件（`.sql`、`.sh` 等）
- [ ] `readme.txt` 格式通过 [Readme Validator](https://wordpress.org/plugins/developers/readme-validator/) 验证
- [ ] zip 文件 < 10MB

### 代码
- [ ] 无 PHP/JS errors、warnings、notices
- [ ] 输入 sanitize，输出 escape
- [ ] 前缀 ≥ 4 字母（函数名、选项名、handle、图片尺寸名等）
- [ ] 使用 WP 内置库（jQuery 等），不重复打包
- [ ] 代码未混淆，源码可读
- [ ] 通过本地 **Plugin Check** 工具扫描无报错

## Plugin Check CLI 扫描

> 执行 CLI 检查前，确保 Docker 环境已启动

```bash
# 完整检查（默认检查 cclee-toolkit）
docker exec wp_cli wp plugin check cclee-toolkit --allow-root

# 只看错误（忽略警告）
docker exec wp_cli wp plugin check cclee-toolkit --ignore-warnings --allow-root

# JSON 输出（便于解析）
docker exec wp_cli wp plugin check cclee-toolkit --format=json --allow-root

# 检查特定项
docker exec wp_cli wp plugin check cclee-toolkit --checks=late_escaping,i18n_usage --allow-root
```

**常见检查项说明：**
| 检查项 | 说明 |
|--------|------|
| `late_escaping` | 输出转义 |
| `i18n_usage` | 国际化 |
| `plugin_header` | 插件头部规范 |
| `code_obfuscation` | 代码混淆检测 |

### 功能
- [ ] 插件功能完整，提交时即可使用（不接受半成品）
- [ ] 无自动安装其他插件/主题
- [ ] 外部 API 调用已在 readme.txt 说明
- [ ] 前台 "Powered By" 链接默认关闭，用户 opt-in 才能显示
- [ ] 后台通知可关闭（dismiss），错误提示含解决方案

### 版本管理
- [ ] 每次发布递增版本号
- [ ] 主插件文件 `Version:` 与 readme.txt `Stable tag:` 一致
- [ ] SVN trunk 测试通过后再 copy 到 tags

### 国际化
- [ ] PHP 中字符串可翻译（`__()`、`_e()`）
- [ ] Text Domain = plugin slug

### 隐私
- [ ] 追踪默认关闭，opt-in
- [ ] readme.txt 含数据收集/外部服务说明

### 命名与商标
- [ ] 正确拼写 "WordPress"（W 和 P 大写）
- [ ] 插件名不含他人商标
- [ ] Tags ≤ 12 个（仅前 5 个在目录页显示）
- [ ] Tags 不含竞品名称（如用 "woocommerce" 描述自己插件）
- [ ] **slug 提交后不可更改**，命名前确认

### 链接
- [ ] 无 SEO 堆砌、竞品标签
- [ ] readme 无垃圾外链

## 主插件文件头部模板

```php
<?php
/**
 * Plugin Name: Plugin Name
 * Author: wordpress.org-username
 * Author URI: https://example.com
 * Description: Short description. Max 150 chars.
 * Version: 1.0.0
 * Requires at least: 6.4
 * Tested up to: 6.7
 * Requires PHP: 8.0
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: plugin-slug
 */
```

## readme.txt 模板

```
=== Plugin Name ===
Contributors: wordpress.org-username
Tags: tag1, tag2, tag3
Requires at least: 6.4
Tested up to: 6.7
Requires PHP: 8.0
Stable tag: 1.0.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Short description. No more than 150 chars.

== Description ==
Plugin description here.

== External Services ==
This plugin connects to [Service Name] API.
- Service URL: https://api.example.com
- Data sent: user-provided content for processing
- Privacy policy: https://example.com/privacy

== Changelog ==
= 1.0.0 =
* Initial release

== Resources ==
* LibraryName, Author, License, URL
```

## 多模块插件合规规则

> 适用于将多个功能合并为单一插件（Suite 模式）

**合规前提：**
- 所有模块必须服务于同一使用场景（如：B端企业官网工具集）
- 每个模块可在设置页**独立开关**，不强制捆绑
- readme.txt 描述中清晰说明各模块用途及关联性

**检查清单：**
- [ ] 插件描述说明所有模块及其场景关联
- [ ] 各模块功能可独立启用/禁用
- [ ] 外部 API 模块（如 AI）未启用时不发起任何外部请求
- [ ] 单一 Text Domain 覆盖所有模块
- [ ] 所有模块共用同一前缀（≥ 4 字母）

**目录结构规范：**
```
plugin-slug/
├── plugin-slug.php     # 主入口，唯一插件头部声明
├── readme.txt
├── modules/
│   ├── ai/
│   ├── seo/
│   └── case-study/
└── assets/
```
