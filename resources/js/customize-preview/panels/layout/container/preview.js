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


// Max Content Width
wp.customize( 'layout--container--max-width', function( value ) {
    value.bind( function( to ) {

        var styleSelector;
        var isBoxed = wp.customize.instance('layout--boxed--enable');
        isBoxed = ( isBoxed ) ? isBoxed.get() : false;

        if(isBoxed ) {
            styleSelector = ".app, .boxed-layout.app-header--has-fixed, .boxed-layout.app-footer--has-fixed";
        }
        else {
            styleSelector = ".container";
        }

        rootstrap.style({
            id: 'layout--container--max-width',
            selector: styleSelector,
            styles: {
                'max-width': to,
            }
        });
    });
});
