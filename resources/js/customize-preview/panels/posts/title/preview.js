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


// Single Title Color
wp.customize( 'posts--title--color', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'posts--title--color',
            selector: '.entry__title--single',
            styles: { color: to }
        });
    });
});


// Font Styles
wp.customize( 'posts--title--font-styles', function( value ) {
    value.bind( function( to ) {
        var headingsStyles = utils.taprootFontStyles(to);
        rootstrap.style({
            id: 'posts--title--font-styles',
            selector: '.entry__title--single',
            styles: headingsStyles
        });
    });
});
