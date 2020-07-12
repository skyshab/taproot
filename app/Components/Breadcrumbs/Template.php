<?php
/**
 * Component Template Functions.
 *
 * This class contains helper functions for use in the theme view templates.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2020, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Components\Breadcrumbs;

use Hybrid\Breadcrumbs\Trail as Breadcrumbs;
use function Hybrid\app;

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

        // check if current post type supports breadcrumbs
        if( ! app('breadcrumbs/functions')->has_breadcrumbs() ) {
            return '';
        }

        $args = wp_parse_args($args, [
            'textColor'         => false,
            'customTextColor'   => false,
            'align'             => app('breadcrumbs/functions')->get_breadcrumbs_align(),
            'showSeparators'    => app('breadcrumbs/functions')->has_separators(),
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
        echo static::get_the_breadcrumbs( $args );
    }
}
