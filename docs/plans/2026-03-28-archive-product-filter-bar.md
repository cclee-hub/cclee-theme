# Archive Product Filter Bar Implementation Plan

> **For Claude:** REQUIRED SUB-SKILL: Use superpowers:executing-plans to implement this plan task-by-task.

**Goal:** Add an expandable horizontal filter bar above the product grid in `archive-product.html`, merging filtering capabilities from `product-search-results.html`.

**Architecture:** Replace the current toolbar area (lines 5-33 of archive-product.html) with a two-tier structure: (1) always-visible toolbar with search box, result count, filter toggle, view toggle, and sort; (2) collapsible filter panel with category filter, price filter, stock status filter, and clear button. The toggle uses CSS checkbox hack -- no JS dependency. WooCommerce SSR filter blocks render the actual filter UI.

**Tech Stack:** WordPress FSE block HTML, WooCommerce filter blocks (price-filter, stock-filter, product-categories), CSS (custom.css, woocommerce.css), existing SVG icons via `cclee_svg()`.

---

## Spacing Presets Reference

| Token | Value |
|-------|-------|
| `--spacing--10` | 0.25rem |
| `--spacing--20` | 0.5rem |
| `--spacing--30` | 0.75rem |
| `--spacing--40` | 1rem |
| `--spacing--50` | 1.5rem |
| `--spacing--60` | 2rem |
| `--spacing--70` | 3rem |

---

### Task 1: Rewrite archive-product.html toolbar + filter panel

**Files:**
- Modify: `wp/wordpress/wp-content/themes/cclee-theme/templates/archive-product.html`

**Step 1: Replace lines 5-33 (old toolbar) with new toolbar + filter panel**

Replace the entire old toolbar group (from `<!-- wp:group {"align":"full"...` through its closing `<!-- /wp:group -->` on line 33) with the new structure below.

New toolbar + filter panel HTML (replaces lines 5-33):

```html
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--30)","bottom":"var(--wp--preset--spacing--30)","left":"var(--wp--preset--spacing--50)","right":"var(--wp--preset--spacing--50)"}}},"backgroundColor":"neutral-50","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull has-neutral-50-background-color has-background" style="padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50)">

	<!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
	<div class="wp-block-group alignwide">

		<!-- wp:group {"layout":{"type":"flex","flexWrap":"wrap"}} -->
		<div class="wp-block-group">

			<!-- wp:woocommerce/product-search {"fontSize":"small"} /-->

			<!-- wp:woocommerce/product-results-count {"textColor":"neutral-500","fontSize":"small"} /-->

		</div>
		<!-- /wp:group -->

		<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
		<div class="wp-block-group">

			<!-- wp:html -->
			<label class="cclee-filter-toggle" for="cclee-filter-check">
				<input type="checkbox" id="cclee-filter-check" class="cclee-filter-toggle__input" autocomplete="off" />
				<span class="cclee-filter-toggle__btn">
					<?php echo cclee_svg( 'filter' ); ?>
					<span class="cclee-filter-toggle__text">Filters</span>
					<?php echo cclee_svg( 'chevron-down' ); ?>
				</span>
			</label>
			<!-- /wp:html -->

			<!-- wp:pattern {"slug":"cclee-theme/view-toggle"} /-->

			<!-- wp:woocommerce/catalog-sorting {"fontSize":"small"} /-->

		</div>
		<!-- /wp:group -->

	</div>
	<!-- /wp:group -->

	<!-- wp:group {"className":"cclee-filter-panel","align":"wide","layout":{"type":"flex","flexWrap":"wrap"}} -->
	<div class="wp-block-group alignwide cclee-filter-panel">

		<!-- wp:group {"className":"cclee-filter-panel__item","style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--30)","right":"var(--wp--preset--spacing--40)","bottom":"var(--wp--preset--spacing--30)","left":"var(--wp--preset--spacing--40)"}},"border":{"radius":"var(--wp--custom--border--radius--md)","width":"1px","style":"solid"}},"borderColor":"neutral-200","layout":{"type":"constrained"}} -->
		<div class="wp-block-group cclee-filter-panel__item has-border-color has-neutral-200-border-color" style="border-style:solid;border-width:1px;border-radius:var(--wp--custom--border--radius--md);padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--40)">

			<!-- wp:paragraph {"fontSize":"small","style":{"typography":{"fontWeight":"600","textTransform":"uppercase","letterSpacing":"0.05em"}},"textColor":"neutral-500"} -->
			<p class="has-neutral-500-color has-text-color has-small-font-size" style="font-weight:600;text-transform:uppercase;letter-spacing:0.05em">Category</p>
			<!-- /wp:paragraph -->

			<!-- wp:woocommerce/product-categories {"hasCount":true,"hasEmpty":false} /-->

		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"cclee-filter-panel__item","style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--30)","right":"var(--wp--preset--spacing--40)","bottom":"var(--wp--preset--spacing--30)","left":"var(--wp--preset--spacing--40)"}},"border":{"radius":"var(--wp--custom--border--radius--md)","width":"1px","style":"solid"}},"borderColor":"neutral-200","layout":{"type":"constrained"}} -->
		<div class="wp-block-group cclee-filter-panel__item has-border-color has-neutral-200-border-color" style="border-style:solid;border-width:1px;border-radius:var(--wp--custom--border--radius--md);padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--40)">

			<!-- wp:paragraph {"fontSize":"small","style":{"typography":{"fontWeight":"600","textTransform":"uppercase","letterSpacing":"0.05em"}},"textColor":"neutral-500"} -->
			<p class="has-neutral-500-color has-text-color has-small-font-size" style="font-weight:600;text-transform:uppercase;letter-spacing:0.05em">Price</p>
			<!-- /wp:paragraph -->

			<!-- wp:woocommerce/price-filter -->
			<div class="is-loading"></div>
			<!-- /wp:woocommerce/price-filter -->

		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"cclee-filter-panel__item","style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--30)","right":"var(--wp--preset--spacing--40)","bottom":"var(--wp--preset--spacing--30)","left":"var(--wp--preset--spacing--40)"}},"border":{"radius":"var(--wp--custom--border--radius--md)","width":"1px","style":"solid"}},"borderColor":"neutral-200","layout":{"type":"constrained"}} -->
		<div class="wp-block-group cclee-filter-panel__item has-border-color has-neutral-200-border-color" style="border-style:solid;border-width:1px;border-radius:var(--wp--custom--border--radius--md);padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--40)">

			<!-- wp:paragraph {"fontSize":"small","style":{"typography":{"fontWeight":"600","textTransform":"uppercase","letterSpacing":"0.05em"}},"textColor":"neutral-500"} -->
			<p class="has-neutral-500-color has-text-color has-small-font-size" style="font-weight:600;text-transform:uppercase;letter-spacing:0.05em">Availability</p>
			<!-- /wp:paragraph -->

			<!-- wp:woocommerce/stock-filter -->
			<div class="is-loading"></div>
			<!-- /wp:woocommerce/stock-filter -->

		</div>
		<!-- /wp:group -->

	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
```

**Important notes on the HTML structure:**
- The toolbar row uses `alignwide` for proper 1320px max-width (per conventions.md pattern width rule)
- The filter panel is a sibling group with `cclee-filter-panel` class, also `alignwide`
- Each filter item is a bordered card with the same `border-radius: md` used throughout the theme
- The CSS checkbox hack uses `<label>` wrapping a hidden `<input type="checkbox">` for the toggle
- WooCommerce SSR blocks (`price-filter`, `stock-filter`) include their `is-loading` placeholder divs
- The `wp:html` block wraps the filter toggle so `cclee_svg()` PHP renders correctly

**Step 2: Verify JSON validity**

Run: `python3 -c "
import json, re
with open('wp/wordpress/wp-content/themes/cclee-theme/templates/archive-product.html') as f:
    content = f.read()
comments = re.findall(r'<!-- (wp:.*?)(?: /)?-->', content)
for c in comments:
    if '{' in c:
        try:
            json.loads(c[c.index('{'):])
        except:
            print(f'BAD JSON: {c}')
print('JSON validation done')
"`
Expected: "JSON validation done" with no BAD JSON lines

**Step 3: Verify `var(` and `)` count balance**

Run: `python3 -c "
with open('wp/wordpress/wp-content/themes/cclee-theme/templates/archive-product.html') as f:
    content = f.read()
lines = content.split('\n')
for i, line in enumerate(lines, 1):
    if 'style=' in line:
        opens = line.count('var(')
        closes = line.count(')')
        if opens != closes:
            print(f'Line {i}: var(={opens} )={closes}')
print('Style balance check done')
"`
Expected: "Style balance check done" with no mismatched lines

**Step 4: Commit**

```bash
cd /home/aptop/workspace/wordpress
sudo chown -R $USER:$USER wp/wordpress/wp-content/themes/cclee-theme/templates/archive-product.html
git add wp/wordpress/wp-content/themes/cclee-theme/templates/archive-product.html
git commit -m "feat: add expandable filter bar to archive-product template"
```

---

### Task 2: Add filter toggle and panel CSS

**Files:**
- Modify: `wp/wordpress/wp-content/themes/cclee-theme/assets/css/woocommerce.css`

**Step 1: Add CSS after the existing View Toggle section (after line ~710)**

Add the following CSS block at the end of the View Toggle section in woocommerce.css:

```css
/* ========================================
   Filter Toggle Button
   ======================================== */

.cclee-filter-toggle {
	display: inline-flex;
	cursor: pointer;
}

.cclee-filter-toggle__input {
	position: absolute;
	opacity: 0;
	width: 0;
	height: 0;
	pointer-events: none;
}

.cclee-filter-toggle__btn {
	display: inline-flex;
	align-items: center;
	gap: var(--wp--preset--spacing--20);
	padding: var(--wp--preset--spacing--20) var(--wp--preset--spacing--30);
	border: 1px solid var(--wp--preset--color--neutral-200);
	border-radius: var(--wp--custom--border--radius--sm);
	background: var(--wp--preset--color--base);
	color: var(--wp--preset--color--neutral-500);
	font-size: var(--wp--preset--font-size--small);
	transition: all var(--wp--custom--transition--fast) var(--wp--custom--easing--default);
}

.cclee-filter-toggle__btn:hover {
	border-color: var(--wp--preset--color--neutral-300);
	color: var(--wp--preset--color--primary);
}

.cclee-filter-toggle__btn svg {
	width: 16px;
	height: 16px;
}

.cclee-filter-toggle__btn .cclee-icon-chevron-down {
	transition: transform var(--wp--custom--transition--fast) var(--wp--custom--easing--default);
}

/* Expanded state */
.cclee-filter-toggle__input:checked ~ .cclee-filter-toggle__btn {
	background: var(--wp--preset--color--primary);
	border-color: var(--wp--preset--color--primary);
	color: var(--wp--preset--color--base);
}

.cclee-filter-toggle__input:checked ~ .cclee-filter-toggle__btn .cclee-icon-chevron-down {
	transform: rotate(180deg);
}

/* ========================================
   Filter Panel (expandable)
   ======================================== */

.cclee-filter-panel {
	max-height: 0;
	overflow: hidden;
	opacity: 0;
	margin-top: 0;
	gap: var(--wp--preset--spacing--30);
	transition:
		max-height var(--wp--custom--transition--slow) var(--wp--custom--easing--default),
		opacity var(--wp--custom--transition--normal) var(--wp--custom--easing--default),
		margin-top var(--wp--custom--transition--normal) var(--wp--custom--easing--default);
}

/* Expanded via checkbox */
.cclee-filter-toggle__input:checked ~ .cclee-filter-toggle__btn {
	/* anchor for sibling selector -- panel is NOT a sibling of checkbox,
	   so we use :has() on the parent container */
}

/* Use :has() for checkbox -> panel relationship */
.cclee-filter-panel:has(~ .cclee-filter-toggle .cclee-filter-toggle__input:checked),
.wp-block-group:has(.cclee-filter-toggle__input:checked) .cclee-filter-panel {
	max-height: 600px;
	opacity: 1;
	margin-top: var(--wp--preset--spacing--40);
	overflow: visible;
}

/* Individual filter items */
.cclee-filter-panel__item {
	min-width: 180px;
	flex: 1;
}

.cclee-filter-panel__item > p {
	margin-top: 0;
	margin-bottom: var(--wp--preset--spacing--20);
}

/* Override WooCommerce filter block styles inside panel */
.cclee-filter-panel .wp-block-woocommerce-price-filter,
.cclee-filter-panel .wp-block-woocommerce-stock-filter {
	margin: 0;
}

.cclee-filter-panel .wc-block-product-categories-list {
	margin: 0;
}

.cclee-filter-panel .wc-block-product-categories-list li {
	margin-bottom: var(--wp--preset--spacing--10);
}

.cclee-filter-panel .wc-block-product-categories-list a {
	font-size: var(--wp--preset--font-size--small);
	color: var(--wp--preset--color--neutral-700);
	text-decoration: none;
	transition: color var(--wp--custom--transition--fast);
}

.cclee-filter-panel .wc-block-product-categories-list a:hover {
	color: var(--wp--preset--color--primary);
}

/* Mobile: hide filter toggle, stack filter items */
@media (max-width: 768px) {
	.cclee-filter-panel {
		flex-direction: column;
	}

	.cclee-filter-panel__item {
		min-width: 100%;
	}
}
```

**Important note on CSS architecture:**
The expand/collapse uses `:has()` selector which is supported in all modern browsers (Chrome 105+, Firefox 121+, Safari 15.4+). The checkbox is inside a `<label>` that's a sibling group to the filter panel within the same parent container. The `:has()` approach works because the parent `.wp-block-group` wraps both the toolbar (containing the checkbox) and the filter panel.

**Step 2: Verify CSS validity**

Run: `python3 -c "
import re
with open('wp/wordpress/wp-content/themes/cclee-theme/assets/css/woocommerce.css') as f:
    css = f.read()
opens = css.count('{')
closes = css.count('}')
print(f'Braces: open={opens} close={closes}')
if opens != closes:
    print('MISMATCH!')
else:
    print('OK')
"`
Expected: "Braces: open=N close=N" and "OK"

**Step 3: Commit**

```bash
cd /home/aptop/workspace/wordpress
sudo chown -R $USER:$USER wp/wordpress/wp-content/themes/cclee-theme/assets/css/woocommerce.css
git add wp/wordpress/wp-content/themes/cclee-theme/assets/css/woocommerce.css
git commit -m "feat: add filter toggle button and expandable panel CSS"
```

---

### Task 3: Add product search block styling

**Files:**
- Modify: `wp/wordpress/wp-content/themes/cclee-theme/assets/css/woocommerce.css`

**Step 1: Add search block styles in the same file, after filter panel styles**

```css
/* ========================================
   Product Search (inline in toolbar)
   ======================================== */

.cclee-products-wrapper .wp-block-woocommerce-product-search,
.archive .wp-block-woocommerce-product-search,
.wp-block-group .wp-block-woocommerce-product-search {
	display: inline-flex;
}

.wp-block-woocommerce-product-search .wc-block-product-search__fields {
	display: flex;
	gap: 0;
}

.wp-block-woocommerce-product-search .wc-block-product-search__field {
	padding: var(--wp--preset--spacing--20) var(--wp--preset--spacing--30);
	border: 1px solid var(--wp--preset--color--neutral-200);
	border-right: none;
	border-radius: var(--wp--custom--border--radius--sm) 0 0 var(--wp--custom--border--radius--sm);
	font-size: var(--wp--preset--font-size--small);
	background: var(--wp--preset--color--base);
	min-width: 180px;
}

.wp-block-woocommerce-product-search .wc-block-product-search__field:focus {
	outline: 2px solid var(--wp--preset--color--primary);
	outline-offset: -1px;
	border-color: var(--wp--preset--color--primary);
	border-right: none;
}

.wp-block-woocommerce-product-search .wc-block-product-search__button {
	padding: var(--wp--preset--spacing--20) var(--wp--preset--spacing--30);
	border: 1px solid var(--wp--preset--color--primary);
	border-radius: 0 var(--wp--custom--border--radius--sm) var(--wp--custom--border--radius--sm) 0;
	background: var(--wp--preset--color--primary);
	color: var(--wp--preset--color--base);
	cursor: pointer;
	display: flex;
	align-items: center;
}

.wp-block-woocommerce-product-search .wc-block-product-search__button:hover {
	background: var(--wp--preset--color--contrast);
	border-color: var(--wp--preset--color--contrast);
}

@media (max-width: 768px) {
	.wp-block-woocommerce-product-search .wc-block-product-search__field {
		min-width: 120px;
	}
}
```

**Step 2: Verify CSS braces balance (same as Task 2 Step 2)**

**Step 3: Commit**

```bash
cd /home/aptop/workspace/wordpress
sudo chown -R $USER:$USER wp/wordpress/wp-content/themes/cclee-theme/assets/css/woocommerce.css
git add wp/wordpress/wp-content/themes/cclee-theme/assets/css/woocommerce.css
git commit -m "feat: add inline product search block styling"
```

---

### Task 4: Visual verification and polish

**Step 1: Clear caches and reload**

```bash
docker exec wp_cli wp cache flush --allow-root
```

**Step 2: Screenshot the products page**

```bash
npx playwright screenshot --wait-for-timeout 3000 "http://localhost:8080/products/" docs/screenshots/products-filter-bar.png
```

**Step 3: Verify using Doubao Vision**

Analyze screenshot for:
- Toolbar layout: search box + count on left, filter toggle + view toggle + sort on right
- Filter panel hidden by default
- Click filter toggle button (via JS evaluate) and verify panel expands
- Screenshot again with panel expanded

```bash
npx playwright screenshot --wait-for-timeout 3000 "http://localhost:8080/products/" docs/screenshots/products-filter-expanded.png
```

To expand the panel before screenshot:
```bash
npx playwright evaluate --url "http://localhost:8080/products/" --script "document.getElementById('cclee-filter-check').click()"
```

If Playwright evaluate doesn't support direct URL:
```bash
node -e "
const {chromium} = require('playwright');
(async()=>{
  const b = await chromium.launch();
  const p = await b.newPage();
  await p.goto('http://localhost:8080/products/', {waitUntil:'networkidle'});
  await p.waitForTimeout(2000);
  await p.click('#cclee-filter-check');
  await p.waitForTimeout(500);
  await p.screenshot({path:'docs/screenshots/products-filter-expanded.png', fullPage:true});
  await b.close();
})();
"
```

**Step 4: Fix any visual issues found**

Common adjustments:
- Filter items not wrapping correctly -> adjust `flex` values
- Panel animation not smooth -> tweak `max-height` and transition timing
- Search box too wide/narrow -> adjust `min-width`
- WooCommerce filter block styles conflicting -> add more specific overrides

**Step 5: Commit any fixes**

```bash
git add wp/wordpress/wp-content/themes/cclee-theme/
git commit -m "fix: filter bar visual polish"
```

---

### Task 5: Verify filter functionality

**Step 1: Test category filter**

1. Expand filter panel
2. Click a category link
3. Verify page reloads with filtered products
4. Verify result count updates

**Step 2: Test price filter**

1. Expand filter panel
2. Adjust price slider
3. Verify products filter by price range

**Step 3: Test stock filter**

1. Expand filter panel
2. Select a stock status
3. Verify products filter correctly

**Step 4: Test search box**

1. Type a product name in the search box
2. Submit search
3. Verify results page shows matching products

**Step 5: Test mobile responsiveness**

```bash
npx playwright screenshot --wait-for-timeout 3000 --viewport-size="375,812" "http://localhost:8080/products/" docs/screenshots/products-filter-mobile.png
```

Verify:
- Filter toggle visible on mobile
- Panel stacks vertically when expanded
- Search box responsive width
