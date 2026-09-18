import { createBlock } from '@wordpress/blocks';
import { dispatch, select } from '@wordpress/data';
import { useBlockProps, useInnerBlocksProps } from '@wordpress/block-editor';
import { ContainerOptions, ContainerShell } from '../block-components/ContainerComponent.jsx';
import { Button } from '@wordpress/components';
import metadata from './block.json';
import BlockPreview from '../block-components/BlockPreviewImage.jsx';

const findBlock = ( blocks, conditionFn ) => {
	for ( const block of blocks ) {
		if ( conditionFn( block ) ) {
			return block;
		}
		if ( block.innerBlocks?.length ) {
			const found = findBlock( block.innerBlocks, conditionFn );
			if ( found ) {
				return found;
			}
		}
	}
	return null;
};

const insertIntoBlock = ( { rootClientId, conditionFn, newBlock } ) => {
	const { getBlocks } = select( 'core/block-editor' );
	// eslint-disable-next-line @wordpress/no-unused-vars-before-return
	const { insertBlock } = dispatch( 'core/block-editor' );

	// eslint-disable-next-line @wordpress/no-unused-vars-before-return
	const rootBlocks = getBlocks( rootClientId );
	const targetBlock = findBlock( rootBlocks, conditionFn );

	if ( ! targetBlock ) {
		// eslint-disable-next-line no-console
		console.warn( 'Target container not found' );
		return;
	}

	insertBlock( newBlock, undefined, targetBlock.clientId );
};

function Edit( props ) {
	const { attributes, clientId } = props;
	const blockProps = useBlockProps();
	const { children } = useInnerBlocksProps( blockProps, {
		template: [
			// Section Head Wrapper
			[
				'core/group',
				{
					className: 'engagement-section-head-container',
					metadata: { name: 'Section Head' },
				},
				[
					[
						'core/group',
						{ className: 'mi-auto center-align' },
						[
							[
								'core/heading',
								{ placeholder: 'Add title...', level: 2 },
							],
							[
								'core/paragraph',
								{ placeholder: 'Add text...' },
							],
						],
					],
				],
			],
			// Engagement Content Container
			[
				'core/group',
				{ className: 'engagement-content-ctn' },
				[
					[
						'core/group',
						{ className: 'engagement-content-ctn-left' },
						[
							[
								'core/paragraph',
								{
									placeholder:
										'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam mi sem, hendrerit ut rutrum id, vehicula sed elit. Sed varius molestie sem.',
									className: 'engagement-title',
								},
							],
							[
								'core/group',
								{
									className: 'engagement-content',
									metadata: { name: 'ENGAGEMENT_CONTENT' },
								},
								[
									[ metadata.name + '-item' ],
									[ metadata.name + '-item' ],
									[ metadata.name + '-item' ],
								],
							],
							[
								'core/buttons',
								{},
								[
									[
										'core/button',
										{
											placeholder: 'Button text',
										},
									],
								],
							],
						],
					],
					[
						'core/group',
						{ className: 'engagement-content-ctn-right' },
						[ [ 'core/image' ] ],
					],
				],
			],
		],
		templateLock: false,
	} );

	return (
		<>
			<ContainerOptions props={ props } />
			<ContainerShell props={ props } blockProps={ blockProps } blockClass="engagement-section">
				<div id="engagement-section" className="dynamic-block">
					<div className="inner-engagement engagement-ctn">
						{ children }
						<Button
							variant="primary"
							onClick={ () => {
								insertIntoBlock( {
									rootClientId: clientId,
									conditionFn: ( block ) =>
										block.attributes?.metadata?.name ===
										'ENGAGEMENT_CONTENT',
									newBlock: createBlock(
										metadata.name + '-item'
									),
								} );
							} }
						>
							Add Feature Item
						</Button>
					</div>
				</div>
			</ContainerShell>
		</>
	);
}

export default BlockPreview( metadata, Edit );
