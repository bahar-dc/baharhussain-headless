import metadata from './block.json';
import BlockPreview from '../block-components/BlockPreviewImage.jsx';
import { InnerBlocks, useBlockProps } from '@wordpress/block-editor';
import { ContainerOptions, ContainerShell } from '../block-components/ContainerComponent.jsx';

function Edit( props ) {
	const blockProps = useBlockProps();
	return (
		<>
			<ContainerOptions props={ props } />
			<ContainerShell props={ props } blockProps={ blockProps }>
				<InnerBlocks />
			</ContainerShell>
		</>
	);
}

export default BlockPreview( metadata, Edit );
