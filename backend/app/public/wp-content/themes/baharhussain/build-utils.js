const path = require( 'path' );

function patchSassDeprecations( rules ) {
	return rules;
}

function BuildSummaryPlugin( label ) {
	return {
		apply( compiler ) {
			compiler.hooks.done.tap( 'BuildSummaryPlugin', ( stats ) => {
				const info = stats.toJson( {
					all: false,
					assets: true,
					errors: true,
					warnings: true,
				} );
				const errors = info.errors ? info.errors.length : 0;
				const warnings = info.warnings ? info.warnings.length : 0;
				const assets = info.assets ? info.assets.length : 0;

				if ( errors > 0 ) {
					console.error(
						`Build failed: ${ label } (${ errors } errors, ${ warnings } warnings)`
					);
					return;
				}

				console.log(
					`Build complete: ${ label } (${ assets } assets, ${ warnings } warnings)`
				);
			} );
		},
	};
}

function injectBlockSassGlobals( rules, cssSourcePath ) {
	const globals = [
		`@import "${ path.join( cssSourcePath, 'partials/fonts/fonts' ) }";`,
		`@import "${ path.join( cssSourcePath, 'partials/mixins/mixins' ) }";`,
	].join( '\n' );

	return rules.map( ( rule ) => addSassAdditionalData( rule, globals ) );
}

function addSassAdditionalData( value, additionalData ) {
	if ( Array.isArray( value ) ) {
		return value.map( ( item ) => addSassAdditionalData( item, additionalData ) );
	}

	if ( ! value || typeof value !== 'object' ) {
		return value;
	}

	const next = { ...value };

	if ( next.use ) {
		next.use = addSassAdditionalData( next.use, additionalData );
	}

	if ( next.oneOf ) {
		next.oneOf = addSassAdditionalData( next.oneOf, additionalData );
	}

	if ( next.rules ) {
		next.rules = addSassAdditionalData( next.rules, additionalData );
	}

	if ( isSassLoader( next.loader ) ) {
		const options = { ...( next.options || {} ) };
		const previous = options.additionalData;

		options.additionalData = ( content, loaderContext ) => {
			const existing =
				typeof previous === 'function'
					? previous( content, loaderContext )
					: previous || '';

			return insertAfterLeadingUseRules(
				`${ existing }${ existing ? '\n' : '' }${ content }`,
				additionalData
			);
		};

		next.options = options;
	}

	return next;
}

function insertAfterLeadingUseRules( content, additionalData ) {
	const lines = content.split( '\n' );
	let insertIndex = 0;

	while ( insertIndex < lines.length ) {
		const line = lines[ insertIndex ].trim();

		if ( line === '' || line.startsWith( '//' ) ) {
			insertIndex++;
			continue;
		}

		if ( line.startsWith( '@use ' ) ) {
			insertIndex++;
			continue;
		}

		break;
	}

	lines.splice( insertIndex, 0, additionalData );

	return lines.join( '\n' );
}

function isSassLoader( loader ) {
	return typeof loader === 'string' && loader.includes( 'sass-loader' );
}

module.exports = {
	patchSassDeprecations,
	BuildSummaryPlugin,
	injectBlockSassGlobals,
};
