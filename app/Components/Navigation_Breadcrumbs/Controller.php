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
        add_filter( 'taproot/breadcrumbs/supported-post-types', [ $this, 'supported_post_types' ] );
    }

    /**
     * Add breadcrumbs home icon
     *
     * @since 2.0.0
     * @param string    $html
     * @return string
     */
    public function breadcrumbs_home_icon( $html ) {

        if( ! Mod::get( 'breadcrumbs--has-home-icon') ) {
            return $html;
        }

        $icon = app( 'icons' )->get( 'home' );

        return str_replace('<span itemprop="name">Home</span>', $icon, $html );
    }

    /**
     * Add post type support for breadcrumbs
     *
     * @since 1.4.0
     * @return array
     */
    public function supported_post_types($post_types) {

        if( Mod::get( 'posts--breadcrumbs--enable' ) ) {
            $post_types[] = 'post';
        }

        if( Mod::get( 'pages--breadcrumbs--enable' ) ) {
            $post_types[] = 'page';
        }

        return $post_types;
    }
}
