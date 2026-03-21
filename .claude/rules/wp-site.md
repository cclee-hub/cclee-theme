# wp 站点规则

## 数据库连接

| 参数 | 值 |
|------|-----|
| Host | db |
| 数据库名 | wordpress |
| 用户名 | wordpress |
| 密码 | wordpress |
| Root 密码 | rootpassword |

## WP-CLI 命令格式

```bash
docker exec wp_cli wp [命令] --allow-root
```

## 开发原则

- 禁止可视化编辑器，所有操作通过 WP-CLI 或直接编辑文件
- 页面内容全部存储在数据库，格式为 Gutenberg 块
- 修改页面内容：`wp post update --post_content`
- 详细主题结构见 `docs/cclee-theme-dev.md`

## 主题

见 `.claude/rules/wp-theme.md`
