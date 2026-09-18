// /**
//  * Discourage casual copying and downloading of site media.
//  *
//  * This is a UI deterrent only. Browser developer tools and files already sent
//  * to a visitor cannot be made inaccessible by front-end JavaScript.
//  */
// document.addEventListener( 'contextmenu', ( event ) => {
// 	event.preventDefault();
// } );

// const isEditableContent = ( target ) =>
// 	Boolean( target.closest( 'input, textarea, select, [contenteditable="true"]' ) );

// document.addEventListener( 'selectstart', ( event ) => {
// 	if ( ! isEditableContent( event.target ) ) {
// 		event.preventDefault();
// 	}
// } );

// document.addEventListener( 'copy', ( event ) => {
// 	if ( ! isEditableContent( event.target ) ) {
// 		event.preventDefault();
// 	}
// } );

// document.addEventListener( 'cut', ( event ) => {
// 	if ( ! isEditableContent( event.target ) ) {
// 		event.preventDefault();
// 	}
// } );

// document.addEventListener( 'keydown', ( event ) => {
// 	const key = event.key.toLowerCase();
// 	const modifier = event.ctrlKey || event.metaKey;
// 	const devToolsShortcut =
// 		event.key === 'F12' ||
// 		( modifier && event.shiftKey && [ 'c', 'i', 'j', 'k' ].includes( key ) ) ||
// 		( event.metaKey && event.altKey && [ 'c', 'i', 'j', 'u' ].includes( key ) ) ||
// 		( modifier && key === 'u' );

// 	if ( devToolsShortcut ) {
// 		event.preventDefault();
// 		event.stopPropagation();
// 	}
// } );

// document.addEventListener( 'dragstart', ( event ) => {
// 	if ( event.target.closest( 'img, video' ) ) {
// 		event.preventDefault();
// 	}
// } );

// document.addEventListener( 'DOMContentLoaded', () => {
// 	document.querySelectorAll( 'img' ).forEach( ( image ) => {
// 		image.setAttribute( 'draggable', 'false' );
// 	} );

// 	document.querySelectorAll( 'video' ).forEach( ( video ) => {
// 		video.setAttribute( 'controlslist', 'nodownload' );
// 		video.setAttribute( 'disablepictureinpicture', '' );
// 	} );
// } );
