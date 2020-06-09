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
}
