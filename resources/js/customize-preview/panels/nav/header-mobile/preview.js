/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2018 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */

import * as utils from '../../../functions-customize-preview.js';


// Header Nav Hide
wp.customize( 'nav--header-mobile--hide', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'nav--header-mobile--hide',
            selector: '.menu--header',
            styles: { 'display': 'none' },
            screen: utils.getMobileScreen( wp.customize.instance('nav--header-mobile--breakpoint').get()),
            callback: to,
        });
    });
});


// Nav Icon Size
wp.customize( 'nav--header-mobile--icon-size', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'nav--header-mobile--icon-size',
            selector: '.menu--header .menu-label',
            styles: {
                'font-size': to,
            },
            screen: utils.getMobileScreen( wp.customize.instance('nav--header-mobile--breakpoint').get())
        });
    });
});


// Nav Icon Color
wp.customize( 'nav--header-mobile--icon-color', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'nav--header-mobile--icon-color',
            selector: '.menu--header .menu--toggle',
            styles: {
                'fill': to,
                'color': to,
            },
            screen: utils.getMobileScreen( wp.customize.instance('nav--header-mobile--breakpoint').get())
        });
    });
});


// Nav Link Background Color
wp.customize( 'nav--header-mobile--background-color', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'nav--header-mobile--background-color',
            selector: '.menu--header__items',
            styles: {
                'background-color': to,
            },
            screen: utils.getMobileScreen( wp.customize.instance('nav--header-mobile--breakpoint').get())
        });
    });
});


// Menu Separator Color
wp.customize( 'nav--header-mobile--separator-color', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'nav--header-mobile--separator-color',
            selector: '.menu--header__item',
            styles: {
                'border-color': to,
            },
            screen: utils.getMobileScreen( wp.customize.instance('nav--header-mobile--breakpoint').get())
        });
    });
});


// Font Styles
wp.customize( 'nav--header-mobile--font-styles', function( value ) {
    value.bind( function( to ) {
        var itemStyles = utils.taprootFontStyles(to);
        rootstrap.style({
            id: 'nav--header-mobile--font-styles',
            selector: '.menu--header__link',
            styles: itemStyles,
            screen: utils.getMobileScreen( wp.customize.instance('nav--header-mobile--breakpoint').get())
        });
    });
});


// Menu Link Color
wp.customize( 'nav--header-mobile--link-color', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'nav--header-mobile--link-color',
            selector: '.menu--header__link:link, .menu--header__link:visited',
            styles: { color: to },
            screen: utils.getMobileScreen( wp.customize.instance('nav--header-mobile--breakpoint').get())
        });
    });
});


// Menu Link Color: Hover
wp.customize( 'nav--header-mobile--link-color--hover', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'nav--header-mobile--link-color--hover',
            selector: '.menu--header__link:hover',
            styles: { color: to },
            screen: utils.getMobileScreen( wp.customize.instance('nav--header-mobile--breakpoint').get())
        });
    });
});


// Font Family
wp.customize( 'nav--header-mobile--font-family', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'nav--header-mobile--font-family',
            selector: '.menu--header__link',
            styles: { 'font-family': to },
            screen: utils.getMobileScreen( wp.customize.instance('nav--header-mobile--breakpoint').get())
        });
    });
});


//  Var: Link Font Size
wp.customize( 'nav--header-mobile--font-size', function( value ) {
    value.bind( function( to ) {
        rootstrap.var({
            name: 'nav--header--font-size',
            value: to,
            screen: utils.getMobileScreen( wp.customize.instance('nav--header-mobile--breakpoint').get()),
        });
    });
});


//  Var: Link Line Height
wp.customize( 'nav--header-mobile--line-height', function( value ) {
    value.bind( function( to ) {
        rootstrap.var({
            name: 'nav--header--line-height',
            value: to,
            screen: utils.getMobileScreen( wp.customize.instance('nav--header-mobile--breakpoint').get()),
        });
    });
});


// Padding
wp.customize( 'nav--header-mobile--padding', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'nav--header-mobile--padding',
            selector: '.menu--header__link',
            styles: {
                'padding-left': to,
                'padding-right': to,
            },
            screen: utils.getMobileScreen( wp.customize.instance('nav--header-mobile--breakpoint').get())
        });
    });
});
