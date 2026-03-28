# 项目状态

_Last updated: 2026-03-27_

## 当前阶段
WP WooCommerce 网站开发中

## 活跃子项目

| 子项目 | 状态 | 说明 |
|--------|------|------|
| wp | 🔄 进行中 | WooCommerce 电商站 |
| cn-site | ✅ 已上线 | PbootCMS 站点 (cn.youguhaohan.com) |

## WP 站点配置

### WP-CLI 快速参考

```bash
docker exec wp_cli wp [命令] --allow-root
```

### 开发原则

- 禁止可视化编辑器，所有操作通过 WP-CLI 或直接编辑文件
- 页面内容全部存储在数据库，格式为 Gutenberg 块
- 修改页面内容：`wp post update --post_content`
- 主题开发见 `docs/cclee-theme-dev.md`

---

## CN 站点

PbootCMS + SQLite，无本地环境，git push 部署。凭证见 `~/.claude/passwords.md`。

---

## 部署

### cclee-theme 自动部署

```
本地修改 → git push → GitHub Actions → demo 服务器 git pull
```

- 触发：push 到 master 且修改 `wp/wordpress/wp-content/themes/cclee-theme/**`
- Workflow：`.github/workflows/sync-cclee-theme.yml`
