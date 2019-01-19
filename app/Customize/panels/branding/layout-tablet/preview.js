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


// Layout
wp.customize( 'branding--layout-tablet--layout', function( value ) {
    value.bind( function( to ) {
        if( 'horizontal' === to ) {
            $( '.app-header' ).removeClass('app-header--tablet--vertical').addClass('app-header--tablet--horizontal');
        }
        else if( 'vertical' === to ) {
            $( '.app-header' ).removeClass('app-header--tablet--horizontal').addClass('app-header--tablet--vertical');
        }             
    });
});
