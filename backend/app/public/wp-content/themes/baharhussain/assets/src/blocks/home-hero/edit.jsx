import { MediaUpload, MediaUploadCheck, RichText, URLInputButton, useBlockProps } from '@wordpress/block-editor';
import { Button, TextControl } from '@wordpress/components';
import { __ } from '@wordpress/i18n';
import metadata from './block.json';

export default function Edit({ attributes, setAttributes }) {
	const {
		eyebrow,
		title,
		description,
		imageUrl,
		imageAlt,
		primaryLabel,
		primaryUrl,
		secondaryLabel,
		secondaryUrl,
	} = attributes;

	return (
		<section {...useBlockProps({ className: 'home-hero' })}>
			<div className="home-hero__grid">
				<div className="home-hero__content">
					<RichText
						tagName="p"
						className="home-hero__eyebrow"
						value={eyebrow}
						onChange={(value) => setAttributes({ eyebrow: value })}
						placeholder={__('Add eyebrow…', 'baharhussain')}
					/>
					<RichText
						tagName="h1"
						className="home-hero__title"
						value={title}
						onChange={(value) => setAttributes({ title: value })}
						placeholder={__('Add hero title…', 'baharhussain')}
					/>
					<RichText
						tagName="p"
						className="home-hero__text"
						value={description}
						onChange={(value) => setAttributes({ description: value })}
						placeholder={__('Add hero description…', 'baharhussain')}
					/>
					<div className="home-hero__buttons">
						<RichText tagName="span" className="button main-btn" value={primaryLabel} onChange={(value) => setAttributes({ primaryLabel: value })} placeholder={__('Primary CTA', 'baharhussain')} />
						<RichText tagName="span" className="button button-text" value={secondaryLabel} onChange={(value) => setAttributes({ secondaryLabel: value })} placeholder={__('Secondary CTA', 'baharhussain')} />
					</div>
				</div>
				<div className="home-hero__media">
					<div className="home-hero__image">
						{imageUrl ? <img src={imageUrl} alt={imageAlt} /> : <MediaUploadCheck><MediaUpload onSelect={(media) => setAttributes({ imageUrl: media.url, imageAlt: media.alt || '' })} allowedTypes={['image']} render={({ open }) => <Button onClick={open} variant="secondary">{__('Select hero image', 'baharhussain')}</Button>} /></MediaUploadCheck>}
					</div>
				</div>
			</div>
			<div className="home-hero__editor-links">
				<URLInputButton url={primaryUrl} onChange={(url) => setAttributes({ primaryUrl: url })} />
				<URLInputButton url={secondaryUrl} onChange={(url) => setAttributes({ secondaryUrl: url })} />
				<TextControl label={__('Image alt text', 'baharhussain')} value={imageAlt} onChange={(value) => setAttributes({ imageAlt: value })} />
			</div>
		</section>
	);
}
