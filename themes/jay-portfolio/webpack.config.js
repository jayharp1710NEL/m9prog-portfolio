/**
 * Webpack-config voor het jay-portfolio theme (les 5).
 * Compileert src/ (JS + Sass) naar dist/ en kopieert images/fonts.
 * Build: npm run build  (productie)   |   npm run dev (watch)
 */
const path = require( 'path' );
const MiniCssExtractPlugin = require( 'mini-css-extract-plugin' );
const CopyWebpackPlugin = require( 'copy-webpack-plugin' );

module.exports = {
	entry: {
		main: './src/js/main.js',
	},
	output: {
		path: path.resolve( __dirname, 'dist' ),
		filename: 'js/[name].js',
		clean: true, // Maakt dist/ leeg voor elke build.
	},
	module: {
		rules: [
			{
				test: /\.scss$/,
				use: [
					MiniCssExtractPlugin.loader,
					'css-loader',
					'sass-loader',
				],
			},
			{
				test: /\.(png|jpe?g|gif|svg)$/i,
				type: 'asset/resource',
				generator: { filename: 'images/[name][ext]' },
			},
			{
				test: /\.(woff2?|ttf|eot)$/i,
				type: 'asset/resource',
				generator: { filename: 'fonts/[name][ext]' },
			},
		],
	},
	plugins: [
		new MiniCssExtractPlugin( { filename: 'css/[name].css' } ),
		new CopyWebpackPlugin( {
			patterns: [
				{ from: 'src/images', to: 'images', noErrorOnMissing: true },
				{ from: 'src/fonts', to: 'fonts', noErrorOnMissing: true },
			],
		} ),
	],
};
