/**
 * Top bar: dismissible announcement bar with localStorage-based expiry.
 * Sets CSS custom properties for header height/offset calculations.
 * Self-initialises on DOMContentLoaded for #top-bar-ajax.
 */
document.addEventListener( 'DOMContentLoaded', function() {
	const element = document.getElementById( 'top-bar-ajax' );
	if ( ! element ) return;

	const topbar = getWithExpiry( 'topbar' );
	if ( null === topbar ) {
		document.body.classList.add( 'have-topbar' );
		element.style.display = '';
	} else {
		document.body.classList.remove( 'have-topbar' );
		element.style.display = 'none';
	}

	// Update CSS custom properties for sticky header positioning.
	// --ths_header-height: topbar height
	// --ths_header-top: negative offset to hide topbar on scroll (accounts for admin bar).
	function setCSSVars() {
		document.body.style.setProperty( '--ths_header-height', element.offsetHeight + 'px' );
		const adminBar = document.getElementById( 'wpadminbar' );
		if ( document.body.classList.contains( 'logged-in' ) && adminBar ) {
			document.body.style.setProperty(
				'--ths_header-top',
				( ( element.offsetHeight - adminBar.offsetHeight ) * -1 ) + 'px'
			);
			document.body.style.setProperty(
				'--ths_header-top-default',
				adminBar.offsetHeight + 'px'
			);
		} else {
			document.body.style.setProperty( '--ths_header-top', '-' + element.offsetHeight + 'px' );
			document.body.style.setProperty( '--ths_header-top-default', '0px' );
		}
	}

	setCSSVars();

	// Recalculate on resize.
	window.addEventListener( 'resize', setCSSVars, { passive: true } );

	const toggleTopbar = () => {
		document.body.classList.add( 'hide-topbar' );
		document.body.classList.remove( 'have-topbar' );
		setWithExpiry( 'topbar', 'closed', 0, 86400 * 60 * 24 );
	};

	const closeBtn = element.querySelector( '.top-bar-cross' );
	if ( closeBtn ) {
		closeBtn.addEventListener( 'click', toggleTopbar );
		closeBtn.addEventListener( 'focus', function() {
			closeBtn.addEventListener( 'keydown', ( e ) => {
				if ( e.key === 'Enter' ) {
					toggleTopbar();
				}
			} );
		} );
	}

	document.addEventListener( 'keydown', ( e ) => {
		if ( e.key === 'Escape' ) {
			toggleTopbar();
		}
	} );

	/**
	 * localStorage with TTL: get stored value or null if expired.
	 *
	 * @param {string} key localStorage key.
	 * @return {Object|null} Parsed item or null.
	 */
	function getWithExpiry( key ) {
		const itemStr = localStorage.getItem( key );
		if ( ! itemStr ) {
			return null;
		}
		const item = JSON.parse( itemStr );
		const now = new Date();
		if ( now.getTime() > item.expiry ) {
			localStorage.removeItem( key );
			return null;
		}
		return item;
	}

	/**
	 * localStorage with TTL: store value with expiration timestamp.
	 *
	 * @param {string} key      localStorage key.
	 * @param {*}      value    Value to store.
	 * @param {number} discount Discount amount (default 0).
	 * @param {number} ttl      Time-to-live in milliseconds.
	 */
	function setWithExpiry( key, value, discount = 0, ttl ) {
		const now = new Date();
		const item = {
			value,
			discount,
			expiry: now.getTime() + ttl,
		};
		localStorage.setItem( key, JSON.stringify( item ) );
	}
} );
