<?php
/**
 * Title: Team Members
 * Slug: cclee-theme/team
 * Categories: cclee-theme, featured
 * Description: 团队成员展示区块，四列卡片布局
 */
?>
<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--70)","bottom":"var(--wp--preset--spacing--70)"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">

	<!-- wp:heading {"textAlign":"center","textColor":"primary"} -->
	<h2 class="wp-block-heading has-text-align-center has-primary-color has-text-color">Meet the Team</h2>
	<!-- /wp:heading -->

	<!-- wp:columns {"style":{"spacing":{"margin":{"top":"var(--wp--preset--spacing--50)"}}}} -->
	<div class="wp-block-columns" style="margin-top:var(--wp--preset--spacing--50)">

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
			<div class="wp-block-group">

				<!-- wp:image {"url":"<?php echo esc_url( get_theme_file_uri( 'assets/images/avatar-placeholder.svg' ) ); ?>","alt":"Alex Morgan avatar","sizeSlug":"full","linkDestination":"none","className":"cclee-avatar cclee-avatar--lg cclee-avatar--ring","style":{"border":{"radius":"50px"}}} -->
				<figure class="wp-block-image size-full has-custom-border cclee-avatar cclee-avatar--lg cclee-avatar--ring"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/avatar-placeholder.svg' ) ); ?>" alt="Alex Morgan avatar" style="border-radius:50px"/></figure>
				<!-- /wp:image -->

				<!-- wp:heading {"textAlign":"center","level":4,"style":{"spacing":{"margin":{"top":"var(--wp--preset--spacing--20)"}}}} -->
				<h4 class="wp-block-heading has-text-align-center" style="margin-top:var(--wp--preset--spacing--20)">Alex Morgan</h4>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"align":"center","textColor":"secondary","fontSize":"small"} -->
				<p class="has-text-align-center has-secondary-color has-text-color has-small-font-size">CEO &amp; Founder</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"align":"center","textColor":"neutral-500","fontSize":"small"} -->
				<p class="has-text-align-center has-neutral-500-color has-text-color has-small-font-size">Visionary leader with 15+ years of industry experience.</p>
				<!-- /wp:paragraph -->

				<!-- wp:html -->
				<div class="cclee-social-links" style="margin-top:var(--wp--preset--spacing--20);display:flex;gap:8px;justify-content:center">
					<a href="#" class="cclee-social-link" aria-label="LinkedIn"><?php echo cclee_svg( 'external-link' ); ?></a>
				</div>
				<!-- /wp:html -->

			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
			<div class="wp-block-group">

				<!-- wp:image {"url":"<?php echo esc_url( get_theme_file_uri( 'assets/images/avatar-placeholder.svg' ) ); ?>","alt":"Jordan Lee avatar","sizeSlug":"full","linkDestination":"none","className":"cclee-avatar cclee-avatar--lg cclee-avatar--ring","style":{"border":{"radius":"50px"}}} -->
				<figure class="wp-block-image size-full has-custom-border cclee-avatar cclee-avatar--lg cclee-avatar--ring"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/avatar-placeholder.svg' ) ); ?>" alt="Jordan Lee avatar" style="border-radius:50px"/></figure>
				<!-- /wp:image -->

				<!-- wp:heading {"textAlign":"center","level":4,"style":{"spacing":{"margin":{"top":"var(--wp--preset--spacing--20)"}}}} -->
				<h4 class="wp-block-heading has-text-align-center" style="margin-top:var(--wp--preset--spacing--20)">Jordan Lee</h4>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"align":"center","textColor":"secondary","fontSize":"small"} -->
				<p class="has-text-align-center has-secondary-color has-text-color has-small-font-size">CTO</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"align":"center","textColor":"neutral-500","fontSize":"small"} -->
				<p class="has-text-align-center has-neutral-500-color has-text-color has-small-font-size">Tech innovator driving our product development forward.</p>
				<!-- /wp:paragraph -->

				<!-- wp:html -->
				<div class="cclee-social-links" style="margin-top:var(--wp--preset--spacing--20);display:flex;gap:8px;justify-content:center">
					<a href="#" class="cclee-social-link" aria-label="LinkedIn"><?php echo cclee_svg( 'external-link' ); ?></a>
				</div>
				<!-- /wp:html -->

			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
			<div class="wp-block-group">

				<!-- wp:image {"url":"<?php echo esc_url( get_theme_file_uri( 'assets/images/avatar-placeholder.svg' ) ); ?>","alt":"Sam Taylor avatar","sizeSlug":"full","linkDestination":"none","className":"cclee-avatar cclee-avatar--lg cclee-avatar--ring","style":{"border":{"radius":"50px"}}} -->
				<figure class="wp-block-image size-full has-custom-border cclee-avatar cclee-avatar--lg cclee-avatar--ring"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/avatar-placeholder.svg' ) ); ?>" alt="Sam Taylor avatar" style="border-radius:50px"/></figure>
				<!-- /wp:image -->

				<!-- wp:heading {"textAlign":"center","level":4,"style":{"spacing":{"margin":{"top":"var(--wp--preset--spacing--20)"}}}} -->
				<h4 class="wp-block-heading has-text-align-center" style="margin-top:var(--wp--preset--spacing--20)">Sam Taylor</h4>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"align":"center","textColor":"secondary","fontSize":"small"} -->
				<p class="has-text-align-center has-secondary-color has-text-color has-small-font-size">Design Lead</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"align":"center","textColor":"neutral-500","fontSize":"small"} -->
				<p class="has-text-align-center has-neutral-500-color has-text-color has-small-font-size">Creative mind behind our brand and user experience.</p>
				<!-- /wp:paragraph -->

				<!-- wp:html -->
				<div class="cclee-social-links" style="margin-top:var(--wp--preset--spacing--20);display:flex;gap:8px;justify-content:center">
					<a href="#" class="cclee-social-link" aria-label="LinkedIn"><?php echo cclee_svg( 'external-link' ); ?></a>
				</div>
				<!-- /wp:html -->

			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
			<div class="wp-block-group">

				<!-- wp:image {"url":"<?php echo esc_url( get_theme_file_uri( 'assets/images/avatar-placeholder.svg' ) ); ?>","alt":"Casey Kim avatar","sizeSlug":"full","linkDestination":"none","className":"cclee-avatar cclee-avatar--lg cclee-avatar--ring","style":{"border":{"radius":"50px"}}} -->
				<figure class="wp-block-image size-full has-custom-border cclee-avatar cclee-avatar--lg cclee-avatar--ring"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/avatar-placeholder.svg' ) ); ?>" alt="Casey Kim avatar" style="border-radius:50px"/></figure>
				<!-- /wp:image -->

				<!-- wp:heading {"textAlign":"center","level":4,"style":{"spacing":{"margin":{"top":"var(--wp--preset--spacing--20)"}}}} -->
				<h4 class="wp-block-heading has-text-align-center" style="margin-top:var(--wp--preset--spacing--20)">Casey Kim</h4>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"align":"center","textColor":"secondary","fontSize":"small"} -->
				<p class="has-text-align-center has-secondary-color has-text-color has-small-font-size">Marketing Director</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"align":"center","textColor":"neutral-500","fontSize":"small"} -->
				<p class="has-text-align-center has-neutral-500-color has-text-color has-small-font-size">Strategic thinker growing our market presence globally.</p>
				<!-- /wp:paragraph -->

				<!-- wp:html -->
				<div class="cclee-social-links" style="margin-top:var(--wp--preset--spacing--20);display:flex;gap:8px;justify-content:center">
					<a href="#" class="cclee-social-link" aria-label="LinkedIn"><?php echo cclee_svg( 'external-link' ); ?></a>
				</div>
				<!-- /wp:html -->

			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</div>
<!-- /wp:group -->
