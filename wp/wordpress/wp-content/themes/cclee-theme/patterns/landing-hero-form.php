<?php
/**
 * Title: Landing Hero with Form
 * Slug: cclee-theme/landing-hero-form
 * Categories: cclee-theme, featured
 * Description: Hero 区块带侧边线索收集表单，适合高转化落地页
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--80)","bottom":"var(--wp--preset--spacing--80)"}}},"gradient":"hero-gradient","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-hero-gradient-gradient has-background" style="padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80)">

	<!-- wp:html -->
	<div class="cclee-dots-pattern" style="color:rgba(255,255,255,0.3)"></div>
	<!-- /wp:html -->

	<!-- wp:columns {"align":"wide","style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--40)"}}}} -->
	<div class="wp-block-columns alignwide" style="padding-top:var(--wp--preset--spacing--40)">

		<!-- wp:column {"width":"60%","style":{"spacing":{"padding":{"right":"var(--wp--preset--spacing--60)"}}}} -->
		<div class="wp-block-column" style="flex-basis:60%;padding-right:var(--wp--preset--spacing--60)">

			<!-- wp:paragraph {"textColor":"neutral-100","fontSize":"small","style":{"typography":{"fontWeight":"600","letterSpacing":"0.1em","textTransform":"uppercase"}}} -->
			<p class="has-neutral-100-color has-text-color has-small-font-size" style="font-weight:600;letter-spacing:0.1em;text-transform:uppercase">Limited Time Offer</p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"level":1,"textColor":"base","fontSize":"h1"} -->
			<h1 class="wp-block-heading has-base-color has-text-color" style="font-size:var(--wp--preset--font-size--h1)">Transform Your Business Today</h1>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"textColor":"neutral-200","fontSize":"large"} -->
			<p class="has-neutral-200-color has-text-color has-large-font-size">Get started with our proven solution and see results within 30 days.</p>
			<!-- /wp:paragraph -->

			<!-- wp:list {"textColor":"neutral-100","style":{"spacing":{"margin":{"top":"var(--wp--preset--spacing--40)","bottom":"var(--wp--preset--spacing--50)"}}}} -->
			<ul class="has-neutral-100-color has-text-color" style="margin-top:var(--wp--preset--spacing--40);margin-bottom:var(--wp--preset--spacing--50)">
				<li>Easy setup in under 5 minutes</li>
				<li>24/7 customer support</li>
				<li>30-day money-back guarantee</li>
			</ul>
			<!-- /wp:list -->

			<!-- wp:buttons -->
			<div class="wp-block-buttons">
				<!-- wp:button {"backgroundColor":"accent","textColor":"base","style":{"border":{"radius":"8px"}}} -->
				<div class="wp-block-button"><a class="wp-block-button__link has-base-color has-accent-background-color has-text-color has-background wp-element-button" style="border-radius:8px">Learn More</a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"40%"} -->
		<div class="wp-block-column" style="flex-basis:40%">

			<!-- wp:group {"style":{"border":{"radius":"12px"},"spacing":{"padding":{"top":"var(--wp--preset--spacing--50)","bottom":"var(--wp--preset--spacing--50)","left":"var(--wp--preset--spacing--40)","right":"var(--wp--preset--spacing--40)"}}},"backgroundColor":"base","layout":{"type":"constrained"}} -->
			<div class="wp-block-group has-base-background-color has-background" style="border-radius:12px;padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);box-shadow:0 25px 50px -12px rgba(0,0,0,0.25)">

				<!-- wp:heading {"textAlign":"center","level":3,"textColor":"primary","fontSize":"large"} -->
				<h3 class="wp-block-heading has-text-align-center has-primary-color has-text-color" style="font-size:var(--wp--preset--font-size--large)">Get Your Free Quote</h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"align":"center","textColor":"neutral-500","fontSize":"small","style":{"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--40)"}}}} -->
				<p class="has-text-align-center has-neutral-500-color has-text-color has-small-font-size" style="margin-bottom:var(--wp--preset--spacing--40)">Fill out the form below and we'll get back to you within 24 hours.</p>
				<!-- /wp:paragraph -->

				<!-- wp:html -->
				<form class="cclee-landing-form" action="#" method="post">
					<div style="margin-bottom:var(--wp--preset--spacing--30)">
						<label for="landing-name" style="display:block;margin-bottom:var(--wp--preset--spacing--10);color:var(--wp--preset--color--neutral-700);font-size:var(--wp--preset--font-size--small)">Name *</label>
						<input type="text" id="landing-name" name="name" required style="width:100%;padding:var(--wp--preset--spacing--20);border:1px solid var(--wp--preset--color--neutral-200);border-radius:6px;font-size:var(--wp--preset--font-size--medium)">
					</div>
					<div style="margin-bottom:var(--wp--preset--spacing--30)">
						<label for="landing-email" style="display:block;margin-bottom:var(--wp--preset--spacing--10);color:var(--wp--preset--color--neutral-700);font-size:var(--wp--preset--font-size--small)">Email *</label>
						<input type="email" id="landing-email" name="email" required style="width:100%;padding:var(--wp--preset--spacing--20);border:1px solid var(--wp--preset--color--neutral-200);border-radius:6px;font-size:var(--wp--preset--font-size--medium)">
					</div>
					<div style="margin-bottom:var(--wp--preset--spacing--30)">
						<label for="landing-phone" style="display:block;margin-bottom:var(--wp--preset--spacing--10);color:var(--wp--preset--color--neutral-700);font-size:var(--wp--preset--font-size--small)">Phone</label>
						<input type="tel" id="landing-phone" name="phone" style="width:100%;padding:var(--wp--preset--spacing--20);border:1px solid var(--wp--preset--color--neutral-200);border-radius:6px;font-size:var(--wp--preset--font-size--medium)">
					</div>
					<div style="margin-bottom:var(--wp--preset--spacing--40)">
						<label for="landing-message" style="display:block;margin-bottom:var(--wp--preset--spacing--10);color:var(--wp--preset--color--neutral-700);font-size:var(--wp--preset--font-size--small)">Message</label>
						<textarea id="landing-message" name="message" rows="3" style="width:100%;padding:var(--wp--preset--spacing--20);border:1px solid var(--wp--preset--color--neutral-200);border-radius:6px;font-size:var(--wp--preset--font-size--medium);resize:vertical"></textarea>
					</div>
					<button type="submit" style="width:100%;padding:var(--wp--preset--spacing--20) var(--wp--preset--spacing--40);background:var(--wp--preset--color--primary);color:var(--wp--preset--color--base);border:none;border-radius:8px;font-size:var(--wp--preset--font-size--medium);font-weight:600;cursor:pointer">Submit Request</button>
				</form>
				<!-- /wp:html -->

			</div>
			<!-- /wp:group -->

		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</div>
<!-- /wp:group -->
