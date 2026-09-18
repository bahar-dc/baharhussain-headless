/**
 * Navigation: slideout menu, mobile submenu accordion, click-outside-to-close.
 */

document.addEventListener( 'DOMContentLoaded', function() {
	const navOverlay = document.querySelector( '.header-slideout' );
	const html = document.documentElement;
	const body = document.body;

	function qsa( sel ) {
		return Array.from( document.querySelectorAll( sel ) );
	}

	function closeAll() {
		qsa( '.menu-btn' ).forEach( function( el ) {
			el.classList.remove( 'active' );
		} );
		qsa( '.header-nav ul li.active' ).forEach( function( el ) {
			el.classList.remove( 'active' );
		} );
		if ( navOverlay ) {
			navOverlay.classList.remove( 'open' );
			navOverlay.setAttribute( 'aria-hidden', 'true' );
		}
		qsa( '.site-header > * .menu-btn' ).forEach( function( btn ) {
			btn.setAttribute( 'aria-expanded', 'false' );
		} );
		html.classList.remove( 'no-overflow' );
		body.classList.remove( 'no-overflow' );
	}

	// Hamburger toggle.
	qsa( '.menu-btn' ).forEach( function( btn ) {
		btn.addEventListener( 'click', function() {
			this.classList.toggle( 'active' );
			if ( navOverlay ) {
				navOverlay.classList.toggle( 'open' );
				const isOpen = navOverlay.classList.contains( 'open' );
				navOverlay.setAttribute( 'aria-hidden', isOpen ? 'false' : 'true' );
				this.setAttribute( 'aria-expanded', isOpen ? 'true' : 'false' );
			}
			html.classList.toggle( 'no-overflow' );
			body.classList.toggle( 'no-overflow' );
			qsa( '.header-nav ul li.active' ).forEach( function( el ) {
				el.classList.remove( 'active' );
			} );
		} );
	} );

	// Close button.
	qsa( '.js-close-slideout' ).forEach( function( btn ) {
		btn.addEventListener( 'click', closeAll );
	} );

	// Click outside slideout to close.
	qsa( '.header-slideout' ).forEach( function( el ) {
		el.addEventListener( 'click', function( e ) {
			if ( ! e.target.closest( '.header-slideout-inner' ) ) {
				closeAll();
			}
		} );
	} );

	// Mobile submenu accordion - inject toggle icon.
	qsa( '.menu-item-has-children > a:first-child' ).forEach( function( a ) {
		const icon = document.createElement( 'span' );
		icon.className = 'submenu-icon';
		a.after( icon );
	} );

	qsa( '.header-nav' ).forEach( function( headerNav ) {
		headerNav.addEventListener( 'click', function( e ) {
			const icon = e.target.closest( '.submenu-icon' );
			if ( ! icon ) {
				return;
			}
			const parentLi = icon.closest( 'li' );
			if ( ! parentLi ) {
				return;
			}

			// Close active siblings.
			Array.from( parentLi.parentElement.children ).forEach( function( sibling ) {
				if ( sibling !== parentLi && sibling.classList.contains( 'active' ) ) {
					sibling.classList.remove( 'active' );
					const sibUl = sibling.querySelector( 'ul' );
					if ( sibUl ) {
						sibUl.style.display = 'none';
					}
				}
			} );

			// Toggle self.
			const isActive = parentLi.classList.toggle( 'active' );
			const ul = parentLi.querySelector( 'ul' );
			if ( ul ) {
				ul.style.display = isActive ? '' : 'none';
			}

			// Toggle disabled-menu on all ancestor uls.
			let anc = parentLi.parentElement;
			while ( anc ) {
				if ( anc.tagName === 'UL' ) {
					anc.classList.toggle( 'disabled-menu', isActive );
				}
				anc = anc.parentElement;
			}
		} );
	} );
} );
