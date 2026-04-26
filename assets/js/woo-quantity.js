/**
 * WooCommerce Quantity Stepper — +/- buttons for single product page.
 *
 * Uses CSS pseudo-elements (::before/::after) for the visual buttons;
 * this script wires up click events to increment/decrement the input.
 */
(function () {
	'use strict';

	document.addEventListener('click', function (e) {
		var qtyWrap = e.target.closest && e.target.closest('.quantity');
		if (!qtyWrap) return;

		var input = qtyWrap.querySelector('.qty');
		if (!input) return;

		var min  = parseFloat(input.min) || 0;
		var max  = parseFloat(input.max) || Infinity;
		var step = parseFloat(input.step) || 1;
		var val  = parseFloat(input.value) || 0;

		var rect = qtyWrap.getBoundingClientRect();
		var x    = e.clientX - rect.left;

		if (x < 40) {
			val = Math.max(min, val - step);
		} else if (x > rect.width - 40) {
			val = Math.min(max, val + step);
		} else {
			return;
		}

		input.value = val;
		input.dispatchEvent(new Event('change', { bubbles: true }));
	});
})();
