/**
 * About page introduction video modal.
 */
( function () {
	document.addEventListener( 'DOMContentLoaded', function () {
		const modal = document.querySelector( '[data-about-video-modal]' );
		const frame = modal?.querySelector( '[data-about-video-frame]' );
		const triggers = document.querySelectorAll( '[data-about-video-open]' );

		if ( ! modal || ! frame || ! triggers.length ) {
			return;
		}

		const fallbackContent = frame.innerHTML;
		let activeTrigger = null;

		function getEmbedUrl( url ) {
			try {
				const parsed = new URL( url );
				const host = parsed.hostname.replace( 'www.', '' );

				if ( host === 'youtu.be' ) {
					return 'https://www.youtube.com/embed/' + parsed.pathname.slice( 1 ) + '?autoplay=1';
				}

				if ( host.includes( 'youtube.com' ) ) {
					const videoId = parsed.searchParams.get( 'v' ) || parsed.pathname.split( '/embed/' )[ 1 ];

					if ( videoId ) {
						return 'https://www.youtube.com/embed/' + videoId + '?autoplay=1';
					}
				}

				if ( host.includes( 'vimeo.com' ) ) {
					const videoId = parsed.pathname.split( '/' ).filter( Boolean ).pop();

					if ( videoId ) {
						return 'https://player.vimeo.com/video/' + videoId + '?autoplay=1';
					}
				}
			} catch ( error ) {
				return '';
			}

			return url;
		}

		function isDirectVideo( url ) {
			return /\.(mp4|webm|ogg)(\?.*)?$/i.test( url );
		}

		function openVideo( trigger ) {
			const videoUrl = trigger.dataset.videoUrl;
			const embedUrl = videoUrl ? getEmbedUrl( videoUrl ) : '';
			let media = null;

			activeTrigger = trigger;

			if ( embedUrl && isDirectVideo( embedUrl ) ) {
				media = document.createElement( 'video' );
				media.src = embedUrl;
				media.controls = true;
				media.autoplay = true;
				media.playsInline = true;
			} else if ( embedUrl ) {
				media = document.createElement( 'iframe' );
				media.src = embedUrl;
				media.title = 'Introduction video';
				media.allow = 'autoplay; encrypted-media; picture-in-picture';
				media.allowFullscreen = true;
			}

			if ( media ) {
				frame.replaceChildren( media );
			} else {
				frame.innerHTML = fallbackContent;
			}

			modal.hidden = false;
			document.documentElement.classList.add( 'no-overflow' );
			document.body.classList.add( 'no-overflow' );
			modal.querySelector( '[data-about-video-close]' )?.focus();
		}

		function closeVideo() {
			modal.hidden = true;
			frame.innerHTML = fallbackContent;
			document.documentElement.classList.remove( 'no-overflow' );
			document.body.classList.remove( 'no-overflow' );

			if ( activeTrigger ) {
				activeTrigger.focus();
				activeTrigger = null;
			}
		}

		triggers.forEach( function ( trigger ) {
			trigger.addEventListener( 'click', function ( event ) {
				event.preventDefault();
				openVideo( trigger );
			} );
		} );

		modal.querySelectorAll( '[data-about-video-close]' ).forEach( function ( closeButton ) {
			closeButton.addEventListener( 'click', closeVideo );
		} );

		document.addEventListener( 'keydown', function ( event ) {
			if ( event.key === 'Escape' && ! modal.hidden ) {
				closeVideo();
			}
		} );
	} );
} )();
