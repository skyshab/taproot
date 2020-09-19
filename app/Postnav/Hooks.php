<?php
/**
 * Hooks class.
 *
 * This file contains actions and callbacks for the component.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2020 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */

namespace Taproot\Postnav;

use Hybrid\Contracts\Bootable;
use function Hybrid\app;

/**
 * Class to handle component actions.
 *
 * @since  2.0.0
 * @access public
 */
class Hooks implements Bootable {

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

        if( ! app('postnav/functions')->has_postnav() ) {
            return [];
        }

        return $hierarchy;
    }
}
