#!/bin/bash
FILE_PATH="$1"

# theme.json 修改 → 清缓存
if [[ "$FILE_PATH" == *"theme.json"* ]]; then
  docker exec wp_cli wp cache flush --allow-root 2>/dev/null
  echo "theme.json 已修改，缓存已清除"
fi

# style.css 修改 → 同步版本号到 cclee-theme-dev.md
if [[ "$FILE_PATH" == *"cclee-theme/style.css"* ]]; then
  VERSION=$(grep 'Version:' "$FILE_PATH" | awk '{print $2}')
  DEV_DOC="docs/cclee-theme-dev.md"

  if [[ -n "$VERSION" && -f "$DEV_DOC" ]]; then
    sed -i "s/\*\*版本：\*\* .*/\*\*版本：\*\* $VERSION/" "$DEV_DOC"
    echo "版本号已同步：$VERSION"
  fi
fi
