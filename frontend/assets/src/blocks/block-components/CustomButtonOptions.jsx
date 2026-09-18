import domReady from '@wordpress/dom-ready';
import { registerBlockStyle, unregisterBlockStyle } from '@wordpress/blocks';

const BUTTON_STYLES = [
	{ name: 'main', label: 'Main' },
	{ name: 'outline', label: 'Outline' },
	{ name: 'secondary', label: 'Secondary' },
	{ name: 'dark', label: 'Dark' },
	{ name: 'text', label: 'Text' },
];

domReady( () => {
	setTimeout( () => {
		unregisterBlockStyle( 'core/button', 'fill' );
		unregisterBlockStyle( 'core/button', 'outline' );

		BUTTON_STYLES.forEach( ( style ) => {
			registerBlockStyle( 'core/button', style );
		} );
	}, 0 );
} );
