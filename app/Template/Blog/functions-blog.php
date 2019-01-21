<?php
/**
 * Template tags.
 *
 * This file holds template tags for the theme. Template tags are PHP functions
 * meant for use within theme templates.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2018 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */

namespace Taproot\Template;

use function Rootstrap\get_theme_mod;


/**
 * Output Archive Link
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function archive_link() {

    $link_style = get_theme_mod( 'blog--archive-link--style', null, true );

    if( get_theme_mod('taproot_post_show_all') || 'inline' === $link_style || 'none' === $link_style ) 
        return false;

    $link_text = get_theme_mod( 'blog--archive-link--text', null, true );
    $link_position = get_theme_mod( 'blog--archive-link--position', null, true );
    $link_class = ( 'button' === $link_style ) ? 'taproot-button ' : '';
    $link_class .= ( 'right' === $link_position ) ? 'align-self--right ' : '';
    $link_class .= 'entry__link';

    printf( '<a href="%s" class="%s"><span class="visuallyhidden">%s</span>%s</a>',  
        esc_url( get_permalink() ), 
        esc_attr( $link_class ), 
        esc_html( get_the_title() ), 
        esc_html( $link_text ) 
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
    echo esc_html( get_theme_mod( 'blog--title--title', null, true ) );
}
