<?php
/**
 * Title: Features Grid
 * Slug: cclee-theme/features-grid
 * Categories: cclee-theme, featured
 * Description: 三列特性网格区块
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--70)","bottom":"var(--wp--preset--spacing--70)"}}},"backgroundColor":"contrast","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-contrast-background-color has-background" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">

	<!-- wp:heading {"textAlign":"center","textColor":"primary"} -->
	<h2 class="wp-block-heading has-text-align-center has-primary-color has-text-color">Everything You Need</h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center","textColor":"neutral-500","style":{"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--60)"}}}} -->
	<p class="has-text-align-center has-neutral-500-color has-text-color" style="margin-bottom:var(--wp--preset--spacing--60)">Powerful features to help you build amazing websites.</p>
	<!-- /wp:paragraph -->

	<!-- wp:columns {"style":{"spacing":{"margin":{"top":"var(--wp--preset--spacing--60)"}}},"className":"is-style-cards"} -->
	<div class="wp-block-columns is-style-cards" style="margin-top:var(--wp--preset--spacing--60)">

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--50)","right":"var(--wp--preset--spacing--40)","bottom":"var(--wp--preset--spacing--50)","left":"var(--wp--preset--spacing--40)"}},"border":{"radius":"12px","width":"1px","style":"solid"},"shadow":"0 4px 20px rgba(0,0,0,0.06)"},"borderColor":"neutral-200","backgroundColor":"base","layout":{"type":"constrained"}} -->
			<div class="wp-block-group has-border-color has-neutral-200-border-color has-base-background-color has-background" style="border-style:solid;border-width:1px;border-radius:12px;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--40);box-shadow:0 4px 20px rgba(0,0,0,0.06)">
				<!-- wp:html -->
				<div class="cclee-icon-box cclee-icon-box--accent" style="margin-bottom:var(--wp--preset--spacing--30);text-align:center"><?php echo cclee_svg( 'rocket' ); ?></div>
				<!-- /wp:html -->
				<!-- wp:heading {"textAlign":"center","level":4,"textColor":"primary"} -->
				<h4 class="wp-block-heading has-text-align-center has-primary-color has-text-color">Fast Performance</h4>
				<!-- /wp:heading -->
				<!-- wp:paragraph {"align":"center","textColor":"neutral-500"} -->
				<p class="has-text-align-center has-neutral-500-color has-text-color">Lightning-fast load times for the best user experience.</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--50)","right":"var(--wp--preset--spacing--40)","bottom":"var(--wp--preset--spacing--50)","left":"var(--wp--preset--spacing--40)"}},"border":{"radius":"12px","width":"1px","style":"solid"},"shadow":"0 4px 20px rgba(0,0,0,0.06)"},"borderColor":"neutral-200","backgroundColor":"base","layout":{"type":"constrained"}} -->
			<div class="wp-block-group has-border-color has-neutral-200-border-color has-base-background-color has-background" style="border-style:solid;border-width:1px;border-radius:12px;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--40);box-shadow:0 4px 20px rgba(0,0,0,0.06)">
				<!-- wp:html -->
				<div class="cclee-icon-box cclee-icon-box--accent" style="margin-bottom:var(--wp--preset--spacing--30);text-align:center"><?php echo cclee_svg( 'palette' ); ?></div>
				<!-- /wp:html -->
				<!-- wp:heading {"textAlign":"center","level":4,"textColor":"primary"} -->
				<h4 class="wp-block-heading has-text-align-center has-primary-color has-text-color">Flexible Design</h4>
				<!-- /wp:heading -->
				<!-- wp:paragraph {"align":"center","textColor":"neutral-500"} -->
				<p class="has-text-align-center has-neutral-500-color has-text-color">Customize every aspect to match your brand perfectly.</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--50)","right":"var(--wp--preset--spacing--40)","bottom":"var(--wp--preset--spacing--50)","left":"var(--wp--preset--spacing--40)"}},"border":{"radius":"12px","width":"1px","style":"solid"},"shadow":"0 4px 20px rgba(0,0,0,0.06)"},"borderColor":"neutral-200","backgroundColor":"base","layout":{"type":"constrained"}} -->
			<div class="wp-block-group has-border-color has-neutral-200-border-color has-base-background-color has-background" style="border-style:solid;border-width:1px;border-radius:12px;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--40);box-shadow:0 4px 20px rgba(0,0,0,0.06)">
				<!-- wp:html -->
				<div class="cclee-icon-box cclee-icon-box--accent" style="margin-bottom:var(--wp--preset--spacing--30);text-align:center"><?php echo cclee_svg( 'zap' ); ?></div>
				<!-- /wp:html -->
				<!-- wp:heading {"textAlign":"center","level":4,"textColor":"primary"} -->
				<h4 class="wp-block-heading has-text-align-center has-primary-color has-text-color">Easy to Use</h4>
				<!-- /wp:heading -->
				<!-- wp:paragraph {"align":"center","textColor":"neutral-500"} -->
				<p class="has-text-align-center has-neutral-500-color has-text-color">No coding required. Build beautiful sites with ease.</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</div>
<!-- /wp:group -->
