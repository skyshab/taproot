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
wp.customize( 'typography--h4--color', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'typography--h4--color',
            selector: 'h4',
            styles: {
                'color': to
            }
        });
    });
});


// Font Family
wp.customize( 'typography--h4--font-family', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'typography--h4--font-family',
            selector: 'h4',
            styles: {
                'font-family': to
            }
        });
    });
});


// Font Styles
wp.customize( 'typography--h4--font-styles', function( value ) {
    value.bind( function( to ) {

        var h4Styles = utils.taprootFontStyles(to);

        rootstrap.style({
            id: 'typography--h4--font-styles',
            selector: 'h4',
            styles: h4Styles
        });
    });
});
