# Archive Product Filter Bar Design

_Date: 2026-03-28_

## Goal

Merge filtering capabilities from `product-search-results.html` into `archive-product.html`, placing filters horizontally above the product grid instead of a sidebar.

## Layout

```
Header (template-part)
Page Header (pattern: page-header-products)
Toolbar (always visible, neutral-50 bg)
  Left:  Search box (200px) + Result count
  Right: Filter toggle button + View Toggle + Sort dropdown
Filter Panel (expandable, slides down)
  Category dropdown | Price slider | Stock status | [Clear All]
Product Grid (3-col, existing cards + pagination)
CTA Banner (pattern)
Footer (template-part)
```

## Filter Panel Behavior

- Default: collapsed (hidden)
- Click filter toggle: expand with max-height transition (300ms ease-out)
- Active filters show chip/badge count on toggle button
- "Clear All" resets all filters
- Pure CSS `:checked` hack or minimal JS for toggle

## Filter Components (WooCommerce SSR blocks)

- `woocommerce/product-categories` -- display as horizontal dropdown
- `woocommerce/price-filter` -- inline slider
- `woocommerce/stock-filter` -- checkbox/toggle

## Files to Modify

| File | Change |
|------|--------|
| `templates/archive-product.html` | Rewrite toolbar area, add filter panel |
| `assets/css/custom.css` | Filter panel styles (expand/collapse, layout) |
| `assets/css/woocommerce.css` | Search box, filter button styles |

## Files NOT Changed

- `patterns/page-header-products.php`
- Product card markup
- `patterns/view-toggle.php`
- `patterns/cta-banner.php`
- Template parts (header, footer)
- `product-search-results.html`
