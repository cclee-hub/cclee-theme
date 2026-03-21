---
paths:
  - wp/wordpress/wp-content/themes/cclee-theme/**
---

# wp-theme 错误规范

## 错误登记规则

遇到任何错误，必须先执行：
1. 登记到 Claude 记忆：`错误类型 + 文件 + 简述`
2. 再按本文档流程排查
3. 修复后更新记忆状态为已解决

---

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

**排查顺序：**

```bash
# 1. 检查模板文件块注释格式
# 手动检查 templates/*.html 和 parts/*.html

# 2. 验证块属性 JSON 合法性
# 提取 <!-- wp:xxx {...} --> 中的 JSON 单独验证
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

**检查清单：**
- [ ] 文件在 `patterns/` 目录下
- [ ] 文件扩展名为 `.php`
- [ ] 文件头部包含完整注释：`Title` `Slug` `Categories`
- [ ] Slug 格式：`cclee-theme/{pattern-name}`（主题 slug 前缀必须匹配）
- [ ] 执行缓存清除：`wp cache flush --allow-root`

---

## 场景五：wp-cli 执行报错

**常见错误处理：**

| 错误信息 | 原因 | 解决 |
|---------|------|------|
| `Error: This does not seem to be a WordPress install` | 路径错误 | 确认在 `/var/www/html` 执行 |
| `Error establishing a database connection` | db 容器未就绪 | `docker compose restart db` |
| `Permission denied` | 文件权限 | 命令加 `--allow-root` |
| `php_uname()` 警告 | 容器限制 | 忽略，不影响功能 |

---

## 场景六：Git 部署后服务器不生效

**排查顺序：**

```bash
# 1. 确认服务器已拉取
ssh root@47.84.87.131 "cd /var/www/wp && git log --oneline -3"

# 2. 确认文件权限
ssh root@47.84.87.131 "ls -la /var/www/wp/wordpress/wp-content/themes/cclee-theme/"

# 3. 清除服务器缓存
ssh root@47.84.87.131 "cd /var/www/wp && docker exec wp_cli wp cache flush --allow-root"
```

---

## 记忆登记模板

遇到错误时，按以下格式登记到 Claude 记忆：

```
[ERROR] {日期} | {级别} | {文件路径} | {错误简述} | 状态：排查中/已解决
```

示例：
```
[ERROR] 2026-03-21 | P1 | theme.json | 颜色变量不生效，slug大小写不一致 | 状态：已解决
[ERROR] 2026-03-21 | P0 | inc/setup.php | PHP语法错误导致白屏 | 状态：排查中
```
