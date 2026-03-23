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
     * Toggle transparent/solid state on scroll
     * Only applies transparent mode on pages with dark hero sections
     */
    function initHeaderScroll() {
        const header = document.querySelector('.site-header');
        if (!header) return;

        // Detect if first full-width group has dark background
        const hero = document.querySelector('.wp-site-blocks > .wp-block-group.alignfull:first-of-type');
        const hasDarkHero = hero &&
                            hero.classList.contains('has-background') &&
                            !hero.classList.contains('has-base-background-color');

        // Only add transparent class on pages with dark hero
        if (hasDarkHero) {
            header.classList.add('site-header--transparent');
        }

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
     * Initialize on DOM ready
     */
    document.addEventListener('DOMContentLoaded', function() {
        setCCLEEHeaderHeight();
        initHeaderScroll();
    });

    // Update header height on resize
    window.addEventListener('resize', setCCLEEHeaderHeight);

})();
