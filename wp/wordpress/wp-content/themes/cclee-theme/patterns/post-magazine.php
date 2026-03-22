<?php
/**
 * Title: Post Magazine Layout
 * Slug: cclee-theme/post-magazine
 * Categories: cclee-theme
 * Description: Magazine-style archive layout with featured post and grid
 * Keywords: archive, posts, magazine, featured, grid, blog
 */
?>
<!-- wp:query {"queryId":0,"query":{"perPage":7,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","inherit":true},"align":"wide"} -->
<div class="wp-block-query alignwide">

	<!-- wp:post-template -->

		<!-- wp:group {"style":{"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--60)"}}},"layout":{"type":"constrained"}} -->
		<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--60)">

			<!-- wp:columns {"style":{"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--60)"}}}} -->
			<div class="wp-block-columns" style="margin-bottom:var(--wp--preset--spacing--60)">

				<!-- wp:column {"width":"60%"} -->
				<div class="wp-block-column" style="flex-basis:60%">
					<!-- wp:group {"style":{"border":{"radius":"var(--wp--custom--border--radius--lg)","width":"1px"}},"borderColor":"neutral-200","layout":{"type":"constrained"}} -->
					<div class="wp-block-group has-border-color has-neutral-200-border-color" style="border-radius:var(--wp--custom--border--radius--lg);border-width:1px;overflow:hidden">

						<!-- wp:post-featured-image {"isLink":true,"aspectRatio":"16/9","style":{"border":{"radius":"0px"}}} /-->

						<!-- wp:group {"style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--40)","right":"var(--wp--preset--spacing--40)","bottom":"var(--wp--preset--spacing--40)","left":"var(--wp--preset--spacing--40)"}}},"layout":{"type":"constrained"}} -->
						<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)">

							<!-- wp:post-terms {"term":"category","textColor":"accent","fontSize":"small","style":{"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--20)"}}}} /-->

							<!-- wp:post-title {"isLink":true,"textColor":"primary","fontSize":"h3","style":{"typography":{"fontStyle":"normal","fontWeight":"600"}}} /-->

							<!-- wp:post-excerpt {"moreText":"Read more","showMoreOnNewLine":false,"textColor":"neutral-600"} /-->

							<!-- wp:group {"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"},"style":{"spacing":{"margin":{"top":"var(--wp--preset--spacing--30)"}}}} -->
							<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--30)">
								<!-- wp:post-author-name {"textColor":"neutral-500","fontSize":"small"} /-->
								<!-- wp:post-date {"textColor":"neutral-400","fontSize":"small"} /-->
							</div>
							<!-- /wp:group -->

						</div>
						<!-- /wp:group -->

					</div>
					<!-- /wp:group -->
				</div>
				<!-- /wp:column -->

				<!-- wp:column {"width":"40%","style":{"spacing":{"padding":{"left":"var(--wp--preset--spacing--40)"}}}} -->
				<div class="wp-block-column" style="flex-basis:40%;padding-left:var(--wp--preset--spacing--40)">

					<!-- wp:heading {"level":3,"textColor":"primary","style":{"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--30)"}}}} -->
					<h3 class="wp-block-heading has-primary-color has-text-color" style="margin-bottom:var(--wp--preset--spacing--30)">Latest Posts</h3>
					<!-- /wp:heading -->

					<!-- wp:group {"style":{"border":{"radius":"var(--wp--custom--border--radius--lg)","width":"1px"}},"borderColor":"neutral-200","layout":{"type":"constrained"}} -->
					<div class="wp-block-group has-border-color has-neutral-200-border-color" style="border-radius:var(--wp--custom--border--radius--lg);border-width:1px;overflow:hidden">

						<!-- wp:group {"style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--30)","right":"var(--wp--preset--spacing--30)","bottom":"var(--wp--preset--spacing--30)","left":"var(--wp--preset--spacing--30)}},"border":{"bottom":{"width":"1px"}}},"borderColor":"neutral-200","layout":{"type":"constrained"}} -->
						<div class="wp-block-group has-border-color has-neutral-200-border-color" style="border-bottom-width:1px;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">

							<!-- wp:post-title {"isLink":true,"level":4,"textColor":"primary","fontSize":"medium"} /-->

							<!-- wp:post-date {"textColor":"neutral-400","fontSize":"small"} /-->

						</div>
						<!-- /wp:group -->

						<!-- wp:group {"style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--30)","right":"var(--wp--preset--spacing--30)","bottom":"var(--wp--preset--spacing--30)","left":"var(--wp--preset--spacing--30)}},"border":{"bottom":{"width":"1px"}}},"borderColor":"neutral-200","layout":{"type":"constrained"}} -->
						<div class="wp-block-group has-border-color has-neutral-200-border-color" style="border-bottom-width:1px;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">

							<!-- wp:post-title {"isLink":true,"level":4,"textColor":"primary","fontSize":"medium"} /-->

							<!-- wp:post-date {"textColor":"neutral-400","fontSize":"small"} /-->

						</div>
						<!-- /wp:group -->

						<!-- wp:group {"style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--30)","right":"var(--wp--preset--spacing--30)","bottom":"var(--wp--preset--spacing--30)","left":"var(--wp--preset--spacing--30)}},"border":{"bottom":{"width":"1px"}}},"borderColor":"neutral-200","layout":{"type":"constrained"}} -->
						<div class="wp-block-group has-border-color has-neutral-200-border-color" style="border-bottom-width:1px;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">

							<!-- wp:post-title {"isLink":true,"level":4,"textColor":"primary","fontSize":"medium"} /-->

							<!-- wp:post-date {"textColor":"neutral-400","fontSize":"small"} /-->

						</div>
						<!-- /wp:group -->

						<!-- wp:group {"style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--30)","right":"var(--wp--preset--spacing--30)","bottom":"var(--wp--preset--spacing--30)","left":"var(--wp--preset--spacing--30)}}},"layout":{"type":"constrained"}} -->
						<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">

							<!-- wp:post-title {"isLink":true,"level":4,"textColor":"primary","fontSize":"medium"} /-->

							<!-- wp:post-date {"textColor":"neutral-400","fontSize":"small"} /-->

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

	<!-- /wp:post-template -->

	<!-- wp:heading {"level":3,"textColor":"primary","style":{"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--40)"}}}} -->
	<h3 class="wp-block-heading has-primary-color has-text-color" style="margin-bottom:var(--wp--preset--spacing--40)">More Articles</h3>
	<!-- /wp:heading -->

	<!-- wp:columns -->
	<div class="wp-block-columns">

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"style":{"border":{"radius":"var(--wp--custom--border--radius--lg)","width":"1px"}},"borderColor":"neutral-200","layout":{"type":"constrained"}} -->
			<div class="wp-block-group has-border-color has-neutral-200-border-color" style="border-radius:var(--wp--custom--border--radius--lg);border-width:1px;overflow:hidden">

				<!-- wp:post-featured-image {"isLink":true,"aspectRatio":"16/9","style":{"border":{"radius":"0px"}}} /-->

				<!-- wp:group {"style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--30)","right":"var(--wp--preset--spacing--30)","bottom":"var(--wp--preset--spacing--30)","left":"var(--wp--preset--spacing--30)"}}},"layout":{"type":"constrained"}} -->
				<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">

					<!-- wp:post-title {"isLink":true,"level":4,"textColor":"primary","fontSize":"medium"} /-->

					<!-- wp:post-date {"textColor":"neutral-400","fontSize":"small"} /-->

				</div>
				<!-- /wp:group -->

			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"style":{"border":{"radius":"var(--wp--custom--border--radius--lg)","width":"1px"}},"borderColor":"neutral-200","layout":{"type":"constrained"}} -->
			<div class="wp-block-group has-border-color has-neutral-200-border-color" style="border-radius:var(--wp--custom--border--radius--lg);border-width:1px;overflow:hidden">

				<!-- wp:post-featured-image {"isLink":true,"aspectRatio":"16/9","style":{"border":{"radius":"0px"}}} /-->

				<!-- wp:group {"style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--30)","right":"var(--wp--preset--spacing--30)","bottom":"var(--wp--preset--spacing--30)","left":"var(--wp--preset--spacing--30)"}}},"layout":{"type":"constrained"}} -->
				<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">

					<!-- wp:post-title {"isLink":true,"level":4,"textColor":"primary","fontSize":"medium"} /-->

					<!-- wp:post-date {"textColor":"neutral-400","fontSize":"small"} /-->

				</div>
				<!-- /wp:group -->

			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"style":{"border":{"radius":"var(--wp--custom--border--radius--lg)","width":"1px"}},"borderColor":"neutral-200","layout":{"type":"constrained"}} -->
			<div class="wp-block-group has-border-color has-neutral-200-border-color" style="border-radius:var(--wp--custom--border--radius--lg);border-width:1px;overflow:hidden">

				<!-- wp:post-featured-image {"isLink":true,"aspectRatio":"16/9","style":{"border":{"radius":"0px"}}} /-->

				<!-- wp:group {"style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--30)","right":"var(--wp--preset--spacing--30)","bottom":"var(--wp--preset--spacing--30)","left":"var(--wp--preset--spacing--30)"}}},"layout":{"type":"constrained"}} -->
				<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">

					<!-- wp:post-title {"isLink":true,"level":4,"textColor":"primary","fontSize":"medium"} /-->

					<!-- wp:post-date {"textColor":"neutral-400","fontSize":"small"} /-->

				</div>
				<!-- /wp:group -->

			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

	<!-- wp:query-pagination {"align":"center","style":{"spacing":{"margin":{"top":"var(--wp--preset--spacing--60)"}}}} -->
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
