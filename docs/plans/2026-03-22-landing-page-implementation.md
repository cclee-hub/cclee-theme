# Landing Page 模块实施计划

> **For Claude:** REQUIRED SUB-SKILL: Use superpowers:executing-plans to implement this plan task-by-task.

**Goal:** 为 cclee-theme 添加 Landing Page 模板和 4 个配套 Patterns，支持高转化率投放页场景。

**Architecture:** FSE 原生实现，模板不引用 template-part，Patterns 使用 theme.json design tokens，样式扩展写入 custom.css。

**Tech Stack:** WordPress 6.4+ FSE, PHP 8.0+, theme.json design tokens

---

## Task 1: 创建 Landing Page 模板

**Files:**
- Create: `wp/wordpress/wp-content/themes/cclee-theme/templates/page-landing.html`

**Step 1: 创建模板文件**

```html
<!-- wp:group {"align":"full","className":"landing-nav","style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--30)","bottom":"var(--wp--preset--spacing--30)","left":"var(--wp--preset--spacing--50)","right":"var(--wp--preset--spacing--50)"}}},"layout":{"type":"flex","justifyContent":"space-between","flexWrap":"wrap"}} -->
<div class="wp-block-group alignfull landing-nav" style="padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50)">

	<!-- wp:site-logo {"width":100} /-->

	<!-- wp:paragraph {"className":"landing-exit-link","fontSize":"small"} -->
	<p class="landing-exit-link has-small-font-size"><a href="/">返回主站</a></p>
	<!-- /wp:paragraph -->

</div>
<!-- /wp:group -->

<!-- wp:group {"tagName":"main","anchor":"main","align":"full","style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--60)","bottom":"var(--wp--preset--spacing--80)"}}},"layout":{"type":"constrained","wideSize":"1200px"}} -->
<main class="wp-block-group alignfull" id="main" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--80)">

	<!-- wp:post-content {"layout":{"type":"constrained"}} /-->

</main>
<!-- /wp:group -->

<!-- wp:group {"align":"full","className":"landing-footer","backgroundColor":"neutral-50","style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--40)","bottom":"var(--wp--preset--spacing--40)","left":"var(--wp--preset--spacing--50)","right":"var(--wp--preset--spacing--50)"}}},"layout":{"type":"flex","justifyContent":"space-between","flexWrap":"wrap"}} -->
<div class="wp-block-group alignfull landing-footer has-neutral-50-background-color has-background" style="padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50)">

	<!-- wp:paragraph {"textColor":"neutral-500","fontSize":"small"} -->
	<p class="has-neutral-500-color has-text-color has-small-font-size">© 2024 Company Name. All rights reserved.</p>
	<!-- /wp:paragraph -->

	<!-- wp:group {"layout":{"type":"flex","flexWrap":"wrap"}} -->
	<div class="wp-block-group">
		<!-- wp:paragraph {"style":{"spacing":{"margin":{"right":"var(--wp--preset--spacing--40)"}}},"textColor":"neutral-500","fontSize":"small"} -->
		<p class="has-neutral-500-color has-text-color has-small-font-size" style="margin-right:var(--wp--preset--spacing--40)"><a href="/privacy-policy/">Privacy Policy</a></p>
		<!-- /wp:paragraph -->
		<!-- wp:paragraph {"textColor":"neutral-500","fontSize":"small"} -->
		<p class="has-neutral-500-color has-text-color has-small-font-size"><a href="/terms-of-service/">Terms of Service</a></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
```

**Step 2: 验证模板语法**

在本地 WP 环境中检查模板是否被识别：
```bash
docker exec wp_cli wp theme list --allow-root
# 确认 cclee-theme 状态为 active
```

**Step 3: 提交**

```bash
cd wp/wordpress/wp-content/themes/cclee-theme
git add templates/page-landing.html
git commit -m "feat: add landing page template without header/footer"
```

---

## Task 2: 创建 landing-hero-form Pattern

**Files:**
- Create: `wp/wordpress/wp-content/themes/cclee-theme/patterns/landing-hero-form.php`

**Step 1: 创建 Pattern 文件**

```php
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

				<!-- wp:jetpack/contact-form {"subject":"Landing Page Inquiry","hasSubject":false} -->
				<!-- wp:jetpack/field-name {"label":"Name","required":true} /-->
				<!-- wp:jetpack/field-email {"label":"Email","required":true} /-->
				<!-- wp:jetpack/field-telephone {"label":"Phone","required":false} /-->
				<!-- wp:jetpack/field-textarea {"label":"Message","required":false} /-->
				<!-- wp:jetpack/button {"element":"button","text":"Submit Request","backgroundColor":"accent","textColor":"base","style":{"border":{"radius":"8px"}}} /-->
				<!-- /wp:jetpack/contact-form -->

			</div>
			<!-- /wp:group -->

		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</div>
<!-- /wp:group -->
```

**注意：** 表单使用 Jetpack Contact Form 块。如未安装 Jetpack，可替换为 WPForms 或 HTML 表单。

**Step 2: 提交**

```bash
cd wp/wordpress/wp-content/themes/cclee-theme
git add patterns/landing-hero-form.php
git commit -m "feat: add landing-hero-form pattern"
```

---

## Task 3: 创建 landing-video-hero Pattern

**Files:**
- Create: `wp/wordpress/wp-content/themes/cclee-theme/patterns/landing-video-hero.php`

**Step 1: 创建 Pattern 文件**

```php
<?php
/**
 * Title: Landing Video Hero
 * Slug: cclee-theme/landing-video-hero
 * Categories: cclee-theme, featured
 * Description: 全屏视频背景 Hero 区块
 */
?>
<!-- wp:group {"align":"full","className":"landing-video-container","style":{"spacing":{"padding":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull landing-video-container" style="padding-top:0;padding-bottom:0;min-height:100vh">

	<!-- wp:html -->
	<video autoplay muted loop playsinline style="position:absolute;top:50%;left:50%;min-width:100%;min-height:100%;transform:translate(-50%,-50%);object-fit:cover">
		<source src="https://example.com/video.mp4" type="video/mp4">
	</video>
	<div class="landing-video-overlay" style="position:absolute;inset:0;background:rgba(0,0,0,0.5)"></div>
	<!-- /wp:html -->

	<!-- wp:group {"style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--80)","bottom":"var(--wp--preset--spacing--80)"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center","verticalAlignment":"center"}} -->
	<div class="wp-block-group" style="position:relative;z-index:1;min-height:100vh;padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80)">

		<!-- wp:paragraph {"textAlign":"center","textColor":"neutral-200","fontSize":"small","style":{"typography":{"fontWeight":"600","letterSpacing":"0.1em","textTransform":"uppercase"}}} -->
		<p class="has-text-align-center has-neutral-200-color has-text-color has-small-font-size" style="font-weight:600;letter-spacing:0.1em;text-transform:uppercase">Welcome to the Future</p>
		<!-- /wp:paragraph -->

		<!-- wp:heading {"textAlign":"center","level":1,"textColor":"base","fontSize":"h1"} -->
		<h1 class="wp-block-heading has-text-align-center has-base-color has-text-color" style="font-size:var(--wp--preset--font-size--h1)">Experience Innovation</h1>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"align":"center","textColor":"neutral-200","fontSize":"large","style":{"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--50)"}}}} -->
		<p class="has-text-align-center has-neutral-200-color has-text-color has-large-font-size" style="margin-bottom:var(--wp--preset--spacing--50)">Discover what's possible with our cutting-edge solutions.</p>
		<!-- /wp:paragraph -->

		<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
		<div class="wp-block-buttons">
			<!-- wp:button {"backgroundColor":"accent","textColor":"base","style":{"border":{"radius":"8px"}}} -->
			<div class="wp-block-button"><a class="wp-block-button__link has-base-color has-accent-background-color has-text-color has-background wp-element-button" style="border-radius:8px">Get Started</a></div>
			<!-- /wp:button -->
			<!-- wp:button {"textColor":"base","className":"is-style-outline","style":{"border":{"radius":"8px"}}} -->
			<div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-base-color has-text-color wp-element-button" style="border-radius:8px">Watch Demo</a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->

	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
```

**Step 2: 提交**

```bash
cd wp/wordpress/wp-content/themes/cclee-theme
git add patterns/landing-video-hero.php
git commit -m "feat: add landing-video-hero pattern"
```

---

## Task 4: 创建 landing-trust-bar Pattern

**Files:**
- Create: `wp/wordpress/wp-content/themes/cclee-theme/patterns/landing-trust-bar.php`

**Step 1: 创建 Pattern 文件**

```php
<?php
/**
 * Title: Landing Trust Bar
 * Slug: cclee-theme/landing-trust-bar
 * Categories: cclee-theme, featured
 * Description: 信任徽章横条，展示合作伙伴 Logo
 */
?>
<!-- wp:group {"align":"full","backgroundColor":"contrast","style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--60)","bottom":"var(--wp--preset--spacing--60)"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-contrast-background-color has-background" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">

	<!-- wp:paragraph {"align":"center","textColor":"neutral-500","fontSize":"small","style":{"typography":{"letterSpacing":"0.05em"},"spacing":{"margin":{"bottom":"var(--wp--preset--spacing--40)"}}}} -->
	<p class="has-text-align-center has-neutral-500-color has-text-color has-small-font-size" style="letter-spacing:0.05em;margin-bottom:var(--wp--preset--spacing--40)">TRUSTED BY LEADING COMPANIES</p>
	<!-- /wp:paragraph -->

	<!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center","spacing":{"margin":{"left":"var(--wp--preset--spacing--40)","right":"var(--wp--preset--spacing--40)"}}}} -->
	<div class="wp-block-group alignwide" style="display:flex;flex-wrap:wrap;justify-content:center;gap:var(--wp--preset--spacing--50)">

		<!-- wp:image {"width":120,"sizeSlug":"full","className":"landing-trust-logo"} -->
		<figure class="wp-block-image landing-trust-logo"><img src="https://via.placeholder.com/120x40?text=Logo+1" alt="Partner 1" width="120"/></figure>
		<!-- /wp:image -->

		<!-- wp:image {"width":120,"sizeSlug":"full","className":"landing-trust-logo"} -->
		<figure class="wp-block-image landing-trust-logo"><img src="https://via.placeholder.com/120x40?text=Logo+2" alt="Partner 2" width="120"/></figure>
		<!-- /wp:image -->

		<!-- wp:image {"width":120,"sizeSlug":"full","className":"landing-trust-logo"} -->
		<figure class="wp-block-image landing-trust-logo"><img src="https://via.placeholder.com/120x40?text=Logo+3" alt="Partner 3" width="120"/></figure>
		<!-- /wp:image -->

		<!-- wp:image {"width":120,"sizeSlug":"full","className":"landing-trust-logo"} -->
		<figure class="wp-block-image landing-trust-logo"><img src="https://via.placeholder.com/120x40?text=Logo+4" alt="Partner 4" width="120"/></figure>
		<!-- /wp:image -->

		<!-- wp:image {"width":120,"sizeSlug":"full","className":"landing-trust-logo"} -->
		<figure class="wp-block-image landing-trust-logo"><img src="https://via.placeholder.com/120x40?text=Logo+5" alt="Partner 5" width="120"/></figure>
		<!-- /wp:image -->

	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
```

**Step 2: 提交**

```bash
cd wp/wordpress/wp-content/themes/cclee-theme
git add patterns/landing-trust-bar.php
git commit -m "feat: add landing-trust-bar pattern"
```

---

## Task 5: 创建 landing-countdown Pattern

**Files:**
- Create: `wp/wordpress/wp-content/themes/cclee-theme/patterns/landing-countdown.php`

**Step 1: 创建 Pattern 文件**

```php
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

		<!-- wp:group {"className":"landing-countdown","layout":{"type":"flex","justifyContent":"center","spacing":{"margin":{"left":"var(--wp--preset--spacing--30)","right":"var(--wp--preset--spacing--30)"}}}} -->
		<div class="wp-block-group landing-countdown" style="display:flex;justify-content:center;gap:var(--wp--preset--spacing--30)">

			<!-- wp:group {"className":"landing-countdown-item","style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--30)","bottom":"var(--wp--preset--spacing--30)","left":"var(--wp--preset--spacing--40)","right":"var(--wp--preset--spacing--40)"}}},"backgroundColor":"base","layout":{"type":"flex","orientation":"vertical"}} -->
			<div class="wp-block-group landing-countdown-item has-base-background-color has-background" style="padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);border-radius:8px">
				<!-- wp:paragraph {"className":"landing-countdown-number","textColor":"accent","style":{"typography":{"fontSize":"3rem","fontWeight":"700","lineHeight":"1"}}} -->
				<p class="landing-countdown-number has-accent-color has-text-color" style="font-size:3rem;font-weight:700;line-height:1" id="countdown-days">02</p>
				<!-- /wp:paragraph -->
				<!-- wp:paragraph {"textAlign":"center","textColor":"neutral-500","fontSize":"small","style":{"typography":{"textTransform":"uppercase","letterSpacing":"0.1em"}}} -->
				<p class="has-text-align-center has-neutral-500-color has-text-color has-small-font-size" style="text-transform:uppercase;letter-spacing:0.1em">Days</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"landing-countdown-item","style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--30)","bottom":"var(--wp--preset--spacing--30)","left":"var(--wp--preset--spacing--40)","right":"var(--wp--preset--spacing--40)"}}},"backgroundColor":"base","layout":{"type":"flex","orientation":"vertical"}} -->
			<div class="wp-block-group landing-countdown-item has-base-background-color has-background" style="padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);border-radius:8px">
				<!-- wp:paragraph {"className":"landing-countdown-number","textColor":"accent","style":{"typography":{"fontSize":"3rem","fontWeight":"700","lineHeight":"1"}}} -->
				<p class="landing-countdown-number has-accent-color has-text-color" style="font-size:3rem;font-weight:700;line-height:1" id="countdown-hours">14</p>
				<!-- /wp:paragraph -->
				<!-- wp:paragraph {"textAlign":"center","textColor":"neutral-500","fontSize":"small","style":{"typography":{"textTransform":"uppercase","letterSpacing":"0.1em"}}} -->
				<p class="has-text-align-center has-neutral-500-color has-text-color has-small-font-size" style="text-transform:uppercase;letter-spacing:0.1em">Hours</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"landing-countdown-item","style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--30)","bottom":"var(--wp--preset--spacing--30)","left":"var(--wp--preset--spacing--40)","right":"var(--wp--preset--spacing--40)"}}},"backgroundColor":"base","layout":{"type":"flex","orientation":"vertical"}} -->
			<div class="wp-block-group landing-countdown-item has-base-background-color has-background" style="padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);border-radius:8px">
				<!-- wp:paragraph {"className":"landing-countdown-number","textColor":"accent","style":{"typography":{"fontSize":"3rem","fontWeight":"700","lineHeight":"1"}}} -->
				<p class="landing-countdown-number has-accent-color has-text-color" style="font-size:3rem;font-weight:700;line-height:1" id="countdown-minutes">36</p>
				<!-- /wp:paragraph -->
				<!-- wp:paragraph {"textAlign":"center","textColor":"neutral-500","fontSize":"small","style":{"typography":{"textTransform":"uppercase","letterSpacing":"0.1em"}}} -->
				<p class="has-text-align-center has-neutral-500-color has-text-color has-small-font-size" style="text-transform:uppercase;letter-spacing:0.1em">Minutes</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"landing-countdown-item","style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--30)","bottom":"var(--wp--preset--spacing--30)","left":"var(--wp--preset--spacing--40)","right":"var(--wp--preset--spacing--40)"}}},"backgroundColor":"base","layout":{"type":"flex","orientation":"vertical"}} -->
			<div class="wp-block-group landing-countdown-item has-base-background-color has-background" style="padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);border-radius:8px">
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

	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->

<!-- wp:html -->
<script>
(function() {
	// 设置目标时间（7天后）
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
```

**Step 2: 提交**

```bash
cd wp/wordpress/wp-content/themes/cclee-theme
git add patterns/landing-countdown.php
git commit -m "feat: add landing-countdown pattern with JS timer"
```

---

## Task 6: 更新 custom.css 样式

**Files:**
- Modify: `wp/wordpress/wp-content/themes/cclee-theme/assets/css/custom.css`

**Step 1: 添加 Landing Page 样式**

在 `custom.css` 末尾添加：

```css
/* ========================================
   Landing Page Styles
   ======================================== */

/* Landing Nav */
.landing-nav {
	position: sticky;
	top: 0;
	z-index: 100;
	background: rgba(255, 255, 255, 0.95);
	backdrop-filter: blur(8px);
	border-bottom: 1px solid var(--wp--preset--color--neutral-100);
}

.landing-exit-link a {
	color: var(--wp--preset--color--neutral-500);
	text-decoration: none;
	transition: color var(--wp--custom--transition--fast);
}

.landing-exit-link a:hover {
	color: var(--wp--preset--color--primary);
}

/* Landing Footer */
.landing-footer a {
	color: var(--wp--preset--color--neutral-500);
	text-decoration: none;
	transition: color var(--wp--custom--transition--fast);
}

.landing-footer a:hover {
	color: var(--wp--preset--color--primary);
}

/* Landing Video Container */
.landing-video-container {
	position: relative;
	overflow: hidden;
}

.landing-video-container video {
	position: absolute;
	top: 50%;
	left: 50%;
	min-width: 100%;
	min-height: 100%;
	transform: translate(-50%, -50%);
	object-fit: cover;
}

.landing-video-overlay {
	position: absolute;
	inset: 0;
	background: rgba(0, 0, 0, 0.5);
}

/* Landing Countdown */
.landing-countdown-item {
	text-align: center;
	box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
}

.landing-countdown-number {
	font-family: var(--wp--preset--font-family--heading);
}

/* Landing Trust Logo */
.landing-trust-logo img {
	filter: grayscale(100%);
	opacity: 0.6;
	transition: all var(--wp--custom--transition--normal);
}

.landing-trust-logo:hover img {
	filter: grayscale(0%);
	opacity: 1;
	transform: scale(1.05);
}

/* Mobile Responsive */
@media (max-width: 768px) {
	.landing-countdown-item {
		padding: var(--wp--preset--spacing--20) var(--wp--preset--spacing--30) !important;
	}

	.landing-countdown-number {
		font-size: 2rem !important;
	}
}
```

**Step 2: 提交**

```bash
cd wp/wordpress/wp-content/themes/cclee-theme
git add assets/css/custom.css
git commit -m "style: add landing page styles to custom.css"
```

---

## Task 7: 更新开发文档

**Files:**
- Modify: `docs/cclee-theme-dev.md`

**Step 1: 更新模板能力矩阵**

在模板能力矩阵表格中添加：

```markdown
| `page-landing.html` | Landing Page | ❌ | ❌ | Pattern 组装 | 无 header/footer，最小导航 + 微型页脚 |
```

**Step 2: 更新 Patterns 清单**

在 Patterns 清单表格中添加：

```markdown
| Landing Hero with Form | `cclee-theme/landing-hero-form` | featured | Hero + 侧边线索收集表单 |
| Landing Video Hero | `cclee-theme/landing-video-hero` | featured | 全屏视频背景 Hero |
| Landing Trust Bar | `cclee-theme/landing-trust-bar` | featured | 信任徽章横条 |
| Landing Countdown | `cclee-theme/landing-countdown` | featured | 限时优惠倒计时 |
```

**Step 3: 更新缺口清单**

将缺口清单中 Landing Page 模板标记为已完成：

```markdown
| ~~Landing Page 模板~~ | ~~投放页/活动页无法实现~~ | ~~P0~~ | ✅ 已完成 |
```

**Step 4: 提交**

```bash
cd /home/aptop/workspace/yougu
git add docs/cclee-theme-dev.md
git commit -m "docs: update cclee-theme-dev.md with landing page module"
```

---

## Task 8: 验证与测试

**Step 1: 清除缓存**

```bash
docker exec wp_cli wp cache flush --allow-root
```

**Step 2: 验证 Patterns 注册**

在 WP 后台编辑器中确认 4 个新 Patterns 可用：
- cclee-theme/landing-hero-form
- cclee-theme/landing-video-hero
- cclee-theme/landing-trust-bar
- cclee-theme/landing-countdown

**Step 3: 创建测试页面**

1. 新建页面，选择 "Landing Page" 模板
2. 添加 landing-hero-form pattern
3. 预览确认无 header/footer
4. 检查响应式布局

**Step 4: 最终提交**

```bash
cd wp/wordpress/wp-content/themes/cclee-theme
git add -A
git commit -m "feat: complete landing page module with 4 patterns"
git push
```

---

## 完成标准

- [ ] `page-landing.html` 模板不加载 header/footer
- [ ] 4 个 Patterns 在编辑器中可选择
- [ ] 响应式布局正常 (375px - 1440px)
- [ ] 倒计时 JS 功能正常
- [ ] 视频背景自动播放（静音）
- [ ] 信任徽章 hover 效果正常
- [ ] 文档已更新
