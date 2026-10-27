/**
 * Jay – Developer Portfolio: front-end scripts.
 * Klein en zonder dependencies; ingeladen via wp_enqueue_script().
 */
(function () {
	'use strict';

	// Soepel scrollen naar in-page ankers (#projecten, #over, #contact).
	document.querySelectorAll('a[href^="#"]').forEach(function (link) {
		link.addEventListener('click', function (event) {
			var id = link.getAttribute('href');
			if (id.length < 2) {
				return;
			}
			var target = document.querySelector(id);
			if (target) {
				event.preventDefault();
				target.scrollIntoView({ behavior: 'smooth', block: 'start' });
			}
		});
	});
})();
