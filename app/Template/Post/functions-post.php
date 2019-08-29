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
 * Output Entry Link
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function entry_link( array $args = [] ) {

    $defaults = [
        'class'  => 'entry__link',
        'text'   => theme_mod( 'blog--archive-link--text', true ),
        'button' => ('button' === theme_mod( 'blog--archive-link--style', true ) ) ? true : false,
        'position' => theme_mod( 'blog--archive-link--position', true ),
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



/**
 * Print Blog Page Title
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function blog_title() {

    // define allowed html
    $allowed = [
        'em' => [],
        'strong' => [],
        'i' => [
            'class' => []
        ]
    ];

    // echol filtered blog title content
    echo wp_kses( theme_mod( 'blog--title--title', true ), $allowed );
}
