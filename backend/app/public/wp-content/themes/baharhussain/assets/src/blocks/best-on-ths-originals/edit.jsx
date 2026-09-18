import { __ } from '@wordpress/i18n';
import { useBlockProps, RichText } from '@wordpress/block-editor';
import ServerSideRender from '@wordpress/server-side-render';
import metadata from './block.json';
import SSRLoadingPlaceholder, {
	useSSRAttributes,
} from '../block-components/SSRLoadingPlaceholder';
import { ContainerOptions, ContainerShell } from '../block-components/ContainerComponent.jsx';
import usePostSliderHandlers from '../block-components/usePostSliderHandlers';
import BlockPreview from '../block-components/BlockPreviewImage.jsx';

function Edit( props ) {
	const { attributes, setAttributes } = props;
	const { blockTitle, className } = attributes;
	const blockRef = usePostSliderHandlers();
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
			<ContainerShell props={ props } blockProps={ blockProps } blockRef={ blockRef } sliderContainer>
				<div className="post-slider-container">
							<div className="section-head flex-between-center">
								<div className="section-head-left">
									<div className="section-head-left-title flex">
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
												'The best On THS',
												'baharhussain'
											) }
										/>
									</div>
								</div>
								<div className="section-head-right flex-end">
									<div className="post-slider-buttons">
										<div
											className="post-slider-button"
											role="button"
											aria-label="Previous"
											data-post-slider-prev
											disabled
										>
											<svg
												width="24"
												height="24"
												viewBox="0 0 24 24"
												fill="none"
												xmlns="http://www.w3.org/2000/svg"
												aria-hidden="true"
											>
												<path
													d="M21 11.9995H3M3 11.9995L11.5 3.49951M3 11.9995L11.5 20.4995"
													stroke="#111111"
													strokeLinecap="round"
													strokeLinejoin="round"
												/>
											</svg>
										</div>
										<div
											className="post-slider-button"
											role="button"
											aria-label="Next"
											data-post-slider-next
										>
											<svg
												width="24"
												height="24"
												viewBox="0 0 24 24"
												fill="none"
												xmlns="http://www.w3.org/2000/svg"
												aria-hidden="true"
											>
												<path
													d="M3 11.9995H21M21 11.9995L12.5 3.49951M21 11.9995L12.5 20.4995"
													stroke="#111111"
													strokeLinecap="round"
													strokeLinejoin="round"
												/>
											</svg>
										</div>
									</div>
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
			</ContainerShell>
		</>
	);
}

export default BlockPreview( metadata, Edit );
