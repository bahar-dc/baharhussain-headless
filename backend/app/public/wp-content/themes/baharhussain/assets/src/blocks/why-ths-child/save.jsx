import { InnerBlocks } from '@wordpress/block-editor';

export default function Save() {
	return (
		<>
			<div className="inner-engagement engagement-ctn">
				<InnerBlocks.Content />
			</div>
		</>
	);
}
