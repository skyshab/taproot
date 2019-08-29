<?php
/**
 * Blog Template class
 *
 * This file contains callbacks for hooks within the blog pages.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */

namespace Taproot\Template\Post;

use Hybrid\Contracts\Bootable;
use function Taproot\Customize\theme_mod;


/**
 * Handles front end logic
 *
 * @since  1.0.0
 * @access public
 */
class Post implements Bootable {


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

        if( !is_singular() ) {
            $classes[] = 'entry--archive';
        }

        return $classes;
    }


    /**
     *  Add "read more" link to post archives
     *
     * @since 1.0.0
     * @return void
     */
    public function excerpt_more( $more ) {

        $link_style = theme_mod( 'blog--archive-link--style', true );

        if( 'inline' !== $link_style ) return esc_html(' ...');

        $link_text = theme_mod( 'blog--archive-link--text', true );

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
        $custom_length = theme_mod('blog--archive-excerpt--length');
        return ( $custom_length ) ? $custom_length : $length;
    }

}

