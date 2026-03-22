# CCLEE Theme

A lightweight Full Site Editing (FSE) theme for WordPress developers. Clean architecture, SEO/GEO friendly, AI-ready.

## Requirements

- WordPress 6.4+
- PHP 8.0+

## Installation

### Manual Upload

1. Download the theme ZIP file
2. Go to WordPress Admin → Appearance → Themes → Add New → Upload Theme
3. Activate the theme

### WP-CLI

```bash
# Install from directory
wp theme install /path/to/cclee-theme --activate

# Or if hosted (replace with actual URL)
wp theme install https://github.com/cclee-hub/cclee-theme/releases/download/v1.1.0/cclee-theme.zip --activate
```

## Features

### Core
- Full Site Editing (FSE) support
- Block theme with `theme.json` design system
- Responsive layout configuration

### Templates
- `index.html` - Default template
- `single.html` - Single post
- `page.html` - Static page
- `archive.html` - Archive listings
- `search.html` - Search results
- `404.html` - Not found

### Template Parts
- `header.html` - Site header
- `footer.html` - Site footer
- `sidebar.html` - Sidebar widget area

### Patterns (10 built-in)
- `hero-simple` - Simple hero section
- `hero-centered` - Centered hero with CTA
- `features-grid` - Feature cards grid
- `cta-banner` - Call-to-action banner
- `footer-columns` - Multi-column footer
- `contact` - Contact form section
- `testimonial` - Customer testimonials
- `pricing` - Pricing table
- `team` - Team members grid
- `ai-content-block` - AI-assisted content block

### Style Variations
- `midnight` - Dark theme
- `ocean` - Blue tones
- `warm` - Warm colors

### Integrations
- SEO support (Open Graph, Twitter Card, JSON-LD Schema)
- WooCommerce compatibility (lightweight, no template overrides)
- AI Editor Assistant integration

## Child Theme Extension

Create a child theme to customize CCLEE for your project:

### 1. Create Directory Structure

```
your-child-theme/
├── style.css
├── theme.json (optional)
└── functions.php
```

### 2. style.css (Required)

```css
/*
Theme Name: Your Child Theme
Template: cclee-theme
Version: 1.0.0
*/

/* Your custom styles */
```

### 3. functions.php

```php
<?php
add_action('wp_enqueue_scripts', function() {
    wp_enqueue_style(
        'your-child-style',
        get_stylesheet_uri(),
        ['cclee-theme-style'],
        wp_get_theme()->get('Version')
    );
});
```

### 4. Override Patterns

Copy patterns from parent theme to child theme and modify:

```php
// In child theme's functions.php
add_action('init', function() {
    register_block_pattern(
        'your-child/custom-hero',
        [
            'title' => 'Custom Hero',
            'categories' => ['your-child'],
            'content' => '<!-- Your custom pattern markup -->'
        ]
    );
});
```

### 5. Override theme.json Settings

Create `theme.json` in child theme:

```json
{
  "version": 3,
  "settings": {
    "color": {
      "palette": [
        { "slug": "primary", "color": "#your-color", "name": "Primary" }
      ]
    }
  }
}
```

## Design System

CCLEE uses `theme.json` as the single source of truth for design tokens:

| Token Type | Slugs |
|------------|-------|
| Colors | `primary`, `secondary`, `accent`, `base`, `contrast` |
| Font Families | `system`, `mono` |
| Font Sizes | `small`, `medium`, `large`, `x-large`, `xx-large` |
| Spacing | `20`, `30`, `40`, `50`, `60`, `70`, `80` |
| Layout | `contentSize: 800px`, `wideSize: 1200px` |

Reference in CSS:
```css
.element {
  color: var(--wp--preset--color--primary);
  font-size: var(--wp--preset--font-size--large);
  padding: var(--wp--preset--spacing--40);
}
```

## File Structure

```
cclee-theme/
├── style.css              # Theme declaration
├── theme.json             # Design system
├── functions.php          # Entry point
├── index.php              # Fallback template
│
├── templates/             # Page templates
├── parts/                 # Template parts
├── patterns/              # Block patterns
├── styles/                # Style variations
│
├── assets/
│   ├── css/
│   │   ├── custom.css     # Supplementary styles
│   │   └── woocommerce.css
│   ├── js/
│   │   ├── theme.js
│   │   └── editor-ai.js
│   └── images/
│
└── inc/
    ├── setup.php
    ├── block-styles.php
    ├── block-patterns.php
    ├── seo.php
    ├── woocommerce.php
    └── editor-ai.php
```

## Development

### Local Development with Docker

```bash
# Start WordPress
cd wp && docker-compose up -d

# Access at http://localhost:8080

# WP-CLI commands
docker exec wp_cli wp [command] --allow-root
```

### Clear Cache

```bash
docker exec wp_cli wp cache flush --allow-root
```

## License

GNU General Public License v2 or later

## Links

- [GitHub Repository](https://github.com/cclee-hub/cclee-theme)
- [About Aigent](https://www.aigent.ren/about)
- [About AI DevHub](https://aidevhub.ai/about)
