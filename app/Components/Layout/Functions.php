<?php
/**
 * Component functions.
 *
 * This class contains helper functions for the component.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright Copyright (c) 2019, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Components\Layout;

use Taproot\Tools\Mod;

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

        $layout = apply_filters('taproot/layout', 'right');

        $post_type = ( get_post_type() ) ? get_post_type() : 'post';

        if( is_home() || is_archive() ) {
            $layout = Mod::get( "{$post_type}--archive--layout--layout", $layout );
        }
        elseif( is_singular() ) {
            // First, check for non-hierarchical first, then hierarchical
            $default = Mod::get( "{$post_type}--single--layout--layout", Mod::get( "{$post_type}--layout--layout", $layout ) );
            $single_layout = get_post_meta( get_the_ID(), 'taproot_page_layout', true );
            $layout = ($single_layout) ? $single_layout : $default;
        }

        return $layout;
    }

    /**
     * Is boxed layout activated?
     *
     * @since  2.0.0
     * @return bool
     */
    public static function is_boxed_layout() {
        return ( Mod::get( 'layout--boxed--enable' ) ) ? true : false;
    }

    /**
     * Get Layout breakpoint
     *
     * Utility to calculate the width when containers reach their full size
     *
     * @since  2.0.0
     * @return int
     */
    public static function get_full_layout_width() {

        $max_width = Mod::get('layout--container--max-width');
        $max_width_int = (int) filter_var($max_width, FILTER_SANITIZE_NUMBER_INT);

        if( static::is_boxed_layout() ) {
            $layout_padding = Mod::get('layout--boxed--outer-padding');
        } else {
            $site_width = static::get_layout_width('desktop', 'vw');
            $layout_padding = static::get_padding_from_width( $site_width, 'vw' );
        }

        $layout_padding_int = (int) filter_var($layout_padding, FILTER_SANITIZE_NUMBER_INT);

        $width = false;

        if(strpos($layout_padding, 'vw') !== false) {
            $percentage = (100 - (2 * $layout_padding_int) ) / 100;
            $width = $max_width_int / $percentage;
        }
        elseif(strpos($layout_padding, 'px') !== false) {
            $width = $max_width_int + (2 * $layout_padding_int);
        }

        if( $width <= 1025 ) {
            return 1025;
        }

        return round($width);
    }

    /**
     * Get Full Layout Padding
     *
     * Utility to calculate the padding in px when a layout reaches its max width
     *
     * @since  2.0.0
     * @return string
     */
    public static function get_full_layout_padding() {

        if( ! static::get_layout_width('desktop') || ! static::get_full_layout_width() ) {
            return false;
        }

        $portion = (1 - static::get_layout_width('desktop') ) / 2;
        $width = (int) static::get_full_layout_width();

        return $portion * $width . 'px';
    }

    /**
     * Get Layout Width
     *
     * Utility to get container layout width and format in vw, %, or as a decimal
     *
     * @since  2.0.0
     * @return string
     */
    public static function get_layout_width( $screen = 'mobile', $unit = 'decimal' ) {

        $width = Mod::get( sprintf('layout--container--width--%s', $screen) );

        if( ! $width ) {
            return false;
        }

        $width_int = (int) filter_var($width, FILTER_SANITIZE_NUMBER_INT);

        if( 'decimal' === $unit ) {
            return $width_int / 100;
        }

        return $width_int . $unit;
    }

    /**
     * Get Padding from Width
     *
     * Utility to calculate side padding values
     * from a width defined in vw or %.
     *
     * @since  2.0.0
     * @param mixed $width - the width in vw, %, or unitless value
     * @param string $unit - unit to add to the returned string
     * @return string
     */
    public static function get_padding_from_width( $width, $unit = false ) {

        if( ! $width ) return false;

        $width_int = (int) filter_var($width, FILTER_SANITIZE_NUMBER_INT);
        $padding = (100 - $width_int) / 2;

        if($unit) {
            $padding .= $unit;
        }

        return $padding;
    }
}
