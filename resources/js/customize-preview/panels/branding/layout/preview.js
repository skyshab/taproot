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
wp.customize( 'branding--layout', function( value ) {
    value.bind( function( to ) {
        if( 'horizontal' === to ) {
            $( '.app-header' ).removeClass('app-header--mobile--vertical').addClass('app-header--mobile--horizontal');
        }
        else if( 'vertical' === to ) {
            $( '.app-header' ).removeClass('app-header--mobile--horizontal').addClass('app-header--mobile--vertical');
        }
    });
});


// Layout Tablet
wp.customize( 'branding--layout--tablet', function( value ) {
    value.bind( function( to ) {
        if( 'horizontal' === to ) {
            $( '.app-header' ).removeClass('app-header--tablet--vertical').addClass('app-header--tablet--horizontal');
        }
        else if( 'vertical' === to ) {
            $( '.app-header' ).removeClass('app-header--tablet--horizontal').addClass('app-header--tablet--vertical');
        }
    });
});


// Layout Desktop
wp.customize( 'branding--layout--desktop', function( value ) {
    value.bind( function( to ) {
        if( 'horizontal' === to ) {
            $( '.app-header' ).removeClass('app-header--desktop--vertical').addClass('app-header--desktop--horizontal');
        }
        else if( 'vertical' === to ) {
            $( '.app-header' ).removeClass('app-header--desktop--horizontal').addClass('app-header--desktop--vertical');
        }
    });
});
