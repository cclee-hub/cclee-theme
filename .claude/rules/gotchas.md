# 踩坑速查

<!-- 使用 /note gotcha <内容> 追加 -->

## FSE 导航

- `location` 不是 `wp:navigation` 块的有效属性（是传统菜单系统的属性）
- 主题发布：模板不指定 `ref`，让用户在 Site Editor 中选择
- `ref` 绑定 post ID 仅适用于单站点定制（ID 因站点而异）
- `slug` 不推荐（依赖特定导航存在）

## FSE 模板

- 修改主题文件不生效时，必须先检查数据库是否有同 slug 的模板：`wp post list --post_type=wp_template_part --fields=ID,post_name`，删除后让文件生效
- `page-{slug}.html` 的 query 块禁止 `inherit:true`，必须设置 `inherit:false` 并显式指定 `postType:"post"`，否则会查询当前页面而非文章列表

## FSE 首页

- 禁止 `show_on_front = page`，必须保持 `posts` 模式
- 首页内容由 `front-page.html` + patterns 托管

## FSE Group 块

- 禁止依赖默认 layout，精确尺寸必须设置 `"layout":{"type":"default"}`
- 必须用 `!important` 覆盖布局类样式
- 必须显式清除默认 padding

## theme.json

- 修改后必须删除 `wp_global_styles` 帖子并清除缓存
- Style Variation 的 `color.palette` 完全覆盖父主题，必须包含完整颜色集

## Pattern 编写

- 禁止手写 HTML class 和 style，必须从编辑器复制块代码
- 禁止引用未定义颜色 slug，有效值：`primary` `secondary` `accent` `base` `contrast` `surface` `neutral-50` ~ `neutral-900`
- 禁止 JSON 中出现重复 key

## 块注释

- 禁止 `<!-- wp:xxx-->`，必须 `<!-- wp:xxx /-->` （注意空格）
- 禁止属性 JSON 单引号或尾随逗号

## site-title 块

- 禁止默认带链接，必须设置 `{"isLink":false}`

## Skip to content

- 禁止删除该链接（WCAG 无障碍要求），必须用 CSS 隐藏

## WP-CLI

- 包含 HTML 注释或长 JSON 的内容禁止内联传参，必须用临时文件，否则 shell 转义导致内容损坏
- 命令必须加 `--allow-root`

## WooCommerce

- 商店页面导航禁止用 `?page_id=X`，必须用 `/shop/`

## Docker

- 主题/插件"消失"时禁止误判为数据库问题，必须先检查 bind mount
- 重启容器后必须重新激活主题和插件

---

# 错误排查流程

## 分级

| 级别 | 现象 | 处理 |
|------|------|------|
| P0 | 白屏/500 | 停止，报告后等确认 |
| P1 | 样式失效/块异常 | 分析后报告，确认再修 |
| P2 | 局部偏差 | 直接修复，完成后报告 |
| P3 | 警告 | 记录，批量处理 |

## 排查入口

```bash
# 1. 查日志
docker exec wp_wordpress cat /var/www/html/wp-content/debug.log | tail -50

# 2. 检查 PHP 语法
docker exec wp_wordpress php -l /var/www/html/wp-content/themes/cclee-theme/functions.php

# 3. 清缓存
docker exec wp_cli wp cache flush --allow-root
```

详细排查步骤见 `docs/troubleshooting.md`
