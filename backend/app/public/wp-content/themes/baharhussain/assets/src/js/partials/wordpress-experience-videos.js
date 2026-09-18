/**
 * Controls the videos on the WordPress Experience page.
 */
document.addEventListener( 'DOMContentLoaded', () => {
	const mediaItems = Array.from(
		document.querySelectorAll( '.wordpress-editor-overview__media' )
	)
		.map( ( media ) => ( {
			media,
			video: media.querySelector( 'video' ),
			control: media.querySelector( '.wordpress-experience-video__control' ),
		} ) )
		.filter( ( item ) => item.video && item.control );

	if ( ! mediaItems.length ) {
		return;
	}

	const pauseLabel = 'Pause video';
	const playLabel = 'Play video';
	const visibilityRatios = new Map();

	const updateControl = ( item ) => {
		const isPaused = item.video.paused;
		item.control.classList.toggle( 'is-paused', isPaused );
		item.media.classList.toggle( 'is-playing', ! isPaused );
		item.control.setAttribute( 'aria-label', isPaused ? playLabel : pauseLabel );
	};

	const showControlTemporarily = ( item ) => {
		item.control.classList.remove( 'is-hidden' );
	};

	mediaItems.forEach( ( item ) => {
		item.video.pause();

		item.control.addEventListener( 'click', () => {
			mediaItems.forEach( ( otherItem ) => {
				if ( otherItem !== item && ! otherItem.video.paused ) {
					otherItem.video.pause();
					updateControl( otherItem );
					showControlTemporarily( otherItem );
				}
			} );

			if ( item.video.paused ) {
				item.video.play().catch( () => {
					updateControl( item );
				} );
			} else {
				item.video.pause();
			}

			updateControl( item );
			showControlTemporarily( item );
		} );

		item.video.addEventListener( 'play', () => updateControl( item ) );
		item.video.addEventListener( 'pause', () => updateControl( item ) );

		updateControl( item );
		showControlTemporarily( item );
	} );

	if ( 'IntersectionObserver' in window ) {
		const observer = new IntersectionObserver(
			( entries ) => {
				entries.forEach( ( entry ) => {
					const item = mediaItems.find(
						( mediaItem ) => mediaItem.media === entry.target
					);

					if ( item ) {
						visibilityRatios.set(
							item,
							entry.isIntersecting ? entry.intersectionRatio : 0
						);
					}
				} );

				const visibleItem = mediaItems
					.filter( ( item ) => ( visibilityRatios.get( item ) || 0 ) >= 0.4 )
					.sort(
						( firstItem, secondItem ) =>
							( visibilityRatios.get( secondItem ) || 0 ) -
							( visibilityRatios.get( firstItem ) || 0 )
					)[ 0 ];

				mediaItems.forEach( ( item ) => {
					if ( item !== visibleItem && ! item.video.paused ) {
						item.video.pause();
						updateControl( item );
						showControlTemporarily( item );
					}
				} );

				if ( visibleItem && visibleItem.video.paused ) {
					visibleItem.video.play().catch( () => {
						updateControl( visibleItem );
					} );
					updateControl( visibleItem );
				}
			},
			{
				threshold: [ 0, 0.25, 0.4, 0.6, 0.8, 1 ],
			}
		);

		mediaItems.forEach( ( item ) => {
			visibilityRatios.set( item, 0 );
			observer.observe( item.media );
		} );
	}
} );
