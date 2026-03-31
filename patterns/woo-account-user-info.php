<?php
/**
 * Title: Account User Info
 * Slug: cclee/woo-account-user-info
 * Categories: cclee, woocommerce
 * Description: User avatar and display name for My Account page
 *
 * @package cclee
 */

?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--40)","right":"var(--wp--preset--spacing--40)","bottom":"var(--wp--preset--spacing--40)","left":"var(--wp--preset--spacing--40)"}},"border":{"radius":"var(--wp--custom--border--radius--lg)","width":"1px","style":"solid"}},"borderColor":"neutral-200","backgroundColor":"contrast","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-border-color has-neutral-200-border-color has-contrast-background-color has-background" style="border-style:solid;border-width:1px;border-radius:var(--wp--custom--border--radius--lg);padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)">

	<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left"}} -->
	<div class="wp-block-group">

		<!-- wp:avatar {"size":56,"style":{"border":{"radius":"9999px"}}} /-->

		<!-- wp:group {"style":{"spacing":{"margin":{"left":"var(--wp--preset--spacing--30)"}}},"layout":{"type":"constrained"}} -->
		<div class="wp-block-group" style="margin-left:var(--wp--preset--spacing--30)">

			<!-- wp:paragraph {"textColor":"primary","fontSize":"medium","style":{"typography":{"fontWeight":"600"}}} -->
			<p class="has-primary-color has-text-color has-medium-font-size" style="font-weight:600">Hello, User</p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"textColor":"neutral-500","fontSize":"small"} -->
			<p class="has-neutral-500-color has-text-color has-small-font-size">Welcome back to your account</p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:group -->

	</div>
	<!-- /wp:group -->

	<!-- wp:separator {"backgroundColor":"neutral-200","style":{"spacing":{"margin":{"top":"var(--wp--preset--spacing--40)"}}}} -->
	<hr class="wp-block-separator has-text-color has-neutral-200-color has-alpha-channel-opacity has-neutral-200-background-color has-background has-css-opacity" style="margin-top:var(--wp--preset--spacing--40)"/>
	<!-- /wp:separator -->

	<!-- wp:group {"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
	<div class="wp-block-group">

		<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
		<div class="wp-block-group">

			<!-- wp:paragraph {"textColor":"neutral-500","fontSize":"small"} -->
			<p class="has-neutral-500-color has-text-color has-small-font-size">Role:</p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"textColor":"primary","fontSize":"small","style":{"spacing":{"margin":{"left":"var(--wp--preset--spacing--10)"}}}} -->
			<p class="has-primary-color has-text-color has-small-font-size" style="margin-left:var(--wp--preset--spacing--10)">Customer</p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:group -->

		<!-- wp:paragraph {"textColor":"neutral-500","fontSize":"small"} -->
		<p class="has-neutral-500-color has-text-color has-small-font-size"><a href="#">Logout</a></p>
		<!-- /wp:paragraph -->

	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
