import { registerBlockType } from '@wordpress/blocks';
import metadata from './block.json';
import Edit from './edit';
import Save from './save';

registerBlockType( metadata.name, {
	icon: 'editor-textcolor',
	edit: Edit,
	save: Save,
} );
