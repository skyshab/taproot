<?php
/**
 * Post Type Template Functions.
 *
 * This class contains helper functions for use in post type templates.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright Copyright (c) 2020, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Components\Post_Title;

use function Hybrid\app;

/**
 * Template functions class.
 *
 * @since  2.0.0
 * @access public
 */
class Template {

    /**
     * Get the archive title.
     *
     * @since 2.0.0
     * @param string
     * @return string
     */
    public function get_the_archive_title( array $args = [] ) {

        $post_type = get_post_type();

        $args = wp_parse_args( $args, [
            'text'   => '%s',
            'tag'    => is_front_page() ? 'h2' : 'h1',
            'class'  => sprintf( 'archive__title archive__title--%s', $post_type ),
            'before' => '',
            'after'  => ''
        ]);

        $text = sprintf( $args['text'], app('post-title/functions')->get_the_title() );

        $html = sprintf(
            '<%1$s class="%2$s">%3$s</%1$s>',
            tag_escape( $args['tag'] ),
            esc_attr( $args['class'] ),
            $text
        );

        $html = $args['before'] . $html . $args['after'];

        return apply_filters( 'taproot/archive/title', $html, $post_type );
    }

    /**
     * Displays the archive title.
     *
     * @since  2.0.0
     * @access public
     * @param  array  $args
     * @return void
     */
    function the_archive_title( array $args = [] ) {
        echo static::get_the_archive_title( $args );
    }

    /**
     * Returns the post title HTML.
     *
     * @since  2.0.0
     * @access public
     * @param  array  $args
     * @return string
     */
    function get_the_post_title( array $args = [] ) {

        $post_type = get_post_type();

        $args = wp_parse_args( $args, [
            'text'   => '%s',
            'tag'    => is_front_page() ? 'h2' : 'h1',
            'class'  => sprintf( 'post__title post__title--%s', $post_type ),
            'before' => '',
            'after'  => ''
        ]);

        $text = sprintf( $args['text'], app('post-title/functions')->get_the_title() );

        $html = sprintf(
            '<%1$s class="%2$s">%3$s</%1$s>',
            tag_escape( $args['tag'] ),
            esc_attr( $args['class'] ),
            $text
        );

        $html = $args['before'] . $html . $args['after'];

        return apply_filters( 'taproot/post/title', $html, $post_type );
    }

    /**
     * Displays the post title.
     *
     * @since  2.0.0
     * @access public
     * @param  array  $args
     * @return void
     */
    function the_post_title( array $args = [] ) {
        echo static::get_the_post_title( $args );
    }
}
