/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */

import * as utils from '../../../functions-customize-preview.js';


// Text Color
wp.customize( 'branding--tagline--color', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'branding--tagline--color',
            selector: '.app-header__description',
            styles: {
                color: to
            },
        });
    });
});


// Font Family
wp.customize( 'branding--tagline--font-family', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'branding--tagline--color',
            selector: '.app-header__description',
            styles: {
                'font-family': to
            },
        });
    });
});


// Font Styles
wp.customize( 'branding--tagline--font-styles', function( value ) {
    value.bind( function( to ) {
        var taglineStyles = utils.taprootFontStyles(to);
        rootstrap.style({
            id: 'branding--tagline--font-styles',
            selector: '.app-header__description',
            styles: taglineStyles
        });
    });
});

