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

use Hybrid\Breadcrumbs\Trail as Breadcrumbs;
use function Taproot\Customize\theme_mod;


/**
 * Get Breadcrumbs Markup
 *
 * @since  1.4.0
 * @access public
 * @param  array  $args
 * @return string
 */
function get_the_breadcrumbs( $args = [] ) {

    $args = wp_parse_args($args, [
        'textColor' => false,
        'customTextColor' => false,
        'align' => theme_mod('elements--breadcrumbs--align'),
        'showSeparators' => theme_mod('elements--breadcrumbs--has-separators'),
    ]);

    // not a good way to add the styles to the breadcrumbs container
    // $styles = ( $args['customTextColor'] ) ? sprintf('color: %s', $args['customTextColor']) : '';

    $classes = 'breadcrumbs';

    if( $args['textColor'] ) {
        $classes .= sprintf(' has-%s-color', $args['textColor']);
    }

    if( $args['align'] ) {
        $classes .= sprintf(' has-flex-align-%s', $args['align']);
    }

    if( $args['showSeparators'] ) {
        $classes .= ' has-separators';
    }

    return Breadcrumbs::render( ['post' => get_post(), 'container_class' => $classes] );
}


/**
 * Print Breadcrumbs
 *
 * @since  1.4.0
 * @access public
 * @param  array  $args
 * @return void
 */
function breadcrumbs( $args = [] ) {

    // check if breadcrumbs are enabled
    if( !theme_mod( 'elements--breadcrumbs--enable', true ) ) return;

    // filter for supported post types
    $supported_types = apply_filters('taproot/breadcrumbs/supported-post-types', [] );

    // check if current post type supports breadcrumbs
    if( !in_array( get_post_type(), $supported_types ) ) return;

    // print the breadcrumbs
    echo get_the_breadcrumbs( $args );
}
