# 部署流程

## cclee-theme 自动部署

```
本地 yougu 仓库 (修改 cclee-theme 目录)
        ↓ git push
GitHub Actions 触发
        ↓
  1. 同步到 cclee-theme 独立仓库
  2. SSH 到 demo 服务器执行 git pull
        ↓
demo 服务器更新完成
```

- 触发条件：push 到 master 且修改 `wp/wordpress/wp-content/themes/cclee-theme/**`
- Workflow：`.github/workflows/sync-cclee-theme.yml`
- 服务器路径：`/var/www/wp-demo/wordpress/wp-content/themes/cclee-theme/`

## 手动部署

| 项目 | 方式 |
|------|------|
| yougu-cclee 子主题 | git push → 服务器 git pull |
| cn-site | 手动同步 |
