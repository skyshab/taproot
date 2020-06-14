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

namespace Taproot\Components\Post_Types;

use Taproot\Tools\Mod;
use function Taproot\Tools\get_the_single_id;

/**
 * Template functions class.
 *
 * @since  2.0.0
 * @access public
 */
class Template {

    /**
     * Output Entry Link
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public static function entry_link( array $args = [] ) {

        $post_type = get_post_type();

        $defaults = [
            'class'     => 'entry__link',
            'text'      => Mod::get( "{$post_type}--archive-entry--link--readmore" ),
            'position'  => Mod::get( "{$post_type}--archive-entry--link--position" ),
            'type'      => Mod::get( "{$post_type}--archive-entry--link--type" )
        ];

        $args = wp_parse_args( $args, $defaults);

        if( $args['type'] === 'none' || $args['type'] === 'inline' ) {
            return;
        }

        $link_class = $args['class'];

        if( $args['type'] && 'button' === $args['type'] ) {
            $link_class .= ' taproot-button';
        }

        if( $args['position'] && 'right' === $args['position'] ) {
            $link_class .= ' align-self--right';
        }
        else {
            $link_class .= ' align-self--left';
        }

        printf( '<a href="%s" class="%s"><span class="visuallyhidden">%s</span>%s</a>',
            esc_url( get_permalink() ),
            esc_attr( $link_class ),
            esc_html( get_the_title() ),
            esc_html( $args['text'] )
        );
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

        $args = wp_parse_args( $args, [
            'text'   => '%s',
            'tag'    => is_front_page() ? 'h2' : 'h1',
            'class'  => 'entry__title',
            'before' => '',
            'after'  => ''
        ]);

        if( $post_id ) {
            $text = single_post_title( '', false );
        }
        elseif( is_archive() ) {
           $text = get_the_archive_title();
        }
        else {
            $text = the_title( '', '', false );
        }

        $text = sprintf( $args['text'], $text );

        $html = sprintf(
            '<%1$s class="%2$s">%3$s</%1$s>',
            tag_escape( $args['tag'] ),
            esc_attr( $args['class'] ),
            $text
        );

        return apply_filters( 'taproot/entry/title', $args['before'] . $html . $args['after'] );
    }

    /**
     * Displays the post title.
     *
     * @since  5.0.0
     * @access public
     * @param  array  $args
     * @return string
     */
    function the_title( array $args = [] ) {
        echo static::get_the_title( $args );
    }
}
