---
paths:
  - cn-site/**
  - wp/**
---

# 站点规则

## WP 站点（活跃）

### 数据库连接

| 参数 | 值 |
|------|-----|
| Host | db |
| 数据库名 | wordpress |
| 用户名 | wordpress |
| 密码 | wordpress |
| Root 密码 | rootpassword |

### WP-CLI 命令格式

```bash
docker exec wp_cli wp [命令] --allow-root
```

### 开发原则

- 禁止可视化编辑器，所有操作通过 WP-CLI 或直接编辑文件
- 页面内容全部存储在数据库，格式为 Gutenberg 块
- 修改页面内容：`wp post update --post_content`
- 主题开发见 `docs/cclee-theme-dev.md`

---

## CN 站点（暂停）

### 技术栈

- PbootCMS + SQLite
- 无 PHP 本地环境，不可本地运行

### 路径

- 本地：`~/workspace/yougu/cn-site/`
- 服务器：`/var/www/cn-site/`

### 开发原则

- 所有改动直接编辑文件，通过 git push 部署到服务器验证
- 不依赖本地预览，以服务器效果为准
- 操作服务器文件前必须确认完整路径
