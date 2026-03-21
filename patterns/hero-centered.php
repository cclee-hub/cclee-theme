<?php
/**
 * Title: Hero Centered
 * Slug: cclee-theme/hero-centered
 * Categories: cclee-theme, featured
 * Description: 居中布局 Hero 区块，含背景封面
 */
?>
<!-- wp:cover {"url":"","dimRatio":50,"overlayColor":"primary","minHeight":480,"align":"full"} -->
<div class="wp-block-cover alignfull" style="min-height:480px">
    <span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim"></span>
    <div class="wp-block-cover__inner-container">

        <!-- wp:group {"layout":{"type":"flex","orientation":"vertical","justifyContent":"center","flexWrap":"wrap"}} -->
        <div class="wp-block-group">

            <!-- wp:heading {"textAlign":"center","level":1} -->
            <h1 class="wp-block-heading has-text-align-center">Welcome to Our Site</h1>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"align":"center"} -->
            <p class="has-text-align-center">A compelling subtitle that captures attention and invites visitors to explore more.</p>
            <!-- /wp:paragraph -->

            <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
            <div class="wp-block-buttons">
                <!-- wp:button {"backgroundColor":"accent","textColor":"base"} -->
                <div class="wp-block-button"><a class="wp-block-button__link has-base-color has-accent-background-color has-text-color has-background wp-element-button">Get Started</a></div>
                <!-- /wp:button -->
                <!-- wp:button {"style":{"border":{"width":"1px"}},"className":"is-style-outline"} -->
                <div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" style="border-width:1px">Learn More</a></div>
                <!-- /wp:button -->
            </div>
            <!-- /wp:buttons -->

        </div>
        <!-- /wp:group -->

    </div>
</div>
<!-- /wp:cover -->
