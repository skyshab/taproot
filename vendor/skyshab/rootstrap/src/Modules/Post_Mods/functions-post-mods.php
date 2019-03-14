<?php
/**
 * Post Customizer functions.
 *
 * Helper functions related to the Post Customizer.
 *
 * @package   Rootstrap
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2019, Sky Shabatura
 * @link      https://github.com/skyshab/rootstrap
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Rootstrap\Modules\Post_Customizer;

use function Rootstrap\rootstrap;


/**
 * Returns a Post Mods object.
 *
 * @since  1.0.0
 * @access public
 * @return Post_Mods
 */
function post_mods() {
    return rootstrap()->get_instance( 'Post_Mods');
}


/**
 * Add post type support for post mods
 *
 * @since  1.0.0
 * @access public
 * @param  string   $post_type
 * @return void
 */
function add_post_type_support( $post_type ) {
    post_mods()->add_post_type( $post_type );
}


/**
 * Remove post type support for post mods
 *
 * @since  1.0.0
 * @access public
 * @param  string   $post_type
 * @return void
 */
function remove_post_type_support( $post_type ) {
    post_mods()->remove_post_type( $post_type );
}


/**
 * Get post mods
 * 
 * These will be used to override customizer 
 * styles and settings for the individual post. 
 *
 * @since  1.0.0
 * @access public
 * @param  string   $id
 * @return array
 */
function get_post_mods( $post_id ) {
    $mods = get_post_meta( $post_id, 'rootstrap-post-mods' );
    return ( is_array( $mods ) && !empty( $mods ) ) ? $mods : false;
}


/**
 * Get post mod
 * 
 * Get a post mod value by its key 
 *
 * @since  1.0.0
 * @access public
 * @param  string   $key
 * @return string
 */
function get_post_mod( $key ) {
    $mods = get_post_mods( get_the_ID() );
    return ( isset( $mods[$key] ) && $mods[$key] ) ? $mods[$key] : false;
}

