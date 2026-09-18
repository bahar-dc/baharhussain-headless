/**
 * Sticky header: shrink at the top and reveal it based on scroll direction.
 */

document.addEventListener( 'DOMContentLoaded', function() {
	const siteHeader = document.querySelector( '.site-header' );
	const siteFooter = document.getElementById( 'footer-section' );
	let lastScrollTop = window.scrollY || document.documentElement.scrollTop;
	let footerIsVisible = false;
	let ticking = false;
	const scrollThreshold = 8;

	function updateHeader() {
		const st = Math.max( window.scrollY || document.documentElement.scrollTop, 0 );

		document.querySelectorAll( 'header, body' ).forEach( function( el ) {
			el.classList.toggle( 'shrink', st > 0 );
		} );

		if ( siteHeader ) {
			const headerHeight = siteHeader.offsetHeight;
			const scrollDifference = st - lastScrollTop;
			const menuIsOpen = document.body.classList.contains( 'no-overflow' );

			if ( st <= headerHeight || menuIsOpen ) {
				siteHeader.classList.remove( 'site-header--hidden' );
				lastScrollTop = st;
			} else if ( footerIsVisible ) {
				siteHeader.classList.add( 'site-header--hidden' );
				lastScrollTop = st;
			} else if ( scrollDifference <= -scrollThreshold ) {
				siteHeader.classList.remove( 'site-header--hidden' );
				lastScrollTop = st;
			} else if ( scrollDifference >= scrollThreshold ) {
				siteHeader.classList.add( 'site-header--hidden' );
				lastScrollTop = st;
			}
		}

		ticking = false;
	}

	window.addEventListener( 'scroll', function() {
		if ( ! ticking ) {
			window.requestAnimationFrame( updateHeader );
			ticking = true;
		}
	}, { passive: true } );

	if ( siteHeader ) {
		siteHeader.addEventListener( 'focusin', function() {
			if ( ! footerIsVisible ) {
				siteHeader.classList.remove( 'site-header--hidden' );
			}
		} );
	}

	if ( siteHeader && siteFooter && 'IntersectionObserver' in window ) {
		const footerObserver = new IntersectionObserver( function( entries ) {
			footerIsVisible = entries[0].isIntersecting;
			updateHeader();
		}, { threshold: 0 } );

		footerObserver.observe( siteFooter );
	}

	updateHeader();

	// Update header height CSS variable.
	const headerWrappers = document.querySelectorAll( '.header-wrapper' );
	if ( headerWrappers.length ) {
		function updateHeaderHeight() {
			headerWrappers.forEach( function( wrapper ) {
				wrapper.style.setProperty(
					'--ths_header-wrapper-default',
					wrapper.offsetHeight + 'px'
				);
			} );
		}
		updateHeaderHeight();
		window.addEventListener( 'resize', updateHeaderHeight, { passive: true } );
	}
} );
