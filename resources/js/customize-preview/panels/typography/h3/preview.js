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
wp.customize( 'typography--h3--color', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'typography--h3--color',
            selector: 'h3',
            styles: {
                'color': to
            }
        });
    });
});


// Font Family
wp.customize( 'typography--h3--font-family', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'typography--h3--font-family',
            selector: 'h3',
            styles: {
                'font-family': to
            }
        });
    });
});


// Font Styles
wp.customize( 'typography--h3--font-styles', function( value ) {
    value.bind( function( to ) {

        var h3Styles = utils.taprootFontStyles(to);

        rootstrap.style({
            id: 'typography--h3--font-styles',
            selector: 'h3',
            styles: h3Styles
        });
    });
});


// Font Size Mobile
wp.customize( 'typography--h3--font-size', function( value ) {
    value.bind( function( to ) {
        value.bind( function( to ) {
            rootstrap.customProperty({
                name: 'typography--h3--font-size',
                value: to,
                screen: 'default'
            });
        });
    });
});


// Line Height Mobile
wp.customize( 'typography--h3--line-height', function( value ) {
    value.bind( function( to ) {
        value.bind( function( to ) {
            rootstrap.customProperty({
                name: 'typography--h3--line-height',
                value: to,
                screen: 'default'
            });
        });
    });
});

// Font Size Tablet
wp.customize( 'typography--h3--font-size--tablet', function( value ) {
    value.bind( function( to ) {
        value.bind( function( to ) {
            rootstrap.customProperty({
                name: 'typography--h3--font-size',
                value: to,
                screen: 'tablet-and-up'
            });
        });
    });
});


// Line Height Tablet
wp.customize( 'typography--h3--line-height--tablet', function( value ) {
    value.bind( function( to ) {
        value.bind( function( to ) {
            rootstrap.customProperty({
                name: 'typography--h3--line-height',
                value: to,
                screen: 'tablet-and-up'
            });
        });
    });
});


// Font Size Desktop
wp.customize( 'typography--h3--font-size--desktop', function( value ) {
    value.bind( function( to ) {
        value.bind( function( to ) {
            rootstrap.customProperty({
                name: 'typography--h3--font-size',
                value: to,
                screen: 'desktop'
            });
        });
    });
});


// Line Height Desktop
wp.customize( 'typography--h3--line-height--desktop', function( value ) {
    value.bind( function( to ) {
        value.bind( function( to ) {
            rootstrap.customProperty({
                name: 'typography--h3--line-height',
                value: to,
                screen: 'desktop'
            });
        });
    });
});
