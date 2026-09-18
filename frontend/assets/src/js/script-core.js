/**
 * Core scripts — loaded on every page.
 *
 * These are the only scripts that must execute on every single page.
 * Page-specific scripts use dedicated entry points where needed.
 */
import './partials/navigation.js';
import './partials/sticky-header.js';
import './partials/accessibility.js';
import './partials/mobile-responsive.js';
import './partials/landing-faq.js';
import './partials/about-video-modal.js';
import './partials/content-protection.js';
import './partials/wordpress-experience-videos.js';
import './partials/scroll-reveal.js';

// Textarea autosize — inlined from ui-components.js (Part D, step 1.5).
( function () {
	document.addEventListener( 'DOMContentLoaded', function () {
		function resize( el ) {
			el.style.minHeight = 'auto';
			el.style.minHeight = el.scrollHeight + 'px';
		}
		document.querySelectorAll( '.textarea' ).forEach( function ( el ) {
			el.setAttribute( 'rows', 5 );
			resize( el );
			el.addEventListener( 'input', function () { resize( el ); } );
		} );
	} );
} )();
