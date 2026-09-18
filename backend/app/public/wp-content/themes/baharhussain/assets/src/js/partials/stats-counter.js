/**
 * Stats Counter — animate .stat-title numbers from 0 to their target value
 * when they scroll into view. Uses IntersectionObserver (no jQuery).
 *
 * Loaded via viewScript on: ths/stats-boxes, ths/stats-rows, ths/hero-advertise.
 * Registered handle: wp-theme-stats-counter.
 */
( function () {
	const statEls = document.querySelectorAll( '.stat-title' );
	if ( ! statEls.length ) {
		return;
	}

	// Hide advertise-ctn stat titles until the animation fires.
	statEls.forEach( ( el ) => {
		if ( el.closest( '.advertise-ctn' ) ) {
			el.classList.add( 'counter-hidden' );
		}
	} );

	function animateCounter( el ) {
		const text = el.textContent.trim();
		const match = text.match( /[0-9]+(?:\.[0-9]+)?/ );
		if ( ! match ) {
			return;
		}

		if ( el.closest( '.advertise-ctn' ) ) {
			el.classList.remove( 'counter-hidden' );
			el.classList.add( 'counter-visible' );
		}

		const numericText = match[ 0 ];
		const prefix = text.substring( 0, text.indexOf( numericText ) );
		const suffix = text.substring(
			text.indexOf( numericText ) + numericText.length
		);
		const targetValue = parseFloat( numericText );
		if ( isNaN( targetValue ) ) {
			return;
		}

		const decimalPlaces = numericText.includes( '.' )
			? numericText.split( '.' )[ 1 ].length
			: 0;

		let animatedValue = 0;
		const totalFrames = 1000 / ( 1000 / 60 );
		const increment = targetValue / totalFrames;

		const updateCounter = () => {
			animatedValue += increment;
			if ( animatedValue >= targetValue ) {
				el.textContent =
					prefix + targetValue.toFixed( decimalPlaces ) + suffix;
			} else {
				el.textContent =
					prefix + animatedValue.toFixed( decimalPlaces ) + suffix;
				requestAnimationFrame( updateCounter );
			}
		};

		requestAnimationFrame( updateCounter );
	}

	const observer = new IntersectionObserver(
		( entries ) => {
			entries.forEach( ( entry ) => {
				if (
					entry.isIntersecting &&
					! entry.target.dataset.animated
				) {
					entry.target.dataset.animated = '1';
					animateCounter( entry.target );
					observer.unobserve( entry.target );
				}
			} );
		},
		{ threshold: 0.1 }
	);

	statEls.forEach( ( el ) => observer.observe( el ) );
} )();
