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


// Container Width Mobile
wp.customize( 'layout--container--width', function( value ) {
    value.bind( function( to ) {

        rootstrap.customProperty({
            name: 'layout--container--width',
            value: to
        });

        rootstrap.customProperty({
            name: 'layout--container--padding',
            value: utils.getPaddingFromWidth(to, 'vw')
        });

    });
});


// Container Width Tablet
wp.customize( 'layout--container--width--tablet', function( value ) {
    value.bind( function( to ) {

        rootstrap.customProperty({
            screen: 'tablet-and-up',
            name: 'layout--container--width',
            value: to
        });

        rootstrap.customProperty({
            screen: 'tablet-and-up',
            name: 'layout--container--padding',
            value: utils.getPaddingFromWidth(to, 'vw')
        });

    });
});


// Container Width Desktop
wp.customize( 'layout--container--width--desktop', function( value ) {
    value.bind( function( to ) {

        rootstrap.customProperty({
            screen: 'desktop',
            name: 'layout--container--width',
            value: to.replace('vw', '%')
        });

        rootstrap.customProperty({
            screen: 'desktop',
            name: 'layout--container--padding',
            value: utils.getPaddingFromWidth(to, 'vw')
        });

    });
});
