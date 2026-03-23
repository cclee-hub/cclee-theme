# Yougu 项目规则

## 环境

- 本地：WSL (Ubuntu) + VSCode + Docker Desktop
- 服务器：Alibaba Cloud Linux 3，IP: 47.84.87.131
- 部署：git push → 服务器 git pull

## 路径

| 项目 | 本地 | 服务器 |
|------|------|--------|
| cn-site | `~/workspace/yougu/cn-site/` | `/var/www/cn-site/` |
| wp | `~/workspace/yougu/wp/` | `/var/www/wp/` |
| yougu-cclee | `wp/wordpress/wp-content/themes/yougu-cclee/` | `/var/www/wp/wordpress/wp-content/themes/yougu-cclee/` |

## 项目概览

| 项目 | 技术栈 | 本地可运行 |
|------|--------|-----------|
| cn-site | PbootCMS + SQLite | ❌ |
| wp | WordPress + WooCommerce + MySQL 8.0 | ✅ localhost:8080 |
| wp-theme | cclee-theme（通用主题，独立仓库）+ yougu-cclee（Yougu 子主题） | ✅ localhost:8080 |

## 开发流程

### 遇到错误时
1. 先查日志：`docker exec wp_wordpress cat /var/www/html/wp-content/debug.log | tail -50`
2. 按 `.claude/rules/gotchas.md` 流程处理
3. 修复后执行 `/note gotcha <内容>` 记录
4.WSL 环境下主题文件属于 www-data 用户，编辑前若遇到权限错误，
必须先执行 sudo chown -R $USER:$USER <文件路径>，不得跳过或提示手动操作。

## 全局禁止

- 禁止臆测延伸，禁止提前设计未确认功能
- 操作服务器前必须确认路径
- 禁止修改未明确提及的文件
- 更新文档时：AI友好、无歧义、无噪音
