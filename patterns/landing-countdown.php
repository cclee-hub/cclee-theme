<?php
/**
 * Title: Landing Countdown
 * Slug: cclee-theme/landing-countdown
 * Categories: cclee-theme, featured
 * Description: 限时优惠倒计时组件
 */
?>
<!-- wp:group {"align":"full","gradient":"accent-gradient","style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--70)","bottom":"var(--wp--preset--spacing--70)"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-accent-gradient-gradient has-background" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">

	<!-- wp:group {"align":"wide","layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
	<div class="wp-block-group alignwide">

		<!-- wp:paragraph {"textAlign":"center","textColor":"base","fontSize":"large","style":{"typography":{"fontWeight":"700"},"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--50)"}}}} -->
		<p class="has-text-align-center has-base-color has-text-color has-large-font-size" style="font-weight:700;margin-bottom:var(--wp--preset--spacing--50)">Limited Time Offer Ends In:</p>
		<!-- /wp:paragraph -->

		<!-- wp:group {"className":"landing-countdown","layout":{"type":"flex","justifyContent":"center"}} -->
		<div class="wp-block-group landing-countdown" style="display:flex;justify-content:center;gap:var(--wp--preset--spacing--30)">

			<!-- wp:group {"className":"landing-countdown-item","style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--30)","bottom":"var(--wp--preset--spacing--30)","left":"var(--wp--preset--spacing--40)","right":"var(--wp--preset--spacing--40)"}}},"backgroundColor":"base","layout":{"type":"flex","orientation":"vertical"}} -->
			<div class="wp-block-group landing-countdown-item has-base-background-color has-background" style="padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);border-radius:8px;box-shadow:0 4px 6px -1px rgba(0,0,0,0.1)">
				<!-- wp:paragraph {"className":"landing-countdown-number","textColor":"accent","style":{"typography":{"fontSize":"3rem","fontWeight":"700","lineHeight":"1"}}} -->
				<p class="landing-countdown-number has-accent-color has-text-color" style="font-size:3rem;font-weight:700;line-height:1" id="countdown-days">02</p>
				<!-- /wp:paragraph -->
				<!-- wp:paragraph {"textAlign":"center","textColor":"neutral-500","fontSize":"small","style":{"typography":{"textTransform":"uppercase","letterSpacing":"0.1em"}}} -->
				<p class="has-text-align-center has-neutral-500-color has-text-color has-small-font-size" style="text-transform:uppercase;letter-spacing:0.1em">Days</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"landing-countdown-item","style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--30)","bottom":"var(--wp--preset--spacing--30)","left":"var(--wp--preset--spacing--40)","right":"var(--wp--preset--spacing--40)"}}},"backgroundColor":"base","layout":{"type":"flex","orientation":"vertical"}} -->
			<div class="wp-block-group landing-countdown-item has-base-background-color has-background" style="padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);border-radius:8px;box-shadow:0 4px 6px -1px rgba(0,0,0,0.1)">
				<!-- wp:paragraph {"className":"landing-countdown-number","textColor":"accent","style":{"typography":{"fontSize":"3rem","fontWeight":"700","lineHeight":"1"}}} -->
				<p class="landing-countdown-number has-accent-color has-text-color" style="font-size:3rem;font-weight:700;line-height:1" id="countdown-hours">14</p>
				<!-- /wp:paragraph -->
				<!-- wp:paragraph {"textAlign":"center","textColor":"neutral-500","fontSize":"small","style":{"typography":{"textTransform":"uppercase","letterSpacing":"0.1em"}}} -->
				<p class="has-text-align-center has-neutral-500-color has-text-color has-small-font-size" style="text-transform:uppercase;letter-spacing:0.1em">Hours</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"landing-countdown-item","style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--30)","bottom":"var(--wp--preset--spacing--30)","left":"var(--wp--preset--spacing--40)","right":"var(--wp--preset--spacing--40)"}}},"backgroundColor":"base","layout":{"type":"flex","orientation":"vertical"}} -->
			<div class="wp-block-group landing-countdown-item has-base-background-color has-background" style="padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);border-radius:8px;box-shadow:0 4px 6px -1px rgba(0,0,0,0.1)">
				<!-- wp:paragraph {"className":"landing-countdown-number","textColor":"accent","style":{"typography":{"fontSize":"3rem","fontWeight":"700","lineHeight":"1"}}} -->
				<p class="landing-countdown-number has-accent-color has-text-color" style="font-size:3rem;font-weight:700;line-height:1" id="countdown-minutes">36</p>
				<!-- /wp:paragraph -->
				<!-- wp:paragraph {"textAlign":"center","textColor":"neutral-500","fontSize":"small","style":{"typography":{"textTransform":"uppercase","letterSpacing":"0.1em"}}} -->
				<p class="has-text-align-center has-neutral-500-color has-text-color has-small-font-size" style="text-transform:uppercase;letter-spacing:0.1em">Minutes</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"landing-countdown-item","style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--30)","bottom":"var(--wp--preset--spacing--30)","left":"var(--wp--preset--spacing--40)","right":"var(--wp--preset--spacing--40)"}}},"backgroundColor":"base","layout":{"type":"flex","orientation":"vertical"}} -->
			<div class="wp-block-group landing-countdown-item has-base-background-color has-background" style="padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);border-radius:8px;box-shadow:0 4px 6px -1px rgba(0,0,0,0.1)">
				<!-- wp:paragraph {"className":"landing-countdown-number","textColor":"accent","style":{"typography":{"fontSize":"3rem","fontWeight":"700","lineHeight":"1"}}} -->
				<p class="landing-countdown-number has-accent-color has-text-color" style="font-size:3rem;font-weight:700;line-height:1" id="countdown-seconds">52</p>
				<!-- /wp:paragraph -->
				<!-- wp:paragraph {"textAlign":"center","textColor":"neutral-500","fontSize":"small","style":{"typography":{"textTransform":"uppercase","letterSpacing":"0.1em"}}} -->
				<p class="has-text-align-center has-neutral-500-color has-text-color has-small-font-size" style="text-transform:uppercase;letter-spacing:0.1em">Seconds</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

		</div>
		<!-- /wp:group -->

		<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"var(--wp--preset--spacing--50)"}}}} -->
		<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--50)">
			<!-- wp:button {"backgroundColor":"base","textColor":"accent","style":{"border":{"radius":"8px"}}} -->
			<div class="wp-block-button"><a class="wp-block-button__link has-accent-color has-base-background-color has-text-color has-background wp-element-button" style="border-radius:8px">Claim Offer Now</a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->

		<!-- wp:html -->
		<script>
		(function() {
			var targetDate = new Date();
			targetDate.setDate(targetDate.getDate() + 7);

			function updateCountdown() {
				var now = new Date();
				var diff = targetDate - now;

				if (diff <= 0) {
					document.getElementById('countdown-days').textContent = '00';
					document.getElementById('countdown-hours').textContent = '00';
					document.getElementById('countdown-minutes').textContent = '00';
					document.getElementById('countdown-seconds').textContent = '00';
					return;
				}

				var days = Math.floor(diff / (1000 * 60 * 60 * 24));
				var hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
				var minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
				var seconds = Math.floor((diff % (1000 * 60)) / 1000);

				document.getElementById('countdown-days').textContent = String(days).padStart(2, '0');
				document.getElementById('countdown-hours').textContent = String(hours).padStart(2, '0');
				document.getElementById('countdown-minutes').textContent = String(minutes).padStart(2, '0');
				document.getElementById('countdown-seconds').textContent = String(seconds).padStart(2, '0');
			}

			updateCountdown();
			setInterval(updateCountdown, 1000);
		})();
		</script>
		<!-- /wp:html -->

	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
