<?php
/**
 * Title: View Toggle
 * Slug: cclee/view-toggle
 * Categories: cclee, woocommerce
 * Description: Grid/List view toggle buttons for product archives
 *
 * @package cclee
 */

?>
<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group">

	<!-- wp:html -->
	<button data-view="grid" aria-label="Grid View" class="cclee-btn--reset has-primary-color">
		<?php echo cclee_svg( 'grid' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
	</button>
	<button data-view="list" aria-label="List View" class="cclee-btn--reset has-primary-color">
		<?php echo cclee_svg( 'list-toggle' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
	</button>
	<!-- /wp:html -->

</div>
<!-- /wp:group -->
