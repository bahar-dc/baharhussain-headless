import { RichText, useBlockProps } from '@wordpress/block-editor';

export default function Save({ attributes }) {
	const { eyebrow, title, description, imageUrl, imageAlt, primaryLabel, primaryUrl, secondaryLabel, secondaryUrl } = attributes;
	return (
		<section {...useBlockProps.save({ className: 'home-hero' })}>
			<div className="home-hero__grid">
				<div className="home-hero__content">
					<RichText.Content tagName="p" className="home-hero__eyebrow" value={eyebrow} />
					<RichText.Content tagName="h1" className="home-hero__title" value={title} />
					<RichText.Content tagName="p" className="home-hero__text" value={description} />
					<div className="home-hero__buttons">
						<a className="button main-btn" href={primaryUrl}><RichText.Content tagName="span" value={primaryLabel} /></a>
						<a className="button button-text" href={secondaryUrl}><RichText.Content tagName="span" value={secondaryLabel} /></a>
					</div>
				</div>
				<div className="home-hero__media">
					{imageUrl && <div className="home-hero__image"><img src={imageUrl} alt={imageAlt} /></div>}
				</div>
			</div>
		</section>
	);
}
