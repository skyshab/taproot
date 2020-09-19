<?php
/**
 * Home crumb class.
 *
 * Creates the home crumb.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright Copyright (c) 2020, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Breadcrumbs;

use Hybrid\Breadcrumbs\Build\Post;

/**
 * Extend Post.
 *
 * @since  1.0.0
 * @access public
 */
class Build_Post extends Post {

	/**
	 * Returns a URL for the crumb.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string
	 */
    public function make() {

        // Get the referral URL
        $referrer = $_SERVER['HTTP_REFERER'];

        // Extract the slug
        $slug = array_pop( explode( '/', rtrim( $referrer, '/' ) ) );

        $post = $this->post;

        if( 'product' === $post->post_type ) {

            // If we came from a category page
            if( has_term( $slug, 'product_cat', $post->ID ) ) {

                $term = get_term_by( 'slug', $slug, 'product_cat' );

                if( ! is_wp_error( $term ) ) {
                    $this->breadcrumbs->crumb( 'Term', [ 'term' => $term ] );
                }
            }
        }
        elseif( 'post' === $post->post_type ) {

            // If we came from a category page
            if( has_term( $slug, 'category', $post->ID ) ) {

                $term = get_term_by( 'slug', $slug, 'category' );

                if( ! is_wp_error( $term ) ) {
                    $this->breadcrumbs->crumb( 'Term', [ 'term' => $term ] );
                }
            }

            // Or if we came from a tag page
            elseif( has_term( $slug, 'post_tag', $post->ID ) ) {

                $term = get_term_by( 'slug', $slug, 'post_tag' );

                if( ! is_wp_error( $term ) ) {
                    $this->breadcrumbs->crumb( 'Term', [ 'term' => $term ] );
                }
            }
        }
        else {
            parent::make();
        }
    }
}
