<?php
/**
 * Title: View Toggle
 * Slug: cclee-theme/view-toggle
 * Categories: cclee-theme, woocommerce
 * Description: Grid/List view toggle buttons for product archives
 */
?>
<!-- wp:group {"className":"cclee-view-toggle","layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group cclee-view-toggle">

	<!-- wp:html -->
	<button class="cclee-view-toggle__btn" data-view="grid" aria-label="Grid View">
		<?php echo cclee_svg( 'grid' ); ?>
	</button>
	<button class="cclee-view-toggle__btn" data-view="list" aria-label="List View">
		<?php echo cclee_svg( 'list-toggle' ); ?>
	</button>
	<!-- /wp:html -->

</div>
<!-- /wp:group -->
