<?php
/**
 * Title: AI Content Block
 * Slug: cclee-theme/ai-content-block
 * Categories: cclee-theme, featured
 * Description: AI 辅助内容区块示例，展示如何集成 AI 生成内容
 */
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50","right":"var:preset|spacing|50"}},"border":{"radius":"8px","width":"1px"}},"borderColor":"neutral-200","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-border-color has-neutral-200-border-color" style="border-radius:8px;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)">

	<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left","verticalAlignment":"center"}} -->
	<div class="wp-block-group">
		<!-- wp:paragraph {"fontSize":"xx-large"} -->
		<p class="has-xx-large-font-size">🤖</p>
		<!-- /wp:paragraph -->
		<!-- wp:heading {"level":3,"textColor":"primary"} -->
		<h3 class="wp-block-heading has-primary-color has-text-color">AI Writing Assistant</h3>
		<!-- /wp:heading -->
	</div>
	<!-- /wp:group -->

	<!-- wp:paragraph {"textColor":"neutral-500"} -->
	<p class="has-neutral-500-color has-text-color">Generate SEO-friendly content directly in your editor.</p>
	<!-- /wp:paragraph -->

	<!-- wp:separator {"className":"is-style-wide"} -->
	<hr class="wp-block-separator has-alpha-channel-opacity is-style-wide"/>
	<!-- /wp:separator -->

	<!-- wp:columns -->
	<div class="wp-block-columns">

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:heading {"level":5} -->
			<h5 class="wp-block-heading">✍️ Paragraphs</h5>
			<!-- /wp:heading -->
			<!-- wp:paragraph {"textColor":"neutral-500","fontSize":"small"} -->
			<p class="has-neutral-500-color has-text-color has-small-font-size">Generate engaging paragraphs for any topic.</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:heading {"level":5} -->
			<h5 class="wp-block-heading">📰 Headlines</h5>
			<!-- /wp:heading -->
			<!-- wp:paragraph {"textColor":"neutral-500","fontSize":"small"} -->
			<p class="has-neutral-500-color has-text-color has-small-font-size">Create compelling titles and headings.</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:heading {"level":5} -->
			<h5 class="wp-block-heading">📋 Lists</h5>
			<!-- /wp:heading -->
			<!-- wp:paragraph {"textColor":"neutral-500","fontSize":"small"} -->
			<p class="has-neutral-500-color has-text-color has-small-font-size">Generate structured lists and outlines.</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

	<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|30"}}}} -->
	<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--30)">
		<!-- wp:button {"backgroundColor":"accent","textColor":"base"} -->
		<div class="wp-block-button"><a class="wp-block-button__link has-base-color has-accent-background-color has-text-color has-background wp-element-button">Open AI Sidebar</a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->

</div>
<!-- /wp:group -->
