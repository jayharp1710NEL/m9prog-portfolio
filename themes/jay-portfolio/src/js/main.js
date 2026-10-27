/**
 * Jay – Developer Portfolio: entrypoint voor Webpack.
 * Importeert de Sass en Bootstrap, plus eigen front-end code.
 */
import '../scss/main.scss';
import 'bootstrap';

(function () {
	'use strict';

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
