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


// Navbar Hide
wp.customize( 'nav--navbar-mobile--hide', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'nav--navbar-mobile--hide',
            selector: '.menu--navbar',
            styles: { 'display': 'none' },
            screen: utils.getMobileScreen( wp.customize.instance('nav--navbar-mobile--breakpoint').get()),
            callback: to,
        });
    });
});


// Navbar Background Color
wp.customize( 'nav--navbar-mobile--background-color', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'nav--navbar-mobile--background-color',
            selector: '.menu--navbar',
            styles: {
                'background-color': to,
            },
            screen: utils.getMobileScreen( wp.customize.instance('nav--navbar-mobile--breakpoint').get())
        });
    });
});


// Navbar Menu Height
wp.customize( 'nav--navbar-mobile--height', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'nav--navbar-mobile--height',
            selector: '.menu--navbar',
            styles: {
                'height': to,
            },
            screen: utils.getMobileScreen( wp.customize.instance('nav--navbar-mobile--breakpoint').get()),
        });
    });
});


// Navbar Icon Size
wp.customize( 'nav--navbar-mobile--icon-size', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'nav--navbar-mobile--icon-size',
            selector: '.menu--navbar .menu-label',
            styles: {
                'font-size': to,
            },
            screen: utils.getMobileScreen( wp.customize.instance('nav--navbar-mobile--breakpoint').get()),
        });
    });
});


// Navbar Icon Color
wp.customize( 'nav--navbar-mobile--icon-color', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'nav--navbar-mobile--icon-color',
            selector: '.menu--navbar .menu--toggle',
            styles: {
                'fill': to,
                'color': to,
            },
            screen: utils.getMobileScreen( wp.customize.instance('nav--navbar-mobile--breakpoint').get()),
        });
    });
});


// Navbar Link Background Color
wp.customize( 'nav--navbar-mobile--menu-background-color', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'nav--navbar-mobile--menu-background-color',
            selector: '.menu--navbar__items',
            styles: {
                'background-color': to,
            },
            screen: utils.getMobileScreen( wp.customize.instance('nav--navbar-mobile--breakpoint').get()),
        });
    });
});


// Menu Separator Color
wp.customize( 'nav--navbar-mobile--separator-color', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'nav--navbar-mobile--separator-color',
            selector: '.menu--navbar__item',
            styles: {
                'border-color': to,
            },
            screen: utils.getMobileScreen( wp.customize.instance('nav--navbar-mobile--breakpoint').get()),
        });
    });
});


// Font Styles
wp.customize( 'nav--navbar-mobile--font-styles', function( value ) {
    value.bind( function( to ) {
        var itemStyles = utils.taprootFontStyles(to);
        rootstrap.style({
            id: 'nav--navbar-mobile--font-styles',
            selector: '.menu--navbar__link',
            styles: itemStyles,
            screen: utils.getMobileScreen( wp.customize.instance('nav--navbar-mobile--breakpoint').get()),
        });
    });
});


// Menu Link Color
wp.customize( 'nav--navbar-mobile--link-color', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'nav--navbar-mobile--link-color',
            selector: '.menu--navbar__link:link, .menu--navbar__link:visited',
            styles: { color: to },
            screen: utils.getMobileScreen( wp.customize.instance('nav--navbar-mobile--breakpoint').get()),
        });
    });
});


// Menu Link Color: Hover
wp.customize( 'nav--navbar-mobile--link-color--hover', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'nav--navbar-mobile--link-color--hover',
            selector: '.menu--navbar__link:hover',
            styles: { color: to },
            screen: utils.getMobileScreen( wp.customize.instance('nav--navbar-mobile--breakpoint').get()),
        });
    });
});


//  Var: Link Font Size
wp.customize( 'nav--navbar-mobile--font-size', function( value ) {
    value.bind( function( to ) {
        rootstrap.var({
            name: 'nav--navbar--font-size',
            value: to,
            screen: utils.getMobileScreen( wp.customize.instance('nav--navbar-mobile--breakpoint').get()),
        });
    });
});


//  Var: Link Line Height
wp.customize( 'nav--navbar-mobile--line-height', function( value ) {
    value.bind( function( to ) {
        rootstrap.var({
            name: 'nav--navbar--line-height',
            value: to,
            screen: utils.getMobileScreen( wp.customize.instance('nav--navbar-mobile--breakpoint').get()),
        });
    });
});


// Padding
wp.customize( 'nav--navbar-mobile--padding', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'nav--navbar-mobile--padding',
            selector: '.menu--navbar__link',
            styles: {
                'padding-left': to,
                'padding-right': to,
            },
            screen: utils.getMobileScreen( wp.customize.instance('nav--navbar-mobile--breakpoint').get()),
        });
    });
});
