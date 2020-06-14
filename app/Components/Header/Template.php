<?php
/**
 * Header Template Tags.
 *
 * This class contains helper functions for use in header templates and settings.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright Copyright (c) 2020, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Components\Header;

use Taproot\Tools\Mod;
use function Taproot\Tools\get_the_single_id;

/**
 * Template tags class.
 *
 * @since  2.0.0
 * @access public
 */
class Template {

    /**
     * Get custom header type.
     *
     * @since  2.0.0
     * @access public
     * @return string - type or false
     */
    public static function get_custom_header_type() {

        // Front Page and Blog Page
        if ( is_front_page() && is_home() ) {
            return 'default';
        }

        $post_id = get_the_single_id();

        return static::get_custom_header_type_by_id( $post_id );
    }


     /**
     * Get custom header type by id.
     *
     * @since  2.0.0
     * @access public
     * @param int $post_id
     * @return string - type or false
     */
    public static function get_custom_header_type_by_id( $post_id = false ) {

        if ( ! $post_id ) {
            return false;
        }

        // Get the image type
        $header_image_type = get_post_meta( $post_id, 'taproot_custom_header_image_type', true );

        // Return type or false
        return ( ! $header_image_type || 'none' === $header_image_type ) ? false : $header_image_type;
    }

    /**
     * Get custom header url.
     *
     * @since  2.0.0
     * @access public
     * @param string - default url
     * @return string - url or false
     */
    public static function get_custom_header_url() {

        // Front Page and Blog Page
        if ( is_front_page() && is_home() ) {
            return get_header_image();
        }

        $post_id = get_the_single_id();

        return static::get_custom_header_url_by_id( $post_id );
    }

    /**
     * Get custom header url from a post id.
     *
     * @since  2.0.0
     * @access public
     * @param int - a post id
     * @return string - url or false
     */
    public static function get_custom_header_url_by_id( $post_id = false ) {

        // Get the image type
        $header_image_type = static::get_custom_header_type_by_id( $post_id );

        // No hero image
        if( ! $header_image_type ) {
            return false;
        }

        // Featured image for hero
        elseif( 'featured' === $header_image_type ) {
            return get_the_post_thumbnail_url( $post_id, 'full' );;
        }

        // Custom hero image
        elseif( 'custom' === $header_image_type ) {
            return get_post_meta( $post_id, 'taproot_custom_header_image', true );
        }

        // Default hero image
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
    public static function has_custom_header_url() {

        $custom_url = static::get_custom_header_url();

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

        if( static::has_custom_header_url() || static::has_custom_header_title() ) {
            $has_custom_header = true;
        }

        return apply_filters( 'taproot/has-custom-header', $has_custom_header, get_the_single_id() );
    }

    /**
     * Has custom header.
     *
     * @since  2.0.0
     * @access public
     * @return bool
     */
    public static function has_custom_header_title() {

        $post_id = get_the_single_id();

        if( ! $post_id ) {
            return false;
        }

        if( 'header' === get_post_meta( $post_id, 'taproot_post_title_display', true ) ) {
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
    public static function get_custom_header_attributes() {

        $header_url = static::get_custom_header_url();

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
     * Get custom header image markup.
     *
     * @since  2.0.0
     * @access public
     * @return string - the image markup
     */
    public static function get_custom_header_image() {

        if ( ! static::has_custom_header_url() ) {
            return '';
        }

        $attr = static::get_custom_header_attributes();

        $html = '<img';

        $attr = array_map( 'esc_attr', $attr );
        foreach ( $attr as $name => $value ) {
            $html .= ' ' . $name . '="' . $value . '"';
        }

        $html .= ' />';

        return $html;
    }

    /**
     * Display the custom header image markup.
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public static function the_custom_header_image() {

        echo static::get_custom_header_image();
    }

    /**
     * Get header overlay markup
     *
     * @since  2.0.0
     * @access public
     * @return string
     */
    public static function get_custom_header_overlay() {

        if ( ! static::has_custom_header_url() ) {
            return '';
        }

        $classnames =        static::get_overlay_classes();
        $overlay_styles =    static::get_overlay_styles();

        return sprintf( '<div id="custom-header-overlay" class="%s" style="%s"></div>', esc_attr( $classnames ), esc_attr( $overlay_styles ) );
    }

    /**
     * Display the custom header image markup.
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public static function the_custom_header_overlay() {

        echo static::get_custom_header_overlay();
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
            return Mod::get( 'header--hero--overlay-color' );
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

            $overlay_color = get_post_meta( $post_id, 'taprooot_hero_overlay_color', true );
        }
        // If default
        elseif( 'default' === $overlay_type ) {

            $overlay_color = Mod::get( 'header--hero--overlay-color' );
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

            $overlay_color_name = get_post_meta( $post_id, 'taprooot_hero_overlay_color_name', true );
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
            return Mod::get( 'header--hero--overlay-opacity' );
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

            $overlay_opacity = get_post_meta( $post_id, 'taprooot_hero_overlay_opacity', true );
        }
        // If default
        elseif( 'default' === $overlay_type ) {

            $overlay_opacity = Mod::get( 'header--hero--overlay-opacity' );
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

        // Get the overlay type
        $overlay_type = get_post_meta( $post_id, 'taprooot_hero_overlay_type', true );

        // Return type or false
        return ( ! $overlay_type || 'none' === $overlay_type ) ? false : $overlay_type;
    }

    /**
     * Returns the post title HTML.
     *
     * @since  5.0.0
     * @access public
     * @param  array  $args
     * @return string
     */
    function get_the_title( array $args = [] ) {

        $post_id = get_the_single_id();

        $is_single = ( $post_id && ! is_front_page() );

        $args = wp_parse_args( $args, [
            'text'   => '%s',
            'tag'    => $is_single ? 'h1' : 'h2',
            'class'  => 'app-header__title',
            'before' => '',
            'after'  => ''
        ] );

        $text = sprintf( $args['text'], $is_single ? single_post_title( '', false ) : the_title( '', '', false ) );

        $html = sprintf(
            '<%1$s class="%2$s">%3$s</%1$s>',
            tag_escape( $args['tag'] ),
            esc_attr( $args['class'] ),
            $text
        );

        return apply_filters( 'taproot/header/title', $args['before'] . $html . $args['after'] );
    }

    /**
     * Display the post title HTML.
     *
     * @since  5.0.0
     * @access public
     * @param  array  $args
     * @return string
     */
    function the_title( array $args = [] ) {

        echo static::get_the_title( $args );
    }

    /**
     * Returns the post author HTML.
     *
     * @since  2.0.0
     * @access public
     * @param  array  $args
     * @return string
     */
    public static function get_the_author( array $args = [] ) {

        // Merge defaults and incoming args
        $args = wp_parse_args( $args, [
            'text'   => '%s',
            'class'  => 'entry__author',
            'before' => '',
            'after'  => ''
        ]);

        // Get the post author display name
        global $post;
        $author_id = $post->post_author;
        $display_name = get_the_author_meta( 'display_name', $author_id );

        // Get the author link
        $url = get_author_posts_url( $author_id );

        // Create markup
        $html = sprintf(
            '<a class="%s" href="%s">%s</a>',
            esc_attr( $args['class'] ),
            esc_url( $url ),
            sprintf( $args['text'], $display_name )
        );

        return apply_filters( 'taproot/template/author', $args['before'] . $html . $args['after'] );
    }

    /**
     * Displays the post author HTML.
     *
     * @since  2.0.0
     * @access public
     * @param  array  $args
     * @return string
     */
    public static function the_author( array $args = [] ) {

        echo static::get_the_author( $args );
    }
}
