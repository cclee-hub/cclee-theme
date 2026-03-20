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
| `~/yougu/cn-site/` | `/var/www/cn-site/` |
| `~/yougu/vpn/` | `/opt/hysteria2/` |
| `~/yougu/wp/` | `/var/www/wp/` |

## 子项目

| 目录 | 类型 | 说明 |
|------|------|------|
| `cn-site/` | PbootCMS | PHP CMS 站点 |
| `vpn/` | Hysteria2 | VPN 服务端配置 |
| `wp/` | - | 待定 |

## VPN 服务 (Hysteria2)

| 项目 | 信息 |
|------|------|
| 安装路径 | `/opt/hysteria2/` |
| 配置文件 | `/opt/hysteria2/config.yaml` |
| 监听端口 | UDP 36712 |
| 域名 | vpn-sg.aigent.ren |
| 密码 | test88888 |
| TLS 证书 | Let's Encrypt (自动续期) |
| 服务名 | `hysteria2.service` |
| 状态 | active (running) |

## 本地环境 (WSL)

| 工具 | 状态 |
|------|------|
| Node.js | v24.13.1 (nvm) |
| npm | 11.8.0 |
| Docker | 未安装 |
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
