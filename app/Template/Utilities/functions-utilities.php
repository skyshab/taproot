<?php
/**
 * Template Utility Functions
 *
 * This file contains PHP functions meant for use within theme templates.
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
        $layout = get_theme_mod( 'blog--layout--layout', null, true );
    }
    elseif( is_single() ) {
        $default = get_theme_mod( 'posts--layout--layout', null, true );
        $layout = get_post_meta( get_the_ID(), '_taproot_page_layout', true );
        $layout = ($layout) ? $layout : $default;
    }
    elseif( is_page() ) {
        $default = get_theme_mod( 'pages--layout--layout', null, true );
        $layout = get_post_meta( get_the_ID(), '_taproot_page_layout', true );
        $layout = ($layout) ? $layout : $default;
    }
    else {
        $layout = 'right';
    }

    return $layout;
}
