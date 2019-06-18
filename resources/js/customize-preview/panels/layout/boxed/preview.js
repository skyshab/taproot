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


// Boxed Layout Padding
wp.customize( 'layout--boxed--outer-padding', function( value ) {
    value.bind( function( to ) {
        var isBoxed = wp.customize.instance('layout--boxed--enable');
        isBoxed = ( isBoxed ) ? isBoxed.get() : false;

        if( isBoxed ) {
            rootstrap.customProperty({
                name: 'layout--boxed--outer-padding',
                value: to
            });

            rootstrap.style({
                id: 'layout--boxed--outer-padding--header',
                selector: '.app-header--fixed, .app-header--sticky, .app-footer--fixed',
                styles: {
                    'width': 'calc(100vw - (2 * ' + to + '))',
                },
                screen: 'desktop',
            });
        }
    });
});
