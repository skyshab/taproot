/**
 * Customize controls preview scripts. 
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2018 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */


// Boxed Layout Padding
wp.customize( 'layout--content-tablet--padding', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'layout--content-tablet--padding',
            selector: '.app-main, .sidebar',
            styles:  {
                'padding': to,
            },
            screen: 'tablet-and-up',
        });
    });
});
