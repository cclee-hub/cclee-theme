# Yougu 项目上下文

## 服务器信息

| 项目 | 信息 |
|------|------|
| 公网 IP | 47.84.87.131 |
| 系统 | Alibaba Cloud Linux 3 |
| 已开放端口 | SSH (22), 80, 443, UDP 36712 (Hysteria2) |
| SSH 连接 | `ssh root@47.84.87.131` |

## 目录映射

| 本地 (WSL) | 服务器 |
|------------|--------|
| `~/workspace/yougu/cn-site/` | `/var/www/cn-site/` |
| `~/workspace/yougu/wp/` | `/var/www/wp/` |

## 子项目

| 目录 | 类型 | 说明 |
|------|------|------|
| `cn-site/` | PbootCMS | PHP CMS 站点 |
| `wp/` | WordPress | WooCommerce 本地开发环境 |
| `docs/` | 文档 | 项目文档 (含 VPN 配置说明) |

## 文档

| 文件 | 说明 |
|------|------|
| `docs/vpn-hysteria2.md` | Hysteria2 VPN 服务配置说明 |

## 本地环境 (WSL)

| 工具 | 状态 |
|------|------|
| Node.js | v24.13.1 (nvm) |
| npm | 11.8.0 |
| Docker Desktop | 已安装 (WSL 集成未启用) |
| PHP | 未安装 |
| MySQL | 未安装 |

## SSH 密钥

- 密钥类型: Ed25519
- 私钥: `~/.ssh/id_ed25519`
- 公钥: `~/.ssh/id_ed25519.pub`
- 邮箱: leecc1531@gmail.com

## GitHub 仓库

- 仓库: https://github.com/cclee-hub/yougu
- 可见性: 私有
- SSH: `git@github.com:cclee-hub/yougu.git`

## WordPress 本地开发环境

| 配置 | 值 |
|------|-----|
| 目录 | `wp/` |
| 端口 | 8080 |
| MySQL | 8.0 |
| WordPress | latest |
| 数据库 | wordpress / wordpress / wordpress |

启动: `cd wp && docker-compose up -d`
访问: http://localhost:8080

## WordPress 部署流程

1. 导出本地数据库（SQL文件）
2. 把 `wp/wordpress/` 目录推送到 GitHub
3. 服务器 `git pull`
4. 服务器导入 SQL
5. 修改 WP 的 `siteurl` 为正式域名
