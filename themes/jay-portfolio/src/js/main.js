/**
 * Jay – Developer Portfolio: entrypoint voor Webpack.
 * Importeert de Sass en Bootstrap, plus eigen front-end code.
 */
import '../scss/main.scss';
import 'bootstrap';

(function () {
	'use strict';

	// Mobiele navigatie (les 7): hamburger-menu openen/sluiten.
	var navToggle = document.querySelector( '.nav-toggle' );
	var siteNav = document.getElementById( 'site-nav' );
	if ( navToggle && siteNav ) {
		navToggle.addEventListener( 'click', function () {
			var isOpen = siteNav.classList.toggle( 'is-open' );
			navToggle.setAttribute( 'aria-expanded', isOpen ? 'true' : 'false' );
		} );
	}

	// Toegankelijkheid (les 6): zet focus op de foutmelding van het contactformulier.
	var contactErrors = document.getElementById( 'contact-errors' );
	if ( contactErrors ) {
		contactErrors.focus();
	}

	// Soepel scrollen naar in-page ankers (#projecten, #over, #contact).
	document.querySelectorAll( 'a[href^="#"]' ).forEach( function ( link ) {
		link.addEventListener( 'click', function ( event ) {
			var id = link.getAttribute( 'href' );
			if ( id.length < 2 ) {
				return;
			}
			var target = document.querySelector( id );
			if ( target ) {
				event.preventDefault();
				target.scrollIntoView( { behavior: 'smooth', block: 'start' } );
			}
		} );
	} );
})();
