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

namespace Taproot\Rootstrap;

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
        add_filter( 'init',                     [ $this, 'defaults' ], PHP_INT_MAX);
        add_filter( 'customize_preview_init',   [ $this, 'customize_preview_init' ], 20 );
    }

    /**
     *  Defaults
     *
     * @since 2.0.0
     * @return void
     */
    public function defaults() {
        do_action( 'rootstrap/defaults', app( 'rootstrap/defaults' ) );
    }

    /**
     *  Defaults
     *
     * @since 2.0.0
     * @return void
     */
    public function customize_preview_init() {

        $data = [];

        foreach( app('rootstrap/screens')->collection() as $name => $device ) {
            $data[$name]['min'] = $device->min();
            $data[$name]['max'] = $device->max();
        }

        wp_localize_script( 'customize-preview', 'rootstrapScreens', $data );
    }
}
