<?php
/**
 * Blog Template class
 *
 * This file contains callbacks for hooks within the blog pages.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2018 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */

namespace Taproot\Template\Blog;

use Hybrid\Contracts\Bootable;
use function Rootstrap\get_theme_mod;


/**
 * Handles front end logic
 *
 * @since  1.0.0
 * @access public
 */
class Blog implements Bootable {


	/**
	 * Adds actions on the appropriate customize action hooks.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function boot() {
        add_filter( 'post_class', [ $this, 'entry_classes' ]  );
        add_filter( 'excerpt_more', [ $this, 'excerpt_more' ]  );        
        add_filter( 'excerpt_length', [ $this, 'excerpt_length' ] );        
    }
    

    /**
     *  Add classes to posts
     * 
     * @since 1.0.0
     * @return void
     */
    public function entry_classes( $classes ) {

        $classes[] = ( is_singular() ) ? 'entry--single' : 'entry--archive';

        return $classes;
    }   


    /**
     *  Add "read more" link to post archives
     * 
     * @since 1.0.0
     * @return void
     */
    public function excerpt_more( $more ) {

        $link_style = get_theme_mod( 'blog--archive-link--style', null, true );
        
        if( 'inline' !== $link_style ) return esc_html(' ...');

        $link_text = get_theme_mod( 'blog--archive-link--text', null, true );

        return sprintf( ' ... <a href="%s" class="read-more--inline"><span class="visuallyhidden">%s</span>%s</a>',  
            esc_url( get_permalink() ), 
            esc_html(get_the_title() ), 
            esc_html( $link_text ) 
        );
    }   


    /**
     * Set a custom excerpt length
     * 
     * @since 1.0.0
     * @return int - Returns custom excerpt length. 
     */
    public function excerpt_length( $length ) {
        $custom_length = get_theme_mod('blog--archive-excerpt--length');
        return ( $custom_length ) ? $custom_length : $length;
    }    

}
