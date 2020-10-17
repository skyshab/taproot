<?php
/**
 * Header Functions
 *
 * This class contains helper functions for use in header component.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright Copyright (c) 2020, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Header;

use Taproot\Tools\Mod;
use function Taproot\Tools\get_the_single_id;

/**
 * Template tags class.
 *
 * @since  2.0.0
 * @access public
 */
class Functions {

    /**
     * Get custom header type.
     *
     * @since  2.0.0
     * @access public
     * @return string - type or false
     */
    public static function get_header_image_type() {

        // Front Page and Blog Page
        if ( is_front_page() && is_home() ) {
            return 'default';
        }

        $post_id = get_the_single_id();

        return static::get_header_image_type_by_id( $post_id );
    }

     /**
     * Get custom header type by id.
     *
     * @since  2.0.0
     * @access public
     * @param int $post_id
     * @return string - type or false
     */
    public static function get_header_image_type_by_id( $post_id = false ) {

        if ( ! $post_id ) {
            return false;
        }

        // Get the image type
        $header_image_type = get_post_meta( $post_id, '_taproot_header_image_type', true );

        // Return type or false
        return ( ! $header_image_type || 'none' === $header_image_type ) ? false : $header_image_type;
    }

    /**
     * Get default custom header image url
     *
     * @since  2.0.0
     * @access public
     * @return string
     */
    public static function get_default_custom_header_url() {
        return get_parent_theme_file_uri( '/dist/images/header.jpg' );
    }

    /**
     * Get custom header url.
     *
     * @since  2.0.0
     * @access public
     * @param string - default url
     * @return string - url or false
     */
    public static function get_header_image_url() {

        // Front Page and Blog Page
        if ( is_front_page() && is_home() ) {
            return get_header_image();
        }

        $post_id = get_the_single_id();

        return static::get_header_image_url_by_id( $post_id );
    }

    /**
     * Get custom header url from a post id.
     *
     * @since  2.0.0
     * @access public
     * @param int - a post id
     * @return string - url or false
     */
    public static function get_header_image_url_by_id( $post_id = false ) {

        // Get the image type
        $header_image_type = static::get_header_image_type_by_id( $post_id );

        // No header image
        if( ! $header_image_type ) {
            return false;
        }

        // Featured image for header
        elseif( 'featured' === $header_image_type ) {
            return get_the_post_thumbnail_url( $post_id, 'full' );
        }

        // Custom header image
        elseif( 'custom' === $header_image_type ) {
            return get_post_meta( $post_id, '_taproot_header_image', true );
        }

        // Default header image
        elseif( 'default' === $header_image_type ) {
            return get_header_image();
        }

        return false;
    }

    /**
     * Has custom header url.
     *
     * @since  2.0.0
     * @access public
     * @return bool
     */
    public static function has_header_image_url() {

        $custom_url = static::get_header_image_url();

        return ( $custom_url && '' !== $custom_url );
    }

    /**
     * Has custom header.
     *
     * @since  2.0.0
     * @access public
     * @return bool
     */
    public static function has_custom_header() {

        $has_custom_header = false;

        if( static::has_header_image_url() || static::has_header_content() ) {
            $has_custom_header = true;
        }

        return apply_filters( 'taproot/has-custom-header', $has_custom_header, get_the_single_id() );
    }


    /**
     * Has header content.
     *
     * @since  2.0.0
     * @access public
     * @return bool
     */
    public static function has_header_content() {

        if( static::has_header_content_title() || static::has_header_content_byline() ) {
            return true;
        }

        return false;
    }

    /**
     * Has custom header.
     *
     * @since  2.0.0
     * @access public
     * @return bool
     */
    public static function has_header_content_title() {

        $post_id = get_the_single_id();

        if( $post_id && get_post_meta( $post_id, '_taproot_header_display_title', true ) ) {
            return true;
        }

        return false;
    }

    /**
     * Has custom header byline.
     *
     * @since  2.0.0
     * @access public
     * @return bool
     */
    public static function has_header_content_byline() {

        $post_id = get_the_single_id();

        if( $post_id && get_post_meta( $post_id, 'taproot_header_display_byline', true ) ) {
            return true;
        }

        return false;
    }

    /**
     * Get custom header attributes.
     *
     * @since  2.0.0
     * @access public
     * @return array - attributes array
     */
    public static function get_header_image_attributes() {

        $header_url = static::get_header_image_url();

        if ( ! $header_url ) {
            return [];
        }

        $header      = get_custom_header();
        $header->url = $header_url;

        $width  = absint( $header->width );
        $height = absint( $header->height );

        $attr = [
            'src'    => $header->url,
            'width'  => $width,
            'height' => $height,
            'alt'    => get_bloginfo( 'name' ),
        ];

        // Generate 'srcset' and 'sizes'.
        if ( ! empty( $header->attachment_id ) ) {
            $image_meta = get_post_meta( $header->attachment_id, '_wp_attachment_metadata', true );
            $size_array = array( $width, $height );

            if ( is_array( $image_meta ) ) {
                $srcset = wp_calculate_image_srcset( $size_array, $header->url, $image_meta, $header->attachment_id );
                $sizes  = wp_calculate_image_sizes( $size_array, $header->url, $image_meta, $header->attachment_id );

                if ( $srcset && $sizes ) {
                    $attr['srcset'] = $srcset;
                    $attr['sizes']  = $sizes;
                }
            }
        }

        return $attr;
    }

    /**
     * Get header overlay markup
     *
     * @since  2.0.0
     * @access public
     * @return string
     */
    public static function get_overlay_classes() {

        // Base overlay classnames
        $classnames = "taproot-overlay taproot-overlay--custom-header";

        // Get the color opacity
        $overlay_opacity = static::get_overlay_opacity();

        // Add opacity class
        if( $overlay_opacity ) {

            if( $ratio = intval( $overlay_opacity ) ) {
                $classnames .= sprintf( ' has-background-dim-%s', 10 * round( $ratio / 10 ) );
            }
        }

        // Get the color name
        $overlay_color_name = static::get_overlay_color_name();

        // Add color name class
        if( $overlay_color_name ) {
            $classnames .= sprintf( ' has-%s-background-color', esc_attr( $overlay_color_name ) );
        }

        return $classnames;
    }

    /**
     * Get overlay background style
     *
     * @since  2.0.0
     * @access public
     * @return string
     */
    public static function get_overlay_styles() {

        $overlay_color =    static::get_overlay_color();
        $overlay_styles = ( $overlay_color ) ? sprintf( 'background-color: %s', $overlay_color ) : '';

        return $overlay_styles;
    }

    /**
     * Get header overlay color
     *
     * @since  2.0.0
     * @access public
     * @return string
     */
    public static function get_overlay_color() {

        // Front Page and Blog Page
        if ( is_front_page() && is_home() ) {
            return Mod::get( 'header--image--overlay-color' );
        }

        $post_id = get_the_single_id();

        $overlay_color = static::get_overlay_color_by_id( $post_id );

        return $overlay_color;
    }

    /**
     * Get header overlay color by id.
     *
     * @since  2.0.0
     * @access public
     * @return string
     */
    public static function get_overlay_color_by_id( $post_id = false ) {

        if( ! $post_id ) {
            return false;
        }

        $overlay_color = false;

        // Get custom overlay type
        $overlay_type = static::get_overlay_type_by_id( $post_id );

        // If custom type
        if( 'custom' === $overlay_type ) {

            $overlay_color = get_post_meta( $post_id, '_taproot_header_overlay_color', true );
        }
        // If default
        elseif( 'default' === $overlay_type ) {

            $overlay_color = Mod::get( 'header--image--overlay-color' );
        }

        return $overlay_color;
    }

    /**
     * Get header overlay color
     *
     * @since  2.0.0
     * @access public
     * @return string
     */
    public static function get_overlay_color_name() {

        $post_id = get_the_single_id();

        return static::get_overlay_color_name_by_id( $post_id );
    }

    /**
     * Get header overlay color by id.
     *
     * @since  2.0.0
     * @access public
     * @return string
     */
    public static function get_overlay_color_name_by_id( $post_id = false ) {

        if( ! $post_id ) {
            return false;
        }

        $overlay_color_name = false;

        // Get custom overlay type
        $overlay_type = static::get_overlay_type_by_id( $post_id );

        // If custom type
        if( 'custom' === $overlay_type ) {

            $overlay_color_name = get_post_meta( $post_id, '_taproot_header_overlay_color_name', true );
        }

        return $overlay_color_name;
    }

    /**
     * Get header overlay opacity.
     *
     * @since  2.0.0
     * @access public
     * @return string
     */
    public static function get_overlay_opacity() {

        // Front Page and Blog Page
        if ( is_front_page() && is_home() ) {
            return Mod::get( 'header--image--overlay-opacity' );
        }

        $post_id = get_the_single_id();

        $overlay_opacity = static::get_overlay_opacity_by_id( $post_id );

        return $overlay_opacity;
    }

    /**
     * Get header overlay opacity by id.
     *
     * @since  2.0.0
     * @access public
     * @return string
     */
    public static function get_overlay_opacity_by_id( $post_id = false ) {

        if( ! $post_id ) {
            return false;
        }

        $overlay_opacity = false;

        // Get custom overlay type
        $overlay_type = static::get_overlay_type_by_id( $post_id );

        // If custom type
        if( 'custom' === $overlay_type ) {

            $overlay_opacity = get_post_meta( $post_id, '_taproot_header_overlay_opacity', true );
        }
        // If default
        elseif( 'default' === $overlay_type ) {

            $overlay_opacity = Mod::get( 'header--image--overlay-opacity' );
        }

        return $overlay_opacity;
    }

    /**
     * Get custom header overlay type.
     *
     * @since  2.0.0
     * @access public
     * @return string - type or false
     */
    public static function get_overlay_type() {

        // Front Page and Blog Page
        if ( is_front_page() && is_home() ) {
            return 'default';
        }

        $post_id = get_the_single_id();

        return static::get_overlay_type_by_id( $post_id );
    }

    /**
     * Get custom header overlay type by id.
     *
     * @since  2.0.0
     * @access public
     * @param int $post_id
     * @return string - type or false
     */
    public static function get_overlay_type_by_id( $post_id = false ) {

        if ( ! $post_id ) {
            return false;
        }

        $overlay_type = get_post_meta( $post_id, '_taproot_header_overlay_type', true );

        if( ! $overlay_type ) {
            return 'default';
        }
        elseif( 'none' === $overlay_type ) {
            return false;
        }

        return $overlay_type;
    }

    /**
     * Has fixed header?
     *
     * @since  2.0.0
     * @access public
     * @return bool
     */
    public static function has_fixed_header() {
        return Mod::get( 'header--fixed--is-fixed' );
    }

    /**
     * Get fixed header type
     *
     * @since  2.0.0
     * @access public
     * @return string
     */
    public static function get_fixed_header_type() {
        return Mod::get( 'header--fixed--fixed-type' );
    }

    /**
     * Get header layout
     *
     * @since  2.0.0
     * @access public
     * @param string - $screen
     * @return string
     */
    public static function get_header_layout( $screen = false ) {

        if( ! $screen  || 'mobile' === $screen ) {
            return Mod::get( 'header--layout' );
        }

        return Mod::get( "header--layout--{$screen}" );
    }

    /**
     * Display the site title?
     *
     * @since 2.0.0
     * @return bool
     */
    public function display_site_title() {
        return Mod::get( 'header--title--enable' );
    }

    /**
     * Display the tagline?
     *
     * @since 2.0.0
     * @return bool
     */
    public function display_site_tagline() {
        return Mod::get( 'header--tagline--enable' );
    }

    /**
     * Get custom header text color
     *
     * @since  2.0.0
     * @access public
     * @return string
     */
    public static function get_custom_header_text_color() {
        return Mod::get( 'header--image--text-color', Mod::get( 'header--text-color' ) );
    }

}
