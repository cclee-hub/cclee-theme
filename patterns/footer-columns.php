<?php
/**
 * Title: Footer Columns
 * Slug: cclee-theme/footer-columns
 * Categories: cclee-theme, footer
 * Description: 四列页脚区块
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"backgroundColor":"primary","textColor":"base","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-base-color has-primary-background-color has-text-color has-background">

    <!-- wp:columns -->
    <div class="wp-block-columns">

        <!-- wp:column -->
        <div class="wp-block-column">
            <!-- wp:heading {"level":4} -->
            <h4 class="wp-block-heading">Site Name</h4>
            <!-- /wp:heading -->
            <!-- wp:paragraph -->
            <p>Your company tagline or brief description goes here.</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column">
            <!-- wp:heading {"level":4} -->
            <h4 class="wp-block-heading">Quick Links</h4>
            <!-- /wp:heading -->
            <!-- wp:navigation {"overlayMenu":"never","layout":{"type":"flex","orientation":"vertical"}} -->
                <!-- wp:navigation-link {"label":"Home","url":"#"} /-->
                <!-- wp:navigation-link {"label":"About","url":"#"} /-->
                <!-- wp:navigation-link {"label":"Products","url":"#"} /-->
                <!-- wp:navigation-link {"label":"Contact","url":"#"} /-->
            <!-- /wp:navigation -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column">
            <!-- wp:heading {"level":4} -->
            <h4 class="wp-block-heading">Services</h4>
            <!-- /wp:heading -->
            <!-- wp:list -->
            <ul>
                <li>Service One</li>
                <li>Service Two</li>
                <li>Service Three</li>
            </ul>
            <!-- /wp:list -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column">
            <!-- wp:heading {"level":4} -->
            <h4 class="wp-block-heading">Contact</h4>
            <!-- /wp:heading -->
            <!-- wp:paragraph -->
            <p>Email: info@example.com<br>Phone: +1 234 567 890</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->

    </div>
    <!-- /wp:columns -->

    <!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"var:preset|spacing|50"}}},"fontSize":"sm"} -->
    <p class="has-text-align-center has-small-font-size" style="margin-top:var(--wp--preset--spacing--50)">© 2026 Site Name. All rights reserved.</p>
    <!-- /wp:paragraph -->

</div>
<!-- /wp:group -->
