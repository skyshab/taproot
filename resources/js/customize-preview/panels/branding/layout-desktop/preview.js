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


// Layout
wp.customize( 'branding--layout-desktop--layout', function( value ) {
    value.bind( function( to ) {
        if( 'horizontal' === to ) {
            $( '.app-header' ).removeClass('app-header--desktop--vertical').addClass('app-header--desktop--horizontal');
        }
        else if( 'vertical' === to ) {
            $( '.app-header' ).removeClass('app-header--desktop--horizontal').addClass('app-header--desktop--vertical');
        }
    });
});
