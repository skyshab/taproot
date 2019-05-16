<?php
/**
 * Rootstrap class.
 *
 * This class handles the Rootstrap config data and sets up
 * the individual modules that make up Rootstrap.
 *
 * @package   Rootstrap
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2019, Sky Shabatura
 * @link      https://github.com/skyshab/rootstrap
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Rootstrap_Customize_Defaults;

use Rootstrap_Customize_Defaults\Abstracts\Bootable;


/**
 * Creates a new Rootstrap_Customize_Defaults object.
 *
 * @since  1.0.0
 * @access public
 */
class Rootstrap_Customize_Defaults extends Bootable {


    /**
     * Stores module objects
     *
     * @since 1.0.0
     * @var array
     */
    private $defaults;


    /**
     * Load resources.
     *
     * @since 1.0.0
     * @return object
     */
    public function boot() {
        add_action( 'init', [ $this, 'init' ], 120 );
        add_action( 'customize_register', [ $this, 'customize_register' ], 500 );

    }


    /**
     * Load Rootstrap Modules when required
     *
     * @since 1.0.0
     * @return void
     */
    public function init() {

        $defaults = new Customize_Defaults;

        // action for theme or plugins to add or remove defaults
        do_action( 'rootstrap/register/defaults', $defaults );

        $this->defaults = $defaults;

        $this->theme_mod_filters();
    }


    /**
     * Load Rootstrap Modules when required
     *
     * @since 1.0.0
     * @return void
     */
    public function get_defaults() {
        return $this->defaults;
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
        foreach( $this->get_defaults()->all() as $id => $default ) {
            add_filter( "rootstrap/mods/{$id}/default", function( $fallback ) use ( $default ) {
                return ( $default->value() && '' !== $default->value() ) ? $default->value() : $fallback;
            });
        }
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

}
