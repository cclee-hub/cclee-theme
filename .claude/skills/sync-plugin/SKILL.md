---
name: sync-plugin
description: 扫描 cclee-toolkit 代码，将代码事实同步到 cclee-plugins-dev.md
disable-model-invocation: true
---

## 执行目标

扫描 `wp/wordpress/wp-content/plugins/cclee-toolkit/` 提取代码事实，表格或代码块更新 `docs/cclee-plugins-dev.md`。

## 同步规则

| 内容类型 | 是否同步 | 说明 |
|---------|---------|------|
| 文件名 | ✅ | 自动检测新增/删除文件 |
| 模块名 | ✅ | 从 `modules/` 子目录提取 |
| Hooks | ✅ | 从 PHP 文件提取 `add_action`/`add_filter` |
| REST 端点 | ✅ | 从 `register_rest_route` 提取 |
| Options | ✅ | 从 `get_option`/`register_setting` 提取 |
| Meta 字段 | ✅ | 从 CPT meta box 定义提取 |
| **功能描述** | ❌ | **人工维护，不同步** |
| **使用说明** | ❌ | **人工维护，不同步** |

## 扫描范围

```
cclee-toolkit/
├── cclee-toolkit.php      # 主入口：版本号、常量定义
├── admin/settings.php     # 设置页：选项注册
└── modules/
    ├── ai/ai.php          # AI 模块：REST API + Hooks
    ├── seo/seo.php        # SEO 模块：Hooks
    └── case-study/case-study.php  # CPT 模块：Taxonomy + Meta
```

**注意**: "功能描述"和"使用说明"是人工撰写，sync-plugin 不会覆盖这些内容。
