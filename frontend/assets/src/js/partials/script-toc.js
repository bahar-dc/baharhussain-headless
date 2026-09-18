/**
 * TOC (Table of Contents) + heading scroll tracker + comment reply scroll.
 *
 * Enqueued on single posts.
 *
 * Comment reply scroll is post-only and is guarded by body.single-post inside JS.
 */

document.addEventListener( 'DOMContentLoaded', function() {
	/**
	 * Reconstruct the full outer HTML of a single element,
	 * preserving all attributes except tabindex.
	 */
	function fullHtml( el ) {
		const tag        = el.tagName.toLowerCase();
		const attributes = Array.from( el.attributes )
			.filter( ( a ) => a.name !== 'tabindex' )
			.map( ( a ) => ' ' + a.name + '="' + a.value + '"' )
			.join( '' );
		return '<' + tag + attributes + '>' + el.innerHTML + '</' + tag + '>';
	}

	// Build TOC from h2 headings inside .post-content-inner.
	let tocHTML = '';
	let count   = 1;

	document.querySelectorAll( '.post-content-inner h2' ).forEach( function( h2 ) {
		// Generate a URL-safe slug from the heading text.
		const id = h2.textContent
			.toLowerCase()
			.replace( /[^a-zA-Z0-9 ]/g, '' )
			.replace( /\s/g, '-' );

		// Insert an anchor div before the heading, then restore the heading.
		const anchor = document.createElement( 'div' );
		anchor.className = 'jump-link-post';
		anchor.id = id;
		h2.parentNode.insertBefore( anchor, h2 );

		if ( h2.textContent.trim() !== '' ) {
			tocHTML +=
				'<li><a href="#' + id + '"><span></span> ' +
				h2.textContent + '</a></li>';
			count++;
		}
	} );

	// Hide TOC widget when there are fewer than 3 headings.
	const headingLists = document.querySelector( '.heading-lists' );
	if ( tocHTML === '' || count < 4 ) {
		const tocWidget = document.querySelector( '.table-of-content' )
			?.closest( '.sidebar-widget' );
		if ( tocWidget ) tocWidget.style.display = 'none';
		if ( headingLists ) headingLists.style.display = 'none';
	}
	if ( headingLists ) {
		headingLists.insertAdjacentHTML( 'afterbegin', tocHTML );
	}

	// Highlight the TOC link for whichever heading is currently in the viewport.
	let prevContentId = null;

	window.addEventListener( 'scroll', function() {
		const headings = document.querySelectorAll( '.jump-link-post' );

		for ( let i = 0; i < headings.length; i++ ) {
			const headingId      = headings[ i ].id;
			const headingElement = document.getElementById( headingId );

			if ( headingElement && isInViewport( headingElement ) ) {
				updateTableOfContents( headingId );
				prevContentId = headingId;
				break;
			}
		}
	} );

	function updateTableOfContents( currentId ) {
		if ( prevContentId ) {
			const prev = document.querySelector( '.heading-lists a[href="#' + prevContentId + '"]' );
			if ( prev ) prev.classList.remove( 'current' );
		}
		const curr = document.querySelector( '.heading-lists a[href="#' + currentId + '"]' );
		if ( curr ) curr.classList.add( 'current' );
		prevContentId = currentId;
	}

	function isInViewport( element ) {
		const rect = element.getBoundingClientRect();
		return (
			rect.top    >= 0 &&
			rect.left   >= 0 &&
			rect.bottom <= ( window.innerHeight || document.documentElement.clientHeight ) &&
			rect.right  <= ( window.innerWidth  || document.documentElement.clientWidth )
		);
	}

	// Comment reply scroll — single posts only.
	// Offsets the browser's default anchor jump to account for the sticky header.
	if ( document.body.classList.contains( 'single-post' ) ) {
		document.addEventListener( 'click', function( e ) {
			if ( ! e.target.classList.contains( 'comment-reply-link' ) ) return;
			// Wait for WordPress comment-reply.js to move the #respond form first.
			setTimeout( function() {
				const respond      = document.getElementById( 'respond' );
				const headerSection = document.querySelector( '.header-section' );
				if ( respond ) {
					const headerHeight = headerSection ? headerSection.offsetHeight : 0;
					const top = respond.getBoundingClientRect().top + window.scrollY - headerHeight - 20;
					window.scrollTo( { top, behavior: 'smooth' } );
				}
			}, 100 );
		} );
	}
} );
