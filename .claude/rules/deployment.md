# 部署与服务器

## 服务器路径

| 站点 | 根路径 | 主题路径 |
|------|--------|----------|
| 正式站 | `/var/www/wp/` | `wordpress/wp-content/themes/yougu-cclee/` |
| Demo 站 | `/var/www/wp-demo/` | `wordpress/wp-content/themes/cclee-theme/` |

## cclee-theme 自动部署

```
本地修改 → git push → GitHub Actions → demo 服务器 git pull
```

- 触发：push 到 master 且修改 `wp/wordpress/wp-content/themes/cclee-theme/**`
- Workflow：`.github/workflows/sync-cclee-theme.yml`
