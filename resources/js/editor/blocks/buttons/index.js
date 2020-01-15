/**
 * Buttons Block Customization
 *
 * This file handles the JavaScript for modifying the core buttons block
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2020 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */

wp.domReady( () => {
    // remove the "outline" style option
    wp.blocks.unregisterBlockStyle( 'core/button', 'outline' );

    // add a "rounded" style option
    wp.blocks.registerBlockStyle( 'core/button', {
        name: 'rounded',
        label: 'Rounded'
    });
});