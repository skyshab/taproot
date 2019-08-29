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
 * Output Header Additional Content
 *
 * @since  1.0.0
 * @access public
 * @return string
 */
function additional_content() {
    do_action('taproot/header/additional-content');
}


 /**
 * Filter for custom header overlay display
 *
 *
 * @since 1.0.0
 * @param string
 * @return string
 */
function get_overlay() {

    if ( ! has_custom_header() && ! is_customize_preview() ) {
        return;
    }

    $classnames = "taproot-overlay taproot-overlay--custom-header";
    $overlay_color = get_theme_mod('header--hero--overlay-color', 'var(--colors--theme--accent)');
    $overlay_opacity = theme_mod('header--hero--overlay-opacity', true);
    $classnames .= dimRatioToClass($overlay_opacity);
    $overlay_styles = '';


    if( is_singular() ) {
        $overlay_color_type =  get_post_meta( get_the_ID(), 'taprooot_hero_overlay_type', true );
        if('custom' === $overlay_color_type) {
            $overlay_color_name =  get_post_meta( get_the_ID(), 'taprooot_hero_overlay_color_name', true );
            if( $overlay_color_name ) {
                $classnames .= sprintf(' has-%s-background-color', esc_attr($overlay_color_name) );
            }
        }
    }

    if($overlay_color) {
        $overlay_styles = sprintf('background-color: %s', $overlay_color );
    }

    return sprintf('<div id="taproot-overlay" class="%s" style="%s"></div>', esc_attr($classnames), esc_attr($overlay_styles) );
}

/**
 * Helper function to get opacity classname from number
 *
 * @since  1.4.0
 * @access public
 * @param  mixed $ratio - numeric value representing the opacity level
 * @return string - classname for controlling opacity
 */
function dimRatioToClass($ratio) {
    $ratio = intval( $ratio );
    return ( $ratio === 0 ) ? '' : sprintf(' has-background-dim-%s', 10 * round( $ratio / 10 ) );
}
