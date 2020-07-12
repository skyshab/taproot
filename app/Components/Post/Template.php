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

namespace Taproot\Components\Post;

use function Hybrid\app;

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
     * @param array $args
     * @return string
     */
    public static function get_the_entry_link( array $args = [] ) {

        // If excerpts aren't enabled, return empty string
        if( ! app('post/functions')->use_excerpt() ) {
            return '';
        }

        $defaults = [
            'class'     => 'entry__link',
            'text'      => app('post/functions')->get_entry_link_text(),
            'position'  => app('post/functions')->get_entry_link_position(),
            'type'      => app('post/functions')->get_entry_link_type(),
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

        return sprintf( '<a href="%s" class="%s"><span class="visuallyhidden">%s</span>%s</a>',
            esc_url( get_permalink() ),
            esc_attr( $link_class ),
            esc_html( get_the_title() ),
            esc_html( $args['text'] )
        );
    }

    /**
     * Displays the entry link.
     *
     * @since  2.0.0
     * @access public
     * @param  array  $args
     * @return void
     */
    function the_entry_link( array $args = [] ) {
        echo static::get_the_entry_link( $args );
    }

    /**
     *  Get the "read more" link for archive entries
     *
     * @since 2.0.0
     * @access public
     * @return string
     */
    public function get_the_excerpt_more_link() {

        if( 'inline' !== app('post/functions')->get_entry_link_type() ) {
            return esc_html(' ...');
        }

        return sprintf( ' ... <a href="%s" class="read-more--inline"><span class="visuallyhidden">%s</span>%s</a>',
            esc_url( get_permalink() ),
            esc_html( get_the_title() ),
            esc_html( app('post/functions')->get_entry_link_text() )
        );
    }
}
