import {
	InnerBlocks,
	useBlockProps,
	useInnerBlocksProps,
} from '@wordpress/block-editor';
import metadata from './block.json';
import BlockPreview from '../block-components/BlockPreviewImage.jsx';

function Edit( { attributes } ) {
	const blockProps = useBlockProps();
	const innerBlocksProps = useInnerBlocksProps(
		{
			className: 'widget-columns ths-widget-column',
			style: { padding: 'var(--ths_spr_24, 24px)' },
		},
		{
			allowedBlocks: [
				'core/paragraph',
				'core/heading',
				'core/list',
				'core/buttons',
				'core/spacer',
			],
			template: [ [ 'core/paragraph' ] ],
		}
	);

	return (
		<div { ...blockProps }>
			<div { ...innerBlocksProps } />
			</div>
	);
}

export default BlockPreview( metadata, Edit );
