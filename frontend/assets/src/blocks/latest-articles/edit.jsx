import { __ } from '@wordpress/i18n';
import { useBlockProps, RichText } from '@wordpress/block-editor';
import ServerSideRender from '@wordpress/server-side-render';
import metadata from './block.json';
import SSRLoadingPlaceholder, {
	useSSRAttributes,
} from '../block-components/SSRLoadingPlaceholder';
import BlockPreview from '../block-components/BlockPreviewImage.jsx';
import { ContainerOptions, ContainerShell } from '../block-components/ContainerComponent.jsx';

function Edit( props ) {
	const { attributes, setAttributes } = props;
	const { blockTitle, className } = attributes;

	const blockProps = useBlockProps();
	const ssrAttributes = useSSRAttributes( attributes, [
		'blockTitle',
		'preview',
		'bgColor',
		'bgWidth',
		'marginTop',
		'marginBottom',
		'className',
	] );

	return (
		<>
			<ContainerOptions props={ props } />
			<ContainerShell props={ props } blockProps={ blockProps }>
				<div className="posts-list-with-sidebar">
					<div className="post-archive-ctn">
						<div className="categories-with-search-area flex-between-end">
							<div className="categories-left-column col-60">
								<RichText
									tagName="h2"
									className="heading-3"
									value={ blockTitle }
									onChange={ ( value ) =>
										setAttributes( {
											blockTitle: value,
										} )
									}
									placeholder={ __(
										'Latest Articles',
										'baharhussain'
									) }
								/>
							</div>
						</div>
						<ServerSideRender
							block={ metadata.name }
							attributes={ ssrAttributes }
							LoadingResponsePlaceholder={
								SSRLoadingPlaceholder
							}
						/>
					</div>
				</div>
			</ContainerShell>
		</>
	);
}

export default BlockPreview( metadata, Edit );
