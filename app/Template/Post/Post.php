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
        add_filter( 'hybrid/view/entry/header/hierarchy', [ $this, 'post_header_display' ] );
        add_filter( 'taproot/template/featured-image/display', [ $this, 'featured_image_display' ], 10, 2 );
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



    /**
     * Post header display.
     *
     * Don't display post headers if we are showing them in the header.
     *
     * @since 1.0.0
     * @param array
     * @return array.
     */
    public function post_header_display( $hierarchy ) {
        $display = get_post_meta( get_the_ID(), '_taproot_post_title_display', true );
        if( 'header' === $display ) {
            return [];
        }

        return $hierarchy;
    }


    /**
     * Featured Image display.
     *
     * Don't display featured image if we are showing it in the header.
     *
     * @since 1.0.0
     * @param array
     * @return array.
     */
    public function featured_image_display( $display, $type ) {
        if( is_singular() ) {
            $featured_in_header = get_post_meta( get_the_ID(), '_taproot_use_featured_image_for_header', true );
            if( $featured_in_header && 'header' !== $type ) {
                return false;
            }
            return true;
        }
        return true;
    }

}
