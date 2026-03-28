---
name: wp-audit-fix
description: 基于 conventions.md 对 FSE 主题的 patterns/templates/parts 进行全量规范审计并修复所有违规。当用户说"检查规范"、"审计主题"、"修复违规"、"conventions检查"时触发。
---

## 执行规则

YOU MUST 按照以下步骤顺序执行，不得跳过任何步骤。

---

## 入口判断

执行前确认用户意图：

- 用户说"检查规范"/"审计主题"/"conventions检查" → 执行阶段一~三（检查模式）
- 用户说"修复违规"/"修复conventions" → 执行阶段一~五（完整模式）
- 未明确意图 → 先执行阶段一~三，输出结果后询问是否继续修复

---

## 阶段一：准备

1. 读取 `.claude/rules/` 下所有 `.md` 文件，提取全部规则，在内存中建立规则列表
2. 用 Bash 命令获取三个目录下**所有文件的完整路径列表**：
   ```bash
   find patterns templates parts -type f \( -name "*.html" -o -name "*.php" \) | sort
   ```
3. 将文件列表打印出来，确认无遗漏

---

## 阶段二：脚本扫描

执行机械检查脚本，输出确定性违规清单及涉及文件路径：

```bash
python3 .claude/skills/wp-audit-fix/audit.py <theme_dir>
```

脚本覆盖以下检查项：
- var() 括号数量不匹配
- JSON 使用单引号
- `<span>` 出现在 `wp:paragraph` 内
- 自闭合块 `/-->` 前缺空格
- patterns 注释头缺失（Title/Slug/Categories）
- HTML 有 style 属性但 JSON 无 style 声明（排除 width 自动映射）
- JSON 有 style 声明但 HTML 缺少对应 inline style（border/spacing/typography）

记录输出：
- 确定性违规清单（含文件路径、行号、违规描述）
- 涉及文件路径列表（供阶段三使用）

---

## 阶段三：语义核查

YOU MUST 对**阶段二输出的涉及文件路径列表**中每一个文件执行以下操作，不得跳过、合并或抽样：

对每个文件：
1. 读取文件完整内容
2. 逐条对照规则列表检查，**跳过以下阶段二已覆盖项**：
   - var() 括号匹配
   - JSON 单引号
   - span in paragraph
   - 自闭合块空格
   - 注释头完整性
   - HTML style 与 JSON style 同步
3. 重点核查以下语义规则：
   - JSON↔HTML 双向同步完整性（JSON 有属性 → HTML 必须有对应 class/style 输出）
   - 颜色 class 完整序列（has-text-color、has-background、has-alpha-channel-opacity 等）
   - JSON 属性嵌套层级（borderColor/backgroundColor/textColor/fontSize/className/layout 必须在顶层）
   - style 属性顺序（border-style → border-width → border-radius → padding-top/right/bottom/left）
   - padding 简写/展开与 JSON 一致性
   - core/column 有 width 时 HTML 必须有 flex-basis
   - gradient class 格式与序列完整性
4. 记录所有疑似违规，格式：

```
[文件路径]
- 疑似违规1：<规则条目> → <具体问题描述>
- 疑似违规2：...
✓ 无违规（如果通过）
```

全部文件检查完毕后，输出汇总：
- 扫描文件数
- 有疑似违规文件数
- 疑似违规条目总数

---

## 阶段四：修复

### 4a：修复确定性违规

YOU MUST 对阶段二报告的每一个违规文件执行修复：

1. 重新读取文件当前内容（不得依赖内存缓存）
2. 针对每条确定性违规逐一修复
3. 写入文件
4. 重新读取验证违规已消除
5. 输出：`[文件路径] 确定性违规已修复 N 项`

### 4b：修复语义违规

YOU MUST 对阶段三报告的每一个疑似违规文件执行修复：

1. 重新读取文件当前内容（不得依赖内存缓存）
2. 针对每条疑似违规逐一判断并修复
3. 写入文件
4. 重新读取验证违规已消除
5. 输出：`[文件路径] 语义违规已修复 N 项`

IMPORTANT：修复只处理规范违规，不得修改业务逻辑、内容文本、布局结构。

---

## 阶段五：验证

1. 重新执行阶段二脚本扫描，确认机械检查全部通过
2. 对所有已修复文件重新执行阶段三语义检查，确认无残留违规

输出最终报告：
- 修复前违规总数（确定性 + 语义）
- 修复后残留违规数
- 残留违规列表（如有，附原因说明）
