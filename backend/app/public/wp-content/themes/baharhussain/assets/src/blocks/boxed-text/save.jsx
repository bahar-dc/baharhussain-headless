import { InnerBlocks } from '@wordpress/block-editor';

export default function Save() {
	return (
		<div className="widget-columns ths-widget-column">
			<InnerBlocks.Content />
		</div>
	);
}
