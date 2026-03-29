# 踩坑速查

详细排查见 `docs/troubleshooting.md`，规范结论见 `.claude/rules/conventions.md`。

## WooCommerce Cart Block

- Cart Block 必须显式声明 `filled-cart-block` 和 `empty-cart-block` 子块，否则空车时无提示文案无按钮
- 正确结构：`wp:woocommerce/cart` > `wp:woocommerce/filled-cart-block` + `wp:woocommerce/empty-cart-block`

## FSE 模板分配

- FSE 自定义模板（如 my-account.html）不会自动分配给对应 WP 页面
- 必须手动执行 `wp post meta update <page_id> _wp_page_template <template_slug>`
- WooCommerce Cart/Checkout 模板会自动匹配，My Account 等依赖 shortcode 的页面不会

## Site Editor 残留

- Site Editor 保存的 `wp_global_styles` post 如果 JSON 损坏，会导致所有页面 `WP_Theme_JSON_Resolver` 解析错误
- 必须 `wp post delete <id> --force` 清理；开发期禁止 Site Editor 保存

## 博客列表页模板（/blog/）

- `/blog/` 使用 `home.html` 模板（WordPress `page_for_posts` 设置），**不是** `archive.html`
- `home.html` 引用 `patterns/post-list.php`，该 pattern 使用水平 columns 布局（图左文右），**没有** `cclee-overflow-hidden` 类
- `archive.html` 仅用于分类/标签/日期归档页，修改它不影响 `/blog/`
- 通用卡片 hover CSS `.wp-block-columns .wp-block-column > .wp-block-group:not(.cclee-timeline-dot):hover` 会匹配博客卡片内部的文字 group，导致悬浮时文字偏移而外框不动。修复：用 `.wp-block-post-template` 前缀提高优先级重置内层 group 的 hover

## CSS 选择器优先级

- 通用 hover 特效选择器范围过大时，会命中 pattern 内部嵌套的 group，造成非预期视觉效果
- 修复方式：用更高特异性的选择器（如 `.wp-block-post-template` 前缀）重置内层元素的 transition/transform
- 添加新 hover 特效前，必须检查 pattern 的实际 HTML 嵌套结构，确认选择器只命中目标元素

## Pattern 宽度约束

- Pattern 顶层禁止直接用 `alignwide`，挂在 `wp-site-blocks` 下不受 `wideSize` 1320px 约束，会撑满屏幕
- 正确结构：外层 `alignfull`（背景铺满）+ 内层 `alignwide`（内容 1320px 居中）
- 同理，卡片 group 用 `layout:constrained` 会把内部 columns 压到 `contentSize` 800px；需要 columns 撑满卡片时必须用 `layout:default`

## WooCommerce 示例数据图片

- 示例数据导入会产生 ID 错位：部分商品 `_thumbnail_id` 指向不存在的 ID 或其他商品（而非 `attachment`），导致显示占位图
- 排查：查 `wp_postmeta._thumbnail_id` → 验证目标 ID 的 `post_type` 是否为 `attachment` → 检查 `_wp_attached_file` 是否有值
- 修复：删除断裂商品或重建 attachment 记录

## 调试验证

- 禁止仅凭花括号数量判断 JSON 合法性，必须用 `json.loads()` 验证
- 写入 style 属性后，必须逐个清点 `var(` 与 `)` 数量是否相等
