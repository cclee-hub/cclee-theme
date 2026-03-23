---
name: sync-theme
description: 扫描 cclee-theme 代码，将代码事实同步到 cclee-theme-dev.md
disable-model-invocation: true
---

## 执行目标

扫描 `wp/wordpress/wp-content/themes/cclee-theme/` 提取代码事实，表格或代码块更新 `docs/cclee-theme-dev.md`。
## 同步规则
| 内容类型 | 是否同步 | 说明 |
|---------|---------|------|
| 文件名 | ✅ | 自动检测新增/删除文件 |
| Slug | ✅ | 从 pattern 头部提取 |
| 分类 | ✅ | 从 pattern 头部提取 |
| **用途描述** | ❌ | **人工维护，不同步** |

| Hooks 列表 | ✅ | 从 functions.php 提取 |
| 模板结构 | ✅ | 从 templates/ 提取 |

**注意**: "用途"列是人工判断,需要根据实际代码实现撰写。sync-theme 不会覆盖此列。
