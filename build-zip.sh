#!/usr/bin/env bash
# Build a clean ZIP for WP.org / WooCommerce Marketplace submission.
# Usage: ./build-zip.sh [output-dir]
set -euo pipefail

THEME_DIR="$(cd "$(dirname "$0")" && pwd)"
THEME_NAME="$(basename "$THEME_DIR")"
VERSION="$(grep 'Version:' "$THEME_DIR/style.css" | awk '{print $2}')"
OUTPUT_DIR="${1:-/tmp}"
ZIP_FILE="$OUTPUT_DIR/$THEME_NAME.zip"

# Remove old ZIP if present
rm -f "$ZIP_FILE"

# Create ZIP excluding dev files
(cd "$THEME_DIR" && zip -r "$ZIP_FILE" . \
  -x "composer.json" \
  -x "composer.lock" \
  -x "phpcs.xml.dist" \
  -x "vendor/*" \
  -x "node_modules/*" \
  -x ".git/*" \
  -x ".gitignore" \
  -x "build-zip.sh" \
  -x "*.backup" \
  -x "*patterns.backup/*" \
  -x "*templates.backup/*" \
  -x "theme - *.json"
)

echo "Built: $ZIP_FILE ($VERSION)"
unzip -l "$ZIP_FILE" | tail -1
