/**
 * theme.js — Theme interactivity
 */

(function() {
    'use strict';

    /**
     * Dynamic header height CSS variable
     * Updates --header-height based on actual header height
     */
    function setCCLEEHeaderHeight() {
        const header = document.querySelector('.site-header');
        if (header) {
            document.documentElement.style.setProperty(
                '--header-height',
                header.offsetHeight + 'px'
            );
        }
    }

    /**
     * Header scroll effect
     * All header variants get scroll shadow; transparent variant also gets frosted glass
     */
    function initHeaderScroll() {
        const header = document.querySelector('.site-header');
        if (!header) return;

        const scrollThreshold = 50;

        function updateHeaderState() {
            if (window.scrollY > scrollThreshold) {
                header.classList.add('is-scrolled');
            } else {
                header.classList.remove('is-scrolled');
            }
        }

        // Initial check
        updateHeaderState();

        // Listen for scroll with throttling
        let ticking = false;
        window.addEventListener('scroll', function() {
            if (!ticking) {
                window.requestAnimationFrame(function() {
                    updateHeaderState();
                    ticking = false;
                });
                ticking = true;
            }
        }, { passive: true });
    }

    /**
     * Product Archive View Toggle
     * Switch between grid and list view
     */
    function initViewToggle() {
        const toggleContainer = document.querySelector('.cclee-view-toggle');
        if (!toggleContainer) return;

        const buttons = toggleContainer.querySelectorAll('.cclee-view-toggle__btn');
        const productGrid = document.querySelector('.cclee-products-wrapper');
        if (!productGrid) return;

        // Load saved preference
        const savedView = localStorage.getItem('cclee-product-view') || 'grid';
        productGrid.classList.add('is-view-' + savedView);
        toggleContainer.querySelector('[data-view="' + savedView + '"]').classList.add('is-active');

        buttons.forEach(function(btn) {
            btn.addEventListener('click', function() {
                const view = this.getAttribute('data-view');

                // Update buttons
                buttons.forEach(function(b) { b.classList.remove('is-active'); });
                this.classList.add('is-active');

                // Update grid
                productGrid.classList.remove('is-view-grid', 'is-view-list');
                productGrid.classList.add('is-view-' + view);

                // Save preference
                localStorage.setItem('cclee-product-view', view);
            });
        });
    }

    /**
     * Mobile Bottom Navigation
     * Update cart count dynamically
     */
    function initMobileBottomNav() {
        const mobileNav = document.querySelector('.cclee-mobile-bottom-nav');
        if (!mobileNav) return;

        // Update cart count when WooCommerce cart updates
        if (typeof jQuery !== 'undefined' && typeof wc_add_to_cart_params !== 'undefined') {
            jQuery(document.body).on('added_to_cart updated_cart_totals', function() {
                // Fetch updated cart count
                fetch((window.ccleeTheme && window.ccleeTheme.restUrl ? window.ccleeTheme.restUrl : '/wp-json/') + 'wc/v3/cart/', {
                    credentials: 'same-origin'
                })
                .then(response => response.json())
                .then(data => {
                    const count = data.items_count || 0;
                    const countEl = mobileNav.querySelector('.cclee-mobile-bottom-nav__cart-count');
                    if (countEl) {
                        countEl.textContent = count;
                        countEl.style.display = count > 0 ? 'flex' : 'none';
                    }
                })
                .catch(function() {
                    // Silently fail if cart API not available
                });
            });
        }

        // Set active state based on current URL
        const currentPath = window.location.pathname;
        const navItems = mobileNav.querySelectorAll('.cclee-mobile-bottom-nav__item');
        navItems.forEach(function(item) {
            const href = item.getAttribute('href');
            if (href && (currentPath === href || (href !== '/' && currentPath.startsWith(href)))) {
                item.classList.add('cclee-mobile-bottom-nav__item--active');
            }
        });
    }

    /**
     * Initialize on DOM ready
     */
    document.addEventListener('DOMContentLoaded', function() {
        setCCLEEHeaderHeight();
        initHeaderScroll();
        initViewToggle();
        initMobileBottomNav();
    });

    // Update header height on resize
    window.addEventListener('resize', setCCLEEHeaderHeight);

})();
