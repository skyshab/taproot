/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2018 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */

import * as utils from '../../../functions-customize-preview.js';


// Container Width
wp.customize( 'layout--container-mobile--width', function( value ) {
    value.bind( function( to ) {

        rootstrap.var({
            name: 'layout--container--width',
            value: to
        });

        rootstrap.var({
            name: 'layout--container--padding',
            value: utils.getPaddingFromWidth(to, 'vw')
        });

    });
});
