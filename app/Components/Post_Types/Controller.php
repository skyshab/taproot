<?php
/**
 * Controller class.
 *
 * This file contains actions and callbacks for the component.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */

namespace Taproot\Components\Post_Types;

use Hybrid\Contracts\Bootable;
use Taproot\Tools\Mod;
use function Taproot\Tools\theme_mod;
use function Hybrid\app;

/**
 * Class to handle component actions.
 *
 * @since  2.0.0
 * @access public
 */
class Controller implements Bootable {

    /**
     * Adds actions on the appropriate customize action hooks.
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function boot() {
        add_filter( 'post_class', [ $this, 'entry_classes' ]  );
        add_filter( 'excerpt_more', [ $this, 'excerpt_more' ]  );
        add_filter( 'excerpt_length', [ $this, 'excerpt_length' ] );
        add_filter( 'hybrid/view/entry/header/hierarchy', [ $this, 'post_header_display' ] );
        add_filter( 'taproot/featured-image/display', [ $this, 'featured_image_display' ], 10, 2 );
        add_filter( 'get_the_archive_title', [ $this, 'get_the_archive_title' ] );
    }

    /**
     *  Add classes to posts
     *
     * @since 2.0.0
     * @return void
     */
    public function entry_classes( $classes ) {

        $classes[] = ( is_singular() ) ? 'entry--single' : 'entry--archive';

        return $classes;
    }

    /**
     *  Add "read more" link to post archives
     *
     * @since 2.0.0
     * @return void
     */
    public function excerpt_more( $more ) {

        $post_type = get_post_type();

        $link_style = Mod::get( "{$post_type}--archive-entry--link--type" );

        if( 'inline' !== $link_style ) return esc_html(' ...');

        $link_text = Mod::get( "{$post_type}--archive-entry--link--readmore" );

        return sprintf( ' ... <a href="%s" class="read-more--inline"><span class="visuallyhidden">%s</span>%s</a>',
            esc_url( get_permalink() ),
            esc_html(get_the_title() ),
            esc_html( $link_text )
        );
    }

    /**
     * Set a custom excerpt length
     *
     * @since 2.0.0
     * @return int - Returns custom excerpt length.
     */
    public function excerpt_length( $length ) {

        $post_type = get_post_type();
        $custom_length = Mod::get( "{$post_type}--archive-entry--excerpt--length" );

        return ( $custom_length ) ? $custom_length : $length;
    }

    /**
     * Post title and meta display.
     *
     * Don't display post title and meta if we are showing them in the header.
     *
     * @since 2.0.0
     * @param array
     * @return array.
     */
    public function post_header_display( $hierarchy ) {

        $display = get_post_meta( get_the_ID(), 'taproot_post_title_display', true );
        if( 'header' === $display  || 'hide' === $display ) {
            return [];
        }

        return $hierarchy;
    }

    /**
     * Featured Image display.
     *
     * Don't display featured image if we are showing it in the header.
     *
     * @since 2.0.0
     * @param array
     * @return array.
     */
    public function featured_image_display( $display, $type ) {

        if( is_singular() ) {
            if( 'featured' === app('header/template')->get_custom_header_type() && 'header' !== $type ) {
                return false;
            }
        }

        return true;
    }

    /**
     * Filter to add custom archive titles.
     *
     * @since 2.0.0
     * @param string
     * @return string.
     */
    public function get_the_archive_title( $title ) {

        // Get the post type
        $post_type = get_post_type();

        if( Mod::get( "{$post_type}--archive--title--title" ) ) {

            return wp_kses( Mod::get( "{$post_type}--archive--title--title" ), [
                'em' => [],
                'strong' => [],
                'i' => [
                    'class' => []
                ]
            ]);
        }

        return $title;
    }

    /**
     * Filter to add support for breadcrumbs.
     *
     * @since 2.0.0
     * @param string
     * @return string.
     */
    public function breadcrumbs_support( $post_types ) {

        // Get the post type
        $post_type = get_post_type();

        // Non hierarchical post types
        if( Mod::get( "{$post_type}--single--breadcrumbs--enable" ) ) {
            $post_types[] = $post_type;
        }

        // Hierarchical post types
        if( Mod::get( "{$post_type}--breadcrumbs--enable" ) ) {
            $post_types[] = $post_type;
        }

        return $post_types;
    }
}
