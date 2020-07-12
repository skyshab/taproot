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

namespace Taproot\Components\Fonts;

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
        add_filter( 'wp_enqueue_scripts', [ $this, 'google_fonts' ] );
    }

    /**
     *  Enqueue Google Fonts
     *
     * @since 2.0.0
     * @return void
     */
    public function google_fonts() {

        if( app('fonts/functions')->has_google_fonts() ) {
            wp_enqueue_style( 'taproot-google-fonts', esc_url( app('fonts/functions')->get_google_fonts_url() ) );
        }
    }
}
