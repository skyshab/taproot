<?php
/**
 * Postnav class
 *
 * This file creates the postnav markup.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2018 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */

namespace Taproot\Template\Postnav;

use function get_previous_post;
use function get_previous_post_link;
use function get_next_post;
use function get_next_post_link;
use function Rootstrap\get_theme_mod;
use function Taproot\Icons\location as location;


/**
 * Create postnav markup
 *
 * @since  1.0.0
 * @access public
 */
class Postnav {
    

    /**
	 * Stores the postnav context
	 *
	 * @since  1.0.0
	 * @access private
	 */
    private $context;

    /**
	 * Stores the postnav args
	 *
	 * @since  1.0.0
	 * @access private
	 */
    private $args;


	/**
	 * Set up postnav
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function init( $context, $args ) {

        $defaults = [
            'prev_text' => esc_html__('PREV', 'taproot'),
            'prev_icon' => '<',    
            'next_text' => esc_html__('NEXT', 'taproot'),
            'next_icon' => '>',
            'nav_class' => 'postnav',
            'link_class' => 'postnav__link'            
        ];

        $this->args = wp_parse_args( $args, $defaults );
        $this->context = $context;
    }



    /**
	 * Has prev link?
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function has_prev_link() {
        return ( get_previous_post_link() && '' !==  get_previous_post_link() ) ? true : false;
    }


    /**
	 * Has next link?
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function has_next_link() {
        return ( get_next_post_link() && '' !==  get_next_post_link() ) ? true : false;
    }


	/**
	 * Is post nav enabled and are there links?
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function has_content() {
    
        if( !get_theme_mod( 'posts--nav--enable', null, true ) ) return false;

        if( !$this->has_prev_link() && !$this->has_next_link() ) return false;

        return true;
    }


	/**
	 * Get previous link markup
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function get_prev() {

        if( !$this->has_prev_link() ) return '';

        $prev_post = get_previous_post();        
        $prev_content = sprintf('<span class="screen-reader-text">%s</span>', $prev_post->post_title );
        $prev_content .= $this->args['prev_icon'];

        if( $this->args['prev_text'] ) {
            $prev_content .= sprintf( '<span class="prev-text">%s</span>', $this->args['prev_text'] );
        }

        $content = sprintf( '<div class="%1$s %1$s--prev">', $this->args['link_class']);
            $content .= get_previous_post_link( '%link', $prev_content );
        $content .= '</div>';

        return $content;
    }


	/**
	 * Get next link markup
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function get_next() {

        if( !$this->has_next_link() ) return '';
        
        $next_post = get_next_post();  
        $next_content = sprintf('<span class="screen-reader-text">%s</span>', $next_post->post_title );

        if( $this->args['next_text'] ) {
            $next_content .= sprintf( '<span class="next-text">%s</span>', $this->args['next_text'] );
        }

        $next_content .= $this->args['next_icon'];

        $content = sprintf( '<div class="%1$s %1$s--next">', $this->args['link_class']);
            $content .= get_next_post_link( '%link', $next_content );
        $content .= '</div>';

        return $content;
    }


	/**
	 * Get postnav classes
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function classes() {

        $classes = 'postnav';
    
        if( $this->context ) {
            $classes .= sprintf( ' postnav--%s ', $this->context );
        }

        return $classes;
    }


	/**
	 * Adds actions on the appropriate customize action hooks.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function render( $context = 'default', $args = [] ) {

        if( !$this->has_content() ) return;
    
        $this->init( $context, $args );

        // open post nav
        $content = sprintf( '<div class="%s">', esc_attr( $this->classes() ) );
    
            $content .= $this->get_prev();  
            $content .= $this->get_next();          	
            
        // close post nav
        $content .= '</div>';
                
        return $content;
    }


	/**
	 * Adds actions on the appropriate customize action hooks.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function display( $context = 'default', $args = [] ) {
        echo $this->render( $context, $args );
    }        

}
