/**
 * Laravel Mix configuration file.
 *
 * Laravel Mix is a layer built on top of WordPress that simplifies much of the
 * complexity of building out a Webpack configuration file. Use this file to
 * configure how your assets are handled in the build process.
 *
 * @link https://laravel.com/docs/5.6/mix
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2020 Sky Shabatura
 * @link      https://taproot-theme.com
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */

// Import required packages.
const mix = require( 'laravel-mix' );
const CopyWebpackPlugin = require( 'copy-webpack-plugin' );

/*
 * -----------------------------------------------------------------------------
 * Theme Export Process
 * -----------------------------------------------------------------------------
 * Configure the export process in `webpack.mix.export.js`. This bit of code
 * should remain at the top of the file here so that it bails early when the
 * `export` command is run.
 * -----------------------------------------------------------------------------
 */

if ( process.env.export ) {
    const exportTheme = require( './webpack.mix.export.js' );
    return;
}

/*
 * -----------------------------------------------------------------------------
 * Build Process
 * -----------------------------------------------------------------------------
 * The section below handles processing, compiling, transpiling, and combining
 * all of the theme's assets into their final location. This is the meat of the
 * build process.
 * -----------------------------------------------------------------------------
 */

/*
 * Sets the development path to assets.
 */
const devPath  = 'resources';

/*
 * Path to the generated assets.
 */
mix.setPublicPath( './' );

/*
 * Laravel Mix options.
 */
mix.options( {
    postCss : [
        require( 'postcss-preset-env' )(),
        require('postcss-sort-media-queries')({
            sort: 'mobile-first'
        })
    ],
    processCssUrls : false
} );

/*
 * Build sources maps for assets.
 */
mix.sourceMaps();

/*
 * Versioning and cache busting.
 */
mix.version();

/*
 * Compile JavaScript.
 */

 // JS module output
mix.react( `${devPath}/js/app.js`,                'dist/js' )
   .react( `${devPath}/js/customize-controls.js`, 'dist/js' )
   .react( `${devPath}/js/editor.js`,             'dist/js' );

// Combine Customize Preview scripts
mix.scripts([
    `${devPath}/js/customize-preview/footer-monitor.js`,
    `${devPath}/js/customize-preview/functions-preview.js`
], 'dist/js/customize-preview.js');

/*
 * Compile CSS.
 */

// Sass configuration.
var sassConfig = {
    outputStyle : 'expanded',
    indentType  : 'tab',
    indentWidth : 1
};

// Compile SASS/CSS.
mix.sass( `${devPath}/scss/theme.scss`,              'dist/css', sassConfig )
   .sass( `${devPath}/scss/editor.scss`,             'dist/css', sassConfig )
   .sass( `${devPath}/scss/customize-controls.scss`, 'dist/css', sassConfig )
   .sass( `${devPath}/scss/customize-preview.scss`,  'dist/css', sassConfig );

/*
 * Add custom Webpack configuration.
 */
mix.webpackConfig( {
    stats       : 'minimal',
    devtool     : mix.inProduction() ? false : 'source-map',
    performance : { hints  : false    },
    externals   : { jquery : 'jQuery' },
    plugins     : [
        // @link https://github.com/webpack-contrib/copy-webpack-plugin
        new CopyWebpackPlugin( [
            { from : `${devPath}/svg`,   to : 'dist/svg'   },
        ]),
    ],
});

/*
 * Monitor files for changes and inject your changes into the browser.
 */
if ( process.env.sync ) {

    mix.browserSync( {
        proxy : 'localhost',
        files : [
            'dist/**/*',
            `${devPath}/views/**/*.php`,
            'app/**/*.php',
            'functions.php'
        ]
    });
}
