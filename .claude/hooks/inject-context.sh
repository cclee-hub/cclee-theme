#!/bin/bash
THEME_VERSION=$(grep 'Version:' wp/wordpress/wp-content/themes/cclee-theme/style.css | awk '{print $2}')

echo "{\"hookSpecificOutput\":{\"hookEventName\":\"SessionStart\",\"additionalContext\":\"主题版本：$THEME_VERSION\n开发文档：docs/cclee-theme-dev.md\n错误处理：.claude/rules/gotchas.md\"}}"
