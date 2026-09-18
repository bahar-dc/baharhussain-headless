/**
 * Accessibility: submenu focus/blur handlers.
 */

document.addEventListener( 'DOMContentLoaded', function() {
	function bindFocusBlur( selector, getTarget ) {
		document.querySelectorAll( selector ).forEach( function( el ) {
			[ 'focus', 'blur' ].forEach( function( type ) {
				el.addEventListener( type, function() {
					const target = getTarget( this );
					if ( target ) target.classList.toggle( 'focused', type === 'focus' );
				} );
			} );
		} );
	}

	// Parent menu link → toggle sibling sub-menu/mega-menu.
	bindFocusBlur( '.menu-item-has-children > a', function( el ) {
		return el.parentElement.querySelector( '.sub-menu, .mega-menu' );
	} );

	// Sub-menu/mega-menu link → toggle closest sub-menu/mega-menu.
	bindFocusBlur( '.sub-menu a, .mega-menu a', function( el ) {
		return el.closest( '.sub-menu, .mega-menu' );
	} );
} );
