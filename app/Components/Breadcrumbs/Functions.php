<?php
/**
 * Component functions.
 *
 * This class contains helper functions for the component.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright Copyright (c) 2020, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Components\Breadcrumbs;

use Taproot\Tools\Mod;
use function Taproot\Tools\post_type_mod;

/**
 * Functions class.
 *
 * @since  2.0.0
 * @access public
 */
class Functions {

    /**
     * Use the home icon?
     *
     * @since  2.0.0
     * @access public
     * @return bool
     */
    public static function use_home_icon() {
       return Mod::get( 'navigation--breadcrumbs--has-home-icon' );
    }

    /**
     * Has breadcrumbs?
     *
     * @since  2.0.0
     * @access public
     * @return bool
     */
    public static function has_breadcrumbs() {
        return ( in_array( get_post_type(), static::get_breadcrumbs_supported_post_types() ) ) ? true : false;
    }

    /**
     * Get post types that support breadcrumbs
     *
     * @since  2.0.0
     * @access public
     * @return array
     */
    public static function get_breadcrumbs_supported_post_types() {
        return apply_filters( 'taproot/breadcrumbs/supported-post-types', [] );
    }

    /**
     * Get breadcrumbs alignment
     *
     * @since  2.0.0
     * @access public
     * @return string
     */
    public static function get_breadcrumbs_align() {
        return Mod::get( 'navigation--breadcrumbs--align' );
    }

    /**
     * Has separators?
     *
     * @since  2.0.0
     * @access public
     * @return bool
     */
    public static function has_separators() {
        return Mod::get( 'navigation--breadcrumbs--has-separators' );
    }

    /**
     * Are breadcrumbs enabled for a given post type?
     *
     * @since  2.0.0
     * @param string - the post type
     * @return bool
     */
    public static function post_type_has_breadcrumbs( $post_type = false ) {

        $has_breadcrumbs = post_type_mod( 'breadcrumbs--enable', false, $post_type );

        return ( $has_breadcrumbs ) ? true : false;
    }
}
