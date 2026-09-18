import { registerBlockType } from '@wordpress/blocks';
import './style.scss';
import './editor.scss';
import metadata from './block.json';
import { dbtCustomBlockAttributes } from '../block-components/ContainerComponent.jsx';
import '../block-components/CustomButtonOptions.jsx';
import Edit from './edit';
import Save from './save';

registerBlockType( metadata.name, {
	attributes: {
		...metadata.attributes,
		...dbtCustomBlockAttributes,
	},
	icon: 'screenoptions',
	edit: Edit,
	save: Save,
} );
