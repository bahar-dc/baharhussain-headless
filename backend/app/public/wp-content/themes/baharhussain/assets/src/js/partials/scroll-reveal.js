/**
 * Subtle, one-time reveal animations for page headings and content items.
 */

document.addEventListener( 'DOMContentLoaded', function() {
	if ( window.matchMedia( '(prefers-reduced-motion: reduce)' ).matches ) {
		return;
	}

	const itemSelector = [
		'main article',
		'main ul:not([role="menu"]) > li',
		'main ol > li',
		'main dl > div',
		'main .gfield',
	].join( ', ' );
	const items = Array.from( document.querySelectorAll( itemSelector ) )
		.filter( function( item ) {
			// Keep the Agency hero stats visible on initial render. The panel can
			// already be partially in view, which otherwise leaves a blank card
			// while its individual list items wait for the observer to trigger.
			return ! item.closest( '.landing-stats' );
		} );
	const headings = Array.from( document.querySelectorAll( 'main h1, main h2, main h3, main h4, main .section-head > *, main .home-section-head > *' ) )
		.filter( function( heading ) {
			return ! heading.classList.contains( 'screen-reader-text' ) &&
				! heading.closest( 'article, li, .gfield' );
		} );
	const elements = Array.from( new Set( headings.concat( items ) ) );
	const parentCounts = new WeakMap();

	elements.forEach( function( element ) {
		const isHeading = /^H[1-4]$/.test( element.tagName ) ||
			element.parentElement?.matches( '.section-head, .home-section-head' );
		const parent = element.parentElement;
		const itemIndex = parentCounts.get( parent ) || 0;

		element.classList.add( 'scroll-reveal' );
		element.classList.add( isHeading ? 'scroll-reveal--heading' : 'scroll-reveal--item' );
		element.style.setProperty( '--scroll-reveal-delay', Math.min( itemIndex, 5 ) * 70 + 'ms' );
		parentCounts.set( parent, itemIndex + 1 );
	} );

	if ( ! ( 'IntersectionObserver' in window ) ) {
		elements.forEach( function( element ) {
			element.classList.add( 'is-visible' );
		} );
		return;
	}

	const observer = new IntersectionObserver( function( entries ) {
		entries.forEach( function( entry ) {
			if ( entry.isIntersecting ) {
				entry.target.classList.add( 'is-visible' );
				observer.unobserve( entry.target );
			}
		} );
	}, {
		rootMargin: '0px 0px -8% 0px',
		threshold: 0.08,
	} );

	elements.forEach( function( element ) {
		observer.observe( element );
	} );
} );
