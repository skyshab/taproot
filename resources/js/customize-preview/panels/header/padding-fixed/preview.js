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



// Top/Bottom Padding
wp.customize( 'header--padding-fixed--padding', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'header--padding-fixed--padding',
            selector: '.app-header--fixed .app-header__container',
            styles: {
                'padding-top': to,
                'padding-bottom': to,
            },
            screen: 'desktop'
        });
    });
});
