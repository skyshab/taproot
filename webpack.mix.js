/**
 * Laravel Mix configuration file.
 *
 * @link https://laravel.com/docs/5.6/mix
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2020 Sky Shabatura
 * @link      https://taproot-theme.com
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */

const mix = require( 'laravel-mix' );
const CopyWebpackPlugin = require( 'copy-webpack-plugin' );

// Export
if( process.env.export ) {
    const exportTheme = require( './webpack.mix.export.js' );
    return;
}

// Set the development path
const devPath  = 'resources';

// Set path to the generated assets
mix.setPublicPath( 'dist' );

// Laravel Mix
mix.options( {
    postCss : [
        require( 'postcss-preset-env' )(),
        require( 'postcss-sort-media-queries' )({
            sort: 'mobile-first'
        })
    ],
    processCssUrls : false,
} );

// Build sources maps
mix.sourceMaps();

// Versioning and cache busting
mix.version();

// JS module output
mix.react( `${devPath}/js/app.js`,                'js' );
mix.react( `${devPath}/js/customize-controls.js`, 'js' );
mix.react( `${devPath}/js/editor.js`,             'js' );
    

// Combine Customize Preview scripts
mix.scripts([
    `${devPath}/js/customize-preview/footer-monitor.js`,
    `${devPath}/js/customize-preview/functions-preview.js`
], 'dist/js/customize-preview.js');


// SASS compile
mix.sass( `${devPath}/scss/theme.scss`,              'css' );
mix.sass( `${devPath}/scss/customize-controls.scss`, 'css' );
mix.sass( `${devPath}/scss/customize-preview.scss`,  'css' );

// Compile editor styles
mix.sass( `${devPath}/scss/editor.scss`, 'css' );

// Webpack config
mix.webpackConfig( {
    stats       : 'minimal',
    devtool     : mix.inProduction() ? false : 'source-map',
    performance : { hints  : false    },
    externals   : { jquery : 'jQuery' },
    plugins     : [
        new CopyWebpackPlugin( [
            { 
                from    : `${devPath}/svg`,   
                to      : 'svg'   
            },
        ]),
    ],
});
