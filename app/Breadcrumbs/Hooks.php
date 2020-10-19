<?php
/**
 * Hooks class.
 *
 * This file contains actions and callbacks for the component.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright Copyright (c) 2020, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Breadcrumbs;

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
        add_filter( 'taproot/breadcrumbs/supported-post-types', [ $this, 'breadcrumbs_support' ] );
        add_filter( 'hybrid/breadcrumbs/crumb/Home',            [ $this, 'crumb_home' ] );
        add_filter( 'hybrid/breadcrumbs/build/Post',            [ $this, 'build_post' ] );
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
     * Crumb Home
     *
     * @since 1.4.0
     */
    public function crumb_home() {
        return Crumb_Home::class;
    }

    /**
     * Build Post
     *
     * @since 1.4.0
     */
    public function build_post() {
        return Build_Post::class;
    }
}
