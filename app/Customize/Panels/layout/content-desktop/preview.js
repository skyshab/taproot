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


// Boxed Layout Padding
wp.customize( 'layout--content-desktop--padding', function( value ) {
    value.bind( function( to ) {

        var isBoxed = wp.customize.instance('layout--site--boxed-layout');
        isBoxed = ( isBoxed.get() ) ? true : false;

        if( isBoxed ) {
            rootstrap.style({
                id: 'layout--content-desktop--padding',
                selector: '.app-main, .sidebar, .shit',
                styles:  {
                    'padding': to,
                },
                screen: 'desktop',
            });
        }
        else {

            rootstrap.style({
                id: 'layout--content-desktop--padding--fullwidth-vertical',
                selector: '.app-main, .sidebar',
                styles:  {
                    'padding-top': to,
                    'padding-bottom': to,
                },
                screen: 'desktop',
            });

            rootstrap.style({
                id: 'layout--content-desktop--padding--fullwidth-main',
                selector: '.app-main--sidebar-right',
                styles:  {
                    'padding-right': to,
                    'padding-left': '0px',
                },
                screen: 'desktop',
            });

            rootstrap.style({
                id: 'layout--content-desktop--padding--fullwidth-sidebar',
                selector: '.sidebar--right',
                styles:  {
                    'padding-right': '0px',
                    'padding-left': to,
                },
                screen: 'desktop',
            });

            rootstrap.style({
                id: 'layout--content-desktop--padding--fullwidth-main',
                selector: '.app-main--sidebar-left',
                styles:  {
                    'padding-left': to,
                    'padding-right': '0px',
                },
                screen: 'desktop',
            });

            rootstrap.style({
                id: 'layout--content-desktop--padding--fullwidth-sidebar',
                selector: '.sidebar--left',
                styles:  {
                    'padding-left': '0px',
                    'padding-right': to,
                },
                screen: 'desktop',
            });              
        }
    });
});
