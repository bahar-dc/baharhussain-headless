import { InnerBlocks } from '@wordpress/block-editor';
import { ContainerShellContent } from '../block-components/ContainerComponent.jsx';

export default function Save( props ) {
	return (
		<ContainerShellContent props={ props } blockClass="engagement-section">
			<div className="inner-engagement engagement-ctn">
				<InnerBlocks.Content />
			</div>
		</ContainerShellContent>
	);
}