import { registerBlockType } from '@wordpress/blocks';
import metadata from './block.json';
import Edit from './edit';
import Save from './save';

registerBlockType( metadata.name, {
	icon: 'email-alt',
	edit: Edit,
	save: Save,
} );
