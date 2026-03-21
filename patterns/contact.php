<?php
/**
 * Title: Contact Section
 * Slug: cclee-theme/contact
 * Categories: cclee-theme, featured
 * Description: 联系表单区块，包含表单和联系信息
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull">

    <!-- wp:heading {"textAlign":"center"} -->
    <h2 class="wp-block-heading has-text-align-center">Get in Touch</h2>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"align":"center"} -->
    <p class="has-text-align-center">We'd love to hear from you. Send us a message.</p>
    <!-- /wp:paragraph -->

    <!-- wp:columns {"style":{"spacing":{"margin":{"top":"var:preset|spacing|50"}}}} -->
    <div class="wp-block-columns" style="margin-top:var(--wp--preset--spacing--50)">

        <!-- wp:column {"width":"60%"} -->
        <div class="wp-block-column" style="flex-basis:60%">
            <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|40","right":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40"}},"border":{"radius":"8px"}},"backgroundColor":"contrast"} -->
            <div class="wp-block-group has-contrast-background-color has-background" style="border-radius:8px;padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)">

                <!-- wp:paragraph -->
                <p><strong>Name</strong></p>
                <!-- /wp:paragraph -->

                <!-- wp:separator {"backgroundColor":"secondary","className":"is-style-wide"} -->
                <hr class="wp-block-separator has-text-color has-secondary-color has-alpha-channel-opacity has-secondary-background-color has-background is-style-wide"/>
                <!-- /wp:separator -->

                <!-- wp:paragraph -->
                <p><strong>Email</strong></p>
                <!-- /wp:paragraph -->

                <!-- wp:separator {"backgroundColor":"secondary","className":"is-style-wide"} -->
                <hr class="wp-block-separator has-text-color has-secondary-color has-alpha-channel-opacity has-secondary-background-color has-background is-style-wide"/>
                <!-- /wp:separator -->

                <!-- wp:paragraph -->
                <p><strong>Message</strong></p>
                <!-- /wp:paragraph -->

                <!-- wp:separator {"backgroundColor":"secondary","className":"is-style-wide"} -->
                <hr class="wp-block-separator has-text-color has-secondary-color has-alpha-channel-opacity has-secondary-background-color has-background is-style-wide"/>
                <!-- /wp:separator -->

                <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"right"}} -->
                <div class="wp-block-buttons">
                    <!-- wp:button -->
                    <div class="wp-block-button"><a class="wp-block-button__link wp-element-button">Send Message</a></div>
                    <!-- /wp:button -->
                </div>
                <!-- /wp:buttons -->

            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"width":"40%"} -->
        <div class="wp-block-column" style="flex-basis:40%">

            <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|40","right":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
            <div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)">

                <!-- wp:paragraph {"fontSize":"large"} -->
                <p class="has-large-font-size">📍 Address</p>
                <!-- /wp:paragraph -->
                <!-- wp:paragraph -->
                <p>123 Business Street<br>City, Country 12345</p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"fontSize":"large"} -->
                <p class="has-large-font-size">📧 Email</p>
                <!-- /wp:paragraph -->
                <!-- wp:paragraph -->
                <p>hello@example.com</p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"fontSize":"large"} -->
                <p class="has-large-font-size">📞 Phone</p>
                <!-- /wp:paragraph -->
                <!-- wp:paragraph -->
                <p>+1 (555) 123-4567</p>
                <!-- /wp:paragraph -->

            </div>
            <!-- /wp:group -->

        </div>
        <!-- /wp:column -->

    </div>
    <!-- /wp:columns -->

</div>
<!-- /wp:group -->
