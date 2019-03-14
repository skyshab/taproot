<?php
/**
 * Post Customizer.
 *
 * This class is used to handle overiding customizer styles 
 * when the current post has post meta settings that correspond
 * to customizer settings.
 *
 * @package   Rootstrap
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2019, Sky Shabatura
 * @link      https://github.com/skyshab/rootstrap
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Rootstrap\Modules\Post_Mods;

use Rootstrap\Abstracts\Bootable;


/**
 * Post Mods class.
 *
 * @since  1.0.0
 * @access public
 */
class Post_Mods extends Bootable {


    /**
     * Stores post_types
     * 
     * @since 1.0.0
     * @var array
     */ 
    public $post_types = [];


    /**
     * Sets up the post customizer manager actions and filters.
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function boot() {
        add_action( 'template_redirect', [ $this, 'post_mods' ] );           
    }
    

    /**
     * Add a supported post type.
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function add_post_type($post_type) {
        $this->post_types[] = $post_type;         
    }    
    

    /**
     * Remove post type from supported types.
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function remove_post_type($post_type) {
        unset( $this->post_types[$post_type] );         
    }    
    

    /**
     * Get array of supported post types.
     *
     * @since  1.0.0
     * @access public
     * @return array
     */
    public function get_post_types() {
        return $this->post_types;         
    }  
    

    /**
     * Is a supported post type.
     *
     * @since  1.0.0
     * @access public
     * @return bool
     */
    public function is_supported_post_type( $post_type ) {
        return ( in_array( $post_type, $this->post_types ) ) ? true : false;        
    }  


    /**
     * Filters for customizer output on single post
     * 
     * Override customizer output if a post mod is set.
     *
     * @since 1.0.0
     * @return void
     */
    public function post_mods() {

        // if not a single post or if not a supported post type, bail
        if( !is_singular() || !$this->is_supported_post_type( get_post_type() ) ) return;

        // get the post mods
        $post_mods = get_post_mods( get_the_ID() );

        // if no post mods, nothing to see here
        if( !$post_mods ) return;

        // You've got mods! loop through em
        foreach( $post_mods as $id => $value ) {

            // if no value, take off eh
            if( empty( $value ) ) continue;

            // add filter to override the customizer value with our mod
            add_filter( "rootstrap/mods/{$id}/value", function() use ( $value ) { 
                return $value;
            });
        } 
    }

}
