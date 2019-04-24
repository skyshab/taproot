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


 // Background Color
wp.customize( 'elements--buttons--background-color', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'elements--buttons--background-color',
            selector: '.taproot-button, .comment-respond__submit, .searchform__submit',
            styles: {
                'background-color': to,
            }
        });
    });
});

 // Color
 wp.customize( 'elements--buttons---color', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'elements--buttons--color',
            selector: '.taproot-button:link, .taproot-button:visited, .comment-respond__submit',
            styles: {
                'color': to,
            }
        });
    });
});


 // Border Color
 wp.customize( 'elements--buttons--border-color', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'elements--buttons--border-color',
            selector: '.taproot-button, .comment-respond__submit',
            styles: {
                'border-color': to,
            }
        });
    });
});


 // Border Width
 wp.customize( 'elements--buttons--border-width', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'elements--buttons--border-width',
            selector: '.taproot-button, .comment-respond__submit',
            styles: {
                'border-width': to,
            }
        });
    });
});


 // Border Radius
 wp.customize( 'elements--buttons--border-radius', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'elements--buttons--border-radius',
            selector: '.taproot-button, .comment-respond__submit',
            styles: {
                'border-radius': to,
            }
        });
    });
});


 // Line Height
 wp.customize( 'elements--buttons--height', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'elements--buttons--line-height',
            selector: '.taproot-button, .comment-respond__submit',
            styles: {
                'line-height': to,
            }
        });
    });
});


 // Font Size
 wp.customize( 'elements--buttons--font-size', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'elements--buttons--font-size',
            selector: '.taproot-button, .comment-respond__submit',
            styles: {
                'font-size': to,
            }
        });
    });
});


 // Font Family
 wp.customize( 'elements--buttons--font-family', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'elements--buttons--font-family',
            selector: '.taproot-button, .comment-respond__submit',
            styles: {
                'font-family': to,
            }
        });
    });
});



 // Padding
 wp.customize( 'elements--buttons--padding', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'elements--buttons--padding',
            selector: '.taproot-button, .comment-respond__submit',
            styles: {
                'padding-left': to,
                'padding-right': to,
            }
        });
    });
});



// Font Styles
wp.customize( 'elements--buttons--font-styles', function( value ) {
    value.bind( function( to ) {

        var buttonStyles = utils.taprootFontStyles(to);

        rootstrap.style({
            id: 'elements--buttons--font-styles',
            selector: ' input[type="submit"], input[type="reset"], input[type="button"], button, .taproot-button, .comment-respond__submit',
            styles: buttonStyles
        });
    });
});
