<?php
/**
 * Title: Product Categories Woo
 * Slug: cclee/product-categories-woo
 * Categories: cclee
 * Description: Dynamic product category grid fetched from WooCommerce
 *
 * @package cclee
 */

$categories = get_terms(
	'product_cat',
	array(
		'number'     => 6,
		'hide_empty' => true,
		'orderby'    => 'count',
		'order'      => 'DESC',
	)
);
?>

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--70)","bottom":"var(--wp--preset--spacing--70)"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">

	<!-- wp:heading {"textAlign":"center","textColor":"primary","fontSize":"heading-2"} -->
	<h2 class="wp-block-heading has-text-align-center has-primary-color has-text-color has-heading-2-font-size"><?php esc_html_e( 'Product Categories', 'cclee' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center","textColor":"neutral-500","style":{"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--60)"}}}} -->
	<p class="has-text-align-center has-neutral-500-color has-text-color" style="margin-bottom:var(--wp--preset--spacing--60)"><?php esc_html_e( 'Explore our full range of products and solutions.', 'cclee' ); ?></p>
	<!-- /wp:paragraph -->

	<?php if ( ! empty( $categories ) && ! is_wp_error( $categories ) ) : ?>
	<!-- wp:columns {"style":{"spacing":{"blockGap":"var(--wp--preset--spacing--40)"}}} -->
	<div class="wp-block-columns" style="gap:var(--wp--preset--spacing--40)">

		<?php foreach ( $categories as $category ) : ?>
			<?php
			$thumbnail_id = get_term_meta( $category->term_id, 'thumbnail_id', true );
			$image_url    = $thumbnail_id ? wp_get_attachment_image_url( $thumbnail_id, 'medium' ) : '';
			$link         = get_term_link( $category );
			if ( is_wp_error( $link ) ) {
				continue;
			}
			?>
			<!-- wp:column {"width":"33.33%","layout":{"type":"constrained"}} -->
			<div class="wp-block-column cclee-col--33">
				<!-- wp:group {"style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}},"border":{"radius":"8px","width":"1px","style":"solid"}},"borderColor":"neutral-200","backgroundColor":"base","layout":{"type":"constrained"}} -->
				<div class="wp-block-group is-style-product-card has-border-color has-neutral-200-border-color has-base-background-color has-background">
					<?php if ( $image_url ) : ?>
					<!-- wp:image {"style":{"border":{"radius":"var(--wp--custom--border--radius--md)"}}} -->
					<figure class="wp-block-image" style="border-radius:var(--wp--custom--border--radius--md)">
						<img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $category->name ); ?>"/>
					</figure>
					<!-- /wp:image -->
					<?php endif; ?>
					<!-- wp:group {"style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--30)","right":"var(--wp--preset--spacing--30)","bottom":"var(--wp--preset--spacing--30)","left":"var(--wp--preset--spacing--30)"}}},"layout":{"type":"constrained"}} -->
					<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
						<!-- wp:heading {"level":3,"textColor":"primary","fontSize":"heading-4","style":{"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--20)"}}}} -->
						<h3 class="wp-block-heading has-primary-color has-text-color has-heading-4-font-size" style="margin-bottom:var(--wp--preset--spacing--20)"><?php echo esc_html( $category->name ); ?></h3>
						<!-- /wp:heading -->
					</div>
					<!-- /wp:group -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->
		<?php endforeach; ?>

	</div>
	<!-- /wp:columns -->
	<?php endif; ?>

	<!-- wp:buttons {"layout":{"type":"constrained","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"var(--wp--preset--spacing--50)"}}}} -->
	<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--50)">
		<!-- wp:button {"backgroundColor":"accent","textColor":"base","fontSize":"small","style":{"border":{"radius":"var(--wp--custom--border--radius--md)"}}} -->
		<div class="wp-block-button has-small-font-size"><a class="wp-block-button__link has-base-color has-accent-background-color has-text-color has-background has-small-font-size has-custom-font-size wp-element-button" style="border-radius:var(--wp--custom--border--radius--md)"><?php esc_html_e( 'Browse All Products', 'cclee' ); ?></a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->

</div>
<!-- /wp:group -->
