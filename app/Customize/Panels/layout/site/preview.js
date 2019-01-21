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


// Max Content Width
wp.customize( 'layout--site--max-width', function( value ) {
    value.bind( function( to ) {

        var isBoxed = wp.customize.instance('layout--site--boxed-layout');
        isBoxed = ( isBoxed ) ? isBoxed.get() : false;
        var styleSelector = ( isBoxed ) ? '.app' : '.container';

        rootstrap.style({
            id: 'layout--site--max-width',
            selector: styleSelector,
            styles:  {
                'max-width': to,
            },
            screen: 'tablet-and-up',
        });
    });
});



// Boxed Layout Padding
wp.customize( 'layout--site--boxed-layout--padding', function( value ) {
    value.bind( function( to ) {
        var isBoxed = wp.customize.instance('layout--site--boxed-layout');
        isBoxed = ( isBoxed ) ? isBoxed.get() : false;

        if( isBoxed ) {
            rootstrap.style({
                id: 'layout--site--boxed-layout--padding',
                selector: 'body',
                styles:  {
                    'padding': to,
                },
                screen: 'tablet-and-up',
            });
        }
    });
});


