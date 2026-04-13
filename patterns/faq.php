<?php
/**
 * Title: FAQ Section
 * Slug: cclee/faq
 * Categories: cclee, featured
 * Description: Accordion-style frequently asked questions
 *
 * @package cclee
 *
 * Note: wp:details block markup uses "radius":"8px" (border-radius-md) for card corners.
 *   WordPress block definition layer does not support CSS variable references in block attrs.
 *   The rendered inline style correctly uses var(--wp--custom--border--radius--md) via
 *   the block's saved HTML. Block-level radius is kept as 8px for block editor preview parity.
 */

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--70)","bottom":"var(--wp--preset--spacing--70)","left":"var(--wp--preset--spacing--50)","right":"var(--wp--preset--spacing--50)"}}},"backgroundColor":"neutral-50","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-neutral-50-background-color has-background" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70);padding-left:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50)">

	<!-- wp:heading {"textAlign":"center","textColor":"primary","fontSize":"heading-2"} -->
	<h2 class="wp-block-heading has-text-align-center has-primary-color has-text-color has-heading-2-font-size">Frequently Asked Questions</h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center","textColor":"neutral-500","style":{"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--50)"}}}} -->
	<p class="has-text-align-center has-neutral-500-color has-text-color" style="margin-bottom:var(--wp--preset--spacing--50)">Find answers to common questions about our services.</p>
	<!-- /wp:paragraph -->

	<!-- wp:group {"style":{"spacing":{"padding":{"right":"var(--wp--preset--spacing--40)","left":"var(--wp--preset--spacing--40)"}}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group" style="padding-right:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)">

		<!-- wp:details {"style":{"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--20)"}},"border":{"radius":"8px","width":"1px","style":"solid"}},"borderColor":"neutral-200","backgroundColor":"base"} -->
		<details class="wp-block-details has-border-color has-neutral-200-border-color has-base-background-color has-background" style="border-style:solid;border-width:1px;border-radius:var(--wp--custom--border--radius--md);margin-bottom:var(--wp--preset--spacing--20)">
			<summary><strong>What services do you offer?</strong></summary>
			<!-- wp:paragraph {"textColor":"neutral-500","style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--20)","bottom":"var(--wp--preset--spacing--20)"}}}} -->
			<p class="has-neutral-500-color has-text-color" style="padding-top:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20)">We provide comprehensive solutions tailored to your business needs, including consulting, implementation, and ongoing support.</p>
			<!-- /wp:paragraph -->
		</details>
		<!-- /wp:details -->

		<!-- wp:details {"style":{"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--20)"}},"border":{"radius":"8px","width":"1px","style":"solid"}},"borderColor":"neutral-200","backgroundColor":"base"} -->
		<details class="wp-block-details has-border-color has-neutral-200-border-color has-base-background-color has-background" style="border-style:solid;border-width:1px;border-radius:var(--wp--custom--border--radius--md);margin-bottom:var(--wp--preset--spacing--20)">
			<summary><strong>How long does a typical project take?</strong></summary>
			<!-- wp:paragraph {"textColor":"neutral-500","style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--20)","bottom":"var(--wp--preset--spacing--20)"}}}} -->
			<p class="has-neutral-500-color has-text-color" style="padding-top:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20)">Project timelines vary based on scope and complexity. Most projects are completed within 4-8 weeks, with clear milestones throughout.</p>
			<!-- /wp:paragraph -->
		</details>
		<!-- /wp:details -->

		<!-- wp:details {"style":{"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--20)"}},"border":{"radius":"8px","width":"1px","style":"solid"}},"borderColor":"neutral-200","backgroundColor":"base"} -->
		<details class="wp-block-details has-border-color has-neutral-200-border-color has-base-background-color has-background" style="border-style:solid;border-width:1px;border-radius:var(--wp--custom--border--radius--md);margin-bottom:var(--wp--preset--spacing--20)">
			<summary><strong>Do you offer ongoing support?</strong></summary>
			<!-- wp:paragraph {"textColor":"neutral-500","style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--20)","bottom":"var(--wp--preset--spacing--20)"}}}} -->
			<p class="has-neutral-500-color has-text-color" style="padding-top:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20)">Yes, we offer flexible support packages to ensure your continued success. Our team is available for maintenance, updates, and consultations.</p>
			<!-- /wp:paragraph -->
		</details>
		<!-- /wp:details -->

		<!-- wp:details {"style":{"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--20)"}},"border":{"radius":"8px","width":"1px","style":"solid"}},"borderColor":"neutral-200","backgroundColor":"base"} -->
		<details class="wp-block-details has-border-color has-neutral-200-border-color has-base-background-color has-background" style="border-style:solid;border-width:1px;border-radius:var(--wp--custom--border--radius--md);margin-bottom:var(--wp--preset--spacing--20)">
			<summary><strong>What is your pricing model?</strong></summary>
			<!-- wp:paragraph {"textColor":"neutral-500","style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--20)","bottom":"var(--wp--preset--spacing--20)"}}}} -->
			<p class="has-neutral-500-color has-text-color" style="padding-top:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20)">We offer transparent, project-based pricing with no hidden fees. Each quote is customized to your specific requirements and budget.</p>
			<!-- /wp:paragraph -->
		</details>
		<!-- /wp:details -->

		<!-- wp:details {"style":{"border":{"radius":"8px","width":"1px","style":"solid"}},"borderColor":"neutral-200","backgroundColor":"base"} -->
		<details class="wp-block-details has-border-color has-neutral-200-border-color has-base-background-color has-background" style="border-style:solid;border-width:1px;border-radius:var(--wp--custom--border--radius--md)">
			<summary><strong>How do I get started?</strong></summary>
			<!-- wp:paragraph {"textColor":"neutral-500","style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--20)","bottom":"var(--wp--preset--spacing--20)"}}}} -->
			<p class="has-neutral-500-color has-text-color" style="padding-top:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20)">Simply contact us through our form or email. We'll schedule a free consultation to discuss your needs and provide a tailored proposal.</p>
			<!-- /wp:paragraph -->
		</details>
		<!-- /wp:details -->

	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
