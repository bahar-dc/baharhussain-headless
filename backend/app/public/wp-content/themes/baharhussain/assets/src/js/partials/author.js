/**
 * Author page - show-more / hide toggle for author bio text.
 * Enqueued only on is_author() pages.
 */

document.addEventListener( 'DOMContentLoaded', function() {
// Toggle button click: clamp / unclamp bio text.
document.querySelectorAll( '.show-more-btn' ).forEach( function( btn ) {
btn.addEventListener( 'click', function() {
const textContent = this.closest( '.author-text' )
?.querySelector( '.text-content' );
if ( ! textContent ) return;

if ( textContent.classList.contains( 'clamped' ) ) {
textContent.classList.remove( 'clamped' );
this.textContent = 'Hide';
this.classList.remove( 'show-more' );
this.classList.add( 'show-less' );
} else {
textContent.classList.add( 'clamped' );
this.textContent = 'Show More';
this.classList.add( 'show-more' );
this.classList.remove( 'show-less' );
}
} );
} );

// Show or hide the toggle button based on whether text is actually clamped.
function updateShowMoreButtons() {
document.querySelectorAll( '.author-text .text-content' ).forEach( function( textContent ) {
const button = textContent.parentElement?.querySelector( '.show-more-btn' );
if ( ! button ) return;

if ( textContent.scrollHeight > textContent.clientHeight ) {
button.style.display = 'inline-flex';
} else {
button.style.display = 'none';
textContent.classList.remove( 'clamped' );
button.textContent = 'Show More';
button.classList.add( 'show-more' );
button.classList.remove( 'show-less' );
}
} );
}

window.addEventListener( 'load', updateShowMoreButtons );
window.addEventListener( 'resize', updateShowMoreButtons );
} );