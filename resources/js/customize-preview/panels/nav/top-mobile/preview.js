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


// Top Nav Hide
wp.customize( 'nav--top-mobile--hide', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'nav--top-mobile--hide',
            selector: '.menu--top',
            styles: { 'display': 'none' },
            screen: utils.getMobileScreen( wp.customize.instance('nav--top-mobile--breakpoint').get()),
            callback: to,
        });
    });
});


//  Var: Link Font Size
wp.customize( 'nav--top-mobile--font-size', function( value ) {
    value.bind( function( to ) {
        rootstrap.var({
            name: 'nav--top--font-size',
            value: to,
            screen: utils.getMobileScreen( wp.customize.instance('nav--top-mobile--breakpoint').get()),
        });
    });
});


//  Var: Link Line Height
wp.customize( 'nav--top-mobile--line-height', function( value ) {
    value.bind( function( to ) {
        rootstrap.var({
            name: 'nav--top--line-height',
            value: to,
            screen: utils.getMobileScreen( wp.customize.instance('nav--top-mobile--breakpoint').get()),
        });
    });
});


// Align
wp.customize( 'nav--top-mobile--align', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'nav--top-mobile--align',
            selector: '.menu--top__link',
            styles: {
                'text-align': to,
            },
            screen: utils.getMobileScreen( wp.customize.instance('nav--top-mobile--breakpoint').get()),
        });
    });
});
