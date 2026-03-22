#!/bin/bash
FILE_PATH="$1"
CONTENT="$2"

# 只检查 patterns/ 目录
if [[ "$FILE_PATH" != *"patterns/"* ]]; then
  exit 0
fi

# 有效颜色 slug 白名单
VALID_SLUGS="primary|secondary|accent|base|contrast|neutral-50|neutral-100|neutral-200|neutral-300|neutral-400|neutral-500|neutral-600|neutral-700|neutral-800|neutral-900"

# 提取所有颜色引用
USED=$(echo "$CONTENT" | grep -oE '"(backgroundColor|textColor|borderColor)":"[^"]*"' | grep -oE ':"[^"]*"' | tr -d ':"')

INVALID=""
while IFS= read -r slug; do
  if [[ -n "$slug" ]] && ! echo "$slug" | grep -qE "^($VALID_SLUGS)$"; then
    INVALID="$INVALID $slug"
  fi
done <<< "$USED"

if [[ -n "$INVALID" ]]; then
  echo "❌ Pattern 包含无效颜色 slug：$INVALID"
  echo "有效 slug：primary secondary accent base contrast neutral-50~neutral-900"
  exit 1
fi
