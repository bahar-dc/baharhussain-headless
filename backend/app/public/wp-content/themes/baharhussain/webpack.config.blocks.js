/**
 * External Dependencies
 */
const path = require( 'path' );
const { existsSync, readdirSync, readFileSync } = require( 'fs' );

/**
 * Webpack Dependencies
 */
const CopyWebpackPlugin = require( 'copy-webpack-plugin' );

/**
 * WordPress Dependencies
 */
const defaultConfig = require( '@wordpress/scripts/config/webpack.config.js' );
const DependencyExtractionWebpackPlugin = require( '@wordpress/dependency-extraction-webpack-plugin' );
const {
	patchSassDeprecations,
	BuildSummaryPlugin,
	injectBlockSassGlobals,
} = require( './build-utils.js' );

const isVerbose = process.env.VERBOSE === 'true';
const isClean = process.env.CLEAN === 'true';

/*
 * Auto-discover all block entries from block.json.
 *
 * @wordpress/scripts' getWebpackEntryPoints() uses readPkgUp(), which can pick
 * up a parent package.json in a larger WordPress install. This theme keeps block
 * entry discovery local by reading assets/src/blocks directly.
 *
 * Naming convention:
 *   editorScript → index.jsx              (registerBlockType entry)
 *   viewScript   → {block}-script.js      (frontend-only interactive JS)
 *   style        → {block}-style.css      (compiled from {block}-style.scss)
 *   editorStyle  → {block}-editor-style.css (compiled from {block}-editor-style.scss)
 *
 * Entry key format: '<block>/<name>' → output: blocks/<block>/<name>.{js,css}
 *
 * PHP render files ("render": "file:./...") are copied from assets/src/blocks/
 * to blocks/ on every build via CopyWebpackPlugin — single source of truth.
 */
const BLOCKS_SRC = path.resolve( __dirname, 'assets/src/blocks' );
const editorEntries = {};
const viewEntries   = {};
const cssEntries    = {};
const phpCopyPatterns = [];

readdirSync( BLOCKS_SRC, { withFileTypes: true } )
	.filter( ( d ) => d.isDirectory() )
	.forEach( ( dir ) => {
		const blockJsonPath = path.join( BLOCKS_SRC, dir.name, 'block.json' );
		if ( ! existsSync( blockJsonPath ) ) return;

		const blockJson = JSON.parse( readFileSync( blockJsonPath, 'utf8' ) );

		// editorScript: "file:./{block}-editor-script.js"
		if ( blockJson.editorScript && blockJson.editorScript.startsWith( 'file:./' ) ) {
			const outputName = blockJson.editorScript.replace( 'file:./', '' ).replace( /\.js$/, '' );
			const jsxSrc = path.join( BLOCKS_SRC, dir.name, outputName + '.jsx' );
			const jsSrc  = path.join( BLOCKS_SRC, dir.name, outputName + '.js' );
			const namedJsxSrc = path.join( BLOCKS_SRC, dir.name, dir.name + '.jsx' );
			if ( existsSync( jsxSrc ) ) {
				editorEntries[ `${ dir.name }/${ outputName }` ] = jsxSrc;
			} else if ( existsSync( jsSrc ) ) {
				editorEntries[ `${ dir.name }/${ outputName }` ] = jsSrc;
			} else if ( existsSync( namedJsxSrc ) ) {
				editorEntries[ `${ dir.name }/${ outputName }` ] = namedJsxSrc;
			}
		}

		// viewScript: "file:./{block}-script.js"  (string or array — pick file:// items)
		const viewScripts = Array.isArray( blockJson.viewScript )
			? blockJson.viewScript
			: [ blockJson.viewScript ].filter( Boolean );
		viewScripts
			.filter( ( v ) => typeof v === 'string' && v.startsWith( 'file:./' ) )
			.forEach( ( v ) => {
				const outputName = v.replace( 'file:./', '' ).replace( /\.js$/, '' );
				const jsSrc = path.join( BLOCKS_SRC, dir.name, outputName + '.js' );
				if ( existsSync( jsSrc ) ) {
					viewEntries[ `${ dir.name }/${ outputName }` ] = jsSrc;
				}
			} );

		// style: "file:./{block}-style.css" → compile from {block}-style.scss
		if ( blockJson.style && blockJson.style.startsWith( 'file:./' ) ) {
			const cssName = blockJson.style.replace( 'file:./', '' ).replace( /\.css$/, '' );
			const scssSrc = path.join( BLOCKS_SRC, dir.name, cssName + '.scss' );
			if ( existsSync( scssSrc ) ) {
				cssEntries[ `${ dir.name }/${ cssName }` ] = scssSrc;
			}
		}

		// editorStyle: "file:./{block}-editor-style.css"
		// Falls back to {block}-style.scss when a dedicated editor scss doesn't exist.
		if ( blockJson.editorStyle && blockJson.editorStyle.startsWith( 'file:./' ) ) {
			const cssName = blockJson.editorStyle.replace( 'file:./', '' ).replace( /\.css$/, '' );
			const scssSrc1 = path.join( BLOCKS_SRC, dir.name, cssName + '.scss' );
			const fallback = cssName.replace( /-editor-style$/, '-style' );
			const scssSrc2 = path.join( BLOCKS_SRC, dir.name, fallback + '.scss' );
			const scssSrc  = existsSync( scssSrc1 ) ? scssSrc1 : ( existsSync( scssSrc2 ) ? scssSrc2 : null );
			if ( scssSrc ) {
				cssEntries[ `${ dir.name }/${ cssName }` ] = scssSrc;
			}
		}

		// render: "file:./name.php" → copy assets/src/blocks/<block>/name.php → blocks/<block>/name.php
		if ( blockJson.render && blockJson.render.startsWith( 'file:./' ) ) {
			const phpFile = blockJson.render.replace( 'file:./', '' );
			const phpSrc  = path.join( BLOCKS_SRC, dir.name, phpFile );
			if ( existsSync( phpSrc ) ) {
				phpCopyPatterns.push( {
					from: phpSrc,
					to: path.resolve( __dirname, 'blocks', dir.name, phpFile ),
				} );
			}
		}
	} );

module.exports = {
	...defaultConfig,
	context: __dirname,

	entry: {
		// Auto-discovered editorScript entries (JS/JSX → JS per block).
		...editorEntries,

		// Auto-discovered viewScript entries (file:./ items from block.json viewScript).
		...viewEntries,

		// Auto-discovered CSS entries (style + editorStyle from block.json, compiled from .scss).
		// webpack-remove-empty-scripts (in defaultConfig) strips the empty .js artefacts.
		...cssEntries,
	},

	stats: isVerbose ? 'normal' : 'none',
	cache: {
		type: 'filesystem',
		name: 'bahar-hussain-theme-blocks',
		buildDependencies: {
			config: [ __filename ],
		},
	},
	watchOptions: {
		ignored: [
			'**/.git/**',
			'**/node_modules/**',
			path.resolve( __dirname, 'assets/build' ),
			path.resolve( __dirname, 'blocks' ),
		],
	},
	output: {
		path: path.resolve( __dirname, 'blocks' ),
		clean: isClean,
	},
	plugins: [
		...defaultConfig.plugins.filter(
			( plugin ) =>
				plugin.constructor.name !== 'CleanWebpackPlugin' &&
				plugin.constructor.name !== 'DependencyExtractionWebpackPlugin'
		),
		new DependencyExtractionWebpackPlugin(),
		// Copy PHP render files from assets/src/blocks/ → blocks/ on every build.
		// Keep render PHP files in this theme instead of relying on project-root
		// resolution from a larger WordPress install.
		phpCopyPatterns.length > 0 && new CopyWebpackPlugin( { patterns: phpCopyPatterns } ),
		! isVerbose && BuildSummaryPlugin( 'bahar-hussain-theme (blocks)' ),
	].filter( Boolean ),
	module: {
		...defaultConfig.module,
		rules: [
			// Auto-injects @import "partials/fonts/fonts" and @import "partials/mixins/mixins"
			// before every block SCSS entry — block files need no boilerplate imports.
			...injectBlockSassGlobals(
				defaultConfig.module.rules,
				path.resolve( __dirname, 'assets/src/css' )
			),
			{
				test: /\.svg$/,
				type: 'asset/resource',
			},
			{
				test: /\.(png|jpe?g|gif|webp)$/i,
				type: 'asset/resource',
			},
		],
	},
};
