/**
 * Send successful Gravity Forms submissions to Google Analytics.
 */
jQuery( document ).on( 'gform_confirmation_loaded', ( event, formId ) => {
	const events = {
		1: 'contact_form_submit',
		5: 'private_work_form_submit',
	};
	const eventName = events[ formId ] || 'gravity_form_submit';

	if ( typeof window.gtag === 'function' ) {
		window.gtag( 'event', eventName, {
			form_id: formId,
		} );
	}
} );
