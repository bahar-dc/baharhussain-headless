/**
 * Mobile-responsive behaviors: sticky footer buttons, card height
 * equalization, and data-post-slider height matching.
 */

/** Equalize post-slider card heights on mobile (<1003px). */
function equalizePostSliderHeight() {
	if ( window.innerWidth > 1003 ) {
		document.querySelectorAll( '.post-slider .post-slide' ).forEach( function( el ) {
			el.style.height = 'auto';
		} );
		return;
	}

	document.querySelectorAll( '.post-slider' ).forEach( function( slider ) {
		const slides = Array.from( slider.querySelectorAll( '.post-slide' ) );
		slides.forEach( function( el ) {
			el.style.height = 'auto';
		} );
		const max = slides.reduce( function( m, el ) {
			return Math.max( m, el.offsetHeight );
		}, 0 );
		slides.forEach( function( el ) {
			el.style.height = max + 'px';
		} );
	} );
}

/** Equalize sidebar post-card heights on mobile (<=767px). */
function equalPostCardHeight() {
	const cards = document.querySelectorAll( '.post-card' );
	if ( window.innerWidth <= 767 ) {
		cards.forEach( function( el ) {
			el.style.height = 'auto';
		} );
		const targets = Array.from( document.querySelectorAll( '.post-archive-right .post-cards-horizontal .post-card' ) );
		const max = targets.reduce( function( m, el ) {
			return Math.max( m, el.offsetHeight );
		}, 0 );
		targets.forEach( function( el ) {
			el.style.height = max + 'px';
		} );
	} else {
		cards.forEach( function( el ) {
			el.style.height = 'auto';
		} );
	}
}

document.addEventListener( 'DOMContentLoaded', function() {
	if ( window.innerWidth < 1004 ) {
		const footer = document.querySelector( '.footer-section' );
		const buttons = document.querySelectorAll( '.mobile-sticky-buttons, .post-navigation-buttons' );
		if ( footer && buttons.length ) {
			function checkFooter() {
				const footerTop = footer.getBoundingClientRect().top + window.scrollY;
				const hide = ( window.scrollY + window.innerHeight ) >= ( footerTop - 20 );
				buttons.forEach( function( el ) {
					el.classList.toggle( 'hide', hide );
				} );
			}
			window.addEventListener( 'scroll', checkFooter );
			window.addEventListener( 'resize', checkFooter );
			checkFooter();
		}

		equalizePostSliderHeight();

		window.addEventListener( 'load', function() {
			document.querySelectorAll( '.post-cards-horizontal' ).forEach( function( row ) {
				const rowCards = Array.from( row.querySelectorAll( '.post-card' ) );
				rowCards.forEach( function( el ) {
					el.style.height = 'auto';
				} );
				const max = rowCards.reduce( function( m, el ) {
					return Math.max( m, el.offsetHeight );
				}, 0 );
				rowCards.forEach( function( el ) {
					el.style.height = max + 'px';
				} );
			} );
		} );
	}

	window.addEventListener( 'load', equalizePostSliderHeight );
	window.addEventListener( 'resize', equalizePostSliderHeight );

	equalPostCardHeight();
	window.addEventListener( 'resize', equalPostCardHeight );
} );
