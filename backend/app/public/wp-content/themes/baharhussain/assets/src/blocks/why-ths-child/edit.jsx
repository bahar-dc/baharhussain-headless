import {
	useBlockProps,
	useInnerBlocksProps,
} from '@wordpress/block-editor';
import metadata from './block.json';
import BlockPreview from '../block-components/BlockPreviewImage.jsx';

function Edit( props ) {
	const { attributes } = props;
	const blockProps = useBlockProps();

	const innerBlocksProps = useInnerBlocksProps( blockProps, {
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

	// Preview mode
	return (
		<div { ...blockProps }>
			<div id="engagement-section" className="dynamic-block">
				<div className="inner-engagement engagement-ctn">
					{ innerBlocksProps.children }
				</div>
			</div>
		</div>
	);
}

export default BlockPreview( metadata, Edit );
