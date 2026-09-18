/**
 * External Dependencies
 */
const path = require( 'path' );
const RemoveEmptyScriptsPlugin = require( 'webpack-remove-empty-scripts' );
const MiniCssExtractPlugin = require( 'mini-css-extract-plugin' );
const CopyPlugin = require( 'copy-webpack-plugin' );

/**
 * WordPress Dependencies
 */
const defaultConfig = require( '@wordpress/scripts/config/webpack.config.js' );
const {
	patchSassDeprecations,
	BuildSummaryPlugin,
} = require( './build-utils.js' );

const isVerbose = process.env.VERBOSE === 'true';
const isClean = process.env.CLEAN === 'true';

module.exports = {
	...defaultConfig,

	stats: isVerbose ? 'normal' : 'none',

	cache: {
		type: 'filesystem',
		name: 'bahar-hussain-theme-assets',
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

	context: __dirname,

	resolve: {
		...defaultConfig.resolve,
		roots: [ __dirname ],
	},

	// CSS
	entry: {
		'style-frontend': path.resolve(
			__dirname,
			'assets/src/css',
			'style-frontend.scss'
		),
		'style-global': path.resolve(
			__dirname,
			'assets/src/css',
			'style-global.scss'
		),
		'style-editor': path.resolve(
			__dirname,
			'assets/src/css',
			'style-editor.scss'
		),
		'style-admin': path.resolve(
			__dirname,
			'assets/src/css',
			'style-admin.scss'
		),
		'style-error-page': path.resolve(
			__dirname,
			'assets/src/css',
			'style-error-page.scss'
		),
		'style-single': path.resolve(
			__dirname,
			'assets/src/css',
			'style-single.scss'
		),
		'style-page': path.resolve(
			__dirname,
			'assets/src/css',
			'style-page.scss'
		),

		// JS
		'script-core': path.resolve(
			__dirname,
			'assets/src/js',
			'script-core.js'
		),
		'script-content-protection': path.resolve(
			__dirname,
			'assets/src/js/partials',
			'content-protection.js'
		),
		'script-form-tracking': path.resolve(
			__dirname,
			'assets/src/js/partials',
			'form-tracking.js'
		),
		'script-stats-counter': path.resolve(
			__dirname,
			'assets/src/js/partials',
			'stats-counter.js'
		),
		'script-author': path.resolve(
			__dirname,
			'assets/src/js/partials',
			'author.js'
		),
		'script-toc': path.resolve(
			__dirname,
			'assets/src/js/partials',
			'script-toc.js'
		),
		'script-post-slider': path.resolve(
			__dirname,
			'assets/src/js/partials',
			'post-slider.js'
		),
			'script-admin': path.resolve(
				__dirname,
				'assets/src/js',
				'script-admin.js'
		),
	},
	output: {
		filename: 'js/[name].min.js',
		path: path.resolve( __dirname, 'assets/build' ),
		clean: isClean,
	},

	module: {
		...defaultConfig.module,
		rules: [
			...patchSassDeprecations( defaultConfig.module.rules ),

			{
				test: /\.(bmp|png|jpe?g|gif|webp)$/i,
				type: 'asset/resource',
				generator: {
					filename: 'images/[name][ext]',
				},
			},
			{
				test: /\.(woff|woff2|eot|ttf|otf)$/i,
				type: 'asset/resource',
				generator: {
					filename: 'fonts/[name][ext]',
				},
			},
			{
				test: /\.html$/i,
				loader: 'html-loader',
				options: {
					sources: {
						urlFilter: ( attribute, value ) => {
							const segments = value.split( '/' );
							const ext = value.split( '.' ).pop();
							if (
								[
									'png',
									'jpg',
									'webp',
									'jpeg',
									'svg',
								].includes( ext )
							) {
								// Skip WP uploads so they aren't pulled into the build
								if ( segments.indexOf( 'uploads' ) === -1 ) {
									return true;
								}
							}
							return false;
						},
					},
				},
			},
			{
				test: /\.svg$/,
				issuer: /\.html$/,
				type: 'asset/resource',
				generator: {
					filename: 'images/[name][ext]',
				},
			},
		],
	},

	plugins: [
		...defaultConfig.plugins.filter(
			( plugin ) =>
				plugin.constructor.name !== 'RtlCssPlugin' &&
				plugin.constructor.name !== 'MiniCssExtractPlugin'
		),
		// Removes empty JS files generated for CSS-only entries
		new RemoveEmptyScriptsPlugin(),
		new MiniCssExtractPlugin( { filename: 'css/[name].min.css' } ),
		new CopyPlugin( {
			patterns: [
				{
					from: path.resolve( __dirname, 'assets/src/images' ),
					to: 'images',
					noErrorOnMissing: true,
				},
			],
		} ),

		! isVerbose && BuildSummaryPlugin( 'bahar-hussain-theme (assets)' ),
	].filter( Boolean ),

	// Deterministic module IDs: hash IDs from content rather than using
	// sequential numbers. Prevents unrelated cached bundles from being
	// invalidated when a new module is added anywhere in the build graph.
	optimization: {
		...defaultConfig.optimization,
		moduleIds: 'deterministic',
	},

	performance: {
		// Fail the build if any JS asset or entrypoint exceeds 50 KB (minified,
		// pre-gzip), catching accidental library imports.
		// CSS and font assets are excluded — they are intentionally large.
		hints: 'error',
		maxAssetSize: 50_000,
		maxEntrypointSize: 50_000,
		assetFilter: ( filename ) => filename.endsWith( '.js' ),
	},
};
