<?php
/**
 * Component Template Functions.
 *
 * This class contains helper functions for use in the theme view templates.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2019, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Components\Navigation_Breadcrumbs;

use Taproot\Tools\Mod;
use Hybrid\Breadcrumbs\Trail as Breadcrumbs;

/**
 * Template tags class.
 *
 * @since  2.0.0
 * @access public
 */
class Template {

    /**
     * Get Breadcrumbs Markup
     *
     * @since  1.4.0
     * @access public
     * @param  array  $args
     * @return string
     */
    public static function get_the_breadcrumbs( $args = [] ) {

        $args = wp_parse_args($args, [
            'textColor'         => false,
            'customTextColor'   => false,
            'align'             => Mod::get( 'navigation--breadcrumbs--align' ),
            'showSeparators'    => Mod::get( 'navigation--breadcrumbs--has-separators' ),
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
    public static function breadcrumbs( $args = [] ) {

        // check if breadcrumbs are enabled
        if( ! Mod::get( 'navigation--breadcrumbs--enable' ) ) {
            return;
        }

        // filter for supported post types
        $supported_types = apply_filters( 'taproot/breadcrumbs/supported-post-types', [] );

        // check if current post type supports breadcrumbs
        if( ! in_array( get_post_type(), $supported_types ) ) {
            return;
        }

        // print the breadcrumbs
        echo static::get_the_breadcrumbs( $args );
    }
}
