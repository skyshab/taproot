<?php
/**
 * Controller class.
 *
 * This file contains actions and callbacks for the component.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */

namespace Taproot\Components\Background;

use Hybrid\Contracts\Bootable;

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
        add_action( 'after_setup_theme', [$this, 'add_theme_support'], 15 );
    }

    /**
     * Adds support for the custom background feature.
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function add_theme_support() {

        add_theme_support( 'custom-background', [
            'default-image'          => '',
            'default-preset'         => 'default',
            'default-position-x'     => 'left',
            'default-position-y'     => 'top',
            'default-size'           => 'auto',
            'default-repeat'         => 'repeat',
            'default-attachment'     => 'scroll',
            'default-color'          => '',
            'wp-head-callback'       => '_custom_background_cb',
            'admin-head-callback'    => '',
            'admin-preview-callback' => ''
        ] );
    }
}
