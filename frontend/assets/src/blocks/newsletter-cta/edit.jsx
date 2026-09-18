import { __ } from '@wordpress/i18n';
import { useBlockProps, useInnerBlocksProps } from '@wordpress/block-editor';
import { ContainerOptions, ContainerShell } from '../block-components/ContainerComponent.jsx';
import metadata from './block.json';
import BlockPreview from '../block-components/BlockPreviewImage.jsx';

function Edit( props ) {
	const { attributes } = props;
	const blockProps = useBlockProps();
	const { children } = useInnerBlocksProps( blockProps, {
		allowedBlocks: [
			'core/heading',
			'core/paragraph',
			'gravityforms/form',
		],
		template: [
			[
				'core/heading',
				{
					level: 2,
					placeholder: __( 'Add title…' ),
				},
			],
			[
				'core/paragraph',
				{
					placeholder: __( 'Add Text…', 'baharhussain' ),
				},
			],
			[
				'core/group',
				{ className: 'newsletter-form' },
				[ [ 'gravityforms/form', {} ] ],
			],
		],
		templateLock: true,
	} );

	return (
		<>
			<ContainerOptions props={ props } />
			<ContainerShell props={ props } blockProps={ blockProps }>
				<div className="dynamic-block midpage-cta center-align">
					<div className="midpage-cta-content">{ children }</div>
				</div>
			</ContainerShell>
		</>
	);
}

export default BlockPreview( metadata, Edit );
