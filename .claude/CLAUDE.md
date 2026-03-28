# WP Dev Workspace

环境、路径、项目概览见 `.claude/rules/project.md`。

## 主题定位

## 主题定位


cclee-theme 是面向 **B 端多行业**的通用 Block Theme（FSE），覆盖制造、SaaS、专业服务等B端场景，目标上架 WordPress.org + WooCommerce Marketplace，开箱即用。


## 开发流程

### 遇到错误时
1. 先查日志：`docker exec wp_wordpress cat /var/www/html/wp-content/debug.log | tail -50`
2. 按 `docs/troubleshooting.md` 错误处理流程排查
3. 修复后执行 `/note gotcha <内容>` 记录
4. WSL 权限：主题文件属 www-data，编辑前执行 `sudo chown -R $USER:$USER <路径>`

## 全局禁止

- 禁止臆测延伸，禁止提前设计未确认功能
- 操作服务器前必须确认路径
- 禁止修改未明确提及的文件
- 更新文档时：禁止 emoji，禁止解释性噪音
- 开发期禁止 Site Editor 保存（导致数据库残留，文件修改不生效）
