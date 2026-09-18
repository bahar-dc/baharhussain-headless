import { registerBlockType } from '@wordpress/blocks';
import metadata from './block.json';
import {
	InnerBlocks,
	useBlockProps,
	useInnerBlocksProps,
} from '@wordpress/block-editor';
import './why-ths-child.scss';
import Edit from './edit';
import Save from './save';

registerBlockType( metadata.name, {
	attributes: {
		...metadata.attributes,
	},
	icon: 'editor-table',
	edit: Edit,
	save: Save,
} );

registerBlockType( metadata.name + '-item', {
	apiVersion: 2,
	title: 'Item',
	icon: 'editor-table',
	supports: {
		inserter: false,
	},
	category: 'theme-block',
	edit: function InnerEdit() {
		const blockProps = useBlockProps( { className: 'engagement-item' } );
		const { children } = useInnerBlocksProps( blockProps, {
			allowedBlocks: [ metadata.name + '-item' ],
			template: [
				[
					'core/group',
					{ className: 'engagement-child-content-group-ctn' },
					[
						[
							'core/group',
							{ className: 'engagement-child-content-inner' },
							[
								[
									'core/heading',
									{
										level: 3,
										placeholder: 'Add title...',
										className:
											'engagement-child-content-heading',
									},
								],
								[
									'core/paragraph',
									{ placeholder: 'Add text...' },
								],
							],
						],
					],
				],
			],
			templateLock: true,
		} );

		return <div { ...blockProps }>{ children }</div>;
	},
	save() {
		const blockProps = useBlockProps.save( {
			className: 'engagement-item ',
		} );
		return (
			<div { ...blockProps }>
				<InnerBlocks.Content />
			</div>
		);
	},
} );
