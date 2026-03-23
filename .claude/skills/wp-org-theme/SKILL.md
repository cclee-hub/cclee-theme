---
name: wp-org-theme
description: 提交主题到 WordPress.org 前的完整审核。触发词：/wp-org-submit、主题上架、wp org directory submit。仅当明确要提交到官方目录时使用。
---

# WordPress.org 主题审核要求

**官方文档**：https://make.wordpress.org/themes/handbook/review/required/（最后更新 2024-12-13）

## 目标主题

| 属性 | 值 |
|------|------|
| **主题名称** | CCLEE Theme |
| **Slug** | `cclee-theme` |
| **本地路径** | `wp/wordpress/wp-content/themes/cclee-theme/` |
| **Text Domain** | `cclee-theme` |

执行此技能时，**默认检查 `cclee-theme` 主题**，除非用户明确指定其他主题。

## Theme Check 扫描

> ⚠️ **无 CLI 支持，需人工操作**

**步骤：**
1. 访问 http://localhost:8080/wp-admin/
2. 后台 → 外观 → Theme Check
3. 选择 `cclee-theme` 主题
4. 点击 "Check it!" 运行检查
5. 将报告中的 **REQUIRED** 和 **WARNING** 项反馈给 AI

**常见检查项：**
| 检查项 | 说明 |
|--------|------|
| `Plugin Territory` | 插件级功能（CPT、Shortcodes 等） |
| `Required Files` | 必须文件缺失 |
| `Deprecated Functions` | 已弃用函数 |
| `Admin Menu` | 不应在主题中添加后台菜单 |

## Block Theme 必须文件

| 文件 | 要求 |
|------|------|
| `style.css` | 完整头部（Theme Name, Author, Description, Version, Requires at least, Tested up to, Requires PHP, License, Text Domain） |
| `readme.txt` | 标准格式，含 `== Resources ==` 声明第三方资源 |
| `theme.json` | version: 3（WP 6.6+） |
| `templates/index.html` | 必须存在 |
| `screenshot.png` | 1200×900px，4:3，不能像广告 |

## 高风险项（常见被拒原因）

| 风险 | 说明 | 处理 |
|------|------|------|
| **插件级功能** | CPT、Shortcodes、Analytics、SEO、Contact Forms、外部 API 调用 | **必须拆出为独立插件** |
| **远程资源** | 仅 Google Fonts 例外，其他需用户同意 | 内嵌或声明获取同意 |
| **前缀过短** | 最少 4 字母 | 检查所有 public namespace |
| **前端版权** | 只能显示用户版权，不能显示主题作者版权 | 移除或改为用户版权 |
| **未声明资源** | 字体、图片等第三方资源需在 readme.txt 声明 | 添加 `== Resources ==` 节 |

## 提交前检查清单

### 文件
- [ ] 删除 `.git`、`.svn`、`thumbs.db`、`.DS_Store` 等文件
- [ ] Minified 文件附带原始文件
- [ ] 无禁止文件（`.sql`、`.xml`、`.sh`、`favicon.ico` 等，wpml-config.xml 除外）

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

### 销售/链接
- [ ] 最多 1 个前端 credit link（指向 Theme URI 或 Author URI）
- [ ] 可额外 1 个指向 WordPress.org
- [ ] 无 SEO 堆砌、竞品标签

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
*/
```

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

== Changelog ==
= 1.0.0 =
* Initial release

== Resources ==
* FontName, Author/Source, License, URL
* image.jpg, Author, CC0, source-url
*/
```
