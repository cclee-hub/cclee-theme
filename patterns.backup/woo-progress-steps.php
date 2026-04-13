<?php
/**
 * Title: WooCommerce Progress Steps
 * Slug: cclee/woo-progress-steps
 * Categories: cclee, woocommerce
 * Description: Checkout progress bar showing Cart, Checkout, and Complete steps
 *
 * @package cclee
 */

?>
<!-- wp:group {"align":"full","backgroundColor":"neutral-50","style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--40)","bottom":"var(--wp--preset--spacing--40)"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-neutral-50-background-color has-background" style="padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40)">

	<!-- wp:group {"align":"wide","className":"woo-progress-steps","layout":{"type":"flex","justifyContent":"center"}} -->
	<div class="wp-block-group alignwide woo-progress-steps">

		<!-- wp:group {"className":"woo-progress-step woo-progress-step--active","layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
		<div class="wp-block-group woo-progress-step woo-progress-step--active">
			<!-- wp:group {"style":{"border":{"radius":"50%"},"spacing":{"padding":{"top":"var(--wp--preset--spacing--10)","bottom":"var(--wp--preset--spacing--10)","left":"var(--wp--preset--spacing--20)","right":"var(--wp--preset--spacing--20)"}}},"backgroundColor":"accent","layout":{"type":"constrained"}} -->
			<div class="wp-block-group has-accent-background-color has-background" style="border-radius:50%;padding-top:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20)">
				<!-- wp:paragraph {"textColor":"base","fontSize":"medium","style":{"typography":{"fontWeight":"700","lineHeight":"1"}}} -->
				<p class="has-base-color has-text-color has-medium-font-size" style="font-weight:700;line-height:1">1</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
			<!-- wp:paragraph {"textColor":"primary","fontSize":"small","style":{"typography":{"fontWeight":"600"},"spacing":{"margin":{"top":"var(--wp--preset--spacing--10)"}}}} -->
			<p class="has-primary-color has-text-color has-small-font-size" style="font-weight:600;margin-top:var(--wp--preset--spacing--10)">Cart</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"style":{"spacing":{"padding":{"right":"var(--wp--preset--spacing--20)"}}},"layout":{"type":"constrained"}} -->
		<div class="wp-block-group" style="padding-right:var(--wp--preset--spacing--20)">
			<!-- wp:separator {"backgroundColor":"neutral-300","className":"is-style-wide"} -->
			<hr class="wp-block-separator has-text-color has-neutral-300-color has-alpha-channel-opacity has-neutral-300-background-color has-background has-css-opacity is-style-wide"/>
			<!-- /wp:separator -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"woo-progress-step","layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
		<div class="wp-block-group woo-progress-step">
			<!-- wp:group {"style":{"border":{"radius":"50%","width":"2px","style":"solid"},"spacing":{"padding":{"top":"var(--wp--preset--spacing--10)","bottom":"var(--wp--preset--spacing--10)","left":"var(--wp--preset--spacing--20)","right":"var(--wp--preset--spacing--20)"}}},"borderColor":"neutral-300","layout":{"type":"constrained"}} -->
			<div class="wp-block-group has-border-color has-neutral-300-border-color" style="border-style:solid;border-width:2px;border-radius:50%;padding-top:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20)">
				<!-- wp:paragraph {"textColor":"neutral-400","fontSize":"medium","style":{"typography":{"fontWeight":"700","lineHeight":"1"}}} -->
				<p class="has-neutral-400-color has-text-color has-medium-font-size" style="font-weight:700;line-height:1">2</p>
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
			<hr class="wp-block-separator has-text-color has-neutral-300-color has-alpha-channel-opacity has-neutral-300-background-color has-background has-css-opacity is-style-wide"/>
			<!-- /wp:separator -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"woo-progress-step","layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
		<div class="wp-block-group woo-progress-step">
			<!-- wp:group {"style":{"border":{"radius":"50%","width":"2px","style":"solid"},"spacing":{"padding":{"top":"var(--wp--preset--spacing--10)","bottom":"var(--wp--preset--spacing--10)","left":"var(--wp--preset--spacing--20)","right":"var(--wp--preset--spacing--20)"}}},"borderColor":"neutral-300","layout":{"type":"constrained"}} -->
			<div class="wp-block-group has-border-color has-neutral-300-border-color" style="border-style:solid;border-width:2px;border-radius:50%;padding-top:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20)">
				<!-- wp:paragraph {"textColor":"neutral-400","fontSize":"medium","style":{"typography":{"fontWeight":"700","lineHeight":"1"}}} -->
				<p class="has-neutral-400-color has-text-color has-medium-font-size" style="font-weight:700;line-height:1">3</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
			<!-- wp:paragraph {"textColor":"neutral-400","fontSize":"small","style":{"typography":{"fontWeight":"600"},"spacing":{"margin":{"top":"var(--wp--preset--spacing--10)"}}}} -->
			<p class="has-neutral-400-color has-text-color has-small-font-size" style="font-weight:600;margin-top:var(--wp--preset--spacing--10)">Complete</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
