<?php
/**
 * Post Type Template Tags.
 *
 * This class contains helper functions for use in post type templates and settings.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright Copyright (c) 2019, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Components\Post_Types;

use Taproot\Tools\Mod;

/**
 * Template tags class.
 *
 * @since  2.0.0
 * @access public
 */
class Functions {

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
            'button'    => ('button' === Mod::get( "{$post_type}--archive-entry--link--type" ) ) ? true : false,
            'position'  => Mod::get( "{$post_type}--archive-entry--link--position" ),
        ];

        $args = wp_parse_args( $args, $defaults);

        $link_class = $args['class'];

        if( $args['button'] ) {
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
