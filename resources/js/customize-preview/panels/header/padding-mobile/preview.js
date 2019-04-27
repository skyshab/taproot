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


// Header Padding
wp.customize( 'header--padding-mobile--padding', function( value ) {
    value.bind( function( to ) {
        rootstrap.var({
            name: 'header--padding',
            value: to,
            screen: 'default',
        });
    });
});
