# 现代 FSE 主题架构

## 目录结构

```
my-theme/
├── style.css                   # 主题声明（必须）
├── theme.json                  # 设计系统核心
├── functions.php               # 功能注册
├── index.php                   # 兼容占位（FSE必须存在）
│
├── templates/                  # 页面模板（可视化用户可覆盖）
│   ├── index.html              # 默认模板
│   ├── single.html             # 文章页
│   ├── page.html               # 页面
│   ├── archive.html            # 归档
│   ├── search.html             # 搜索结果
│   └── 404.html                # 404页
│
├── parts/                      # 模板片段
│   ├── header.html             # 页头
│   ├── footer.html             # 页脚
│   └── sidebar.html            # 侧栏（可选）
│
├── patterns/                   # 预制区块模板（给可视化用户）
│   ├── hero-simple.php         # 简单Hero区块
│   ├── hero-centered.php       # 居中Hero
│   ├── features-grid.php       # 特性网格
│   ├── cta-banner.php          # CTA横幅
│   └── footer-columns.php      # 多列页脚
│
├── assets/
│   ├── css/
│   │   └── custom.css          # 补充样式（theme.json覆盖不了的）
│   ├── js/
│   │   └── theme.js            # 最小化JS
│   └── images/
│
└── inc/                        # PHP功能模块
    ├── block-styles.php        # 注册块样式变体
    ├── block-patterns.php      # 注册patterns分类
    └── setup.php               # 主题支持声明
```

---

## theme.json 骨架

```json
{
  "$schema": "https://schemas.wp.org/trunk/theme.json",
  "version": 3,
  "settings": {
    "appearanceTools": true,
    "useRootPaddingAwareAlignments": true,

    "color": {
      "palette": [
        { "slug": "primary",    "color": "#1a1a2e", "name": "Primary" },
        { "slug": "secondary",  "color": "#16213e", "name": "Secondary" },
        { "slug": "accent",     "color": "#0f3460", "name": "Accent" },
        { "slug": "highlight",  "color": "#e94560", "name": "Highlight" },
        { "slug": "base",       "color": "#ffffff", "name": "Base" },
        { "slug": "base-2",     "color": "#f8f8f8", "name": "Base 2" },
        { "slug": "contrast",   "color": "#1a1a1a", "name": "Contrast" }
      ],
      "custom": false,
      "customDuotone": false,
      "customGradient": false,
      "defaultDuotone": false,
      "defaultGradients": false,
      "defaultPalette": false
    },

    "typography": {
      "fontFamilies": [
        {
          "fontFamily": "-apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif",
          "slug": "system",
          "name": "System Font"
        },
        {
          "fontFamily": "'Georgia', 'Times New Roman', serif",
          "slug": "serif",
          "name": "Serif"
        }
      ],
      "fontSizes": [
        { "slug": "xs",    "size": "0.75rem",  "name": "XS" },
        { "slug": "sm",    "size": "0.875rem", "name": "Small" },
        { "slug": "md",    "size": "1rem",     "name": "Medium" },
        { "slug": "lg",    "size": "1.125rem", "name": "Large" },
        { "slug": "xl",    "size": "1.25rem",  "name": "XL" },
        { "slug": "2xl",   "size": "1.5rem",   "name": "2XL" },
        { "slug": "3xl",   "size": "1.875rem", "name": "3XL" },
        { "slug": "4xl",   "size": "2.25rem",  "name": "4XL" },
        { "slug": "5xl",   "size": "3rem",     "name": "5XL" }
      ],
      "customFontSize": false,
      "dropCap": false
    },

    "spacing": {
      "spacingScale": {
        "steps": 7,
        "mediumStep": 1.5,
        "unit": "rem",
        "operator": "*",
        "increment": 1.5,
        "type": "fluid"
      },
      "spacingSizes": [
        { "slug": "20", "size": "0.5rem",  "name": "2" },
        { "slug": "30", "size": "0.75rem", "name": "3" },
        { "slug": "40", "size": "1rem",    "name": "4" },
        { "slug": "50", "size": "1.5rem",  "name": "5" },
        { "slug": "60", "size": "2rem",    "name": "6" },
        { "slug": "70", "size": "3rem",    "name": "7" },
        { "slug": "80", "size": "4rem",    "name": "8" }
      ],
      "padding": true,
      "margin": true,
      "units": ["px", "rem", "%", "vw"]
    },

    "layout": {
      "contentSize": "760px",
      "wideSize": "1200px"
    },

    "blocks": {
      "core/button": {
        "border": { "radius": true }
      },
      "core/image": {
        "lightbox": { "enabled": true }
      }
    }
  },

  "styles": {
    "color": {
      "background": "var(--wp--preset--color--base)",
      "text": "var(--wp--preset--color--contrast)"
    },
    "typography": {
      "fontFamily": "var(--wp--preset--font-family--system)",
      "fontSize": "var(--wp--preset--font-size--md)",
      "lineHeight": "1.7"
    },
    "spacing": {
      "blockGap": "var(--wp--preset--spacing--50)"
    },
    "elements": {
      "link": {
        "color": { "text": "var(--wp--preset--color--accent)" },
        ":hover": {
          "color": { "text": "var(--wp--preset--color--highlight)" }
        }
      },
      "h1": { "typography": { "fontSize": "var(--wp--preset--font-size--5xl)", "lineHeight": "1.2" } },
      "h2": { "typography": { "fontSize": "var(--wp--preset--font-size--4xl)", "lineHeight": "1.3" } },
      "h3": { "typography": { "fontSize": "var(--wp--preset--font-size--3xl)", "lineHeight": "1.4" } },
      "h4": { "typography": { "fontSize": "var(--wp--preset--font-size--2xl)" } },
      "h5": { "typography": { "fontSize": "var(--wp--preset--font-size--xl)" } },
      "h6": { "typography": { "fontSize": "var(--wp--preset--font-size--lg)" } }
    },
    "blocks": {
      "core/site-title": {
        "typography": { "fontSize": "var(--wp--preset--font-size--2xl)", "fontWeight": "700" }
      },
      "core/navigation": {
        "typography": { "fontSize": "var(--wp--preset--font-size--md)" }
      }
    }
  },

  "templateParts": [
    { "name": "header",  "title": "Header",  "area": "header" },
    { "name": "footer",  "title": "Footer",  "area": "footer" },
    { "name": "sidebar", "title": "Sidebar", "area": "uncategorized" }
  ],

  "customTemplates": [
    { "name": "blank",         "title": "Blank",          "postTypes": ["page"] },
    { "name": "full-width",    "title": "Full Width",     "postTypes": ["page", "post"] },
    { "name": "landing-page",  "title": "Landing Page",   "postTypes": ["page"] }
  ]
}
```

---

## functions.php 核心结构

```php
<?php
defined('ABSPATH') || exit;

// 加载模块
require_once get_template_directory() . '/inc/setup.php';
require_once get_template_directory() . '/inc/block-styles.php';
require_once get_template_directory() . '/inc/block-patterns.php';
```

## inc/setup.php

```php
<?php
function mytheme_setup(): void {
    add_theme_support('wp-block-styles');
    add_theme_support('editor-styles');
    add_theme_support('responsive-embeds');
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');

    // 注册导航菜单
    register_nav_menus([
        'primary' => __('Primary Menu', 'my-theme'),
        'footer'  => __('Footer Menu', 'my-theme'),
    ]);
}
add_action('after_setup_theme', 'mytheme_setup');

// 加载样式
function mytheme_enqueue(): void {
    wp_enqueue_style(
        'my-theme-style',
        get_template_directory_uri() . '/assets/css/custom.css',
        [],
        wp_get_theme()->get('Version')
    );
}
add_action('wp_enqueue_scripts', 'mytheme_enqueue');
```

---

## wp-cli 常用命令（代码用户工作流）

```bash
# 激活主题
wp theme activate my-theme

# 清除缓存
wp cache flush

# 创建测试页面
wp post create --post_type=page --post_title='Home' --post_status=publish

# 设置首页
wp option update show_on_front page
wp option update page_on_front $(wp post list --post_type=page --name=home --field=ID)

# 导入patterns测试数据
wp post create --post_type=wp_block --post_title='My Pattern' --post_status=publish
```
