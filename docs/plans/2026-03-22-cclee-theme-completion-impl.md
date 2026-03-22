# CCLEE Theme Completion Implementation Plan

> **For Claude:** REQUIRED SUB-SKILL: Use superpowers:executing-plans to implement this plan task-by-task.

**Goal:** Add Services Pattern, Portfolio Pattern, and WooCommerce templates to cclee-theme.

**Architecture:** FSE block patterns using theme.json design tokens, WooCommerce templates using block templates with sidebar layout.

**Tech Stack:** WordPress FSE, Gutenberg blocks, WooCommerce blocks, theme.json design system

---

## Task 1: Create Services Pattern

**Files:**
- Create: `wp/wordpress/wp-content/themes/cclee-theme/patterns/services.php`

**Step 1: Create the pattern file with header and structure**

Create file `wp/wordpress/wp-content/themes/cclee-theme/patterns/services.php`:

```php
<?php
/**
 * Title: Services
 * Slug: cclee-theme/services
 * Categories: cclee-theme
 * Description: Vertical list of services with icons and descriptions for B2B businesses.
 */
?>
<!-- wp:group {"align":"full","backgroundColor":"contrast","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-contrast-background-color has-background">

<!-- wp:heading {"textAlign":"center","fontSize":"h2"} -->
<h2 class="wp-block-heading has-text-align-center has-h-2-font-size">Our Services</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","textColor":"neutral-500"} -->
<p class="has-text-align-center has-neutral-500-color has-text-color">Professional solutions tailored to your business needs</p>
<!-- /wp:paragraph -->

<!-- wp:spacer {"height":"var:preset|spacing|50"} -->
<div style="height:var(--wp--preset--spacing--50)" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:group {"style":{"border":{"top":{"width":"1px","style":"solid","color":"neutral-200"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="border-top-color:var(--wp--preset--color--neutral-200);border-top-style:solid;border-top-width:1px">

<!-- wp:columns {"isStackedOnMobile":false,"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}}} -->
<div class="wp-block-columns is-not-stacked-on-mobile" style="padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50)">

<!-- wp:column {"width":"80px"} -->
<div class="wp-block-column" style="flex-basis:80px">
<!-- wp:group {"style":{"border":{"radius":"12px"},"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30","right":"var:preset|spacing|30"}}},"backgroundColor":"neutral-100","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
<div class="wp-block-group has-neutral-100-background-color has-background" style="border-radius:12px;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)"><!-- wp:html -->
<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="color:var(--wp--preset--color--primary)"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg>
<!-- /wp:html --></div>
<!-- /wp:group -->
</div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:heading {"level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"textColor":"primary"} -->
<h3 class="wp-block-heading has-primary-color has-text-color" style="font-style:normal;font-weight:600">Manufacturing Solutions</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"neutral-600"} -->
<p class="has-neutral-600-color has-text-color">High-quality manufacturing services with advanced technology and precision engineering. We deliver consistent results for industrial applications.</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:column -->

</div>
<!-- /wp:columns -->

</div>
<!-- /wp:group -->

<!-- wp:group {"style":{"border":{"top":{"width":"1px","style":"solid","color":"neutral-200"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="border-top-color:var(--wp--preset--color--neutral-200);border-top-style:solid;border-top-width:1px">

<!-- wp:columns {"isStackedOnMobile":false,"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}}} -->
<div class="wp-block-columns is-not-stacked-on-mobile" style="padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50)">

<!-- wp:column {"width":"80px"} -->
<div class="wp-block-column" style="flex-basis:80px">
<!-- wp:group {"style":{"border":{"radius":"12px"},"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30","right":"var:preset|spacing|30"}}},"backgroundColor":"neutral-100","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
<div class="wp-block-group has-neutral-100-background-color has-background" style="border-radius:12px;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)"><!-- wp:html -->
<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="color:var(--wp--preset--color--primary)"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4"/><path d="M12 8h.01"/></svg>
<!-- /wp:html --></div>
<!-- /wp:group -->
</div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:heading {"level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"textColor":"primary"} -->
<h3 class="wp-block-heading has-primary-color has-text-color" style="font-style:normal;font-weight:600">Technical Consulting</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"neutral-600"} -->
<p class="has-neutral-600-color has-text-color">Expert consultation services to optimize your production processes. Our team provides tailored recommendations for your specific requirements.</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:column -->

</div>
<!-- /wp:columns -->

</div>
<!-- /wp:group -->

<!-- wp:group {"style":{"border":{"top":{"width":"1px","style":"solid","color":"neutral-200"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="border-top-color:var(--wp--preset--color--neutral-200);border-top-style:solid;border-top-width:1px">

<!-- wp:columns {"isStackedOnMobile":false,"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}}} -->
<div class="wp-block-columns is-not-stacked-on-mobile" style="padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50)">

<!-- wp:column {"width":"80px"} -->
<div class="wp-block-column" style="flex-basis:80px">
<!-- wp:group {"style":{"border":{"radius":"12px"},"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30","right":"var:preset|spacing|30"}}},"backgroundColor":"neutral-100","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
<div class="wp-block-group has-neutral-100-background-color has-background" style="border-radius:12px;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)"><!-- wp:html -->
<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="color:var(--wp--preset--color--primary)"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
<!-- /wp:html --></div>
<!-- /wp:group -->
</div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:heading {"level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"textColor":"primary"} -->
<h3 class="wp-block-heading has-primary-color has-text-color" style="font-style:normal;font-weight:600">After-Sales Support</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"neutral-600"} -->
<p class="has-neutral-600-color has-text-color">Comprehensive after-sales service including maintenance, repairs, and technical support. We stand behind our products with dedicated customer care.</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:column -->

</div>
<!-- /wp:columns -->

</div>
<!-- /wp:group -->

<!-- wp:spacer {"height":"var:preset|spacing|60"} -->
<div style="height:var(--wp--preset--spacing--60)" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"primary","textColor":"base","style":{"border":{"radius":"4px"}}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-base-color has-primary-background-color has-background wp-element-button" style="border-radius:4px">View All Services</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->

<!-- wp:spacer {"height":"var:preset|spacing|80"} -->
<div style="height:var(--wp--preset--spacing--80)" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

</div>
<!-- /wp:group -->
```

**Step 2: Verify pattern file syntax**

Run: `docker exec wp_wordpress php -l /var/www/html/wp-content/themes/cclee-theme/patterns/services.php`
Expected: `No syntax errors detected`

**Step 3: Clear cache and verify pattern appears**

Run: `docker exec wp_cli wp cache flush --allow-root`
Expected: `Success: The cache was flushed.`

**Step 4: Commit**

```bash
cd wp/wordpress/wp-content/themes/cclee-theme && git add patterns/services.php && git commit -m "feat: add services pattern for B2B service listing"
```

---

## Task 2: Create Portfolio Pattern

**Files:**
- Create: `wp/wordpress/wp-content/themes/cclee-theme/patterns/portfolio.php`
- Modify: `wp/wordpress/wp-content/themes/cclee-theme/assets/css/custom.css`

**Step 1: Create the pattern file**

Create file `wp/wordpress/wp-content/themes/cclee-theme/patterns/portfolio.php`:

```php
<?php
/**
 * Title: Portfolio
 * Slug: cclee-theme/portfolio
 * Categories: cclee-theme
 * Description: Two-column grid of project case studies with images and descriptions.
 */
?>
<!-- wp:group {"align":"full","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull">

<!-- wp:spacer {"height":"var:preset|spacing|80"} -->
<div style="height:var(--wp--preset--spacing--80)" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:heading {"textAlign":"center","fontSize":"h2"} -->
<h2 class="wp-block-heading has-text-align-center has-h-2-font-size">Our Work</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","textColor":"neutral-500"} -->
<p class="has-text-align-center has-neutral-500-color has-text-color">Explore our successful projects and case studies</p>
<!-- /wp:paragraph -->

<!-- wp:spacer {"height":"var:preset|spacing|60"} -->
<div style="height:var(--wp--preset--spacing--60)" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:columns {"style":{"spacing":{"blockGap":"var:preset|spacing|50"}}} -->
<div class="wp-block-columns">

<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:group {"className":"cclee-portfolio-card","style":{"border":{"radius":"8px","width":"1px","style":"solid","color":"neutral-200"},"spacing":{"padding":"0"}},"layout":{"type":"default"}} -->
<div class="wp-block-group cclee-portfolio-card has-border-color has-neutral-200-border-color" style="border-width:1px;border-style:solid;border-radius:8px;padding:0">

<!-- wp:image {"aspectRatio":"16/9","scale":"cover","sizeSlug":"large","style":{"border":{"radius":{"topLeft":"8px","topRight":"8px"}}}} -->
<figure class="wp-block-image size-large"><img src="https://placehold.co/600x340/e5e5e5/737373?text=Project+1" alt="Project 1" style="border-top-left-radius:8px;border-top-right-radius:8px;aspect-ratio:16/9;object-fit:cover"/></figure>
<!-- /wp:image -->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|40","right":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)">

<!-- wp:heading {"level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"textColor":"primary"} -->
<h3 class="wp-block-heading has-primary-color has-text-color" style="font-style:normal;font-weight:600">Industrial Equipment Supply</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"small","textColor":"neutral-500"} -->
<p class="has-neutral-500-color has-text-color has-small-font-size">Complete welding equipment solution for automotive manufacturing plant, including custom configuration and training.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|30"}}},"layout":{"type":"flex","flexWrap":"wrap"},"className":"cclee-portfolio-tags"} -->
<div class="wp-block-group cclee-portfolio-tags" style="margin-top:var(--wp--preset--spacing--30)">
<!-- wp:paragraph {"style":{"spacing":{"padding":{"top":"var:preset|spacing|10","right":"var:preset|spacing|20","bottom":"var:preset|spacing|10","left":"var:preset|spacing|20"}},"border":{"radius":"4px"}},"backgroundColor":"neutral-100","fontSize":"small"} -->
<p class="has-neutral-100-background-color has-background has-small-font-size" style="border-radius:4px;padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--20)">Manufacturing</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"spacing":{"padding":{"top":"var:preset|spacing|10","right":"var:preset|spacing|20","bottom":"var:preset|spacing|10","left":"var:preset|spacing|20"}},"border":{"radius":"4px"}},"backgroundColor":"neutral-100","fontSize":"small"} -->
<p class="has-neutral-100-background-color has-background has-small-font-size" style="border-radius:4px;padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--20)">Welding</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

</div>
<!-- /wp:group -->

</div>
<!-- /wp:group -->
</div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:group {"className":"cclee-portfolio-card","style":{"border":{"radius":"8px","width":"1px","style":"solid","color":"neutral-200"},"spacing":{"padding":"0"}},"layout":{"type":"default"}} -->
<div class="wp-block-group cclee-portfolio-card has-border-color has-neutral-200-border-color" style="border-width:1px;border-style:solid;border-radius:8px;padding:0">

<!-- wp:image {"aspectRatio":"16/9","scale":"cover","sizeSlug":"large","style":{"border":{"radius":{"topLeft":"8px","topRight":"8px"}}}} -->
<figure class="wp-block-image size-large"><img src="https://placehold.co/600x340/e5e5e5/737373?text=Project+2" alt="Project 2" style="border-top-left-radius:8px;border-top-right-radius:8px;aspect-ratio:16/9;object-fit:cover"/></figure>
<!-- /wp:image -->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|40","right":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)">

<!-- wp:heading {"level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"textColor":"primary"} -->
<h3 class="wp-block-heading has-primary-color has-text-color" style="font-style:normal;font-weight:600">Pipeline Construction Project</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"small","textColor":"neutral-500"} -->
<p class="has-neutral-500-color has-text-color has-small-font-size">Specialized welding services for oil and gas pipeline construction, meeting strict industry standards and certifications.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|30"}}},"layout":{"type":"flex","flexWrap":"wrap"},"className":"cclee-portfolio-tags"} -->
<div class="wp-block-group cclee-portfolio-tags" style="margin-top:var(--wp--preset--spacing--30)">
<!-- wp:paragraph {"style":{"spacing":{"padding":{"top":"var:preset|spacing|10","right":"var:preset|spacing|20","bottom":"var:preset|spacing|10","left":"var:preset|spacing|20"}},"border":{"radius":"4px"}},"backgroundColor":"neutral-100","fontSize":"small"} -->
<p class="has-neutral-100-background-color has-background has-small-font-size" style="border-radius:4px;padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--20)">Oil &amp; Gas</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"spacing":{"padding":{"top":"var:preset|spacing|10","right":"var:preset|spacing|20","bottom":"var:preset|spacing|10","left":"var:preset|spacing|20"}},"border":{"radius":"4px"}},"backgroundColor":"neutral-100","fontSize":"small"} -->
<p class="has-neutral-100-background-color has-background has-small-font-size" style="border-radius:4px;padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--20)">Pipeline</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

</div>
<!-- /wp:group -->

</div>
<!-- /wp:group -->
</div>
<!-- /wp:column -->

</div>
<!-- /wp:columns -->

<!-- wp:columns {"style":{"spacing":{"blockGap":"var:preset|spacing|50","margin":{"top":"var:preset|spacing|50"}}}} -->
<div class="wp-block-columns" style="margin-top:var(--wp--preset--spacing--50)">

<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:group {"className":"cclee-portfolio-card","style":{"border":{"radius":"8px","width":"1px","style":"solid","color":"neutral-200"},"spacing":{"padding":"0"}},"layout":{"type":"default"}} -->
<div class="wp-block-group cclee-portfolio-card has-border-color has-neutral-200-border-color" style="border-width:1px;border-style:solid;border-radius:8px;padding:0">

<!-- wp:image {"aspectRatio":"16/9","scale":"cover","sizeSlug":"large","style":{"border":{"radius":{"topLeft":"8px","topRight":"8px"}}}} -->
<figure class="wp-block-image size-large"><img src="https://placehold.co/600x340/e5e5e5/737373?text=Project+3" alt="Project 3" style="border-top-left-radius:8px;border-top-right-radius:8px;aspect-ratio:16/9;object-fit:cover"/></figure>
<!-- /wp:image -->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|40","right":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)">

<!-- wp:heading {"level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"textColor":"primary"} -->
<h3 class="wp-block-heading has-primary-color has-text-color" style="font-style:normal;font-weight:600">Shipyard Welding Contract</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"small","textColor":"neutral-500"} -->
<p class="has-neutral-500-color has-text-color has-small-font-size">Large-scale welding operations for shipbuilding project, delivering on schedule with rigorous quality control.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|30"}}},"layout":{"type":"flex","flexWrap":"wrap"},"className":"cclee-portfolio-tags"} -->
<div class="wp-block-group cclee-portfolio-tags" style="margin-top:var(--wp--preset--spacing--30)">
<!-- wp:paragraph {"style":{"spacing":{"padding":{"top":"var:preset|spacing|10","right":"var:preset|spacing|20","bottom":"var:preset|spacing|10","left":"var:preset|spacing|20"}},"border":{"radius":"4px"}},"backgroundColor":"neutral-100","fontSize":"small"} -->
<p class="has-neutral-100-background-color has-background has-small-font-size" style="border-radius:4px;padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--20)">Marine</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"spacing":{"padding":{"top":"var:preset|spacing|10","right":"var:preset|spacing|20","bottom":"var:preset|spacing|10","left":"var:preset|spacing|20"}},"border":{"radius":"4px"}},"backgroundColor":"neutral-100","fontSize":"small"} -->
<p class="has-neutral-100-background-color has-background has-small-font-size" style="border-radius:4px;padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--20)">Shipbuilding</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

</div>
<!-- /wp:group -->

</div>
<!-- /wp:group -->
</div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:group {"className":"cclee-portfolio-card","style":{"border":{"radius":"8px","width":"1px","style":"solid","color":"neutral-200"},"spacing":{"padding":"0"}},"layout":{"type":"default"}} -->
<div class="wp-block-group cclee-portfolio-card has-border-color has-neutral-200-border-color" style="border-width:1px;border-style:solid;border-radius:8px;padding:0">

<!-- wp:image {"aspectRatio":"16/9","scale":"cover","sizeSlug":"large","style":{"border":{"radius":{"topLeft":"8px","topRight":"8px"}}}} -->
<figure class="wp-block-image size-large"><img src="https://placehold.co/600x340/e5e5e5/737373?text=Project+4" alt="Project 4" style="border-top-left-radius:8px;border-top-right-radius:8px;aspect-ratio:16/9;object-fit:cover"/></figure>
<!-- /wp:image -->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|40","right":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)">

<!-- wp:heading {"level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"textColor":"primary"} -->
<h3 class="wp-block-heading has-primary-color has-text-color" style="font-style:normal;font-weight:600">Structural Steel Fabrication</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"small","textColor":"neutral-500"} -->
<p class="has-neutral-500-color has-text-color has-small-font-size">Steel structure fabrication for commercial building construction, meeting all architectural specifications.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|30"}}},"layout":{"type":"flex","flexWrap":"wrap"},"className":"cclee-portfolio-tags"} -->
<div class="wp-block-group cclee-portfolio-tags" style="margin-top:var(--wp--preset--spacing--30)">
<!-- wp:paragraph {"style":{"spacing":{"padding":{"top":"var:preset|spacing|10","right":"var:preset|spacing|20","bottom":"var:preset|spacing|10","left":"var:preset|spacing|20"}},"border":{"radius":"4px"}},"backgroundColor":"neutral-100","fontSize":"small"} -->
<p class="has-neutral-100-background-color has-background has-small-font-size" style="border-radius:4px;padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--20)">Construction</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"spacing":{"padding":{"top":"var:preset|spacing|10","right":"var:preset|spacing|20","bottom":"var:preset|spacing|10","left":"var:preset|spacing|20"}},"border":{"radius":"4px"}},"backgroundColor":"neutral-100","fontSize":"small"} -->
<p class="has-neutral-100-background-color has-background has-small-font-size" style="border-radius:4px;padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--20)">Steel</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

</div>
<!-- /wp:group -->

</div>
<!-- /wp:group -->
</div>
<!-- /wp:column -->

</div>
<!-- /wp:columns -->

<!-- wp:spacer {"height":"var:preset|spacing|60"} -->
<div style="height:var(--wp--preset--spacing--60)" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"primary","textColor":"base","style":{"border":{"radius":"4px"}}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-base-color has-primary-background-color has-background wp-element-button" style="border-radius:4px">View All Projects</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->

<!-- wp:spacer {"height":"var:preset|spacing|80"} -->
<div style="height:var(--wp--preset--spacing--80)" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

</div>
<!-- /wp:group -->
```

**Step 2: Add hover styles to custom.css**

Read current `custom.css` and append the following at the end:

```css
/* Portfolio Card Hover Effect */
.cclee-portfolio-card {
  transition: box-shadow var(--wp--custom--transition--normal);
}
.cclee-portfolio-card:hover {
  box-shadow: var(--wp--preset--shadow--lg);
}
.cclee-portfolio-card img {
  transition: transform var(--wp--custom--transition--normal);
}
.cclee-portfolio-card:hover img {
  transform: scale(1.02);
}
```

**Step 3: Verify pattern file syntax**

Run: `docker exec wp_wordpress php -l /var/www/html/wp-content/themes/cclee-theme/patterns/portfolio.php`
Expected: `No syntax errors detected`

**Step 4: Clear cache**

Run: `docker exec wp_cli wp cache flush --allow-root`
Expected: `Success: The cache was flushed.`

**Step 5: Commit**

```bash
cd wp/wordpress/wp-content/themes/cclee-theme && git add patterns/portfolio.php assets/css/custom.css && git commit -m "feat: add portfolio pattern with hover effects"
```

---

## Task 3: Create archive-product.html Template

**Files:**
- Create: `wp/wordpress/wp-content/themes/cclee-theme/templates/archive-product.html`

**Step 1: Create the template file**

Create file `wp/wordpress/wp-content/themes/cclee-theme/templates/archive-product.html`:

```html
<!-- wp:template {"slug":"archive-product"} -->
<!-- wp:pattern {"slug":"cclee-theme/hero-simple"} /-->

<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group">
<!-- wp:columns {"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|80"}}}} -->
<div class="wp-block-columns" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--80)">

<!-- wp:column {"width":"70%"} -->
<div class="wp-block-column" style="flex-basis:70%">
<!-- wp:query {"query":{"postType":"product","perPage":12,"inherit":true}} -->
<div class="wp-block-query">
<!-- wp:post-template {"layout":{"type":"grid","columnCount":3}} -->
<!-- wp:group {"style":{"border":{"radius":"8px","width":"1px","style":"solid","color":"neutral-200"},"spacing":{"padding":"0"}},"className":"wc-product-card"} -->
<div class="wp-block-group wc-product-card has-border-color has-neutral-200-border-color" style="border-width:1px;border-style:solid;border-radius:8px;padding:0">
<!-- wp:post-featured-image {"aspectRatio":"1","scale":"cover","style":{"border":{"radius":{"topLeft":"8px","topRight":"8px"}}}} /-->
<!-- wp:group {"style":{"spacing":{"padding":"var:preset|spacing|30"}}} -->
<div class="wp-block-group" style="padding:var(--wp--preset--spacing--30)">
<!-- wp:post-title {"level":3,"style":{"typography":{"fontSize":"1rem"}},"isLink":true} /-->
<!-- wp:woocommerce/product-price {"textAlign":"left"} /-->
<!-- wp:woocommerce/product-button {"textAlign":"left","style":{"typography":{"fontSize":"0.875rem"}}} /-->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
<!-- /wp:post-template -->
<!-- wp:query-pagination {"layout":{"type":"flex","justifyContent":"center"}} -->
<!-- wp:query-pagination-previous /-->
<!-- wp:query-pagination-numbers /-->
<!-- wp:query-pagination-next /-->
<!-- /wp:query-pagination -->
</div>
<!-- /wp:query -->
</div>
<!-- /wp:column -->

<!-- wp:column {"width":"30%"} -->
<div class="wp-block-column" style="flex-basis:30%">
<!-- wp:group {"style":{"border":{"radius":"8px"},"spacing":{"padding":"var:preset|spacing|40"}},"backgroundColor":"contrast","className":"wc-sidebar"} -->
<div class="wp-block-group wc-sidebar has-contrast-background-color has-background" style="border-radius:8px;padding:var(--wp--preset--spacing--40)">
<!-- wp:heading {"level":4,"textColor":"primary"} -->
<h4 class="wp-block-heading has-primary-color has-text-color">Product Categories</h4>
<!-- /wp:heading -->
<!-- wp:woocommerce/product-categories /-->
<!-- wp:spacer {"height":"var:preset|spacing|40"} /-->
<!-- wp:heading {"level":4,"textColor":"primary"} -->
<h4 class="wp-block-heading has-primary-color has-text-color">Filter by Price</h4>
<!-- /wp:heading -->
<!-- wp:woocommerce/price-filter /-->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:column -->

</div>
<!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- wp:pattern {"slug":"cclee-theme/cta-banner"} /-->
<!-- /wp:template -->
```

**Step 2: Clear cache**

Run: `docker exec wp_cli wp cache flush --allow-root`
Expected: `Success: The cache was flushed.`

**Step 3: Commit**

```bash
cd wp/wordpress/wp-content/themes/cclee-theme && git add templates/archive-product.html && git commit -m "feat: add archive-product template with sidebar layout"
```

---

## Task 4: Create single-product.html Template

**Files:**
- Create: `wp/wordpress/wp-content/themes/cclee-theme/templates/single-product.html`

**Step 1: Create the template file**

Create file `wp/wordpress/wp-content/themes/cclee-theme/templates/single-product.html`:

```html
<!-- wp:template {"slug":"single-product"} -->
<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group">

<!-- wp:woocommerce/legacy-template {"template":"single-product"} /-->

<!-- wp:spacer {"height":"var:preset|spacing|80"} -->
<div style="height:var(--wp--preset--spacing--80)" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group">
<!-- wp:heading {"textAlign":"center","textColor":"primary"} -->
<h2 class="wp-block-heading has-text-align-center has-primary-color has-text-color">Related Products</h2>
<!-- /wp:heading -->
<!-- wp:spacer {"height":"var:preset|spacing|40"} /-->
<!-- wp:woocommerce/related-products {"columns":4} /-->
</div>
<!-- /wp:group -->

<!-- wp:spacer {"height":"var:preset|spacing|80"} /-->

</div>
<!-- /wp:group -->

<!-- wp:pattern {"slug":"cclee-theme/cta-banner"} /-->
<!-- /wp:template -->
```

**Step 2: Clear cache**

Run: `docker exec wp_cli wp cache flush --allow-root`
Expected: `Success: The cache was flushed.`

**Step 3: Commit**

```bash
cd wp/wordpress/wp-content/themes/cclee-theme && git add templates/single-product.html && git commit -m "feat: add single-product template with related products"
```

---

## Task 5: Update theme.json for WooCommerce Templates

**Files:**
- Modify: `wp/wordpress/wp-content/themes/cclee-theme/theme.json`

**Step 1: Register new templates in theme.json**

In the `customTemplates` section, add the two new templates. Find the existing `customTemplates` array and add:

```json
{
  "name": "archive-product",
  "title": "Product Archive",
  "postTypes": ["product"]
},
{
  "name": "single-product",
  "title": "Single Product",
  "postTypes": ["product"]
}
```

**Step 2: Verify JSON syntax**

Run: `docker exec wp_cli wp eval 'echo json_encode(json_decode(file_get_contents(get_template_directory() . "/theme.json"))) ? "Valid JSON" : "Invalid JSON";' --allow-root`
Expected: `Valid JSON`

**Step 3: Clear cache**

Run: `docker exec wp_cli wp cache flush --allow-root`
Expected: `Success: The cache was flushed.`

**Step 4: Commit**

```bash
cd wp/wordpress/wp-content/themes/cclee-theme && git add theme.json && git commit -m "feat: register WooCommerce templates in theme.json"
```

---

## Task 6: Final Verification

**Step 1: List all patterns to verify**

Run: `docker exec wp_cli wp pattern list --category=cclee-theme --fields=title,slug --allow-root`
Expected: Should show services and portfolio in the list

**Step 2: List templates to verify**

Run: `ls -la wp/wordpress/wp-content/themes/cclee-theme/templates/`
Expected: Should show archive-product.html and single-product.html

**Step 3: Check for PHP errors**

Run: `docker exec wp_wordpress cat /var/www/html/wp-content/debug.log 2>/dev/null || echo "No errors"`
Expected: `No errors` or empty log

**Step 4: Push all changes to remote**

```bash
cd wp/wordpress/wp-content/themes/cclee-theme && git push origin master
```

**Step 5: Update yougu main repo**

```bash
cd /home/aptop/workspace/yougu && git add -A && git commit -m "chore: update cclee-theme reference" && git push
```

---

## Summary

| Task | Description | Files |
|------|-------------|-------|
| 1 | Services Pattern | patterns/services.php |
| 2 | Portfolio Pattern | patterns/portfolio.php, assets/css/custom.css |
| 3 | archive-product.html | templates/archive-product.html |
| 4 | single-product.html | templates/single-product.html |
| 5 | theme.json update | theme.json |
| 6 | Verification | - |
