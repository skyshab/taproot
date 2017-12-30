<?php
/**
 * This class manages all functionality for the Customizer within our application
 *
 * @package taproot
 * @since 0.8.0
 */

if( !class_exists( 'Taproot_Customizer' ) )
{
    /**
     * Class responsible for theme customizer functionality. 
     *
     * @since 0.8.0
     */
    class Taproot_Customizer
    {
        /**
         * Stores rootstrap object.
         *
         * @since 0.8.0
         * @var object
         */ 
        public $rootstrap;

        /**
         * Stores panels array.
         *
         * @since 0.8.0
         * @var array
         */ 
        public $panels;

        /** 
         * Stores the loader object.
         *
         * @since 0.8.0
         * @var object
         */ 
        public $loader;

        /**
         * Stores Default settings. 
         *
         * @since 0.8.0
         * @var array
         */ 
        public $defaults;


        /**
         * Set up our object
         *
         * @since 0.8.0
         * 
         * @param  string $loader
         */
        public function __construct( $loader )
        {
            // Store the loader object 
            $this->loader = $loader; 

            // Load dependencies
            $this->load_dependencies();

            // Register customizer actions
            $this->actions();

            // Create rootstrap object
            $this->rootstrap();            

            // Register customizer panels
            $this->register_panels();
        }


        /**
         * Instantiate rootstrap
         *
         * @since 0.8.0
         */
        public function rootstrap()
        {
            // Load WP Rootstrap if not loaded already by Taproot Pro
            if( !defined('ROOTSTRAP') )
            {
                /**
                 * The file that initiates rootstrap object
                 */                
                require_once TAPROOT_LIBRARY . '/wp-rootstrap/src/wp-rootstrap.php';

                // load the default Rootstrap settings from the theme. 
                $rootstrap_defaults = include( TAPROOT_CUSTOMIZER . '/inc/taproot-rootstrap-settings.php' );

                // Load the Rootstrap config
                $rootstrap->load_config( $rootstrap_defaults );                
            }
            else
            {
                global $rootstrap;
            }

            // Set the Roostrap uri
            $rootstrap->set_uri( TAPROOT_LIBRARY_URI . '/wp-rootstrap/src/' );

            // Store the Rootstrap object
            $this->rootstrap = $rootstrap;     
        }    


        /**
         * Customizer Hooks and Filters
         *
         * @since 0.8.0
         */
        public function actions()
        {
            // load controls
            $this->loader->add_action( 'customize_register', $this, 'controls', 998 );

            // load public styles
            $this->loader->add_action( 'wp_head', $this, 'styles', 500 );

            // set rootstrap export css
            $this->loader->add_action( 'rootstrap_export_css', $this, 'export_styles' );

            // load preview scripts
            $this->loader->add_action( 'customize_preview_init', $this, 'preview', 500 );

            // load control scripts
            $this->loader->add_action( 'customize_controls_enqueue_scripts', $this, 'enqueue_customizer_scripts', 500 );

            // print customizer preview footer scripts
            $this->loader->add_action( 'wp_footer', $this, 'customize_preview_footer_scripts', 500 );

        }


        /**
         * Register Panels
         *
         * @since 0.8.0
         */
        public function register_panels()
        {
            $this->panels = array(
                'general',
                'branding',
                'header',
                'footer',
                'nav',
                'typography',
                'posts',
                'elements',
                'widgets',
            );
        }


        /**
         * Load dependencies
         *
         * @since 0.8.0
         */
        public function load_dependencies()
        {
            /**
             * The file that contains callbacks and functions for use in our customizer settings. 
             */            
            require_once TAPROOT_CUSTOMIZER . '/inc/taproot-customizer-functions.php';

            /**
             * The file that contains callbacks and functions for use in our customizer settings. 
             */            
            require_once TAPROOT_LIBRARY . '/wp-rootstrap-tabs/wp-rootstrap-tabs.php';            
        }


        /**
         * Load customizer controls for each panel
         *
         * @since 0.8.0
         * 
         * @param object $wp_customize - the WordPress customizer object
         */
        public function controls( $wp_customize )
        {
            // declare our rootstrap object
            $rootstrap = $this->rootstrap;

            /**
             * The file that contains custom customizer controls. 
             */             
            require_once TAPROOT_CUSTOMIZER . '/inc/taproot-customizer-custom-controls.php';

            // loop through all the panels and add controls
            foreach( $this->panels as $panel )
            {
                /**
                 * The file that implements customizer controls for this panel. 
                 */                  
                require_once TAPROOT_CUSTOMIZER . '/panels/' . $panel . '/controls.php';
            }

            /**
             * The file that makes adjustments to customizer controls. 
             */               
            require_once TAPROOT_CUSTOMIZER . '/inc/taproot-customizer-adjustments.php';
        }


        /**
         * Load customizer preview scripts for each panel
         *
         * @since 0.8.0
         */
        public function preview()
        {
            // preview helpers
            wp_enqueue_script( 'preview-helpers', TAPROOT_CUSTOMIZER_URI . '/js/taproot-customizer-preview-helpers.js', array( 'jquery','customize-preview' ), TAPROOT_CURRENT_VERSION, true );

            foreach( $this->panels as $panel )
            {
                wp_enqueue_script( sprintf( 'taproot-preview-%s', $panel ), TAPROOT_CUSTOMIZER_URI  . '/panels/' . $panel . '/preview.js', array( 'jquery','customize-preview' ), TAPROOT_CURRENT_VERSION, true );
            }
        }


        /**
         * Get customizer public styles
         *
         * @since 0.8.0
         */
        public function get_styles()
        {
            // declare our rootstrap object
            $rootstrap = $this->rootstrap;
            $styles = $rootstrap->new_styles();

            foreach( $this->panels as $panel )
            {
                /**
                 * The file that implements customizer control CSS for this panel. 
                 */                   
                require_once TAPROOT_CUSTOMIZER . '/panels/' . $panel . '/public.php';
            }

            return $styles;
        }


        /**
         * Get customizer public styles
         *
         * @since 0.8.0
         */
        public function styles()
        {
            if( get_theme_mod( 'rootstrap_disable_customizer_styles', false ) ) return;

            $styles = $this->get_styles();
            $styles->print_screens('taproot-customizer');
        }


        /**
         * Export customizer public styles
         *
         * @since 0.8.0
         */
        public function export_styles()
        {
            $styles = $this->get_styles();
            $styles->print_screens();
        }


        /**
         * Register the Main JavaScript for the Customizer
         *
         * @since 0.8.0
         */
        public function enqueue_customizer_scripts()
        {
            wp_enqueue_script( 'taproot-customizer', TAPROOT_CUSTOMIZER_URI . '/js/taproot-customizer.js', array( 'jquery' ), TAPROOT_CURRENT_VERSION, true );
        }


        /**
         * Print script in customize preview to toggle branding fixed header tabs
         *
         * @since 0.8.0
         */
        public function customize_preview_footer_scripts()
        {
            if( !is_customize_preview() ) return; 
            ?>
            <script type="text/javascript" id="taproot_customize_preview_footer_script">
                jQuery(document).ready(function($){
                    var timer;
                    $(window).on('scroll', function() {
                        if( $('body').width() <= 980 ) return;
                        if( timer ){ window.clearTimeout( timer ); }
                        timer = window.setTimeout(function(){ parent.window.toggleBrandingTabs(); }, 35);
                    });
                });
            </script>            
            <?php

        } // end customize_preview_footer_scripts

    } // end class Taproot_Customizer

} // end if not class exists
