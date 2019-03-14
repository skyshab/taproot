<?php
/**
 * Customize Defaults Manager.
 *
 * This class is used to boot the customizer default manager and handle its action and
 * filter hooks.
 *
 * @package   Rootstrap
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2019, Sky Shabatura
 * @link      https://github.com/skyshab/rootstrap
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Rootstrap\Modules\Customize_Defaults;

use Rootstrap\Abstracts\Bootable;


/**
 * Customize_Default manager class.
 *
 * @since  1.0.0
 * @access public
 */
class Manager extends Bootable {


    /**
     * Add our actions 
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function boot() {

        // Register defaults
        add_action( 'rootstrap/register', [ $this, 'register' ], 30 );   

        // Set defaults in customizer
        add_action( 'customize_register', [ $this, 'customize_register' ], 500 );          
    }


    /**
     * Create initial customize defaults that are defined in Rootstrap config. 
     * Execute the action hook for others to register their customize defaults.
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function register() {

        // action for theme or plugins to add or remove defaults
        do_action( 'rootstrap/register/defaults', customize_defaults() );

        // apply customizer output filters
        $this->theme_mod_filters();           
    }


    /**
     * Register customizer defaults
     *
     * @param  object $wp_customize - the WordPress customizer object
     */
    public function customize_register( $wp_customize ) {

        foreach( get_customize_defaults() as $id => $value ) {

            $setting = $wp_customize->get_setting( $id );

            // if setting exists, set the control default
            if( $setting && isset( $value ) )
                $setting->default = $value->value();          
        }
    }  


    /**
     * Filter customizer defaults.
     * 
     * Adds a filter for our registered defaults
     * in our custom get_theme_mod function. 
     * 
     * @since 1.0.0
     * @return void
     */
    public function theme_mod_filters() {
        foreach( get_customize_defaults() as $id => $default ) { 
            add_filter( "rootstrap/mods/{$id}/default", function( $fallback ) use ( $default ) { 
                return ( $default->value() && '' !== $default->value() ) ? $default->value() : $fallback;
            }); 
        }
    } 

}
