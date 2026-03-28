<?php
/**
 * Title: WooCommerce Account Navigation
 * Slug: cclee-theme/woo-account-nav
 * Categories: cclee-theme, woocommerce
 * Description: 账户中心侧边栏导航，带图标菜单
 */
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--40)","right":"var(--wp--preset--spacing--30)","bottom":"var(--wp--preset--spacing--40)","left":"var(--wp--preset--spacing--30)"}},"border":{"radius":"var(--wp--custom--border--radius--lg)"}},"backgroundColor":"neutral-50","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-neutral-50-background-color has-background" style="padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--30);border-radius:var(--wp--custom--border--radius--lg)">

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
