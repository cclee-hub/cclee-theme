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
| `~/workspace/wordpress/cn-site/` | `/var/www/cn-site/` |
| `~/workspace/wordpress/wp/` | `/var/www/wp/` |

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
| `docs/plans/2026-03-20-wp-soldering-site-design.md` | WP 焊接工具网站设计文档 |
| `docs/plans/2026-03-20-wp-soldering-site-implementation.md` | WP 焊接工具网站实施计划 |

## 本地环境 (WSL)

### 工具状态

| 项目 | 值 |
|------|-----|
| IDE | VSCode |
| AI | Claude Code |
| 运行层 | WSL |

### 环境依赖

| 工具 | 状态 |
|------|------|
| Node.js | v24.13.1 (nvm) |
| npm | 11.8.0 |
| Docker Desktop | 已安装 (WSL 集成已启用) |
| PHP | 未安装 |
| MySQL | 未安装 |

## SSH 密钥

- 密钥类型: Ed25519
- 私钥: `~/.ssh/id_ed25519`
- 公钥: `~/.ssh/id_ed25519.pub`
- 邮箱: leecc1531@gmail.com

## GitHub 仓库

- 仓库: https://github.com/cclee-hub/wordpress
- 可见性: 私有
- SSH: `git@github.com:cclee-hub/wordpress.git`

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

### 已安装插件

| 插件 | 版本 | 状态 |
|------|------|------|
| WooCommerce | 10.6.1 | ✅ 激活 |
| WooCommerce PayPal Payments | 3.4.1 | ✅ 激活 |
| Google for WooCommerce | 3.6.0 | ✅ 激活 |
| Starter Templates (Astra) | 4.4.52 | ✅ 激活 |
| Contact Form 7 | - | ✅ 激活 |
| Akismet Anti-spam | 5.6 | ✅ 激活 |

### WP-CLI 命令

```bash
docker exec wp_cli wp [命令] --allow-root
```

主题文件路径：`wp/wordpress/wp-content/themes/cclee-theme/`

### 主题

| 主题 | 说明 |
|------|------|
| CCLEE | FSE 自定义主题 (唯一激活主题) |

### 网站设计概要

| 项目 | 内容 |
|------|------|
| 类型 | 外贸企业官网 + WooCommerce 商城 |
| 产品 | 焊接工具（电烙铁、焊台、烙铁嘴） |
| 市场 | 全球，英文，USD |
| 风格 | 简洁现代 + 工业感（深蓝 + 橙色） |

**页面结构：**
- Home：Banner → 分类 → 热销 → 简介 → 评价 → CTA
- About Us：公司介绍 → 数字亮点 → 工厂图
- Products：WooCommerce 商店页
- Blog：最新文章列表
- Contact：联系信息 + 询盘表单

**核心功能：**
- 产品详情页：购买按钮 + 询盘弹窗
- 运费：询盘报价（暂不设置）
- 支付：PayPal（后期扩展信用卡）

## WordPress 部署流程

1. 导出本地数据库（SQL文件）
2. 把 `wp/wordpress/` 目录推送到 GitHub
3. 服务器 `git pull`
4. 服务器导入 SQL
5. 修改 WP 的 `siteurl` 为正式域名
