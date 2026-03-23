<?php
/**
 * Title: Post List Layout
 * Slug: cclee-theme/post-list
 * Categories: cclee-theme
 * Description: List-style post archive layout with left thumbnail and right content
 * Keywords: archive, posts, list, blog
 */
?>
<!-- wp:query {"queryId":0,"query":{"perPage":10,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","inherit":true},"displayLayout":{"type":"list"},"align":"wide"} -->
<div class="wp-block-query alignwide">

	<!-- wp:post-template -->
		<!-- wp:group {"style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--40)","right":"var(--wp--preset--spacing--40)","bottom":"var(--wp--preset--spacing--40)","left":"var(--wp--preset--spacing--40)"},"margin":{"bottom":"var(--wp--preset--spacing--40)"}},"border":{"radius":"var(--wp--custom--border--radius--lg)","width":"1px"}},"borderColor":"neutral-200","layout":{"type":"constrained"}} -->
		<div class="wp-block-group has-border-color has-neutral-200-border-color" style="border-radius:var(--wp--custom--border--radius--lg);border-width:1px;padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40);margin-bottom:var(--wp--preset--spacing--40)">

			<!-- wp:columns {"verticalAlignment":"center"} -->
			<div class="wp-block-columns is-vertically-aligned-center">

				<!-- wp:column {"width":"240px"} -->
				<div class="wp-block-column" style="flex-basis:240px">
					<!-- wp:post-featured-image {"isLink":true,"aspectRatio":"4/3","style":{"border":{"radius":"var(--wp--custom--border--radius--md)"}}} /-->
				</div>
				<!-- /wp:column -->

				<!-- wp:column {"verticalAlignment":"center"} -->
				<div class="wp-block-column is-vertically-aligned-center">
					<!-- wp:group {"layout":{"type":"constrained"}} -->
					<div class="wp-block-group">

						<!-- wp:post-title {"isLink":true,"textColor":"primary","fontSize":"x-large","style":{"typography":{"fontStyle":"normal","fontWeight":"600"}}} /-->

						<!-- wp:group {"style":{"spacing":{"margin":{"top":"var(--wp--preset--spacing--20)","bottom":"var(--wp--preset--spacing--20)"}}},"layout":{"type":"flex","flexWrap":"wrap"}} -->
						<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--20);margin-bottom:var(--wp--preset--spacing--20)">
							<!-- wp:post-date {"textColor":"neutral-500","fontSize":"small"} /-->
							<!-- wp:paragraph {"textColor":"neutral-400","fontSize":"small"} -->
							<p class="has-neutral-400-color has-text-color has-small-font-size">|</p>
							<!-- /wp:paragraph -->
							<!-- wp:post-author-name {"textColor":"neutral-500","fontSize":"small"} /-->
						</div>
						<!-- /wp:group -->

						<!-- wp:post-excerpt {"moreText":"Read more","showMoreOnNewLine":false,"textColor":"neutral-600"} /-->

						<!-- wp:post-terms {"term":"category","textColor":"accent","fontSize":"small"} /-->

					</div>
					<!-- /wp:group -->
				</div>
				<!-- /wp:column -->

			</div>
			<!-- /wp:columns -->

		</div>
		<!-- /wp:group -->
	<!-- /wp:post-template -->

	<!-- wp:query-pagination {"align":"center","style":{"spacing":{"margin":{"top":"var(--wp--preset--spacing--50)"}}}} -->
		<!-- wp:query-pagination-previous /-->
		<!-- wp:query-pagination-numbers /-->
		<!-- wp:query-pagination-next /-->
	<!-- /wp:query-pagination -->

	<!-- wp:query-no-results -->
		<!-- wp:paragraph {"align":"center","textColor":"neutral-500"} -->
		<p class="has-text-align-center has-neutral-500-color has-text-color">No posts found.</p>
		<!-- /wp:paragraph -->
	<!-- /wp:query-no-results -->

</div>
<!-- /wp:query -->
