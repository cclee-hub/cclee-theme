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

## 项目特性

| 项目 | 数据库 | 本地可运行 |
|------|--------|-----------|
| cn-site (PbootCMS) | SQLite | ❌ 无PHP环境 |
| wp (WordPress + WooCommerce) | MySQL 8.0 (Docker) | ✅ localhost:8080 |

## wp 数据库连接

| 参数 | 值 |
|------|-----|
| Host | db |
| 数据库名 | wordpress |
| 用户名 | wordpress |
| 密码 | wordpress |
| Root 密码 | rootpassword |

## 禁止

- 禁止臆测延伸
- 禁止提前设计未确认功能
- 操作服务器前必须确认路径