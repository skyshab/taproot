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


// Fullwidth Header
wp.customize( 'header--padding-desktop--fullwidth', function( value ) {
    value.bind( function( to ) {
        var headerPadding = wp.customize.instance('header--padding-desktop--padding').get();
        var contentPadding = wp.customize.instance('layout--content-desktop--content-gutter').get();
        var padding = (to) ? headerPadding : contentPadding;
        rootstrap.style({
            id: 'header--padding-desktop--fullwidth',
            selector: '.app-header__container',
            styles:  {
                'padding-left': padding,
                'padding-right': padding,
            },
            screen: 'desktop'
        });

        rootstrap.style({
            id: 'header--padding-desktop--fullwidth-width',
            selector: '.app-header__container',
            styles:  {
                'max-width': '100%',
                'width': '100%'
            },
            screen: 'desktop',
            callback: to
        });         
    });
});


// Padding
wp.customize( 'header--padding-desktop--padding', function( value ) {
    value.bind( function( to ) {
        rootstrap.var({
            name: 'header--padding',
            value: to,
            screen: 'desktop',            
        });
    });
});
