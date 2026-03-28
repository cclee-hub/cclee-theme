<?php
/**
 * Title: Footer Columns
 * Slug: cclee-theme/footer-columns
 * Categories: cclee-theme, footer
 * Description: 四列页脚区块
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--70)","bottom":"var(--wp--preset--spacing--70)"}}},"backgroundColor":"surface","textColor":"base","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-surface-background-color has-background has-base-color has-text-color" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">

	<!-- wp:columns -->
	<div class="wp-block-columns">

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:site-title {"level":0,"isLink":false} /-->
			<!-- wp:paragraph {"textColor":"neutral-500"} -->
			<p class="has-neutral-500-color has-text-color">Building beautiful websites with modern design principles and powerful features.</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:heading {"level":5} -->
			<h5 class="wp-block-heading">Product</h5>
			<!-- /wp:heading -->
			<!-- wp:list -->
			<ul>
				<li><a href="#">Features</a></li>
				<li><a href="#">Pricing</a></li>
				<li><a href="#">Integrations</a></li>
				<li><a href="#">Changelog</a></li>
			</ul>
			<!-- /wp:list -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:heading {"level":5} -->
			<h5 class="wp-block-heading">Company</h5>
			<!-- /wp:heading -->
			<!-- wp:list -->
			<ul>
				<li><a href="#">About</a></li>
				<li><a href="#">Blog</a></li>
				<li><a href="#">Careers</a></li>
				<li><a href="#">Contact</a></li>
			</ul>
			<!-- /wp:list -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:heading {"level":5} -->
			<h5 class="wp-block-heading">Newsletter</h5>
			<!-- /wp:heading -->
			<!-- wp:paragraph {"textColor":"neutral-500","fontSize":"small"} -->
			<p class="has-neutral-500-color has-text-color has-small-font-size">Stay updated with our latest news and updates.</p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph {"textColor":"neutral-500","fontSize":"small","style":{"typography":{"fontStyle":"italic"}}} -->
			<p class="has-neutral-500-color has-text-color has-small-font-size" style="font-style:italic">Newsletter input placeholder</p>
			<!-- /wp:paragraph -->
			<!-- wp:buttons -->
			<div class="wp-block-buttons">
				<!-- wp:button {"backgroundColor":"accent","textColor":"base","size":"small"} -->
				<div class="wp-block-button has-small-font-size"><a class="wp-block-button__link has-base-color has-accent-background-color has-text-color has-background wp-element-button">Subscribe</a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</div>
<!-- /wp:group -->
