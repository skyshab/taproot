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


// Top Nav Hide
wp.customize( 'nav--top--hide', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'nav--top--hide',
            selector: '.menu--top',
            styles: { 'display': 'none' },
            screen: utils.getDesktopScreen( wp.customize.instance('nav--top-mobile--breakpoint').get()),
            callback: to,
        });
    });
});


// Background Color
wp.customize( 'nav--top--background-color', function( value ) {
    value.bind( function( to ) {
        rootstrap.customProperty({
            name: 'nav--top--background-color',
            value: to
        });
    });
});


// Font Family
wp.customize( 'nav--top--font-family', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'nav--top--font-family',
            selector: '.menu--top__link',
            styles: { 'font-family': to }
        });
    });
});


// Font Styles
wp.customize( 'nav--top--font-styles', function( value ) {
    value.bind( function( to ) {
        var itemStyles = utils.taprootFontStyles(to);
        rootstrap.style({
            id: 'nav--top--font-styles',
            selector: '.menu--top__link',
            styles: itemStyles
        });
    });
});


// Menu Link Color
wp.customize( 'nav--top--link-color', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'nav--top--link-color',
            selector: '.menu--top__link:link, .menu--top__link:visited',
            styles: { 'color': to }
        });
    });
});


// Menu Link Color: Hover
wp.customize( 'nav--top--link-color--hover', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'nav--top--link-color--hover',
            selector: '.menu--top__link:hover',
            styles: { 'color': to }
        });
    });
});


//  Var: Link Font Size
wp.customize( 'nav--top--font-size', function( value ) {
    value.bind( function( to ) {
        rootstrap.customProperty({
            name: 'nav--top--font-size',
            value: to,
            screen: utils.getDesktopScreen( wp.customize.instance('nav--top-mobile--breakpoint').get()),
        });
    });
});


//  Var: Link Line Height
wp.customize( 'nav--top--line-height', function( value ) {
    value.bind( function( to ) {
        rootstrap.customProperty({
            name: 'nav--top--line-height',
            value: to,
            screen: utils.getDesktopScreen( wp.customize.instance('nav--top-mobile--breakpoint').get()),
        });
    });
});


// Padding
wp.customize( 'nav--top--padding', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'nav--top--padding',
            selector: '.menu--top__link',
            styles: {
                'padding-left': to,
                'padding-right': to,
            },
            screen: utils.getDesktopScreen( wp.customize.instance('nav--top-mobile--breakpoint').get())
        });
    });
});


// Align
wp.customize( 'nav--top--align', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'nav--top--align',
            selector: '.menu--top__items',
            styles: {
                'justify-content': to,
            },
            screen: utils.getDesktopScreen( wp.customize.instance('nav--top-mobile--breakpoint').get())
        });
    });
});
