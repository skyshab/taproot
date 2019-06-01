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


// Footer Nav Hide
wp.customize( 'nav--footer-mobile--hide', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'nav--footer-mobile--hide',
            selector: '.menu--footer',
            styles: { 'display': 'none' },
            screen: utils.getMobileScreen( wp.customize.instance('nav--footer-mobile--breakpoint').get()),
            callback: to,
        });
    });
});


//  Link Font Size
wp.customize( 'nav--footer-mobile--font-size', function( value ) {
    value.bind( function( to ) {
        rootstrap.customProperty({
            name: 'nav--footer--font-size',
            value: to,
            screen: utils.getMobileScreen( wp.customize.instance('nav--footer-mobile--breakpoint').get()),
        });
    });
});


// Line Height
wp.customize( 'nav--footer-mobile--line-height', function( value ) {
    value.bind( function( to ) {
        rootstrap.customProperty({
            name: 'nav--footer--line-height',
            value: to,
            screen: utils.getMobileScreen( wp.customize.instance('nav--footer-mobile--breakpoint').get()),
        });
    });
});


// Align
wp.customize( 'nav--footer-mobile--align', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'nav--footer-mobile--align',
            selector: '.menu--footer__link',
            styles: {
                'text-align': to,
            },
            screen: utils.getMobileScreen( wp.customize.instance('nav--footer-mobile--breakpoint').get()),
        });
    });
});
