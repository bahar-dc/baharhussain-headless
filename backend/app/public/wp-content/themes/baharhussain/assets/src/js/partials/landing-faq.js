/**
 * Landing page FAQ: keep answers in the right-side panel.
 */
( function () {
	document.addEventListener( 'DOMContentLoaded', function () {
		document.querySelectorAll( '.landing-faq' ).forEach( function ( faq ) {
			const questions = Array.from(
				faq.querySelectorAll( '.landing-faq__question' )
			);
			const answerTitle = faq.querySelector( '.landing-faq__answer-title' );
			const answerText = faq.querySelector( '.landing-faq__answer-text' );

			if ( ! questions.length ) {
				return;
			}

			questions.forEach( function ( question ) {
				question.addEventListener( 'click', function () {
					const title = question.dataset.faqTitle;
					const answer = question.dataset.faqAnswer;
					const isAlreadyOpen = question.classList.contains( 'landing-faq__question--active' );

					if ( ! title || ! answer ) {
						return;
					}

					questions.forEach( function ( item ) {
						const marker = item.querySelector( 'span[aria-hidden="true"]' );
						const mobileAnswer = item.parentElement.querySelector( '.landing-faq__mobile-answer' );

						item.classList.remove( 'landing-faq__question--active' );
						item.setAttribute( 'aria-pressed', 'false' );
						item.setAttribute( 'aria-expanded', 'false' );

						if ( mobileAnswer ) {
							mobileAnswer.classList.remove( 'is-open' );
						}

						if ( marker ) {
							marker.textContent = '+';
						}
					} );

					if ( isAlreadyOpen ) {
						return;
					}

					const activeMarker = question.querySelector( 'span[aria-hidden="true"]' );
					const activeMobileAnswer = question.parentElement.querySelector( '.landing-faq__mobile-answer' );
					question.classList.add( 'landing-faq__question--active' );
					question.setAttribute( 'aria-pressed', 'true' );
					question.setAttribute( 'aria-expanded', 'true' );

					if ( activeMobileAnswer ) {
						activeMobileAnswer.classList.add( 'is-open' );
					}

					if ( activeMarker ) {
						activeMarker.textContent = '-';
					}

					if ( answerTitle && answerText ) {
						answerTitle.textContent = title;
						answerText.textContent = answer;
					}
				} );
			} );
		} );
	} );
} )();
