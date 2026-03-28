---
name: wp-org-theme
description: 提交主题到 WordPress.org 和/或 Woo Marketplace 前的完整审核。触发词：/wp-org-submit、/woo-submit、主题上架、wp org directory submit、woo marketplace submit。一套代码双平台上架。
---

# WordPress.org + Woo Marketplace 主题审核

**官方文档**
- WP.org：https://make.wordpress.org/themes/handbook/review/required/（最后更新 2024-12-13）
- Woo：https://developer.woocommerce.com/docs/woo-marketplace/submitting-your-product/

---

## 目标主题

| 属性 | 值 |
|------|------|
| **主题名称** | CCLEE Theme |
| **Slug** | `cclee-theme` |
| **本地路径** | `wp/wordpress/wp-content/themes/cclee-theme/` |
| **Text Domain** | `cclee-theme` |

执行此技能时，**默认检查 `cclee-theme` 主题**，除非用户明确指定其他主题。

---

## 提交策略

一套代码，两份提交包：

| 项目 | WP.org 包 | Woo 包 |
|------|-----------|--------|
| 核心代码 | 相同 | 相同 |
| 演示内容 | 通用场景 | WooCommerce 电商场景 |
| 独立运行 | 必须（无需任何插件） | 必须（WooCommerce 可选增强） |

---

## Theme Check 扫描（WP.org 必须）

> ⚠️ **无 CLI 支持，需人工操作**
>
> 插件地址：https://wordpress.org/plugins/theme-check/

1. 访问 http://localhost:8080/wp-admin/
2. 后台 → 外观 → Theme Check
3. 选择 `cclee-theme`，点击 "Check it!"
4. 将 **REQUIRED** 和 **WARNING** 项反馈给 AI

| 检查项 | 说明 |
|--------|------|
| `Plugin Territory` | 插件级功能（CPT、Shortcodes 等） |
| `Required Files` | 必须文件缺失 |
| `Deprecated Functions` | 已弃用函数 |
| `Admin Menu` | 可在 Appearance 下添加子页面，样式/脚本必须限制在该页面 |

---

## Block Theme 必须文件

| 文件 | 要求 |
|------|------|
| `style.css` | 完整头部（见模板） |
| `readme.txt` | 标准格式，含 `== Resources ==` |
| `theme.json` | version: 3（WP 6.6+） |
| `templates/index.html` | 必须存在 |
| `screenshot.png` | 1200×900px，4:3，不能像广告 |

---

## 高风险项（两平台通用）

| 风险 | 说明 | 处理 |
|------|------|------|
| **插件级功能** | CPT、Shortcodes、Analytics、SEO、Contact Forms、外部 API 调用 | 拆出为独立插件 / Companion Plugin |
| **远程资源** | 仅 Google Fonts 例外 | 内嵌或声明获取同意 |
| **前缀过短** | 最少 4 字母 | 检查所有 public namespace |
| **前端版权** | 只能显示用户版权 | 移除主题作者版权 |
| **未声明资源** | 字体、图片等第三方资源 | 添加 `== Resources ==` |
| **Admin 推销** | 横幅、大 logo、推销材料（Woo 严格） | 清除所有 Admin 界面品牌内容 |
| **强制激活跳转** | 激活后跳转非标准页面 | 禁止，遵循 WP 标准激活流程 |

---

## Woo 专项检查

> 以下为 Woo Marketplace 额外要求，WP.org 不涉及

### 电商兼容性
- [ ] 兼容 WooCommerce Cart & Checkout Blocks（当前默认购物体验）
- [ ] 兼容 HPOS（高性能订单存储），无直接操作订单表的代码
- [ ] 与主流 Woo 扩展同时安装无冲突

### 商业条款
- [ ] 定价不高于其他渠道同款产品
- [ ] 无 Spam 链接、联盟链接
- [ ] 无站外付费产品推销链接

### 技术标准
- [ ] PHP 7.4+ 支持（⚠️ 7.4 已于 2022年 EOL，仅作为最低兼容，建议 8.3+）
- [ ] 兼容最新两个主要版本的 WordPress 和 WooCommerce
- [ ] 通过 QIT 自动化测试：API、E2E、Activation、Security、PHPCompatibility、Malware、Validation

---

## 提交前检查清单（两平台通用）

### 文件
- [ ] 删除版本控制目录：`.git`、`.svn`、`.hg`、`.bzr`
- [ ] Minified 文件附带原始文件
- [ ] 无禁止文件（完整列表见下）

**禁止文件列表**：
```
thumbs.db          # Windows 缩略图
desktop.ini        # Windows 系统文件
project.properties # NetBeans 项目
project.xml        # NetBeans 项目
.kpf               # Komodo 项目
php.ini            # PHP 配置
dwsync.xml         # Dreamweaver 项目
error_log          # PHP 错误日志
web.config         # IIS 配置
.sql               # SQL 导出
__MACOSX           # macOS 系统文件
.lubith            # Lubith 主题生成器
.wie               # Widget 导入文件
.dat               # Customizer 导入
.xml               # XML 文件（例外见下）
.sh                # Shell 脚本
favicon.ico        # 网站图标
Hidden files       # 隐藏文件
Zip files          # 压缩包
```

**允许的 XML 文件**：`wpml-config.xml`、`loco.xml`、`phpcs.xml`

### 代码
- [ ] 无 PHP/JS errors、warnings、notices
- [ ] 输入 sanitize，输出 escape
- [ ] 前缀 ≥ 4 字母（functions, options, handles, image sizes 等）
- [ ] 使用 WP 内置库（jQuery 等），不重复打包

### 功能边界
- [ ] 无 CPT / Shortcodes / Custom Blocks
- [ ] 无 Analytics / SEO / Contact Forms / Social buttons
- [ ] 无外部 API 调用（**包括 AI 代理功能**）
- [ ] 无自动安装插件
- [ ] 无捆绑主题框架（Theme Framework）
- [ ] 无第三方 PHP 重型依赖库

### UX / 设计
- [ ] 响应式，移动端优先
- [ ] 符合 WCAG AA 无障碍标准
- [ ] Block Editor 内样式与前台一致（所见即所得）
- [ ] 字体不超过两种，颜色方案统一
- [ ] 示例内容图片/字体/图标均已授权

### 无障碍
- [ ] Block Theme：`<main>` 自动提供 skip link
- [ ] 键盘导航有 focus 高亮
- [ ] 正文链接有下划线（不能只用颜色区分）

### 国际化
- [ ] PHP 中字符串可翻译（`__()`、`_e()`）
- [ ] HTML 模板字符串暂时豁免
- [ ] Text Domain = theme slug

### 隐私
- [ ] 追踪默认关闭，opt-in
- [ ] readme.txt 说明数据收集方式

### 命名与商标
- [ ] 正确拼写 "WordPress"（W 和 P 大写）
- [ ] 主题名不含 WordPress / Theme / Twenty*
- [ ] Subject 标签 ≤ 3 个

### 链接
- [ ] 最多 1 个前端 credit link（指向 Theme URI 或 Author URI）
- [ ] 可额外 1 个指向 WordPress.org
- [ ] 无 SEO 堆砌、竞品标签

---

## 审核流程对比

| 阶段 | WP.org | Woo Marketplace |
|------|--------|-----------------|
| 1 | 代码审核 | 商业审核（30天内） |
| 2 | 上线 | 代码审核 |
| 3 | — | UX 审核 |
| 4 | — | 上线准备 |

> Woo 完整流程可能超过 30 天；被拒可修改后重新提交。

---

## style.css 头部模板

```css
/*
Theme Name: Theme Name
Author: wordpress.org-username
Description: Short description. Max 150 chars.
Version: 1.0.0
Requires at least: 6.6
Tested up to: 6.7
Requires PHP: 8.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Text Domain: theme-slug
Theme URI: https://example.com/theme  (可选，必须指向 WP.org 上的主题页面)
Author URI: https://example.com       (可选，指向作者/店铺/项目网站)
*/
```

> ⚠️ **Theme URI 限制**：使用 `wordpress.org` 域名仅限 Twenty* 默认主题，其他主题不得使用。

## readme.txt 模板

```
=== Theme Name ===
Contributors: wordpress.org-username
Requires at least: 6.6
Tested up to: 6.7
Requires PHP: 8.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Short description. No more than 150 chars.

== Description ==
Theme description here.

== Frequently Asked Questions ==

= A question that someone might have =
An answer to that question.

== Changelog ==
= 1.0.0 =
* Initial release

== Upgrade Notice ==
= 1.0.0 =
Upgrade notices describe the reason a user should upgrade. No more than 300 characters.

== Resources ==
* FontName, Author/Source, License, URL
* image.jpg, Author, CC0, source-url
```
