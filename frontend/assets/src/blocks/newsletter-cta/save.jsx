import { InnerBlocks } from '@wordpress/block-editor';
import { ContainerShellContent } from '../block-components/ContainerComponent.jsx';

export default function Save( props ) {
	return (
		<ContainerShellContent props={ props }>
			<div className="midpage-cta center-align">
				<div className="midpage-cta-content">
					<InnerBlocks.Content />
				</div>
			</div>
		</ContainerShellContent>
	);
}