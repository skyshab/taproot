<?php
/**
 * Template Utility Functions
 *
 * This file contains PHP functions meant for use within theme templates.
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
 * Returns the metadata separator.
 *
 * @since  1.0.0
 * @access public
 * @param  string  $sep  String to separate metadata.
 * @return string
 */
function sep( $sep = '' ) {

	return apply_filters(
		'taproot/sep',
		sprintf(
			' <span class="sep">%s</span> ',
			$sep ?: esc_html_x( '&middot;', 'meta separator', 'taproot' )
		)
	);
}


/**
 * Get Layout
 *
 * @since  1.0.0
 * @access public
 * @return string
 */
function get_layout() {

    if( is_home() || is_archive() ) {
        $layout = theme_mod( 'blog--layout--layout', true );
    }
    elseif( is_single() ) {
        $default = theme_mod( 'posts--layout--layout', true );
        $layout = get_post_meta( get_the_ID(), 'taproot_page_layout', true );
        $layout = ($layout) ? $layout : $default;
    }
    elseif( is_page() ) {
        $default = theme_mod( 'pages--layout--layout', true );
        $layout = get_post_meta( get_the_ID(), 'taproot_page_layout', true );
        $layout = ($layout) ? $layout : $default;
    }
    else {
        $layout = 'right';
    }

    return $layout;
}


/**
 * Get custom header type for single posts/pages/custom post types.
 *
 * @since  1.3.0
 * @access public
 * @return string
 */
function get_custom_header_type() {

    if( is_singular() ) {

        $post_header_type = get_post_meta( get_the_ID(), 'taproot_custom_header_image_type', true );

        if($post_header_type && '' !== $post_header_type) {
            return $post_header_type;
        }

        return 'none';
    }

    return false;
}
