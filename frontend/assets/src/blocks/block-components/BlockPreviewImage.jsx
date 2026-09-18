export default function BlockPreview( metadata, Component ) {
	return function WrappedEdit( props ) {
		if ( props.attributes.preview ) {
			const slug = metadata.name.split( '/' )[ 1 ];
			// eslint-disable-next-line import/no-dynamic-require
			let src;

			try {
				// eslint-disable-next-line import/no-dynamic-require
				src = require( `../${ slug }/preview-${ slug }.jpg` );
			} catch ( error ) {
				// eslint-disable-next-line import/no-dynamic-require
				src = require( `../${ slug }/preview.webp` );
			}

			return (
				<div className="block-preview">
					<img
						src={ src }
						alt="Preview"
						style={ { width: '100%', height: '100%', objectFit: 'cover' } }
					/>
				</div>
			);
		}
		return <Component { ...props } />;
	};
}
