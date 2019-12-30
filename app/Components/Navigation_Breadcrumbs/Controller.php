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

namespace Taproot\Components\Navigation_Breadcrumbs;

use Hybrid\Contracts\Bootable;
use Taproot\Tools\Mod;
use function Hybrid\app;

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
        add_filter( 'hybrid/breadcrumbs/trail', [ $this, 'breadcrumbs_home_icon' ] );
    }

    /**
     * Add breadcrumbs home icon
     *
     * @since 2.0.0
     * @param string    $html
     * @return string
     */
    public function breadcrumbs_home_icon( $html ) {

        // If icon not enabled, just return the markup
        if( ! Mod::get( 'navigation--breadcrumbs--has-home-icon') ) {
            return $html;
        }

        // Get the icon markup
        $icon = app( 'icons' )->get( 'home' );

        // Replace the default markup with icon markup
        return str_replace('<span itemprop="name">Home</span>', $icon, $html );
    }
}
