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


// Sidebar Width
wp.customize( 'layout--sidebar--min-width', function( value ) {
    value.bind( function( to ) {
        rootstrap.customProperty({
            name: 'layout--sidebar--min-width',
            value: to,
            screen: 'desktop'
        });
    });
});
