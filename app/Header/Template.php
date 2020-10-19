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

namespace Taproot\Header;

use function Taproot\Tools\get_the_single_id;
use function Hybrid\app;

/**
 * Template tags class.
 *
 * @since  2.0.0
 * @access public
 */
class Template {

    /**
     * Get custom header image markup.
     *
     * @since  2.0.0
     * @access public
     * @return string - the image markup
     */
    public static function get_header_image() {

        // Handle the custom header for when page is both the blog and front page.
        if( is_home() && is_front_page() ) {

            if ( ! has_custom_header() && ! is_customize_preview() ) {
                return '';
            }

            // default custom header markup
            return get_header_image_tag();
        }


        if ( ! app('header/functions')->has_header_image_url() ) {
            return '';
        }

        $attr = app('header/functions')->get_header_image_attributes();

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
    public static function the_header_image() {
        echo static::get_header_image();
    }

    /**
     * Get header overlay markup
     *
     * @since  2.0.0
     * @access public
     * @return string
     */
    public static function get_header_image_overlay() {

        if ( ! app('header/functions')->has_header_image_url() ) {
            return '';
        }

        $classnames =        app('header/functions')->get_overlay_classes();
        $overlay_styles =    app('header/functions')->get_overlay_styles();

        return sprintf( '<div id="header-image-overlay" class="%s" style="%s"></div>', esc_attr( $classnames ), esc_attr( $overlay_styles ) );
    }

    /**
     * Display the custom header image markup.
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public static function the_header_image_overlay() {
        echo static::get_header_image_overlay();
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

    /**
     * Get the custom header markup.
     *
     * Used for the customizer refresh.
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public static function get_the_custom_header() {
        return \Hybrid\View\render( 'header/image' );
    }
}
