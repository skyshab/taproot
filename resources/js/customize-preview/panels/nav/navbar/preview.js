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


// Navbar Hide
wp.customize( 'nav--navbar--hide', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'nav--navbar--hide',
            selector: '.menu--navbar',
            styles: { 'display': 'none' },
            screen: utils.getDesktopScreen( wp.customize.instance('nav--navbar-mobile--breakpoint').get()),
            callback: to,
        });
    });
});


// Background Color
wp.customize( 'nav--navbar--background-color', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'nav--navbar--background-color',
            selector: '.menu--navbar',
            styles: { 'background-color': to },
            screen: utils.getDesktopScreen( wp.customize.instance('nav--navbar-mobile--breakpoint').get())
        });
    });
});


// Font Family
wp.customize( 'nav--navbar--font-family', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'nav--navbar--font-family',
            selector: '.menu--navbar__link',
            styles: { 'font-family': to },
        });
    });
});


// Font Styles
wp.customize( 'nav--navbar--font-styles', function( value ) {
    value.bind( function( to ) {
        var itemStyles = utils.taprootFontStyles(to);
        rootstrap.style({
            id: 'nav--navbar--font-styles',
            selector: '.menu--navbar__link',
            styles: itemStyles,
            screen: utils.getDesktopScreen( wp.customize.instance('nav--navbar-mobile--breakpoint').get())
        });
    });
});


// Menu Link Color
wp.customize( 'nav--navbar--link-color', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'nav--navbar--link-color',
            selector: '.menu--navbar__link:link, .menu--navbar__link:visited',
            styles: { color: to },
            screen: utils.getDesktopScreen( wp.customize.instance('nav--navbar-mobile--breakpoint').get())
        });
    });
});


// Menu Link Color Hover
wp.customize( 'nav--navbar--link-color--hover', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'nav--navbar--link-color--hover',
            selector: '.menu--navbar__link:hover',
            styles: { color: to },
            screen: utils.getDesktopScreen( wp.customize.instance('nav--navbar-mobile--breakpoint').get())
        });
    });
});


//  Var: Link Font Size
wp.customize( 'nav--navbar--font-size', function( value ) {
    value.bind( function( to ) {
        rootstrap.var({
            name: 'nav--navbar--font-size',
            value: to,
            screen: utils.getDesktopScreen( wp.customize.instance('nav--navbar-mobile--breakpoint').get()),
        });
    });
});


//  Var: Link Line Height
wp.customize( 'nav--navbar--height', function( value ) {
    value.bind( function( to ) {
        rootstrap.var({
            name: 'nav--navbar--line-height',
            value: to,
            screen: utils.getDesktopScreen( wp.customize.instance('nav--navbar-mobile--breakpoint').get()),
        });
    });
});


// Padding
wp.customize( 'nav--navbar--padding', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'nav--navbar--padding',
            selector: '.menu--navbar__link',
            styles: {
                'padding-left': to,
                'padding-right': to,
            },
            screen: utils.getDesktopScreen( wp.customize.instance('nav--navbar-mobile--breakpoint').get())
        });
    });
});


// Align
wp.customize( 'nav--navbar--align', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'nav--navbar--align',
            selector: '.menu--navbar__items',
            styles: {
                'justify-content': to,
            },
            screen: utils.getDesktopScreen( wp.customize.instance('nav--navbar-mobile--breakpoint').get())
        });
    });
});


// Submenu Color
wp.customize( 'nav--navbar--dropdown--background-color', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'nav--navbar--dropdown--background-color',
            selector: '.menu--navbar__item.has-children  .menu__sub-menu',
            styles: {
                'background-color': to,
                'border-color': to,
            },
            screen: utils.getDesktopScreen( wp.customize.instance('nav--navbar-mobile--breakpoint').get())
        });
    });
});


// Submenu Link Color
wp.customize( 'nav--navbar--dropdown--link--color', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'nav--navbar--dropdown--link--color',
            selector: '.menu__sub-menu .menu--navbar__link',
            styles: {
                'color': to,
            },
            screen: utils.getDesktopScreen( wp.customize.instance('nav--navbar-mobile--breakpoint').get())
        });
    });
});


// Submenu Link Color
wp.customize( 'nav--navbar--dropdown--link--color--hover', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'nav--navbar--dropdown--link--color--hover',
            selector: '.menu__sub-menu .menu--navbar__link:hover',
            styles: {
                'color': to,
            },
            screen: utils.getDesktopScreen( wp.customize.instance('nav--navbar-mobile--breakpoint').get())
        });
    });
});
