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



// Header Image
wp.customize( 'header_image', function( value ) {
    value.bind( function( to ) {

        let appHeader = document.querySelector('.home.blog .app-header')

        if(appHeader) {
            if(to && 'remove-header' !== to) {
                appHeader.classList.add('app-header--has-custom-header');
            }
            else {
                appHeader.classList.remove('app-header--has-custom-header');
            }
        }
    });
});
