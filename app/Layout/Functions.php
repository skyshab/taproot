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

namespace Taproot\Layout;

use Taproot\Tools\Mod;
use function Taproot\Tools\get_the_single_id;
use function Taproot\Tools\post_type_mod;

/**
 * Template tags class.
 *
 * @since  2.0.0
 * @access public
 */
class Functions {

    /**
     * Get Layout
     *
     * @since  2.0.0
     * @access public
     * @return string
     */
    public static function get_layout() {

        // Default layout
        $layout = 'right';

        if( $post_id = get_the_single_id() ) {

            // Get layout from post meta
            $single_layout = get_post_meta( $post_id, '_taproot_page_layout', true );

            if( $single_layout ) {

                if( 'default' === $single_layout ) {

                    if( is_home() ) {
                        $layout = Mod::get( "post--archive--layout--sidebar-layout", $layout );
                    }
                    elseif( post_type_mod( 'layout--sidebar-layout' ) ) {
                        $layout = post_type_mod( 'layout--sidebar-layout' );
                    }
                }
                else {
                    $layout = $single_layout;
                }
            }
            elseif( post_type_mod( 'layout--sidebar-layout' ) ) {
                $layout = post_type_mod( 'layout--sidebar-layout' );
            }
        }
        // Archive layouts
        elseif( is_home() || is_archive() ) {
            $layout = post_type_mod( 'archive--layout--sidebar-layout', $layout );
        }

        // Filter layout before returning
        return apply_filters( 'taproot/layout', $layout );
    }

    /**
     * Disable Main Top Padding?
     *
     * @since  2.0.0
     * @return bool
     */
    public static function disable_main_top_padding() {

        $disable_top_padding = false;
        $post_id = get_the_single_id();

        if( $post_id ) {
            $disable_top_padding = get_post_meta( $post_id, '_taproot_disable_main_top_padding', true );
        }

        return $disable_top_padding;
    }

    /**
     * Disable Main Bottom Padding?
     *
     * @since  2.0.0
     * @return bool
     */
    public static function disable_main_bottom_padding() {

        $disable_bottom_padding = false;
        $post_id = get_the_single_id();

        if( $post_id ) {
            $disable_bottom_padding = get_post_meta( $post_id, '_taproot_disable_main_bottom_padding', true );
        }

        return $disable_bottom_padding;
    }

   /**
     * Get content layout
     *
     * @since  2.0.0
     * @return bool
     */
    public static function get_content_layout() {

        $default = post_type_mod( 'layout--content-layout' );

        $post_id = get_the_single_id();
        $layout = get_post_meta( $post_id, '_taproot_post_content_layout', true );

        if( $layout && $layout !== 'default' ) {
            return $layout;
        }

        return $default;
    }

    /**
     * Get post header layout
     *
     * @since  2.0.0
     * @return bool
     */
    public static function get_post_header_footer_layout() {

        $layout = static::get_content_layout();

        if( 'wide' === $layout || 'wide-left' === $layout || 'wide-center' === $layout ) {
            return 'wide';
        }

        return $layout;
    }

    /**
     * Get post content layout
     *
     * @since  2.0.0
     * @return bool
     */
    public static function get_post_content_layout() {

        $layout = static::get_content_layout();

        if( 'wide-left' === $layout ) {
            return 'left';
        }
        elseif( 'wide-center' === $layout ) {
            return 'center';
        }

        return $layout;
    }

    /**
     * Get entry footer layout
     *
     * @since  2.0.0
     * @return bool
     */
    public static function get_archive_content_layout() {

        $default = post_type_mod( 'archive--layout--content-layout' );

        // If we're on the static page set to display posts, use the page settings.
        $post_id = get_the_single_id();

        if( $layout = get_post_meta( $post_id, '_taproot_post_content_layout', true ) ) {

            if( $layout === 'default' ) {
                return $default;
            }
            elseif( 'wide' === $layout || 'wide-left' === $layout || 'wide-center' === $layout ) {
                return 'wide';
            }

            return $layout;
        }

        return $default;
    }
}
