<?php
/**
 * Hooks class.
 *
 * This file contains actions and callbacks for the component.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2020 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */

namespace Taproot\Post_Types\Post;

use Hybrid\Contracts\Bootable;
use Taproot\Post_Types\Post\Breadcrumbs\Crumb_Home;
use function Hybrid\app;

/**
 * Class to handle component actions.
 *
 * @since  2.0.0
 * @access public
 */
class Hooks implements Bootable {

    /**
     * Adds actions on the appropriate customize action hooks.
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function boot() {
        add_filter( 'hybrid/view/entry/data',               [ $this, 'entry_content_template' ] );
        add_filter( 'hybrid/view/single/byline/hierarchy',  [ $this, 'post_byline_display' ] );
        add_filter( 'excerpt_more',                         [ $this, 'excerpt_more' ]  );
        add_filter( 'excerpt_length',                       [ $this, 'excerpt_length' ] );
        add_filter( 'taproot/breadcrumbs/home/label',       [ $this, 'breadcrumbs_home_label' ], 10, 2 );
        add_filter( 'taproot/breadcrumbs/home/url',         [ $this, 'breadcrumbs_home_url' ], 10, 2 );
    }

    /**
     * Entry content template
     *
     * Determines whether archive entries use full content or excerpt template.
     *
     * @since 2.0.0
     * @return void
     */
    public function entry_content_template( $data ) {

        $data['entry_content_template'] = ( app('post-type/post/functions')->use_excerpt() ) ? 'entry/summary' : 'entry/content';

        return $data;
    }

    /**
     * Post byline display.
     *
     * Don't display post byline if we are showing it in the header.
     *
     * @since 2.0.0
     * @param array
     * @return array.
     */
    public function post_byline_display( $hierarchy ) {
        return ( app('post-title/functions')->hide_the_post_title() ) ? [] : $hierarchy;
    }

    /**
     *  Add "read more" link to post archives
     *
     * @since 2.0.0
     * @return void
     */
    public function excerpt_more( $more ) {
        return app('post-type/post/template')->get_the_excerpt_more_link();
    }

    /**
     * Set a custom excerpt length
     *
     * @since 2.0.0
     * @return int - Returns custom excerpt length.
     */
    public function excerpt_length( $length ) {

        $custom_length = app('post-type/post/functions')->get_entry_excerpt_length();

        return ( $custom_length ) ? $custom_length : $length;
    }

    /**
     * Breadcrumbs home label.
     *
     * Change the "home" label
     *
     * @since 2.0.0
     * @return string
     */
    public function breadcrumbs_home_label( $label, $post ) {

        if( 'post' === $post->post_type ) {

            if( $page_for_posts = get_option( 'page_for_posts' ) ) {
                return get_the_title( $page_for_posts );
            }
        }

        return $label;
    }

    /**
     * Breadcrumbs home label.
     *
     * Change the "home" label
     *
     * @since 2.0.0
     * @return string
     */
    public function breadcrumbs_home_url( $url, $post ) {

        if( 'post' === $post->post_type ) {

            if( $page_for_posts = get_option( 'page_for_posts' ) ) {
                return get_permalink( $page_for_posts );
            }
        }

        return $url;
    }
}
