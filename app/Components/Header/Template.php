<?php
/**
 * Header Template Tags.
 *
 * This class contains helper functions for use in header templates and settings.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright Copyright (c) 2019, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Components\Header;

use Taproot\Tools\Mod;

/**
 * Template tags class.
 *
 * @since  2.0.0
 * @access public
 */
class Template {

    /**
     * Get header overlay markup
     *
     * @since  2.0.0
     * @access public
     * @return string
     */
    public static function get_overlay() {

        if ( ! has_custom_header() && ! is_customize_preview() ) {
            return;
        }

        $classnames = "taproot-overlay taproot-overlay--custom-header";
        $overlay_color = Mod::get('header--hero--overlay-color');
        $overlay_opacity = Mod::get('header--hero--overlay-opacity');
        $classnames .= static::dimRatioToClass($overlay_opacity);
        $overlay_styles = '';

        if( is_singular() ) {
            $overlay_color_type =  get_post_meta( get_the_ID(), 'taprooot_hero_overlay_type', true );
            if('custom' === $overlay_color_type) {
                $overlay_color_name =  get_post_meta( get_the_ID(), 'taprooot_hero_overlay_color_name', true );
                if( $overlay_color_name ) {
                    $classnames .= sprintf(' has-%s-background-color', esc_attr($overlay_color_name) );
                }
            }
        }

        if($overlay_color) {
            $overlay_styles = sprintf('background-color: %s', $overlay_color );
        }

        return sprintf('<div id="taproot-overlay" class="%s" style="%s"></div>', esc_attr($classnames), esc_attr($overlay_styles) );
    }

    /**
     * Helper function to get opacity classname from number
     *
     * @since  2.0.0
     * @access public
     * @param  mixed $ratio - numeric value representing the opacity level
     * @return string - classname for controlling opacity
     */
    private static function dimRatioToClass($ratio) {
        $ratio = intval( $ratio );
        return ( $ratio === 0 ) ? '' : sprintf(' has-background-dim-%s', 10 * round( $ratio / 10 ) );
    }

    /**
     * Get custom header type for single posts/pages/custom post types.
     *
     * @since  2.0.0
     * @access public
     * @return string
     */
    public static function get_custom_header_type() {

        if( is_singular() ) {

            $post_header_type = get_post_meta( get_the_ID(), 'taproot_custom_header_image_type', true );
            return ( $post_header_type && '' !== $post_header_type ) ? $post_header_type : 'none';
        }

        return false;
    }

    /**
     * Returns the post author HTML.
     *
     * @since  2.0.0
     * @param  array  $args
     * @return string
     */
    public static function get_the_author( array $args = [] ) {

        $args = wp_parse_args( $args, [
            'text'   => '%s',
            'class'  => 'entry__author',
            'before' => '',
            'after'  => ''
        ]);

        global $post;
        $author_id = $post->post_author;
        $display_name = get_the_author_meta('display_name', $author_id);
        $url = get_author_posts_url( $author_id );

        $html = sprintf(
            '<a class="%s" href="%s">%s</a>',
            esc_attr( $args['class'] ),
            esc_url( $url ),
            sprintf( $args['text'], $display_name )
        );

        return apply_filters( 'taproot/template/author', $args['before'] . $html . $args['after'] );
    }
}
