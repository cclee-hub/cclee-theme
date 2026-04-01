<?php
/**
 * Title: Testimonials
 * Slug: cclee/testimonial
 * Categories: cclee, featured
 * Description: Customer testimonials with three-column card layout
 *
 * @package cclee
 */

?>
<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--70)","bottom":"var(--wp--preset--spacing--70)"}}},"backgroundColor":"neutral-100","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide has-neutral-100-background-color has-background" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">

	<!-- wp:heading {"textAlign":"center","textColor":"primary"} -->
	<h2 class="wp-block-heading has-text-align-center has-primary-color has-text-color">What Our Users Say</h2>
	<!-- /wp:heading -->

	<!-- wp:columns {"style":{"spacing":{"margin":{"top":"var(--wp--preset--spacing--50)"}}},"className":"is-style-equal-height"} -->
	<div class="wp-block-columns is-style-equal-height" style="margin-top:var(--wp--preset--spacing--50)">

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--40)","right":"var(--wp--preset--spacing--40)","bottom":"var(--wp--preset--spacing--40)","left":"var(--wp--preset--spacing--40)"}},"border":{"radius":"12px"}},"backgroundColor":"base","className":"cclee-card","layout":{"type":"constrained"}} -->
			<div class="wp-block-group cclee-card has-base-background-color has-background" style="padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40);border-radius:12px">

				<!-- wp:html -->
				<div class="cclee-stars" style="margin-bottom:var(--wp--preset--spacing--20)"><?php echo str_repeat( cclee_svg( 'star' ), 5 ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>
				<!-- /wp:html -->

				<!-- wp:quote {"style":{"spacing":{"padding":{"left":"var(--wp--preset--spacing--30)"}},"border":{"left":{"color":"var:preset|color|accent","style":"solid","width":"4px"}}}} -->
				<blockquote class="wp-block-quote" style="border-left-color:var(--wp--preset--color--accent);border-left-style:solid;border-left-width:4px;padding-left:var(--wp--preset--spacing--30)">
					<!-- wp:paragraph -->
					<p>"This theme transformed our website. The design quality and ease of customization are unmatched."</p>
					<!-- /wp:paragraph -->
				</blockquote>
				<!-- /wp:quote -->

				<!-- wp:group {"style":{"spacing":{"margin":{"top":"var(--wp--preset--spacing--30)"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left","verticalAlignment":"center"}} -->
				<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--30)">
					<!-- wp:html -->
					<div class="cclee-avatar cclee-avatar--md">SC</div>
					<!-- /wp:html -->
					<!-- wp:group {"layout":{"type":"flex","orientation":"vertical"}} -->
					<div class="wp-block-group">
						<!-- wp:heading {"level":5} -->
						<h5 class="wp-block-heading">Sarah Chen</h5>
						<!-- /wp:heading -->
						<!-- wp:paragraph {"textColor":"neutral-500","fontSize":"small"} -->
						<p class="has-neutral-500-color has-text-color has-small-font-size">Product Manager</p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:group -->
				</div>
				<!-- /wp:group -->

			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--40)","right":"var(--wp--preset--spacing--40)","bottom":"var(--wp--preset--spacing--40)","left":"var(--wp--preset--spacing--40)"}},"border":{"radius":"12px"}},"backgroundColor":"base","className":"cclee-card","layout":{"type":"constrained"}} -->
			<div class="wp-block-group cclee-card has-base-background-color has-background" style="padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40);border-radius:12px">

				<!-- wp:html -->
				<div class="cclee-stars" style="margin-bottom:var(--wp--preset--spacing--20)"><?php echo str_repeat( cclee_svg( 'star' ), 5 ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>
				<!-- /wp:html -->

				<!-- wp:quote {"style":{"spacing":{"padding":{"left":"var(--wp--preset--spacing--30)"}},"border":{"left":{"color":"var:preset|color|accent","style":"solid","width":"4px"}}}} -->
				<blockquote class="wp-block-quote" style="border-left-color:var(--wp--preset--color--accent);border-left-style:solid;border-left-width:4px;padding-left:var(--wp--preset--spacing--30)">
					<!-- wp:paragraph -->
					<p>"Professional, responsive, and delivered exactly what we needed. Highly recommended for any business!"</p>
					<!-- /wp:paragraph -->
				</blockquote>
				<!-- /wp:quote -->

				<!-- wp:group {"style":{"spacing":{"margin":{"top":"var(--wp--preset--spacing--30)"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left","verticalAlignment":"center"}} -->
				<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--30)">
					<!-- wp:html -->
					<div class="cclee-avatar cclee-avatar--md">MJ</div>
					<!-- /wp:html -->
					<!-- wp:group {"layout":{"type":"flex","orientation":"vertical"}} -->
					<div class="wp-block-group">
						<!-- wp:heading {"level":5} -->
						<h5 class="wp-block-heading">Mike Johnson</h5>
						<!-- /wp:heading -->
						<!-- wp:paragraph {"textColor":"neutral-500","fontSize":"small"} -->
						<p class="has-neutral-500-color has-text-color has-small-font-size">Marketing Director</p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:group -->
				</div>
				<!-- /wp:group -->

			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--40)","right":"var(--wp--preset--spacing--40)","bottom":"var(--wp--preset--spacing--40)","left":"var(--wp--preset--spacing--40)"}},"border":{"radius":"12px"}},"backgroundColor":"base","className":"cclee-card","layout":{"type":"constrained"}} -->
			<div class="wp-block-group cclee-card has-base-background-color has-background" style="padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40);border-radius:12px">

				<!-- wp:html -->
				<div class="cclee-stars" style="margin-bottom:var(--wp--preset--spacing--20)"><?php echo str_repeat( cclee_svg( 'star' ), 5 ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>
				<!-- /wp:html -->

				<!-- wp:quote {"style":{"spacing":{"padding":{"left":"var(--wp--preset--spacing--30)"}},"border":{"left":{"color":"var:preset|color|accent","style":"solid","width":"4px"}}}} -->
				<blockquote class="wp-block-quote" style="border-left-color:var(--wp--preset--color--accent);border-left-style:solid;border-left-width:4px;padding-left:var(--wp--preset--spacing--30)">
					<!-- wp:paragraph -->
					<p>"The best investment we made for our online presence. Clean code and beautiful design out of the box."</p>
					<!-- /wp:paragraph -->
				</blockquote>
				<!-- /wp:quote -->

				<!-- wp:group {"style":{"spacing":{"margin":{"top":"var(--wp--preset--spacing--30)"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left","verticalAlignment":"center"}} -->
				<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--30)">
					<!-- wp:html -->
					<div class="cclee-avatar cclee-avatar--md">ED</div>
					<!-- /wp:html -->
					<!-- wp:group {"layout":{"type":"flex","orientation":"vertical"}} -->
					<div class="wp-block-group">
						<!-- wp:heading {"level":5} -->
						<h5 class="wp-block-heading">Emily Davis</h5>
						<!-- /wp:heading -->
						<!-- wp:paragraph {"textColor":"neutral-500","fontSize":"small"} -->
						<p class="has-neutral-500-color has-text-color has-small-font-size">Startup Founder</p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:group -->
				</div>
				<!-- /wp:group -->

			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</div>
<!-- /wp:group -->
