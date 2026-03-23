# 开发工具与调试配置

## WP-CLI

| 项目 | 版本 |
|------|------|
| WP-CLI | 2.12.0 |
| PHP | 8.3.30 |

## 开发工具（插件）

| 工具 | 状态 | 用途 |
|------|------|------|
| Query Monitor | ✅ | 调试、性能分析 |
| Plugin Check | ✅ | 插件提交前审核（CLI） |
| Theme Check | ✅ | 主题提交前审核（后台） |
| WordPress Importer | ✅ | 内容导入 |

## 辅助工具（本地）

| 工具 | 版本 | 用途 |
|------|------|------|
| Node.js | v24.13.1 | JS 工具链 |
| npm | 11.8.0 | 包管理 |

## 调试配置（常量）

| 常量 | 值 | 说明 |
|------|-----|------|
| WP_DEBUG | true | 启用调试模式 |
| WP_DEBUG_LOG | true | 写入 debug.log |
| WP_DEBUG_DISPLAY | false | 不在页面显示错误 |
| SCRIPT_DEBUG | true | 使用未压缩 JS/CSS |
| SAVEQUERIES | false | 按需开启，Query Monitor 用 |

## 日志系统

| 日志 | 位置 | 用途 |
|------|------|------|
| debug.log | wp-content/debug.log | PHP 错误追踪 |
| WooCommerce 日志 | 后台 → WooCommerce → 状态 → 日志 | 订单/支付调试 |

## 审核工具使用方式

| 工具 | 方式 | 说明 |
|------|------|------|
| Plugin Check | CLI | `wp plugin check <slug>` |
| Theme Check | 后台 | 外观 → Theme Check（**无 CLI 支持**） |

## 常用命令

```bash
# 实时查看日志
docker exec -it wp_wordpress tail -f /var/www/html/wp-content/debug.log

# 运行插件审核
docker exec wp_cli wp plugin check cclee-toolkit --allow-root

# 主题审核（需通过后台）
# 访问 http://localhost:8080/wp-admin/ → 外观 → Theme Check
```
