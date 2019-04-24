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


// Text Color
wp.customize( 'typography--h6--color', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'typography--h6--color',
            selector: 'h6',
            styles: {
                'color': to
            }
        });
    });
});


// Font Family
wp.customize( 'typography--h6--font-family', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'typography--h6--font-family',
            selector: 'h6',
            styles: {
                'font-family': to
            }
        });
    });
});


// Font Styles
wp.customize( 'typography--h6--font-styles', function( value ) {
    value.bind( function( to ) {

        var h6Styles = utils.taprootFontStyles(to);

        rootstrap.style({
            id: 'typography--h6--font-styles',
            selector: 'h6',
            styles: h6Styles
        });
    });
});
