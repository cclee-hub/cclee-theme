# 详细排查手册

> 规范结论见 `.claude/rules/conventions.md`，本文档提供详细排查步骤和代码示例。

---

## 错误处理流程

| 级别 | 现象 | 处理 |
|------|------|------|
| P0 | 白屏/500 | 停止，报告后等确认 |
| P1 | 样式失效/块异常 | 分析后报告，确认再修 |
| P2 | 局部偏差 | 直接修复，完成后报告 |
| P3 | 警告 | 记录，批量处理 |

```bash
# 查日志
docker exec wp_wordpress cat /var/www/html/wp-content/debug.log | tail -50
# 清缓存
docker exec wp_cli wp cache flush --allow-root
```

---

## 场景一：白屏 / 500 错误

```bash
# 1. 查看容器错误日志
docker logs wp_wordpress --tail=50

# 2. 查看 WP debug 日志
docker exec wp_wordpress cat /var/www/html/wp-content/debug.log

# 3. 检查 PHP 语法
docker exec wp_wordpress php -l /var/www/html/wp-content/themes/cclee/functions.php

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

## 场景二补充：修改主题文件不生效

数据库版本优先于文件，需清理对应 CPT：

| 修改内容 | 清理方式 |
|---------|----------|
| `templates/*.html` | 清 `wp_template` |
| `parts/*.html` | 清 `wp_template_part` |
| `theme.json` | 清 `wp_global_styles` + 缓存 |
| `patterns/*.php` | 直接生效 |

```bash
docker exec wp_cli bash -c 'wp post delete $(wp post list --post_type=wp_template --format=ids --allow-root) --force --allow-root'
docker exec wp_cli bash -c 'wp post delete $(wp post list --post_type=wp_template_part --format=ids --allow-root) --force --allow-root'
docker exec wp_cli bash -c 'wp post delete $(wp post list --post_type=wp_global_styles --format=ids --allow-root) --force --allow-root'
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

排查流程：
1. 打开 Site Editor DevTools Console，找到 `Block validation failed` 日志
2. 对比 Expected（Gutenberg 生成）和 Actual（Pattern 中写的）
3. 按下方分类匹配问题，修复 HTML

核心原则：HTML 只写结构，不写样式（详见 conventions.md Pattern 开发）。

**保留在 HTML 中的**：`wp-block-xxx` 结构 class、`alignwide`/`alignfull` 布局 class、`is-style-xxx` 变体 class、`has-text-align-xxx` 对齐 class、自定义 className。

**由 Gutenberg 自动生成**：颜色类、边框类、字体类、尺寸类、按钮类、间距/边框 style、layout class。

### HTML 裸标签（JSON 有属性但 HTML 缺失）

**现象**：JSON 注释声明了属性，但 HTML 是裸 `<div class="wp-block-group">` 缺少所有 class 和 style。

**修复**：HTML 必须与 JSON 属性完全对应：
- `borderColor` → `has-border-color has-{color}-border-color`
- `backgroundColor` → `has-{color}-background-color has-background`
- `style.spacing.padding` → `style="padding-top:...;padding-right:...;padding-bottom:...;padding-left:..."`
- `style.border.radius` + `borderColor` → `style="border-style:solid;border-width:Xpx;border-radius:..."`
- `textColor` → `has-{color}-color has-text-color`
- `fontSize` → `has-{size}-font-size`

### JSON 属性嵌套层级错误

`borderColor`/`layout`/`className`/`backgroundColor`/`textColor`/`fontSize` 必须在 JSON 顶层，不能嵌套在 `style` 内。`style` 内只有 `spacing`、`border`、`typography`、`color`、`elements`。

### 常见原因速查

| 问题 | 正确做法 |
|------|----------|
| 手动添加 layout class | 删除，由 Gutenberg 根据 JSON 属性自动生成 |
| img 标签写尺寸 style | 删除 style，通过 JSON `"width":64,"height":64` 控制 |
| 手动添加 className 到 HTML | 通过 JSON `"className":"xxx"` 添加 |
| style 顺序不一致 | `border-style → border-width → border-radius → padding-top/right/bottom/left` |
| separator 缺 opacity class | 有 backgroundColor 时加 `has-alpha-channel-opacity`（textColor 后、backgroundColor 前） |
| 手动添加 layout inline style | WP 6.1+ layout 生成 CSS 类；自定义样式放 custom.css |
| padding 写法与 JSON 不一致 | JSON 简写 → HTML 简写；JSON 展开 → HTML 展开 |
| style.spacing.maxWidth | Group 块不支持，改用 `className` + custom.css |
| position:sticky/z-index | Gutenberg 不生成，改用 `className` + custom.css |
| gradient class 格式错误 | 用 `"gradient":"accent"` 属性，生成 `has-accent-gradient-background` |
| core/image margin 位置 | margin style 放 figure 上，aligncenter 也是 figure 的 class |
| core/column 缺 flex-basis | JSON 有 `"width":"50%"` 时 HTML 必须有 `style="flex-basis:50%"` |
| core/cover style 顺序 | border-radius 在前：`border-radius:...;min-height:...` |
| core/quote border 简写 | 展开为 `border-left-color:...;border-left-style:solid;border-left-width:4px` |
| core/separator 有色时缺 class | 完整序列：`has-text-color has-{color}-color has-alpha-channel-opacity has-{color}-background-color has-background` |
| core/group 有 borderColor 缺边框类 | 加 `has-border-color has-{color}-border-color` |
| core/group 有 padding 缺 style | 加 `style="padding-top:...;padding-right:...;padding-bottom:...;padding-left:..."` |
| JSON 有属性但 HTML 完全缺失 | HTML 必须包含 JSON 对应的所有 class 和 style |
| JSON 无 style 但 HTML 有 | 删除 HTML style 或在 JSON 中添加 style 属性 |
| sizeSlug:full 时设 width/height | 移除，Gutenberg 不输出 |
| style 相同但验证失败 | 检查空白字符/换行符差异 |

### 可忽略的验证错误

| 错误 | 说明 |
|------|------|
| `woocommerce/cart` 或 `woocommerce/checkout` | 动态块，PHP 实时渲染，前端正常 |
| `woocommerce-blocktheme-css` | 插件 CSS 加载问题，等官方修复 |
| `core/image` 或 `core/video` 空内容 | 数据库残留，清 CPT 或忽略 |
| 顶层 `fontSize` 映射为 inline `font-size` | Gutenberg 正常行为，非手写 |
| cover 块内 `<span>` | 标准输出，非手动编写 |
| `elements.link.color` 不产生 inline style | Gutenberg 正常行为 |

### WooCommerce SSR 块 save 输出清单

文件中 HTML 必须与 Gutenberg save 输出完全匹配：

| 块 | save 输出 |
|----|----------|
| `product-price` | `<div class="is-loading"></div>` |
| `price-filter` | `<div class="wp-block-woocommerce-price-filter is-loading"><span aria-hidden="true" class="wc-block-product-categories__placeholder"></span></div>` |
| `woocommerce/cart` | `<div class="wp-block-woocommerce-cart alignwide is-loading"></div>` |
| `woocommerce/checkout` | `<div class="wp-block-woocommerce-checkout alignwide wc-block-checkout is-loading"></div>` |
| `cart-order-summary-*-block` | `<div class="wp-block-woocommerce-{block-name}"></div>` |
| `proceed-to-checkout-block` | `<div class="wp-block-woocommerce-proceed-to-checkout-block"></div>` |
| `checkout-order-summary-*-block` | `<div class="wp-block-woocommerce-checkout-order-summary-{block-name}"></div>` |

规则：
- `html: false` 的块（save 返回 null，如 `core/query-pagination`）可自闭合
- JS save 返回 placeholder HTML 的块禁止自闭合，必须包含匹配内容
- `core/query-pagination` 禁止写 wrapper div，InnerBlocks 直接放在 open/close 注释之间

### 案例：Site Editor "Attempt recovery"

Pattern HTML 中手动添加了 Gutenberg 自动生成的 class/style，导致验证不匹配。打开 DevTools Console 找到日志，对比 Expected/Actual，移除多余内容。

---

## 场景五：Docker bind mount 失效

```bash
# 检查容器内目录
docker exec wp_wordpress ls -la /var/www/html/wp-content/themes/

# 重启恢复
docker compose restart wordpress wpcli

# 重新激活
docker exec wp_cli wp theme activate cclee --allow-root
docker exec wp_cli wp plugin activate woocommerce contact-form-7 --allow-root
```

### Docker 主题消失

```bash
docker exec wp_cli wp theme status cclee --allow-root
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

---

## 场景七：块注释未关闭导致嵌套错乱

容器块缺少 `<!-- /wp:group -->` 时，Gutenberg 将后续所有块视为其子块。父块 save 输出为空，触发 Block validation failed。

排查：浏览器控制台执行 `wp.data.select('core/block-editor').getBlocks()` 检查块树层级。

---

## 场景八：JSON 块属性引号缺失

JSON 字符串值缺少闭合引号 `"` 时，花括号仍平衡，`parse_blocks` 静默将 attrs 置 null。save 函数不输出 inline style，触发 Block validation failed。

排查：`python3 -c "import json; json.loads(open('file').read().split('wp:group')[1].split(' -->')[0])"`

---

## 场景九：WooCommerce 块重命名（-block 后缀）

WooCommerce 新版将多个内部块重命名，统一加了 `-block` 后缀。旧名称在编辑器中显示为 `core/missing`（Block Recovery），前端渲染正常。

影响块：`cart-order-summary-subtotal`、`cart-order-summary-shipping`、`cart-order-summary-taxes`、`cart-order-summary-total`（→ `totals`）、`proceed-to-checkout`。

排查：浏览器控制台执行 `wp.blocks.getBlockTypes().map(b=>b.name).filter(n=>n.includes('cart-order-summary'))` 确认已注册名称。
