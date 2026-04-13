<?php
/**
 * Title: WooCommerce Account Navigation
 * Slug: cclee/woo-account-nav
 * Categories: cclee, woocommerce
 * Description: Account sidebar navigation menu
 *
 * @package cclee
 */

?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--40)","right":"var(--wp--preset--spacing--30)","bottom":"var(--wp--preset--spacing--40)","left":"var(--wp--preset--spacing--30)"}},"border":{"radius":"var(--wp--custom--border--radius--md)"}},"backgroundColor":"neutral-50","className":"woo-account-nav-menu","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-neutral-50-background-color has-background woo-account-nav-menu" style="padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--30);border-radius:var(--wp--custom--border--radius--md)">

	<!-- wp:heading {"level":3,"textColor":"neutral-500","fontSize":"eyebrow","style":{"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--30)"}}}} -->
	<h3 class="wp-block-heading has-neutral-500-color has-text-color has-eyebrow-font-size" style="margin-bottom:var(--wp--preset--spacing--30)">My Account</h3>
	<!-- /wp:heading -->

	<!-- wp:navigation {"overlayMenu":"never","layout":{"type":"flex","orientation":"vertical"},"style":{"spacing":{"blockGap":"var(--wp--preset--spacing--10)"}}} -->
		<!-- wp:navigation-link {"label":"Dashboard","url":"/my-account/","kind":"custom","className":"woo-account-nav-item"} /-->
		<!-- wp:navigation-link {"label":"Orders","url":"/my-account/orders/","kind":"custom","className":"woo-account-nav-item"} /-->
		<!-- wp:navigation-link {"label":"Downloads","url":"/my-account/downloads/","kind":"custom","className":"woo-account-nav-item"} /-->
		<!-- wp:navigation-link {"label":"Addresses","url":"/my-account/edit-address/","kind":"custom","className":"woo-account-nav-item"} /-->
		<!-- wp:navigation-link {"label":"Account Details","url":"/my-account/edit-account/","kind":"custom","className":"woo-account-nav-item"} /-->
		<!-- wp:navigation-link {"label":"Logout","url":"/my-account/customer-logout/","kind":"custom","className":"woo-account-nav-item"} /-->
	<!-- /wp:navigation -->

</div>
<!-- /wp:group -->
