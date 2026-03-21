# 踩坑记录

<!-- 使用 /note-gotcha 追加新记录 -->

## [2026-03-21] 导航块显示所有页面而非指定菜单

**现象：** Header/Footer 导航显示所有已发布页面（About Us、Blog、Cart、Checkout...），而非 Main Menu 中配置的菜单项。

**原因：** WordPress 存在 `wp_navigation` 帖子（Site Editor 创建），内容为 `<!-- wp:page-list /-->`，会覆盖导航块的 `location` 属性绑定。

**排查命令：**
```bash
# 检查导航帖子
wp post list --post_type=wp_navigation --allow-root

# 查看帖子内容
wp post get <ID> --fields=post_content --allow-root
```

**解决：** 删除干扰的 `wp_navigation` 帖子
```bash
wp post delete <ID> --force --allow-root
wp cache flush --allow-root
```

**预防：**
- 导航块必须包含 `location` 属性：`<!-- wp:navigation {"location":"primary"} /-->`
- 避免使用 Site Editor 创建导航
- 通过 WP-CLI 或 外观 → 菜单 管理导航

## [2026-03-21] site-title 块默认带超链接

**现象：** Header 中 `wp:site-title` 块渲染后，站点标题包含指向首页的超链接。

**原因：** `wp:site-title` 块默认 `isLink: true`，自动生成 `<a>` 标签。

**解决：** 添加 `"isLink":false` 属性
```html
<!-- wp:site-title {"isLink":false} /-->
```

**注意：** 修改后需清除缓存：`wp cache flush --allow-root`

## [2026-03-21] Skip to content 链接显示问题

**现象：** Header 模板中 "Skip to content" 链接在页面上可见。

**原因：** 缺少 CSS 隐藏样式。这是 WCAG 无障碍标准要求的跳转链接，应保留但隐藏。

**解决：** 在 custom.css 添加样式，使其只在键盘焦点时显示：
```css
.skip-to-content-link {
  position: absolute;
  left: -9999px;
  top: auto;
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

**最佳实践：**
- 不要删除该链接，保留无障碍功能
- 鼠标用户永远看不到，键盘用户 Tab 时显示

## [2026-03-21] Pattern 引用未定义颜色导致块验证失败

**现象：** 编辑器中 Pattern 显示 "Block contains unexpected or invalid content" 错误，无法正常渲染。

**原因：** Pattern 文件中的块属性引用了 theme.json 中未定义的颜色 slug，如：
- `"textColor":"neutral-text"` → theme.json 无此颜色
- `"backgroundColor":"neutral-bg"` → theme.json 无此颜色
- `"borderColor":"neutral-border"` → theme.json 无此颜色

**排查方法：**
1. 检查 theme.json 中 `settings.color.palette` 定义的所有颜色 slug
2. 在 pattern 文件中搜索是否有引用不存在的 slug
3. 验证块属性中的颜色引用格式：`has-{slug}-color`、`has-{slug}-background-color`

**解决：** 批量替换为有效颜色 slug
```bash
cd patterns/
sed -i 's/"neutral-text"/"neutral-500"/g; s/has-neutral-text-color/has-neutral-500-color/g' *.php
sed -i 's/"neutral-bg"/"neutral-100"/g; s/has-neutral-bg-background-color/has-neutral-100-background-color/g' *.php
sed -i 's/"neutral-border"/"neutral-200"/g; s/has-neutral-border-border-color/has-neutral-200-border-color/g' *.php
```

**预防：**
- 新增 Pattern 前，先确认 theme.json 中已定义所需颜色
- 颜色 slug 命名遵循语义化：`neutral-100`（背景）、`neutral-500`（文字）、`neutral-200`（边框）
- 修改 theme.json 颜色后，全局搜索旧 slug 确保无遗留引用


## [2026-03-21] Pattern 块属性中重复的 JSON key 导致验证失败

**现象：** 编辑器显示 "Block contains unexpected or invalid content" 错误。

**原因：** Pattern 文件的块注释中存在重复的 JSON key，如两个 `style` 属性：
```json
// 错误 ❌
{"style":{"typography":{...}},"style":{"spacing":{...}}}
```
JSON 规范不允许重复 key，第二个会覆盖第一个或导致解析错误。

**排查方法：**
1. 在 pattern 文件中搜索 `,"style":{` 出现两次以上的情况
2. 检查块注释中的 JSON 结构是否合法

**解决：** 合并重复的 key
```json
// 正确 ✅
{"style":{"typography":{...},"spacing":{...}}}
```

**预防：**
- 编写块属性时注意不要复制粘贴导致重复 key
- 使用 JSON 格式化工具验证块注释合法性


## [2026-03-21] Style Variation 覆盖父主题调色板导致 Pattern 验证失败

**现象：** Browse styles 切换样式预览时，显示 "Block contains unexpected or invalid content" 错误。

**原因：** Style Variation 文件（`styles/*.json`）中定义的 `color.palette` 会**完全覆盖**父主题 theme.json 的调色板，而非合并。Pattern 中引用的颜色（如 `neutral-500`）在切换样式后不存在。

**排查方法：**
1. 检查 theme.json 中 Pattern 引用的颜色是否在 style variation 中也有定义
2. 对比 `theme.json` 和 `styles/*.json` 的 `settings.color.palette`

**解决：** 在每个 style variation 中保留完整的 neutral 系列（色值与 theme.json 一致）
```json
// styles/ocean.json
"palette": [
  { "slug": "primary", "color": "#1a365d", "name": "Primary" },
  // ... 其他品牌色 ...
  { "slug": "neutral-50", "color": "#fafafa", "name": "Neutral 50" },
  { "slug": "neutral-100", "color": "#f5f5f5", "name": "Neutral 100" },
  { "slug": "neutral-200", "color": "#e5e5e5", "name": "Neutral 200" },
  // ... neutral-300 ~ neutral-900 ...
]
```

**预防：**
- 创建 Style Variation 时，必须包含 Pattern 使用的所有颜色
- 品牌色（primary/secondary/accent）使用变体值，中性色（neutral 系列）保持一致
- 新增 Pattern 颜色引用后，检查所有 style variations 是否已包含该颜色
