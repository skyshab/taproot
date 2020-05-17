<?php
/**
 * Controller class.
 *
 * This file contains actions and callbacks for the component.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2020 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */

namespace Taproot\Components\Navigation_Postnav;

use Hybrid\Contracts\Bootable;
use Taproot\Tools\Mod;

/**
 * Class to handle component actions.
 *
 * @since  2.0.0
 * @access public
 */
class Controller implements Bootable {

    /**
     * Adds actions on the appropriate customize action hooks.
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function boot() {
        add_filter( 'hybrid/view/nav/postnav/hierarchy', [ $this, 'postnav_display' ] );
    }

    /**
     * Postnav display.
     *
     * Don't display postnav if disabled.
     *
     * @since 2.0.0
     * @param array
     * @return array
     */
    public function postnav_display( $hierarchy ) {

        $post_type = get_post_type();

        if( ! Mod::get( "{$post_type}--single--postnav--enable", TRUE ) ) {
            return [];
        }

        return $hierarchy;
    }
}
