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


// Top Nav Show When Fixed
wp.customize( 'nav--top-fixed--fixed', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'nav--top-fixed--fixed',
            selector: '.app-header--fixed  .menu--top',
            styles: { 'display': 'none' },
            screen: 'desktop',
            callback: !to,
        });
    });
});


// Navbar Background Color
wp.customize( 'nav--top-fixed--background-color', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'nav--top-fixed--background-color',
            selector: '.app-header--fixed  .menu--top',
            styles: {
                'background-color': to,
            },
            screen: 'desktop'
        });
    });
});


// Menu Link Color
wp.customize( 'nav--top-fixed--link-color', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'nav--top-fixed--link-color',
            selector: '.app-header--fixed  .menu--top__link:link, .app-header--fixed  .menu--top__link:visited',
            styles: {
                'color': to,
            },
            screen: 'desktop'
        });
    });
});


// Menu Link Color Hover
wp.customize( 'nav--top-fixed--link-color--hover', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'nav--top-fixed--link-color--hover',
            selector: '.app-header--fixed  .menu--top__link',
            styles: {
                'color': to,
            },
            screen: 'desktop'
        });
    });
});


// Font Family
wp.customize( 'nav--top-fixed--font-family', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'nav--top-fixed--font-family',
            selector: '.app-header--fixed  .menu--top__link',
            styles: {
                'font-family': to
            },
            screen: 'desktop'
        });
    });
});


// Font Styles
wp.customize( 'nav--top-fixed--font-styles', function( value ) {
    value.bind( function( to ) {
        var itemStyles = utils.taprootFontStyles(to);
        rootstrap.style({
            id: 'nav--top-fixed--font-styles',
            selector: '.app-header--fixed  .menu--top__link',
            styles: itemStyles,
            screen: 'desktop'
        });
    });
});


// Font Size
wp.customize( 'nav--top-fixed--font-size', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'nav--top-fixed--font-size',
            selector: '.app-header--fixed  .menu--top__link',
            styles: {
                'font-size': to,
            },
            screen: 'desktop'
        });
    });
});


// Line Height
wp.customize( 'nav--top-fixed--line-height', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'nav--top-fixed--line-height',
            selector: '.app-header--fixed  .menu--top__link',
            styles: {
                'line-height': to,
            },
            screen: 'desktop'
        });
    });
});


// Padding
wp.customize( 'nav--top-fixed--padding', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'nav--top-fixed--padding',
            selector: '.app-header--fixed  .menu--top__link',
            styles: {
                'padding-left': to,
                'padding-right': to,
            },
            screen: 'desktop'
        });
    });
});


// Align
wp.customize( 'nav--top-fixed--align', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'nav--top-fixed--align',
            selector: '.app-header--fixed  .menu--top__items',
            styles: {
                'justify-content': to,
            },
            screen: 'desktop'
        });
    });
});
