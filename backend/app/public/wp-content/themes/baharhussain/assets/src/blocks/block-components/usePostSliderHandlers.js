import { useEffect, useRef } from '@wordpress/element';

export default function usePostSliderHandlers() {
	const blockRef = useRef( null );

	useEffect( () => {
		const root = blockRef.current;
		if ( ! root ) {
			return undefined;
		}

		const teardownSlider = ( slider ) => {
			const track = slider.querySelector( '[data-post-slider-track]' );
			if ( ! track || ! track._thsSliderHandlers ) {
				return;
			}
			const h = track._thsSliderHandlers;
			h.prevBtn?.removeEventListener( 'click', h.onPrev );
			h.nextBtn?.removeEventListener( 'click', h.onNext );
			track.removeEventListener( 'scroll', h.onScroll );
			window.removeEventListener( 'resize', h.onResize );
			delete track._thsSliderHandlers;
			delete track.dataset.sliderInit;
		};

		const setupSlider = ( slider ) => {
			const track = slider.querySelector( '[data-post-slider-track]' );
			if ( ! track || track.dataset.sliderInit === 'true' ) {
				return;
			}
			const container =
				slider.closest( '[data-post-slider-container]' ) ||
				slider.parentElement;
			const prevBtn = container?.querySelector( '[data-post-slider-prev]' );
			const nextBtn = container?.querySelector( '[data-post-slider-next]' );
			if ( ! prevBtn && ! nextBtn ) {
				return;
			}

			const getScrollAmount = () => {
				const gap = parseInt( getComputedStyle( track ).gap ) || 20;
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

			const onPrev = () => {
				if ( ! prevBtn?.hasAttribute( 'disabled' ) ) {
					track.scrollBy( { left: -getScrollAmount(), behavior: 'smooth' } );
				}
			};
			const onNext = () => {
				if ( ! nextBtn?.hasAttribute( 'disabled' ) ) {
					track.scrollBy( { left: getScrollAmount(), behavior: 'smooth' } );
				}
			};
			const onScroll = () => updateButtons();
			const onResize = () => updateButtons();

			prevBtn?.addEventListener( 'click', onPrev );
			nextBtn?.addEventListener( 'click', onNext );
			track.addEventListener( 'scroll', onScroll );
			window.addEventListener( 'resize', onResize );

			track.dataset.sliderInit = 'true';
			track._thsSliderHandlers = { prevBtn, nextBtn, onPrev, onNext, onScroll, onResize };
			setTimeout( updateButtons, 100 );
		};

		const initAll = () => {
			root.querySelectorAll( '[data-post-slider]' ).forEach( setupSlider );
		};

		initAll();
		const observer = new MutationObserver( () => initAll() );
		observer.observe( root, { childList: true, subtree: true } );

		return () => {
			observer.disconnect();
			root.querySelectorAll( '[data-post-slider]' ).forEach( teardownSlider );
		};
	}, [] );

	return blockRef;
}
