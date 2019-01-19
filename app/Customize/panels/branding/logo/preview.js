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


// Logo image
wp.customize( 'branding--logo--image', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'branding--logo--image',
            selector: '.branding',
            styles:  {
                'flex-direction': to
            },
            screen: 'mobile'
        });
    });
});
