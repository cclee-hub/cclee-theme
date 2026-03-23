<?php
/**
 * Title: AI Content Block
 * Slug: cclee-theme/ai-content-block
 * Categories: cclee-theme, featured
 * Description: AI 辅助内容区块示例，展示如何集成 AI 生成内容
 */
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--50)","bottom":"var(--wp--preset--spacing--50)","left":"var(--wp--preset--spacing--50)","right":"var(--wp--preset--spacing--50)"}},"border":{"radius":"12px","width":"1px"}},"borderColor":"neutral-200","backgroundColor":"base","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-border-color has-neutral-200-border-color has-base-background-color has-background" style="border-width:1px;border-radius:12px;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50);box-shadow:0 4px 20px rgba(0,0,0,0.06)">

	<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left","verticalAlignment":"center"}} -->
	<div class="wp-block-group">
		<!-- wp:html -->
		<div class="cclee-icon-box cclee-icon-box--accent" style="width:48px;height:48px;margin-right:var(--wp--preset--spacing--30)">
			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 8V4H8"/><rect width="16" height="12" x="4" y="8" rx="2"/><path d="M2 14h2"/><path d="M20 14h2"/><path d="M15 13v2"/><path d="M9 13v2"/></svg>
		</div>
		<!-- /wp:html -->
		<!-- wp:heading {"level":3,"textColor":"primary"} -->
		<h3 class="wp-block-heading has-primary-color has-text-color">AI Writing Assistant</h3>
		<!-- /wp:heading -->
	</div>
	<!-- /wp:group -->

	<!-- wp:paragraph {"textColor":"neutral-500"} -->
	<p class="has-neutral-500-color has-text-color">Generate SEO-friendly content directly in your editor.</p>
	<!-- /wp:paragraph -->

	<!-- wp:separator {"className":"is-style-wide","backgroundColor":"neutral-200"} -->
	<hr class="wp-block-separator has-text-color has-neutral-200-color has-alpha-channel-opacity has-neutral-200-background-color has-background is-style-wide"/>
	<!-- /wp:separator -->

	<!-- wp:columns -->
	<div class="wp-block-columns">

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
			<div class="wp-block-group">
				<!-- wp:html -->
				<div class="cclee-icon" style="margin-right:var(--wp--preset--spacing--20)">
					<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--wp--preset--color--accent)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"/></svg>
				</div>
				<!-- /wp:html -->
				<!-- wp:heading {"level":5,"textColor":"primary"} -->
				<h5 class="wp-block-heading has-primary-color has-text-color">Paragraphs</h5>
				<!-- /wp:heading -->
			</div>
			<!-- /wp:group -->
			<!-- wp:paragraph {"textColor":"neutral-500","fontSize":"small"} -->
			<p class="has-neutral-500-color has-text-color has-small-font-size">Generate engaging paragraphs for any topic.</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
			<div class="wp-block-group">
				<!-- wp:html -->
				<div class="cclee-icon" style="margin-right:var(--wp--preset--spacing--20)">
					<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--wp--preset--color--accent)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 22h16a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v16a2 2 0 0 1-2 2Zm0 0a2 2 0 0 1-2-2v-9c0-1.1.9-2 2-2h2"/><path d="M18 14h-8"/><path d="M15 18h-5"/><path d="M10 6h8v4h-8V6Z"/></svg>
				</div>
				<!-- /wp:html -->
				<!-- wp:heading {"level":5,"textColor":"primary"} -->
				<h5 class="wp-block-heading has-primary-color has-text-color">Headlines</h5>
				<!-- /wp:heading -->
			</div>
			<!-- /wp:group -->
			<!-- wp:paragraph {"textColor":"neutral-500","fontSize":"small"} -->
			<p class="has-neutral-500-color has-text-color has-small-font-size">Create compelling titles and headings.</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
			<div class="wp-block-group">
				<!-- wp:html -->
				<div class="cclee-icon" style="margin-right:var(--wp--preset--spacing--20)">
					<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--wp--preset--color--accent)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 12H3"/><path d="M16 6H3"/><path d="M16 18H3"/><path d="M21 12h.01"/><path d="M21 6h.01"/><path d="M21 18h.01"/></svg>
				</div>
				<!-- /wp:html -->
				<!-- wp:heading {"level":5,"textColor":"primary"} -->
				<h5 class="wp-block-heading has-primary-color has-text-color">Lists</h5>
				<!-- /wp:heading -->
			</div>
			<!-- /wp:group -->
			<!-- wp:paragraph {"textColor":"neutral-500","fontSize":"small"} -->
			<p class="has-neutral-500-color has-text-color has-small-font-size">Generate structured lists and outlines.</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

	<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"var(--wp--preset--spacing--40)"}}}} -->
	<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--40)">
		<!-- wp:button {"backgroundColor":"accent","textColor":"base","style":{"border":{"radius":"8px"}}} -->
		<div class="wp-block-button"><a class="wp-block-button__link has-base-color has-accent-background-color has-text-color has-background wp-element-button" style="border-radius:8px">Open AI Sidebar</a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->

</div>
<!-- /wp:group -->
