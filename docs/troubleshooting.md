# 详细排查手册

> 精简规则见 `.claude/rules/gotchas.md`，本文档提供详细步骤和代码示例。

---

## 场景一：白屏 / 500 错误

```bash
# 1. 查看容器错误日志
docker logs wp_wordpress --tail=50

# 2. 查看 WP debug 日志
docker exec wp_wordpress cat /var/www/html/wp-content/debug.log

# 3. 检查 PHP 语法
docker exec wp_wordpress php -l /var/www/html/wp-content/themes/cclee-theme/functions.php

# 4. 临时切换主题排除主题问题
docker exec wp_cli wp theme activate twentytwentyfour --allow-root
```

---

## 场景二：theme.json 样式失效

```bash
# 1. 验证 JSON 格式
docker exec wp_cli wp eval 'echo json_encode(json_decode(file_get_contents(get_template_directory() . "/theme.json")));' --allow-root

# 2. 检查全局样式覆盖
docker exec wp_cli wp post list --post_type=wp_global_styles --fields=ID,post_title --allow-root

# 3. 删除全局样式
docker exec wp_cli wp post delete <ID> --force --allow-root

# 4. 清除缓存
docker exec wp_cli wp cache flush --allow-root
```

---

## 场景三：FSE 导航块

### 正确方案：使用 ref 绑定 wp_navigation 帖子

```bash
# 1. 查看现有导航帖子
wp post list --post_type=wp_navigation --post_status=any --fields=ID,post_title --allow-root

# 2. 创建导航帖子
wp post create --post_type=wp_navigation --post_title="Footer Menu" --post_status=publish --allow-root

# 3. 更新导航内容（用临时文件避免 shell 转义）
echo '<!-- wp:navigation-link {"kind":"post-type","type":"page","id":6,"label":"About Us","url":"/about/"} /-->' > /tmp/nav.html
docker cp /tmp/nav.html wp_cli:/tmp/nav.html
docker exec wp_cli wp post update <ID> --post_content="$(cat /tmp/nav.html)" --allow-root

# 4. 模板中绑定
# <!-- wp:navigation {"ref":94} /-->
```

### wp_navigation-link 标准格式

```html
<!-- wp:navigation-link {"className":"menu-item menu-item-type-post_type menu-item-object-page","description":"","id":"6","kind":"post-type","label":"About Us","opensInNewTab":false,"rel":null,"title":"","type":"page","url":"http://localhost:8080/?page_id=6"} /-->
```

| 属性 | 说明 |
|------|------|
| `kind` | `post-type`（页面）或 `custom`（自定义链接） |
| `type` | `page` 或 `custom` |
| `id` | 页面 ID（post-type 必须有） |
| `url` | 链接地址 |
| `label` | 显示文本 |

---

## 场景四：Pattern 块验证失败

### 原因一：引用未定义颜色

有效颜色 slug：`primary` `secondary` `accent` `base` `contrast` `surface` `neutral-50` ~ `neutral-900`

### 原因二：JSON 重复 key

```json
// 错误
{"style":{"typography":{...}},"style":{"spacing":{...}}}

// 正确
{"style":{"typography":{...},"spacing":{...}}}
```

### 原因三：class/style 不一致

```html
<!-- 正确写法 -->
<!-- wp:group {"backgroundColor":"accent","borderColor":"neutral-200","style":{"border":{"radius":"8px","width":"1px","style":"solid"}}} -->
<div class="wp-block-group has-border-color has-neutral-200-border-color has-accent-background-color has-background" style="border-width:1px;border-style:solid;border-radius:8px;">
```

---

## 场景五：Docker bind mount 失效

```bash
# 检查容器内目录
docker exec wp_wordpress ls -la /var/www/html/wp-content/themes/

# 重启恢复
docker-compose restart wordpress wpcli

# 重新激活
docker exec wp_cli wp theme activate yougu-cclee --allow-root
docker exec wp_cli wp plugin activate woocommerce contact-form-7 --allow-root
```

---

## 场景六：服务器部署不生效

```bash
# 1. 检查服务器日志
ssh root@47.84.87.131 "cd /var/www/wp && docker exec wp_wordpress cat /var/www/html/wp-content/debug.log 2>/dev/null || echo '无错误日志'"

# 2. 确认已拉取
ssh root@47.84.87.131 "cd /var/www/wp && git log --oneline -3"

# 3. 清除缓存
ssh root@47.84.87.131 "cd /var/www/wp && docker exec wp_cli wp cache flush --allow-root"
```
