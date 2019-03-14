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


// Padding
wp.customize( 'footer--padding-mobile--padding', function( value ) {
    value.bind( function( to ) {
        rootstrap.var({
            name: 'footer--padding',
            value: to,
            screen: 'default',
        });
    });
});
