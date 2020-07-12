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

namespace Taproot\Components\Breadcrumbs;

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
        //add_filter( 'hybrid/breadcrumbs/trail',                 [ $this, 'breadcrumbs_home_icon' ] );
        add_filter( 'taproot/breadcrumbs/supported-post-types', [ $this, 'breadcrumbs_support' ] );
        add_filter( 'hybrid/breadcrumbs/crumb/Home',            [ $this, 'crumb_home' ] );

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
        if( ! app('breadcrumbs/functions')->use_home_icon() ) {
            return $html;
        }

        // Get the icon markup
        $icon = app('icons')->render( 'home' );

        // Replace the default markup with icon markup
        return str_replace('<span itemprop="name">Home</span>', $icon, $html );
    }

    /**
     * Filter to add support for breadcrumbs.
     *
     * @since 2.0.0
     * @param array $post_types
     * @return array
     */
    public function breadcrumbs_support( $post_types ) {

        // Get the post type
        $post_type = get_post_type();

        if( app('breadcrumbs/functions')->post_type_has_breadcrumbs( $post_type ) ) {
            $post_types[] = $post_type;
        }

        return $post_types;
    }

    /**
     * Single Breadcrumb Build Class
     *
     * @since 1.4.0
     */
    public function crumb_home() {
        return Crumb_Home::class;
    }
}
