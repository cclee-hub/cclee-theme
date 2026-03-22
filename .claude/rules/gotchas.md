# 踩坑记录

<!-- 使用 /note-gotcha 追加新记录 -->

## [2026-03-22] FSE 导航块不支持 location 属性（已知架构缺陷）

**现象：** Header/Footer 导航显示所有已发布页面，或 Site Editor 编辑后导航内容变化。

**根本原因：** FSE 导航块的架构设计缺陷：
- 导航块不支持经典菜单的 `location` 概念（这是**故意设计**，非 bug）
- Site Editor 操作会自动创建 `wp_navigation` 帖子，覆盖模板中的 `location` 属性
- 导航块使用 `ref`（帖子 ID）而非 `location`（菜单位置）绑定菜单

**官方确认：** [Gutenberg #37634](https://github.com/WordPress/gutenberg/issues/37634) / [Brian Coords 文章](https://www.briancoords.com/fse-navigation-block-woes/)

**正确方案：使用 ref 绑定 wp_navigation 帖子**

```bash
# 1. 查看现有 wp_navigation 帖子
wp post list --post_type=wp_navigation --post_status=any --fields=ID,post_title,post_status --allow-root

# 2. 创建新的导航帖子（如需要）
wp post create --post_type=wp_navigation --post_title="Footer Menu" --post_status=publish --allow-root

# 3. 更新导航帖子内容（通过临时文件避免转义问题）
docker cp /tmp/nav-content.html wp_cli:/tmp/nav-content.html
wp post update <ID> --post_content="$(cat /tmp/nav-content.html)" --allow-root

# 4. 模板中使用 ref 绑定
# <!-- wp:navigation {"ref":94,...} /-->

# 5. 清除缓存
wp cache flush --allow-root
```

**wp_navigation-link 标准格式：**
```html
<!-- wp:navigation-link {"className":"menu-item menu-item-type-post_type menu-item-object-page","description":"","id":"6","kind":"post-type","label":"About Us","opensInNewTab":false,"rel":null,"title":"","type":"page","url":"http://localhost:8080/?page_id=6"} /-->
```

**关键属性：**
| 属性 | 说明 |
|------|------|
| `kind` | `post-type`（页面）或 `custom`（自定义链接） |
| `type` | `page` 或 `custom` |
| `id` | 页面 ID（post-type 类型必须） |
| `url` | 链接地址 |
| `label` | 显示文本 |

**预防：**
- ❌ 不要使用 `location` 属性（会被 Site Editor 覆盖）
- ✅ 使用 `ref` 绑定到 `wp_navigation` 帖子
- ✅ 导航内容通过 WP-CLI 管理，避免 Site Editor 编辑导航块
- 官方正在改用 slug 引用（[PR #42809](https://github.com/WordPress/gutenberg/pull/42809)），但仍未完成

---

## [2026-03-22] CLI 内联参数中 HTML 注释被 shell 转义

**现象：** `wp post update --post_content="..."` 中 `<!--` 被转义为 `<\!--`，导致内容写入错误。

**原因：** Shell 会转义 `<!--` 中的 `<` 和 `!`，特别是通过 `docker exec` 传递时。

**解决：** 使用临时文件 + `$(cat file)` 传参：
```bash
# 1. 写入临时文件
echo '<!-- wp:navigation-link {...} /-->' > /tmp/content.html

# 2. 复制到容器（如需要）
docker cp /tmp/content.html wp_cli:/tmp/content.html

# 3. 通过 cat 读取传入
docker exec wp_cli wp post update <ID> --post_content="$(cat /tmp/content.html)" --allow-root
```

**预防：** 包含 `<!-- -->` HTML 注释或特殊字符的内容，一律用文件传参

## [2026-03-21] site-title 块默认带超链接

**现象：** 站点标题自动生成 `<a>` 标签。

**原因：** `wp:site-title` 默认 `isLink: true`。

**解决：**
```html
<!-- wp:site-title {"isLink":false} /-->
```

---

## [2026-03-21] Skip to content 链接可见

**现象：** Header 中 "Skip to content" 链接在页面可见。

**原因：** `custom.css` 缺少隐藏样式。该链接是 WCAG 无障碍要求，不可删除。

**解决：** 在 `assets/css/custom.css` 添加：
```css
.skip-to-content-link {
  position: absolute;
  left: -9999px;
  width: 1px;
  height: 1px;
  overflow: hidden;
}
.skip-to-content-link:focus {
  position: fixed;
  top: 10px;
  left: 10px;
  width: auto;
  height: auto;
  padding: 1rem;
  background: var(--wp--preset--color--primary);
  color: var(--wp--preset--color--base);
  z-index: 10000;
}
```

---

## [2026-03-21] Pattern 引用未定义颜色导致验证失败

**现象：** Pattern 显示 "Block contains unexpected or invalid content"。

**原因：** 块属性引用了 `theme.json` 中不存在的颜色 slug。

**排查：** 对照 `theme.json` 的 `settings.color.palette`，检查 pattern 中所有颜色引用。

**有效颜色 slug：** `primary` `secondary` `accent` `base` `contrast` `surface` `neutral-50` ~ `neutral-900`

**预防：** 新增 Pattern 前确认 slug 已在 theme.json 定义。

---

## [2026-03-21] Pattern 块注释 JSON 存在重复 key

**现象：** 编辑器显示块验证失败。

**原因：** 块注释 JSON 中同一层级出现重复 key（常见于复制粘贴），如两个 `style`。

**解决：** 合并为单一 key：
```json
// 错误
{"style":{"typography":{...}},"style":{"spacing":{...}}}

// 正确
{"style":{"typography":{...},"spacing":{...}}}
```

---

## [2026-03-21] Style Variation 覆盖父主题调色板导致验证失败

**现象：** Browse styles 切换预览时出现块验证失败。

**原因：** `styles/*.json` 的 `color.palette` **完全覆盖**（不合并）父主题调色板。Pattern 引用的颜色在切换后不存在。

**解决：** 每个 style variation 必须包含完整的 neutral 系列（`neutral-50` ~ `neutral-900`，色值与 theme.json 一致）。

**预防：** 新增 Pattern 颜色引用后，检查所有 style variations 是否包含该 slug。

---

## [2026-03-21] Pattern 块属性与 HTML 不一致导致验证失败

**现象：** JSON 格式正确、颜色 slug 存在，但仍显示块验证失败。

**原因一：class 缺失或顺序错误**

WordPress `save` 函数生成 class 的固定顺序为：
```
has-border-color has-{slug}-border-color has-{slug}-background-color has-background
```
HTML 中 class 顺序必须与此一致，否则验证失败。

**原因二：`style.color.background` 与 `backgroundColor` 混用**

背景色只能用 `backgroundColor` 属性，不可在 `style.color.background` 中声明。混用会导致 inline style 生成缺少右括号 `)` 的非法 CSS。

**原因三：border inline style 属性顺序**

`border-width` 必须在 `border-style` 之前：
```
border-width:1px;border-style:solid;border-radius:8px;
```

**正确写法：**
```html
<!-- wp:group {"backgroundColor":"accent","borderColor":"neutral-200","style":{"border":{"radius":"8px","width":"1px","style":"solid"}}} -->
<div class="wp-block-group has-border-color has-neutral-200-border-color has-accent-background-color has-background" style="border-width:1px;border-style:solid;border-radius:8px;">
```

**预防：** 编写 Pattern 时从编辑器复制块代码，不要手写 HTML class 和 style。
---

## [2026-03-21] 全局样式覆盖 theme.json 设置

**现象：** 修改 `theme.json` 颜色/字体后，前端仍显示旧值，不生效。

**原因：** Site Editor 保存的自定义样式存储在 `wp_global_styles` CPT 中，优先级**高于** `theme.json`，会完全覆盖主题默认设置。

**排查：**
```bash
# 检查是否存在全局样式
wp post list --post_type=wp_global_styles --fields=ID,post_title --allow-root

# 查看全局样式内容
wp post get <ID> --fields=post_content --allow-root
```

**解决：**
```bash
# 删除旧全局样式
wp post delete <ID> --force --allow-root

# 清除缓存
wp cache flush --allow-root
```

**预防：**
- 修改 `theme.json` 后，检查是否存在 `wp_global_styles` 帖子
- 开发阶段避免使用 Site Editor 自定义样式
- 部署前确认全局样式是否需要保留

---

# 错误排查流程

## 错误分级

| 级别 | 现象 | 处理方式 |
|------|------|---------|
| P0 | 白屏 / 500错误 | 立即停止，报告后等待确认再修复 |
| P1 | 样式完全失效 / 块渲染异常 | 分析后报告，确认再修复 |
| P2 | 局部样式偏差 / 功能异常 | 分析后直接修复，完成后报告 |
| P3 | 警告 / 非阻塞性问题 | 记录到记忆，批量处理 |

---

## 场景一：白屏 / 500 错误

**触发条件：** 页面完全空白或返回 500

**排查顺序：**

```bash
# 1. 查看容器错误日志
docker logs wp_wordpress --tail=50

# 2. 查看 WP debug 日志
docker exec -it wp_wordpress cat /var/www/html/wp-content/debug.log

# 3. 检查最近修改的文件语法
docker exec -it wp_wordpress php -l /var/www/html/wp-content/themes/cclee-theme/functions.php
docker exec -it wp_wordpress php -l /var/www/html/wp-content/themes/cclee-theme/inc/setup.php

# 4. 临时切换主题排除主题问题
docker exec wp_cli wp theme activate twentytwentyfour --allow-root
```

**常见原因：**
- `functions.php` 或 `inc/` 文件 PHP 语法错误
- `require` 路径错误导致文件未找到
- 插件与主题冲突

**禁止行为：** 不得在未定位原因前随意修改多个文件

---

## 场景二：theme.json 样式失效

**触发条件：** 颜色/字体/间距在前端不生效

**排查顺序：**

```bash
# 0. 先查 debug.log 排除 PHP 错误
docker exec wp_wordpress cat /var/www/html/wp-content/debug.log 2>/dev/null || echo "无错误日志"

# 1. 验证 theme.json 格式合法性
docker exec wp_cli wp eval 'echo json_encode(json_decode(file_get_contents(get_template_directory() . "/theme.json")));' --allow-root

# 2. 清除样式缓存
docker exec wp_cli wp cache flush --allow-root
docker exec wp_cli wp cron event run --due-now --allow-root
```

**检查清单：**
- [ ] `theme.json` 顶层是否有 `"version": 3`
- [ ] JSON 格式是否合法（无尾随逗号）
- [ ] CSS 中是否重复定义了 theme.json 已控制的属性（冲突覆盖）
- [ ] CSS 变量名格式是否正确：`var(--wp--preset--color--{slug})`
- [ ] slug 是否与 theme.json 中定义一致（大小写敏感）

---

## 场景三：块模板渲染异常

**触发条件：** 编辑器或前端块显示异常、块验证失败提示

**前置检查：**
```bash
# 先查 debug.log 排除 PHP 错误
docker exec wp_wordpress cat /var/www/html/wp-content/debug.log 2>/dev/null || echo "无错误日志"
```

**检查清单：**
- [ ] 块开闭注释是否成对：`<!-- wp:xxx -->` / `<!-- /wp:xxx -->`
- [ ] 自闭合格式是否正确：`<!-- wp:xxx /-->` （注意空格）
- [ ] 块属性是否合法 JSON（双引号，无尾随逗号）
- [ ] 嵌套层级是否正确，无交叉嵌套

**常见错误示例：**

```html
<!-- 错误：属性 JSON 格式不合法 -->
<!-- wp:group {layout:{type:"constrained"}} -->

<!-- 正确 -->
<!-- wp:group {"layout":{"type":"constrained"}} -->

<!-- 错误：自闭合格式 -->
<!-- wp:separator-->

<!-- 正确 -->
<!-- wp:separator /-->
```

---

## 场景四：Pattern 不显示

**触发条件：** 编辑器中找不到自定义 pattern

**前置检查：**
```bash
# 先查 debug.log 排除 PHP 错误（如 pattern 文件语法错误）
docker exec wp_wordpress cat /var/www/html/wp-content/debug.log 2>/dev/null || echo "无错误日志"
```

**检查清单：**
- [ ] 文件在 `patterns/` 目录下
- [ ] 文件扩展名为 `.php`
- [ ] 文件头部包含完整注释：`Title` `Slug` `Categories`
- [ ] Slug 格式：`cclee-theme/{pattern-name}`（主题 slug 前缀必须匹配）
- [ ] 执行缓存清除：`wp cache flush --allow-root`

---

## 场景五：wp-cli 执行报错

| 错误信息 | 原因 | 解决 |
|---------|------|------|
| `Error: This does not seem to be a WordPress install` | 路径错误 | 确认在 `/var/www/html` 执行 |
| `Error establishing a database connection` | db 容器未就绪 | `docker compose restart db` |
| `Permission denied` | 文件权限 | 命令加 `--allow-root` |
| `php_uname()` 警告 | 容器限制 | 忽略，不影响功能 |

---

## 场景六：Git 部署后服务器不生效

```bash
# 0. 先查服务器 debug.log 排除 PHP 错误
ssh root@47.84.87.131 "cd /var/www/wp && docker exec wp_wordpress cat /var/www/html/wp-content/debug.log 2>/dev/null || echo '无错误日志'"

# 1. 确认服务器已拉取
ssh root@47.84.87.131 "cd /var/www/wp && git log --oneline -3"

# 2. 确认文件权限
ssh root@47.84.87.131 "ls -la /var/www/wp/wordpress/wp-content/themes/cclee-theme/"

# 3. 清除服务器缓存
ssh root@47.84.87.131 "cd /var/www/wp && docker exec wp_cli wp cache flush --allow-root"
```

---

## [2026-03-22] 新增颜色 Token 后全局样式缺少定义

**现象：** 在 `theme.json` 中新增颜色（如 `surface`），但前端不生效，块显示验证失败或颜色不显示。

**原因：** `wp_global_styles` 中的 `color.palette` 会**完全覆盖** theme.json 的调色板。新增的颜色不在全局样式中，导致颜色 token 不存在。

**排查：**
```bash
# 检查全局样式中的颜色定义
docker exec wp_cli wp post get <ID> --fields=post_content --allow-root | grep -o '"slug":"[^"]*"'
```

**解决：**
```bash
# 方案一：删除全局样式（推荐开发阶段）
docker exec wp_cli wp post delete <ID> --force --allow-root
docker exec wp_cli wp cache flush --allow-root

# 方案二：更新全局样式，添加新颜色（需要保留自定义时）
# 通过 Site Editor 重新保存，或直接修改 post_content
```

**预防：**
- 新增 theme.json 颜色后，检查并删除全局样式
- 或在 Site Editor 中重新保存以同步新颜色
