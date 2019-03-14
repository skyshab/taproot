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

namespace Rootstrap;

use Rootstrap\Abstracts\Bootable;
use Rootstrap\Modules\Modules;


/**
 * Creates a new Rootstrap object.
 *
 * @since  1.0.0
 * @access public
 */
class Rootstrap extends Bootable {


    /**
     * Stores Modules object
     * 
     * @since 1.0.0
     * @var array
     */ 
    private $modules; 

    /**
     * Stores module objects
     * 
     * @since 1.0.0
     * @var array
     */ 
    private $instances = [];     
    

    /**
     * Load resources.
     * 
     * @since 1.0.0
     * @return object
     */
    public function boot() {
        add_action( 'init', [ $this, 'init' ], 110 );
    } 


    /**
     * Load Rootstrap Modules when required
     * 
     * @since 1.0.0
     * @return void
     */
    public function init() {

        $this->register_modules();
        $this->load_modules();

        // everything is loaded. this is where any actions can be 
        // registered to make changes before modules are booted.
        do_action( 'rootstrap/loaded' );

        // our modules will register their boot and registration actions here
        do_action( 'rootstrap/register' );

        // resources url should be defined by this point. add customizer actions
        add_action( 'customize_controls_enqueue_scripts', [ $this, 'customize_resources' ] );
        add_action( 'customize_preview_init', [ $this, 'customize_preview'  ] );
        add_action( 'customize_save_after', [ $this, 'clear_cache' ] );         
    }


    /**
     * Instantiate and store Modules objects
     * 
     * @since 1.0.0
     * @return void
     */
    private function register_modules() {

        // Create Modules object
        $this->modules = new Modules();

        // grab our modules config
        $modules = include( ROOTSTRAP_DIR . '/Modules/rootstrap-modules.php' );

        // create modules
        foreach ( $modules as $module => $components ) {
            $this->modules->add( $module, $components );
        }
    }


    /**
     * Load the modules
     * 
     * @since 1.0.0
     * @return void
     */
    private function load_modules() {

        $modules = $this->modules->all();

        foreach ( $modules as $module ) {

            $namespace = $module->get_namespace();

            // load module functions
            if( $module->includes() ) {
                foreach ( $module->includes() as $include ) {
                    $file = sprintf( '%s/Modules/%s/%s.php', ROOTSTRAP_DIR, $module, $include );
                    require_once( $file );      
                }
            }
    
            // instantiate module classes
            if( $module->instances() ) {
                foreach ( $module->instances() as $instance ) {
                    $Class = $namespace . "\\" . $instance;
                    $this->instances[ $instance ] = new $Class;         
                }
            }

            // boot classes
            if( $module->boot() ) {
                foreach ( $module->boot() as $class ) {
                    $boot = $namespace . "\\" . $class;
                    ( $boot::instance() )->boot();                 
                }
            }            
        }     
    }


    /**
     * Get Stored Module Class instance
     * 
     * @since 1.0.0
     * @return object
     */
    public function get_instance( $class ) {
        return $this->instances[$class];
    } 


    /**
     * Enqueue scripts and styles.
     *
     *  If filters are applied defining file locations, load scripts and styles. 
     * 
     * @since 1.0.0
     */
    public function customize_resources() {

        $resources = apply_filters( 'rootstrap/resources/location', false );
        if ( !$resources ) return;    

        wp_enqueue_script( 'rootstrap-customize-controls', $resources . '/js/customize-controls.min.js', ['customize-controls', 'jquery'], "1.2", true );
        
        $js_data = apply_filters( 'rootstrap/resources/js-data', [] );

        wp_localize_script( 'rootstrap-customize-controls', 'rootstrapData', $js_data );   

        wp_enqueue_style( 'rootstrap-customize-controls', $resources . '/css/customize-controls.min.css' );    
    }   
    

    /**
     * Enqueue customize preview scripts
     *
     * If filters are applied defining file locations, load scripts.
     * 
     * @since 1.0.0
     */
    public function customize_preview() {

        $resources = apply_filters( 'rootstrap/resources/location', false );
        if ( !$resources ) return;    

        wp_enqueue_script( 'rootstrap-customize-preview', $resources . '/js/customize-preview.min.js', array(), filemtime( get_template_directory().'/style.css' ) );
    }

    
    /**
     * Clears cached styles when saving customizer
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function clear_cache() {   
        remove_theme_mod( 'rootstrap-theme-mods' );
    }

} 
