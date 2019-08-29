<?php
/**
 * Template tags.
 *
 * This file holds template tags for the theme. Template tags are PHP functions
 * meant for use within theme templates.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */

namespace Taproot\Template;

use function Taproot\Customize\theme_mod;


/**
 * Outputs the post author HTML.
 *
 * @since  1.0.0
 * @access public
 * @param  array  $args
 * @return void
 */
function display_author( array $args = [] ) {
    echo render_author( $args );
}


/**
 * Returns the post author HTML.
 *
 * @since  1.0.0
 * @param  array  $args
 * @return string
 */
function render_author( array $args = [] ) {

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

    return apply_filters(
        'taproot/template/author',
        $args['before'] . $html . $args['after']
    );
}


/**
 * Displays the featured image.
 *
 * @since  1.0.0
 * @param  array   $args
 * @param  string  $type
 * @return void
 */
function featured_image( $args = [], $type = '' ) {

    if( !apply_filters( 'taproot/template/featured-image/display', true, $type ) ) return;
    $post_id = get_the_ID();
    $args = wp_parse_args( $args, [
        'size' => 'full',
        'link' => false,
        'class' => ''
    ]);

    if ( has_post_thumbnail( $post_id ) ) {

        $html = '';
        if( $args['link'] ) {
            $html .= '<a href="' . get_permalink( $post_id ) . '" title="' . get_the_title() . '">';
        }

        $html .= get_the_post_thumbnail( $post_id, $args['size'], array( 'class' => $args['class'] ) );

        if( $args['link'] ) {
            $html .= '</a>';
        }
        echo $html;
    }
}
