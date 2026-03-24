# WooCommerce Templates Implementation Plan

> **For Claude:** REQUIRED SUB-SKILL: Use superpowers:executing-plans to implement this plan task-by-task.

**Goal:** Add 3 WooCommerce template pages (my-account, order-received, product-search) with 1 new pattern (woo-account-nav)

**Architecture:** FSE block-based templates using WooCommerce blocks, one new pattern for account navigation with icons

**Tech Stack:** WordPress FSE, WooCommerce Blocks, PHP patterns

---

## Task 1: Create woo-account-nav Pattern

**Files:**
- Create: `wp/wordpress/wp-content/themes/cclee-theme/patterns/woo-account-nav.php`

**Step 1: Create pattern file with header and icons**

```php
<?php
/**
 * Title: WooCommerce Account Navigation
 * Slug: cclee-theme/woo-account-nav
 * Categories: cclee-theme, woocommerce
 * Description: 账户中心侧边栏导航，带图标菜单
 */
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--40)","right":"var(--wp--preset--spacing--30)","bottom":"var(--wp--preset--spacing--40)","left":"var(--wp--preset--spacing--30)"}},"border":{"radius":"var(--wp--custom--border--radius--lg)"}},"backgroundColor":"neutral-50","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-neutral-50-background-color has-background" style="border-radius:var(--wp--custom--border--radius--lg);padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--30)">

	<!-- wp:heading {"level":3,"textColor":"primary","fontSize":"medium","style":{"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--30)"}}}} -->
	<h3 class="wp-block-heading has-primary-color has-text-color has-medium-font-size" style="margin-bottom:var(--wp--preset--spacing--30)">My Account</h3>
	<!-- /wp:heading -->

	<!-- wp:navigation {"overlayMenu":"never","layout":{"type":"flex","orientation":"vertical"},"style":{"spacing":{"blockGap":"var(--wp--preset--spacing--10)"}},"className":"woo-account-nav-menu"} -->
		<!-- wp:navigation-link {"label":"Dashboard","url":"/my-account/","kind":"custom","icon":"home","className":"woo-account-nav-item"} /-->
		<!-- wp:navigation-link {"label":"Orders","url":"/my-account/orders/","kind":"custom","icon":"package","className":"woo-account-nav-item"} /-->
		<!-- wp:navigation-link {"label":"Downloads","url":"/my-account/downloads/","kind":"custom","icon":"download","className":"woo-account-nav-item"} /-->
		<!-- wp:navigation-link {"label":"Addresses","url":"/my-account/edit-address/","kind":"custom","icon":"map-pin","className":"woo-account-nav-item"} /-->
		<!-- wp:navigation-link {"label":"Account Details","url":"/my-account/edit-account/","kind":"custom","icon":"user","className":"woo-account-nav-item"} /-->
		<!-- wp:navigation-link {"label":"Logout","url":"/my-account/customer-logout/","kind":"custom","icon":"log-out","className":"woo-account-nav-item"} /-->
	<!-- /wp:navigation -->

</div>
<!-- /wp:group -->
```

**Step 2: Commit pattern**

```bash
cd /home/aptop/workspace/wordpress
git add wp/wordpress/wp-content/themes/cclee-theme/patterns/woo-account-nav.php
git commit -m "feat(theme): add woo-account-nav pattern for My Account sidebar"
```

---

## Task 2: Create my-account.html Template

**Files:**
- Create: `wp/wordpress/wp-content/themes/cclee-theme/templates/my-account.html`

**Step 1: Create template with sidebar layout**

```html
<!-- wp:template-part {"slug":"header","tagName":"header"} /-->

<!-- wp:group {"tagName":"main","anchor":"main","align":"full","style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--70)","bottom":"var(--wp--preset--spacing--70)"}}},"layout":{"type":"constrained"}} -->
<main class="wp-block-group alignfull" id="main" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">

	<!-- wp:columns {"align":"wide","style":{"spacing":{"gap":{"left":"var(--wp--preset--spacing--50)"}}}} -->
	<div class="wp-block-columns alignwide">

		<!-- wp:column {"width":"25%"} -->
		<div class="wp-block-column" style="flex-basis:25%">
			<!-- wp:pattern {"slug":"cclee-theme/woo-account-nav"} /-->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"75%"} -->
		<div class="wp-block-column" style="flex-basis:75%">

			<!-- wp:group {"style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--40)","right":"var(--wp--preset--spacing--50)","bottom":"var(--wp--preset--spacing--40)","left":"var(--wp--preset--spacing--50)"}},"border":{"radius":"var(--wp--custom--border--radius--lg)","width":"1px"}},"borderColor":"neutral-200","layout":{"type":"constrained"}} -->
			<div class="wp-block-group has-border-color has-neutral-200-border-color" style="border-radius:var(--wp--custom--border--radius--lg);border-width:1px;padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--50)">

				<!-- wp:woocommerce/my-account /-->

			</div>
			<!-- /wp:group -->

		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</main>
<!-- /wp:group -->

<!-- wp:template-part {"slug":"footer","tagName":"footer"} /-->
```

**Step 2: Commit template**

```bash
cd /home/aptop/workspace/wordpress
git add wp/wordpress/wp-content/themes/cclee-theme/templates/my-account.html
git commit -m "feat(theme): add my-account.html template with sidebar nav"
```

---

## Task 3: Create order-received.html Template

**Files:**
- Create: `wp/wordpress/wp-content/themes/cclee-theme/templates/order-received.html`

**Step 1: Create template with order confirmation blocks**

```html
<!-- wp:template-part {"slug":"header","tagName":"header"} /-->

<!-- wp:group {"align":"full","backgroundColor":"neutral-50","style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--40)","bottom":"var(--wp--preset--spacing--40)"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-neutral-50-background-color has-background" style="padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40)">

	<!-- wp:group {"align":"wide","className":"woo-progress-steps","layout":{"type":"flex","justifyContent":"center"}} -->
	<div class="wp-block-group alignwide woo-progress-steps" style="display:flex;justify-content:center;align-items:center;gap:var(--wp--preset--spacing--20)">

		<!-- wp:group {"className":"woo-progress-step","layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
		<div class="wp-block-group woo-progress-step" style="display:flex;flex-direction:column;align-items:center;text-align:center">
			<!-- wp:group {"style":{"border":{"radius":"50%","width":"2px","style":"solid"},"spacing":{"padding":{"top":"var(--wp--preset--spacing--10)","bottom":"var(--wp--preset--spacing--10)","left":"var(--wp--preset--spacing--20)","right":"var(--wp--preset--spacing--20)"}}},"borderColor":"neutral-300","layout":{"type":"constrained"}} -->
			<div class="wp-block-group has-border-color has-neutral-300-border-color" style="border-radius:50%;border-width:2px;padding-top:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);width:40px;height:40px;display:flex;align-items:center;justify-content:center">
				<!-- wp:paragraph {"textColor":"neutral-400","style":{"typography":{"fontSize":"16px","fontWeight":"700"}}} -->
				<p class="has-neutral-400-color has-text-color" style="font-size:16px;font-weight:700;line-height:1">1</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
			<!-- wp:paragraph {"textColor":"neutral-400","fontSize":"small","style":{"typography":{"fontWeight":"600"},"spacing":{"margin":{"top":"var(--wp--preset--spacing--10)"}}}} -->
			<p class="has-neutral-400-color has-text-color has-small-font-size" style="font-weight:600;margin-top:var(--wp--preset--spacing--10)">Cart</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"style":{"spacing":{"padding":{"right":"var(--wp--preset--spacing--20)"}}},"layout":{"type":"constrained"}} -->
		<div class="wp-block-group" style="padding-right:var(--wp--preset--spacing--20)">
			<!-- wp:separator {"backgroundColor":"neutral-300","className":"is-style-wide"} -->
			<hr class="wp-block-separator has-text-color has-neutral-300-color has-neutral-300-background-color has-background is-style-wide" style="width:60px"/>
			<!-- /wp:separator -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"woo-progress-step","layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
		<div class="wp-block-group woo-progress-step" style="display:flex;flex-direction:column;align-items:center;text-align:center">
			<!-- wp:group {"style":{"border":{"radius":"50%","width":"2px","style":"solid"},"spacing":{"padding":{"top":"var(--wp--preset--spacing--10)","bottom":"var(--wp--preset--spacing--10)","left":"var(--wp--preset--spacing--20)","right":"var(--wp--preset--spacing--20)"}}},"borderColor":"neutral-300","layout":{"type":"constrained"}} -->
			<div class="wp-block-group has-border-color has-neutral-300-border-color" style="border-radius:50%;border-width:2px;padding-top:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);width:40px;height:40px;display:flex;align-items:center;justify-content:center">
				<!-- wp:paragraph {"textColor":"neutral-400","style":{"typography":{"fontSize":"16px","fontWeight":"700"}}} -->
				<p class="has-neutral-400-color has-text-color" style="font-size:16px;font-weight:700;line-height:1">2</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
			<!-- wp:paragraph {"textColor":"neutral-400","fontSize":"small","style":{"typography":{"fontWeight":"600"},"spacing":{"margin":{"top":"var(--wp--preset--spacing--10)"}}}} -->
			<p class="has-neutral-400-color has-text-color has-small-font-size" style="font-weight:600;margin-top:var(--wp--preset--spacing--10)">Checkout</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"style":{"spacing":{"padding":{"right":"var(--wp--preset--spacing--20)"}}},"layout":{"type":"constrained"}} -->
		<div class="wp-block-group" style="padding-right:var(--wp--preset--spacing--20)">
			<!-- wp:separator {"backgroundColor":"neutral-300","className":"is-style-wide"} -->
			<hr class="wp-block-separator has-text-color has-neutral-300-color has-neutral-300-background-color has-background is-style-wide" style="width:60px"/>
			<!-- /wp:separator -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"woo-progress-step woo-progress-step--active","layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
		<div class="wp-block-group woo-progress-step woo-progress-step--active" style="display:flex;flex-direction:column;align-items:center;text-align:center">
			<!-- wp:group {"style":{"border":{"radius":"50%"},"spacing":{"padding":{"top":"var(--wp--preset--spacing--10)","bottom":"var(--wp--preset--spacing--10)","left":"var(--wp--preset--spacing--20)","right":"var(--wp--preset--spacing--20)"}}},"backgroundColor":"accent","layout":{"type":"constrained"}} -->
			<div class="wp-block-group has-accent-background-color has-background" style="border-radius:50%;padding-top:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);width:40px;height:40px;display:flex;align-items:center;justify-content:center">
				<!-- wp:paragraph {"textColor":"base","style":{"typography":{"fontSize":"16px","fontWeight":"700"}}} -->
				<p class="has-base-color has-text-color" style="font-size:16px;font-weight:700;line-height:1">3</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
			<!-- wp:paragraph {"textColor":"accent","fontSize":"small","style":{"typography":{"fontWeight":"600"},"spacing":{"margin":{"top":"var(--wp--preset--spacing--10)"}}}} -->
			<p class="has-accent-color has-text-color has-small-font-size" style="font-weight:600;margin-top:var(--wp--preset--spacing--10)">Complete</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->

<!-- wp:group {"tagName":"main","anchor":"main","align":"full","style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--60)","bottom":"var(--wp--preset--spacing--80)"}}},"layout":{"type":"constrained","wideSize":"1200px"}} -->
<main class="wp-block-group alignfull" id="main" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--80)">

	<!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--50)"}}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignwide" style="margin-bottom:var(--wp--preset--spacing--50)">
		<!-- wp:heading {"textAlign":"center","level":1,"textColor":"primary","fontSize":"h1"} -->
		<h1 class="wp-block-heading has-text-align-center has-primary-color has-text-color" style="font-size:var(--wp--preset--font-size--h1)">Thank You!</h1>
		<!-- /wp:heading -->
		<!-- wp:woocommerce/order-confirmation-order-number {"textAlign":"center","style":{"spacing":{"margin":{"top":"var(--wp--preset--spacing--20)"}}}} /-->
	</div>
	<!-- /wp:group -->

	<!-- wp:columns {"align":"wide","style":{"spacing":{"gap":{"left":"var(--wp--preset--spacing--50)"}}}} -->
	<div class="wp-block-columns alignwide">

		<!-- wp:column {"width":"60%"} -->
		<div class="wp-block-column" style="flex-basis:60%">

			<!-- wp:group {"style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--40)","right":"var(--wp--preset--spacing--40)","bottom":"var(--wp--preset--spacing--40)","left":"var(--wp--preset--spacing--40)"}},"border":{"radius":"var(--wp--custom--border--radius--lg)","width":"1px"}},"borderColor":"neutral-200","layout":{"type":"constrained"}} -->
			<div class="wp-block-group has-border-color has-neutral-200-border-color" style="border-radius:var(--wp--custom--border--radius--lg);border-width:1px;padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)">

				<!-- wp:heading {"level":3,"textColor":"primary","fontSize":"medium","style":{"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--30)"}}}} -->
				<h3 class="wp-block-heading has-primary-color has-text-color has-medium-font-size" style="margin-bottom:var(--wp--preset--spacing--30)">Order Details</h3>
				<!-- /wp:heading -->

				<!-- wp:woocommerce/order-confirmation-cart-items /-->

			</div>
			<!-- /wp:group -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"40%"} -->
		<div class="wp-block-column" style="flex-basis:40%}">

			<!-- wp:group {"style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--40)","right":"var(--wp--preset--spacing--40)","bottom":"var(--wp--preset--spacing--40)","left":"var(--wp--preset--spacing--40)"}},"border":{"radius":"var(--wp--custom--border--radius--lg)","width":"1px"}},"borderColor":"neutral-200","layout":{"type":"constrained"}} -->
			<div class="wp-block-group has-border-color has-neutral-200-border-color" style="border-radius:var(--wp--custom--border--radius--lg);border-width:1px;padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40);position:sticky;top:100px">

				<!-- wp:heading {"level":3,"textColor":"primary","fontSize":"medium","style":{"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--30)"}}}} -->
				<h3 class="wp-block-heading has-primary-color has-text-color has-medium-font-size" style="margin-bottom:var(--wp--preset--spacing--30)">Order Information</h3>
				<!-- /wp:heading -->

				<!-- wp:woocommerce/order-confirmation-order-date {"style":{"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--20)"}}}} /-->

				<!-- wp:woocommerce/order-confirmation-order-status {"style":{"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--20)"}}}} /-->

				<!-- wp:woocommerce/order-confirmation-payment-method {"style":{"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--30)"}}}} /-->

				<!-- wp:separator {"backgroundColor":"neutral-200"} -->
				<hr class="wp-block-separator has-text-color has-neutral-200-color has-neutral-200-background-color has-background"/>
				<!-- /wp:separator -->

				<!-- wp:heading {"level":4,"textColor":"primary","fontSize":"medium","style":{"spacing":{"margin":{"top":"var(--wp--preset--spacing--30)","bottom":"var(--wp--preset--spacing--20)"}}}} -->
				<h4 class="wp-block-heading has-primary-color has-text-color has-medium-font-size" style="margin-top:var(--wp--preset--spacing--30);margin-bottom:var(--wp--preset--spacing--20)">Shipping</h4>
				<!-- /wp:heading -->

				<!-- wp:woocommerce/order-confirmation-shipping /-->

				<!-- wp:heading {"level":4,"textColor":"primary","fontSize":"medium","style":{"spacing":{"margin":{"top":"var(--wp--preset--spacing--30)","bottom":"var(--wp--preset--spacing--20)"}}}} -->
				<h4 class="wp-block-heading has-primary-color has-text-color has-medium-font-size" style="margin-top:var(--wp--preset--spacing--30);margin-bottom:var(--wp--preset--spacing--20)">Billing Address</h4>
				<!-- /wp:heading -->

				<!-- wp:woocommerce/order-confirmation-billing-address /-->

			</div>
			<!-- /wp:group -->

			<!-- wp:pattern {"slug":"cclee-theme/woo-trust-badges"} /-->

		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</main>
<!-- /wp:group -->

<!-- wp:pattern {"slug":"cclee-theme/cta-banner"} /-->

<!-- wp:template-part {"slug":"footer","tagName":"footer"} /-->
```

**Step 2: Commit template**

```bash
cd /home/aptop/workspace/wordpress
git add wp/wordpress/wp-content/themes/cclee-theme/templates/order-received.html
git commit -m "feat(theme): add order-received.html template with confirmation blocks"
```

---

## Task 4: Create product-search.html Template

**Files:**
- Create: `wp/wordpress/wp-content/themes/cclee-theme/templates/product-search.html`

**Step 1: Copy archive-product.html and modify**

```bash
cp wp/wordpress/wp-content/themes/cclee-theme/templates/archive-product.html wp/wordpress/wp-content/themes/cclee-theme/templates/product-search.html
```

**Step 2: Update hero title for search context**

Change the hero-simple pattern to a search-specific title. Edit line 3:

```html
<!-- wp:pattern {"slug":"cclee-theme/hero-simple"} /-->
```

Replace with inline heading that shows search context:

```html
<!-- wp:group {"align":"full","backgroundColor":"neutral-50","style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--60)","bottom":"var(--wp--preset--spacing--60)"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-neutral-50-background-color has-background" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:heading {"textAlign":"center","level":1,"textColor":"primary","fontSize":"h1"} -->
	<h1 class="wp-block-heading has-text-align-center has-primary-color has-text-color" style="font-size:var(--wp--preset--font-size--h1)">Search Results</h1>
	<!-- /wp:heading -->
</div>
<!-- /wp:group -->
```

**Step 3: Update no-results message**

Change line 50 from:
```html
<p class="has-text-align-center has-neutral-500-color has-text-color">No products found.</p>
```

To:
```html
<p class="has-text-align-center has-neutral-500-color has-text-color">No products found for your search.</p>
```

**Step 4: Commit template**

```bash
cd /home/aptop/workspace/wordpress
git add wp/wordpress/wp-content/themes/cclee-theme/templates/product-search.html
git commit -m "feat(theme): add product-search.html template based on archive-product"
```

---

## Task 5: Register Templates in theme.json

**Files:**
- Modify: `wp/wordpress/wp-content/themes/cclee-theme/theme.json` (lines 683-737)

**Step 1: Add new templates to customTemplates array**

Add after line 736 (after author template):

```json
    {
      "name": "my-account",
      "title": "My Account",
      "postTypes": ["page"]
    },
    {
      "name": "order-received",
      "title": "Order Received"
    },
    {
      "name": "product-search",
      "title": "Product Search"
    }
```

**Step 2: Commit theme.json**

```bash
cd /home/aptop/workspace/wordpress
git add wp/wordpress/wp-content/themes/cclee-theme/theme.json
git commit -m "feat(theme): register my-account, order-received, product-search templates"
```

---

## Task 6: Final Verification

**Step 1: Verify all files exist**

```bash
ls -la wp/wordpress/wp-content/themes/cclee-theme/templates/my-account.html
ls -la wp/wordpress/wp-content/themes/cclee-theme/templates/order-received.html
ls -la wp/wordpress/wp-content/themes/cclee-theme/templates/product-search.html
ls -la wp/wordpress/wp-content/themes/cclee-theme/patterns/woo-account-nav.php
```

**Step 2: Verify PHP syntax**

```bash
php -l wp/wordpress/wp-content/themes/cclee-theme/patterns/woo-account-nav.php
```

**Step 3: Push all commits**

```bash
git push
```

---

## Summary

| Task | File | Action |
|------|------|--------|
| 1 | patterns/woo-account-nav.php | Create |
| 2 | templates/my-account.html | Create |
| 3 | templates/order-received.html | Create |
| 4 | templates/product-search.html | Create |
| 5 | theme.json | Modify |
| 6 | - | Verify & Push |
