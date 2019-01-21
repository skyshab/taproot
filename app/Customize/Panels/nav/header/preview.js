/**
 * Customize controls preview scripts. 
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2018 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */

  
// Header Nav Hide
wp.customize( 'nav--header--hide', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'nav--header--hide',
            selector: '.menu--header',
            styles: { 'display': 'none' }, 
            screen: utils.getDesktopScreen( wp.customize.instance('nav--header-mobile--breakpoint').get()), 
            callback: to,          
        });
    });
});


// Font Styles
wp.customize( 'nav--header--font-styles', function( value ) {
    value.bind( function( to ) {
        var itemStyles = utils.taprootFontStyles(to);
        rootstrap.style({
            id: 'nav--header--font-styles',
            selector: '.menu--header__link',
            styles: itemStyles,
        });
    });
});

// Menu Link Color
wp.customize( 'nav--header--link-color', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'nav--header--link-color',
            selector: '.menu--header__link:link, .menu--header__link:visited',
            styles: {
                color: to,
            },
        });        
    });
});


// Menu Link Color Hover
wp.customize( 'nav--header--link-color--hover', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'nav--header--link-color--hover',
            selector: '.menu--header__link:hover',
            styles: {
                color: to,
            },
        });        
    });
});


// Font Family
wp.customize( 'nav--header--font-family', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'nav--header--font-family',
            selector: '.menu--header__link',
            styles: {
                'font-family': to,
            },
        });          
    });
});


// Var: Link Font Size
wp.customize( 'nav--header--font-size', function( value ) {
    value.bind( function( to ) {
        rootstrap.var({
            name: 'nav--header--font-size',
            value: to,
            screen: utils.getDesktopScreen( wp.customize.instance('nav--header-mobile--breakpoint').get()),            
        });
    });
});


// Var: Link Line Height
wp.customize( 'nav--header--height', function( value ) {
    value.bind( function( to ) {
        rootstrap.var({
            name: 'nav--header--line-height',
            value: to,
            screen: utils.getDesktopScreen( wp.customize.instance('nav--header-mobile--breakpoint').get()),            
        });
    });
});


// Padding
wp.customize( 'nav--header--padding', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'nav--header--padding',
            selector: '.menu--header__link',
            styles: {
                'padding-left': to,
                'padding-right': to,
            },
            screen: utils.getDesktopScreen( wp.customize.instance('nav--header-mobile--breakpoint').get()),            
        });
    });
});


// Align
wp.customize( 'nav--header--align', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'nav--header--align',
            selector: '.menu--header__items',
            styles: {
                'justify-content': to,
            },
            screen: utils.getDesktopScreen( wp.customize.instance('nav--header-mobile--breakpoint').get()),            
        });
    });
});


// Submenu Color
wp.customize( 'nav--header--dropdown--background-color', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'nav--header--dropdown--background-color',
            selector: '.menu--header__item.has-children  .menu__sub-menu',
            styles: {
                'background-color': to,
                'border-color': to,
            },
            screen: utils.getDesktopScreen( wp.customize.instance('nav--header-mobile--breakpoint').get()),            
        });       
    });
});


// Submenu Link Color
wp.customize( 'nav--header--dropdown--link--color', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'nav--header--dropdown--link--color',
            selector: '.menu__sub-menu .menu--header__link',
            styles: {
                'color': to,
            },
            screen: utils.getDesktopScreen( wp.customize.instance('nav--header-mobile--breakpoint').get()),            
        });
    });
});


// Submenu Link Color
wp.customize( 'nav--header--dropdown--link--color--hover', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'nav--header--dropdown--link--color--hover',
            selector: '.menu__sub-menu .menu--header__link:hover',
            styles: {
                'color': to,
            },
            screen: utils.getDesktopScreen( wp.customize.instance('nav--header-mobile--breakpoint').get()),            
        });
    });
});
