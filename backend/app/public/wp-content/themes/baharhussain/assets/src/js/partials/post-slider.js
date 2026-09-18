/**
 * Post Slider — scroll-based prev/next navigation.
 * Vanilla JS. Used by post-slider blocks across any page type.
 * Moved from ui-components.js (Part D, step 1.5).
 */
document.querySelectorAll( '[data-post-slider]' ).forEach( ( slider ) => {
	const track = slider.querySelector( '[data-post-slider-track]' );
	if ( ! track ) {
		return;
	}
	const container =
		slider.closest( '[data-post-slider-container]' ) || slider.parentElement;
	const prevBtn = container?.querySelector( '[data-post-slider-prev]' );
	const nextBtn = container?.querySelector( '[data-post-slider-next]' );
	if ( ! prevBtn && ! nextBtn ) {
		return;
	}

	const gap = parseInt( getComputedStyle( track ).gap ) || 20;
	const getScrollAmount = () => {
		const slide = track.children[ 0 ];
		return slide ? slide.getBoundingClientRect().width + gap : 300;
	};
	const updateButtons = () => {
		const { scrollLeft, scrollWidth, clientWidth } = track;
		prevBtn?.toggleAttribute( 'disabled', scrollLeft <= 5 );
		nextBtn?.toggleAttribute(
			'disabled',
			scrollLeft >= scrollWidth - clientWidth - 5
		);
	};
	prevBtn?.addEventListener( 'click', () => {
		if ( ! prevBtn.hasAttribute( 'disabled' ) ) {
			track.scrollBy( { left: -getScrollAmount(), behavior: 'smooth' } );
		}
	} );
	nextBtn?.addEventListener( 'click', () => {
		if ( ! nextBtn.hasAttribute( 'disabled' ) ) {
			track.scrollBy( { left: getScrollAmount(), behavior: 'smooth' } );
		}
	} );
	track.addEventListener( 'scroll', updateButtons );
	window.addEventListener( 'resize', updateButtons, { passive: true } );
	setTimeout( updateButtons, 100 );
} );
