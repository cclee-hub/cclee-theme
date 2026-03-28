<?php
/**
 * Title: Testimonials
 * Slug: cclee-theme/testimonial
 * Categories: cclee-theme, featured
 * Description: 客户评价区块，三列卡片布局
 */
?>
<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--70)","bottom":"var(--wp--preset--spacing--70)"}}},"backgroundColor":"neutral-100","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide has-neutral-100-background-color has-background" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">

	<!-- wp:heading {"textAlign":"center","textColor":"primary"} -->
	<h2 class="wp-block-heading has-text-align-center has-primary-color has-text-color">What Our Users Say</h2>
	<!-- /wp:heading -->

	<!-- wp:columns {"style":{"spacing":{"margin":{"top":"var(--wp--preset--spacing--50)"}}}} -->
	<div class="wp-block-columns" style="margin-top:var(--wp--preset--spacing--50)">

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--40)","right":"var(--wp--preset--spacing--40)","bottom":"var(--wp--preset--spacing--40)","left":"var(--wp--preset--spacing--40)"}},"border":{"radius":"12px"}},"backgroundColor":"base","layout":{"type":"constrained"}} -->
			<div class="wp-block-group has-base-background-color has-background" style="padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40);border-radius:12px">

				<!-- wp:html -->
				<div class="cclee-stars" style="margin-bottom:var(--wp--preset--spacing--20)"><?php echo str_repeat( cclee_svg( 'star' ), 5 ); ?></div>
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
					<!-- wp:image {"url":"<?php echo esc_url( get_theme_file_uri( 'assets/images/avatar-placeholder.svg' ) ); ?>","alt":"Sarah Chen avatar","sizeSlug":"full","linkDestination":"none","className":"cclee-avatar cclee-avatar--md","style":{"border":{"radius":"50px"}}} -->
					<figure class="wp-block-image size-full has-custom-border cclee-avatar cclee-avatar--md"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/avatar-placeholder.svg' ) ); ?>" alt="Sarah Chen avatar" style="border-radius:50px"/></figure>
					<!-- /wp:image -->
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
			<!-- wp:group {"style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--40)","right":"var(--wp--preset--spacing--40)","bottom":"var(--wp--preset--spacing--40)","left":"var(--wp--preset--spacing--40)"}},"border":{"radius":"12px"}},"backgroundColor":"base","layout":{"type":"constrained"}} -->
			<div class="wp-block-group has-base-background-color has-background" style="padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40);border-radius:12px">

				<!-- wp:html -->
				<div class="cclee-stars" style="margin-bottom:var(--wp--preset--spacing--20)"><?php echo str_repeat( cclee_svg( 'star' ), 5 ); ?></div>
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
					<!-- wp:image {"url":"<?php echo esc_url( get_theme_file_uri( 'assets/images/avatar-placeholder.svg' ) ); ?>","alt":"Mike Johnson avatar","sizeSlug":"full","linkDestination":"none","className":"cclee-avatar cclee-avatar--md","style":{"border":{"radius":"50px"}}} -->
					<figure class="wp-block-image size-full has-custom-border cclee-avatar cclee-avatar--md"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/avatar-placeholder.svg' ) ); ?>" alt="Mike Johnson avatar" style="border-radius:50px"/></figure>
					<!-- /wp:image -->
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
			<!-- wp:group {"style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--40)","right":"var(--wp--preset--spacing--40)","bottom":"var(--wp--preset--spacing--40)","left":"var(--wp--preset--spacing--40)"}},"border":{"radius":"12px"}},"backgroundColor":"base","layout":{"type":"constrained"}} -->
			<div class="wp-block-group has-base-background-color has-background" style="padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40);border-radius:12px">

				<!-- wp:html -->
				<div class="cclee-stars" style="margin-bottom:var(--wp--preset--spacing--20)"><?php echo str_repeat( cclee_svg( 'star' ), 5 ); ?></div>
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
					<!-- wp:image {"url":"<?php echo esc_url( get_theme_file_uri( 'assets/images/avatar-placeholder.svg' ) ); ?>","alt":"Emily Davis avatar","sizeSlug":"full","linkDestination":"none","className":"cclee-avatar cclee-avatar--md","style":{"border":{"radius":"50px"}}} -->
					<figure class="wp-block-image size-full has-custom-border cclee-avatar cclee-avatar--md"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/avatar-placeholder.svg' ) ); ?>" alt="Emily Davis avatar" style="border-radius:50px"/></figure>
					<!-- /wp:image -->
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
