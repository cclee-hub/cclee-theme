/**
 * theme.js — Theme interactivity
 */

(function() {
    'use strict';

    /**
     * Header scroll effect
     * Toggle transparent/solid state on scroll
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
     * Initialize on DOM ready
     */
    document.addEventListener('DOMContentLoaded', function() {
        initHeaderScroll();
    });

})();
