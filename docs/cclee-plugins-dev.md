# CCLEE Toolkit 插件开发文档

> **定位**：B端企业官网增强插件 | **许可证**：GPLv2 or later
> **仓库**：https://github.com/cclee-hub/cclee-toolkit

---

## 概述

CCLEE Toolkit 是 CCLEE 主题的官方配套插件，提供 3 个独立模块，每个模块可在设置页独立开关。

| 模块 | 功能 | 默认状态 |
|------|------|----------|
| AI Assistant | 编辑器 AI 辅助内容生成 | 关闭（需配置 API Key） |
| SEO Enhancer | OG/Twitter Card/JSON-LD Schema | 开启 |
| Case Study CPT | 案例展示自定义文章类型 | 开启 |

---

## 目录结构

```
cclee-toolkit/
├── cclee-toolkit.php        # 主入口，插件头部声明
├── readme.txt               # WordPress.org 格式
├── admin/
│   └── settings.php         # 统一设置页面（3 模块开关 + API Key）
├── modules/
│   ├── ai/
│   │   ├── ai.php           # AI 模块主文件（REST API + 脚本加载）
│   │   └── assets/
│   │       └── editor-ai.js # 编辑器侧边栏脚本
│   ├── seo/
│   │   └── seo.php          # SEO 模块（OG + Twitter + JSON-LD）
│   └── case-study/
│       └── case-study.php   # CPT + Taxonomy + Meta Box + Helper
└── assets/
    └── css/
        └── admin.css        # 设置页样式（可选）
```

---

## 主入口

### cclee-toolkit.php

```php
<?php
/**
 * Plugin Name: CCLEE Toolkit
 * Plugin URI: https://github.com/cclee-hub/cclee-toolkit
 * Description: B端企业官网增强工具包：AI内容辅助、SEO优化、案例展示CPT。
 * Version: 1.0.0
 * Requires at least: 6.4
 * Requires PHP: 8.0
 * Author: CCLEE
 * Author URI: https://github.com/cclee-hub
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: cclee-toolkit
 *
 * @package CCLEE_Toolkit
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'CCLEE_TOOLKIT_VERSION', '1.0.0' );
define( 'CCLEE_TOOLKIT_PATH', plugin_dir_path( __FILE__ ) );
define( 'CCLEE_TOOLKIT_URL', plugin_dir_url( __FILE__ ) );

// 加载管理后台
require_once CCLEE_TOOLKIT_PATH . 'admin/settings.php';

// 条件加载模块
add_action( 'plugins_loaded', function() {
	// AI Assistant（默认关闭）
	if ( get_option( 'cclee_toolkit_ai_enabled', false ) ) {
		require_once CCLEE_TOOLKIT_PATH . 'modules/ai/ai.php';
	}

	// SEO Enhancer（默认开启）
	if ( get_option( 'cclee_toolkit_seo_enabled', true ) ) {
		require_once CCLEE_TOOLKIT_PATH . 'modules/seo/seo.php';
	}

	// Case Study CPT（默认开启）
	if ( get_option( 'cclee_toolkit_case_study_enabled', true ) ) {
		require_once CCLEE_TOOLKIT_PATH . 'modules/case-study/case-study.php';
	}
} );
```

---

## 模块详情

### 通用规范

| 项目 | 规范 |
|------|------|
| 前缀 | `cclee_toolkit_` |
| Text Domain | `cclee-toolkit` |
| 选项名 | `cclee_toolkit_{module}_enabled` |
| 设置页 | 设置 → CCLEE Toolkit |

### AI Assistant 模块

**选项：**
- `cclee_toolkit_ai_enabled` (boolean) - 默认 `false`
- `cclee_toolkit_ai_api_key` (string) - OpenAI API Key

**功能：**
- `enqueue_block_editor_assets` - 加载 `editor-ai.js` 脚本
- REST API 端点：`POST /wp-json/cclee-toolkit/v1/ai/generate`
  - 权限：`edit_posts`
  - 参数：`prompt`, `type` (paragraph/headline/list/cta/faq)
  - 后端代理调用 OpenAI API，避免前端暴露 Key

**支持的生成类型：**
| type | 用途 |
|------|------|
| `paragraph` | SEO 友好段落 |
| `headline` | 吸引注意力的标题 |
| `list` | 关键点列表 |
| `cta` | 行动号召 |
| `faq` | 3 个 FAQ 问答 |

**文件：**
| 文件 | 说明 |
|------|------|
| `modules/ai/ai.php` | 后端逻辑 + REST API |
| `modules/ai/assets/editor-ai.js` | 编辑器侧边栏 UI |

### SEO Enhancer 模块

**选项：**
- `cclee_toolkit_seo_enabled` (boolean) - 默认 `true`

**功能：**
- `wp_head:1` - 输出 Open Graph + Twitter Card 标签
- `wp_head:2` - 输出 JSON-LD Schema（Article/WebPage）

**OG 标签输出：**
```
og:site_name, og:title, og:description, og:url, og:type, og:image
```

**Twitter Card：**
```
twitter:card, twitter:title, twitter:description, twitter:image
```

**JSON-LD Schema：**
```json
{
  "@context": "https://schema.org",
  "@type": "Article|WebPage",
  "headline", "url", "datePublished", "dateModified",
  "author": { "@type": "Person", "name" },
  "publisher": { "@type": "Organization", "name" },
  "image"
}
```

### Case Study CPT 模块

**选项：**
- `cclee_toolkit_case_study_enabled` (boolean) - 默认 `true`

**CPT 配置：**
| 项目 | 值 |
|------|-----|
| Post Type | `case-study` |
| Taxonomy | `case-industry`（行业分类，层级式） |
| Menu Icon | `dashicons-portfolio` |
| Menu Position | 20 |
| Supports | title, editor, thumbnail, excerpt, custom-fields |
| Show in REST | true（支持块编辑器） |

**Meta 字段：**

| 字段 | 类型 | 说明 |
|------|------|------|
| `client_name` | string | 客户名称 |
| `client_logo` | integer | 客户 Logo（附件 ID） |
| `project_duration` | string | 项目周期 |
| `client_size` | string | 公司规模 |
| `metric_1~4_value` | string | 成果指标值 |
| `metric_1~4_label` | string | 成果指标标签 |
| `testimonial_content` | string | 客户评价内容 |
| `testimonial_author` | string | 评价者姓名 |
| `testimonial_title` | string | 评价者职位 |

**Helper 函数（模板使用）：**
```php
// 获取单个字段
cclee_toolkit_get_case_study_meta( $post_id, 'client_name' );

// 获取成果指标数组（自动过滤空值）
$metrics = cclee_toolkit_get_case_study_metrics( $post_id );
// 返回: [ ['value' => '+150%', 'label' => 'Revenue Growth'], ... ]
```

**保留在主题的文件：**
- `templates/single-case-study.html` - 单页模板
- `patterns/case-study-*.php` - 展示 Pattern

---

## 设置页面

**菜单位置：** 设置 → CCLEE Toolkit

**注册选项：**
- `cclee_toolkit_ai_enabled`
- `cclee_toolkit_ai_api_key`
- `cclee_toolkit_seo_enabled`
- `cclee_toolkit_case_study_enabled`

**页面结构：**
```php
add_action( 'admin_menu', function() {
	add_options_page(
		'CCLEE Toolkit',
		'CCLEE Toolkit',
		'manage_options',
		'cclee-toolkit',
		'cclee_toolkit_settings_page'
	);
} );
```

---

## 开发任务状态

- [x] 创建插件目录结构
- [x] 实现主入口 `cclee-toolkit.php`
- [x] 实现设置页面 `admin/settings.php`
- [x] 实现 AI 模块（`ai.php` + `editor-ai.js`）
- [x] 实现 SEO 模块（`seo.php`）
- [x] 实现 Case Study 模块（`case-study.php` + Meta Box）
- [x] 创建 `readme.txt`（含 External Services 声明）
- [ ] 测试模块独立开关
- [ ] 测试与 CCLEE 主题兼容性
- [ ] 测试 REST API 端点权限
- [ ] WordPress.org 提交审核

---

## 外部服务声明

AI Assistant 模块可选连接 OpenAI API：
- API Endpoint: `https://api.openai.com/v1/chat/completions`
- 数据传输: 用户输入的提示词/主题
- 隐私政策: https://openai.com/privacy
- 默认关闭，需手动配置 API Key
