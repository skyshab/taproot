<?php
/**
 * Postnav template functions.
 *
 * This file creates the postnav markup.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */

namespace Taproot\Components\Navigation_Postnav;

use function get_previous_post;
use function get_previous_post_link;
use function get_next_post;
use function get_next_post_link;

use Taproot\Tools\Mod;

/**
 * Create postnav markup
 *
 * @since  2.0.0
 * @access public
 */
class Template {

    /**
     * Stores the postnav context
     *
     * @since  2.0.0
     * @access private
     */
    private $context;

    /**
     * Stores the postnav args
     *
     * @since  2.0.0
     * @access private
     */
    private $args;

    /**
     * Adds actions on the appropriate customize action hooks.
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function the_postnav( $context = 'default', $args = [] ) {

        // If there are no links, bail
        if( ! $this->has_prev_link() && ! $this->has_next_link() ) {
            return;
        }

        // Store the context
        $this->context = $context;

        // Store the args
        $this->args = wp_parse_args( $args, [
            'prev_text' => Mod::get( 'navigation--postnav--prev-text' ),
            'prev_icon' => '<',
            'next_text' => Mod::get( 'navigation--postnav--next-text' ),
            'next_icon' => '>',
            'nav_class' => 'postnav',
            'link_class' => 'postnav__link'
        ]);

        // open post nav
        $content = sprintf( '<div class="%s">', esc_attr( $this->classes() ) );

            $content .= $this->get_prev();
            $content .= $this->get_next();

        // close post nav
        $content .= '</div>';

        echo $content;
    }

    /**
     * Has prev link?
     *
     * @since  2.0.0
     * @access private
     * @return void
     */
    private function has_prev_link() {
        return ( get_previous_post_link() && '' !==  get_previous_post_link() ) ? true : false;
    }

    /**
     * Has next link?
     *
     * @since  2.0.0
     * @access private
     * @return void
     */
    private function has_next_link() {
        return ( get_next_post_link() && '' !==  get_next_post_link() ) ? true : false;
    }

    /**
     * Get previous link markup
     *
     * @since  2.0.0
     * @access private
     * @return void
     */
    private function get_prev() {

        // return empty div if no previous post, to insure the "next" link aligns to the left side
        if( !$this->has_prev_link() ) {
            return sprintf( '<div class="%1$s %1$s--prev"></div>', $this->args['link_class']);
        }

        $prev_post = get_previous_post();
        $prev_content = sprintf('<span class="screen-reader-text">%s</span>', $prev_post->post_title );
        $prev_content .= $this->args['prev_icon'];

        if( $this->args['prev_text'] ) {
            $prev_content .= sprintf( '<span class="prev-text">%s</span>', wp_kses( $this->args['prev_text'], $this->allowed() ) );
        }

        $content = sprintf( '<div class="%1$s %1$s--prev">', $this->args['link_class']);
            $content .= get_previous_post_link( '%link', $prev_content );
        $content .= '</div>';

        return $content;
    }

    /**
     * Get next link markup
     *
     * @since  2.0.0
     * @access private
     * @return void
     */
    private function get_next() {

        if( !$this->has_next_link() ) return '';

        $next_post = get_next_post();
        $next_content = sprintf('<span class="screen-reader-text">%s</span>', $next_post->post_title );

        if( $this->args['next_text'] ) {
            $next_content .= sprintf( '<span class="next-text">%s</span>', wp_kses( $this->args['next_text'], $this->allowed() ) );
        }

        $next_content .= $this->args['next_icon'];

        $content = sprintf( '<div class="%1$s %1$s--next">', esc_attr( $this->args['link_class'] ) );
            $content .= get_next_post_link( '%link', $next_content );
        $content .= '</div>';

        return $content;
    }

    /**
     * Return Allowed HTML
     *
     * @since  2.0.0
     * @access private
     * @return array
     */
    private function allowed() {
        return [
            'em' => [],
            'strong' => [],
            'i' => [
                'class' => []
            ]
        ];
    }

    /**
     * Get postnav classes
     *
     * @since  2.0.0
     * @access private
     * @return void
     */
    private function classes() {

        $classes =  $this->args['nav_class'];

        if( $this->context ) {
            $classes .= sprintf( ' postnav--%s ', $this->context );
        }

        return $classes;
    }
}
