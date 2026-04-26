=== CCLEE ===
Contributors: cclee-hub
Requires at least: 6.4
Tested up to: 6.9.4
Requires PHP: 8.0
License: GNU General Public License v2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

A lightweight FSE theme for developers. Clean architecture, customizable design tokens, SEO-friendly.

== Description ==

CCLEE is a Full Site Editing block theme designed for developers who want clean, customizable foundations without bloat.

= Key Features =
* Full Site Editing (FSE) support with theme.json design system
* 20+ block patterns (hero, features, CTA, testimonials, pricing, etc.)
* 5 style variations (commerce, industrial, professional, nature, tech)
* Responsive layout with configurable breakpoints
* WooCommerce compatibility (styling only, no template overrides)
* Comprehensive design tokens (colors, typography, spacing, shadows)

= Templates =
* index, single, page, archive, search, 404
* front-page, home, page-no-sidebar, page-landing
* author, page-about-us, page-contact
* WooCommerce: archive-product, single-product, cart, checkout

= Template Parts =
* header, footer, sidebar

== Installation ==

= Manual Upload =
1. Download the theme ZIP file
2. Go to WordPress Admin > Appearance > Themes > Add New > Upload Theme
3. Activate the theme

= WP-CLI =
`wp theme install /path/to/cclee-theme --activate`

== Frequently Asked Questions ==

= Does this theme require any plugins? =
No, CCLEE works out of the box. WooCommerce support is optional.

= Can I use this theme for commercial projects? =
Yes, CCLEE is licensed under GPLv2 or later.

= How do I customize colors and fonts? =
Use the Site Editor (Appearance > Editor) or create a child theme with custom theme.json.

= Why does WooCommerce say "Products" instead of "Shop"? =
CCLEE uses B2B-friendly terminology by default. The "Shop" label is replaced with "Products" to better serve business-focused websites. This is a text display preference only and does not modify WooCommerce functionality. You can override this by removing the filter in a child theme.

== Privacy ==

CCLEE does not collect, store, or transmit any user data. No cookies are set by the theme. No tracking, analytics, or external API calls are made. The theme is fully GDPR-compliant out of the box.

== Tags ==
full-site-editing, custom-colors

== Changelog ==

= 1.4.1 =
* Add WooCommerce product categories and trust badges patterns
* Add contact page hero pattern and images
* Fix my-account page layout and login form rendering
* Fix cart and checkout page rendering
* Load woocommerce.css conditionally (WooCommerce pages only)
* Add blog post placeholder image for missing featured images
* Refine pattern block style variations and FSE compliance
* Improve product archive toolbar for B2B coherence

= 1.4.0 =
* Lock down design system with CSS variables (theme.json tokens)
* Set layout to 100% fullwidth and disable default font sizes
* Normalize font size presets to heading-{N} naming convention
* Add default logo fallback and footer branding vertical layout
* Standardize footer parts for FSE compliance
* Fix text contrast issues on dark backgrounds
* Fix outline button visibility in cover blocks

= 1.3.0 =
* Normalize patterns with cclee-card and equal-height cards
* Add who-we-work-with pattern
* Correct contrast color from near-white to dark blue (#0f172a)

= 1.2.0 =
* Remove all non-GPL images (Unsplash), replace with CSS gradients and initial avatars
* Add GPL copyright notice to style.css
* Update WP compatibility to 6.9.4
* Compress screenshot.png

= 1.1.1 =
* Add author archive template and post layout patterns
* Add WooCommerce cart/checkout templates

= 1.1.0 =
* Add 5 style variations
* Add landing page patterns
* Add WooCommerce progress steps and trust badges patterns

= 1.0.0 =
* Initial release

== Resources ==

* DM Serif Display font, Google Fonts, SIL Open Font License, https://fonts.google.com/specimen/DM+Serif+Display
* Space Grotesk font, Google Fonts, SIL Open Font License, https://fonts.google.com/specimen/Space+Grotesk
