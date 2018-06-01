<?php
/**
 * The core plugin class.
 *
 * @package wp-rootstrap
 * @since 0.8.0
 */
class WP_Rootstrap
{
    /**
     * Stores rootstrap uri
     * 
     * @since 0.8.0
     * @var string
     */ 
    private $dir_uri = false;

    /**
     * Stores configuration data
     * 
     * @since 0.8.0
     * @var array
     */ 
    private $config = array();


    /**
     * Stores device data
     * 
     * @since 0.8.0
     * @var array
     */ 
    private $devices;


    /**
     * Stores image sizes
     * 
     * @since 0.8.0
     * @var array
     */ 
    private $images;


    /**
     * Stores image sizes to display
     * 
     * @since 0.9.4
     * @var array
     */ 
    private $image_sizes_select;


    /**
     * Stores default sidebars
     * 
     * @since 0.8.0
     * @var array
     */ 
    private $sidebars;


    /**
     * Stores expanded screens
     * 
     * @since 0.8.0
     * @var array
     */ 
    private $screens;


    /**
     * Stores customizer defaults
     * 
     * @since 0.8.0
     * @var array
     */ 
    private $defaults = array();


    /**
     * Stores supported post types
     * 
     * @since 0.8.0
     * @var array
     */ 
    private $post_types = array();


    /**
     * Return an instance of the object. 
     * 
     * @since 0.8.0
     */ 
    public static function get_instance() 
    {
        static $instance = null;

        if( is_null( $instance ) ) 
            $instance = new self;

        return $instance;
    }


    /**
     * Load configuration data from file or directly passed array
     *
     * @since 0.8.0
     * @param  string|array $config - path to config file -or- settings array
     */
    public function load_config( $config = array() )
    {
        $this->config = apply_filters( 'rootstrap-config', $config );

        // if not defined manually, try plugin location
        if( !$this->dir_uri )
            $this->dir_uri = trailingslashit( plugin_dir_url(  __FILE__ ) );

        // once we have the config, initiate everything
        $this->init();
    }


    /**
     * Get the complete config settings
     * 
     * @since 0.8.0
     * @return array
     */
    public function get_config()
    {
        return $this->config;
    }


    /**
     * Run init methods
     * 
     * @since 0.8.0
     * @return void
     */
    private function init()
    {
        $this->load_dependencies();
        $this->load_devices();
        $this->load_screens();
        $this->load_defaults();  
        $this->load_images();
        $this->load_image_sizes_display();        
        $this->load_sidebars();              
        $this->actions();
    }


    /**
     * Save the rootstrap uri
     * 
     * @since 0.8.0
     * @return void
     */    
    public function set_uri( $uri = false )
    { 
        if( $uri ) $this->dir_uri = $uri;
    }
    

    /**
     * Load the classes needed in our module
     * 
     * @since 0.8.0
     * @return void
     */
    private function load_dependencies()
    {  
        /**
         * Utility functions for interacting with the Rootstrap Object
         */
        require_once ROOTSTRAP_INCLUDES . 'wp-rootstrap-functions.php';

        /**
         * The class responsible for managing screens
         */
        require_once ROOTSTRAP_INCLUDES . 'class-wp-rootstrap-screens.php';

        /**
         * The class responsible for creating style objects
         */
        require_once ROOTSTRAP_INCLUDES . 'class-wp-rootstrap-styles.php';
    }


    /**
     * Add actions
     * 
     * @since 0.8.0
     * @return void
     */
    private function actions()
    {
        add_action( 'customize_register', array( $this, 'register_defaults' ), 1000 );
        add_action( 'customize_controls_enqueue_scripts', array( $this, 'customize_controls_enqueue_scripts' ), 10 );
        add_action( 'customize_preview_init', array( $this, 'customize_preview_init' ), 10 );
        add_filter( 'customize_previewable_devices', array( $this, 'customize_previewable_devices' ) );
        add_action( 'customize_controls_print_styles', array( $this, 'customize_controls_print_styles' ) );    
        add_action( 'after_setup_theme', array( $this, 'register_images' ), 500 );    
        add_action( 'image_size_names_choose', array( $this, 'image_size_names_choose' ), 500 ); 

        // apply customizer output filters for defaults 
        add_action( 'wp', array( $this, 'customizer_default_filters' ), 100 );  

        // apply customizer output filters for post meta 
        add_action( 'wp', array( $this, 'customizer_filters' ), 500 );            
    }


    /**
     * Create array of all combinations of screens from devices
     * 
     * @since 0.8.0
     * @return void
     */
    private function load_defaults()
    {
        if( isset( $this->config['defaults'] ) && is_array( $this->config['defaults'] ) )
            $this->defaults = $this->config['defaults'];
    }    


    /**
     * Store devices
     * 
     * @since 0.8.0
     * @return void
     */
    private function load_devices()
    {
        $this->devices = ( isset( $this->config['devices'] ) ) ? $this->config['devices'] : false;
    }


    /**
     * Store image sizes
     * 
     * @since 0.8.0
     * @return void
     */
    private function load_images()
    {
        if( isset( $this->config['image_sizes'] ) && is_array( $this->config['image_sizes'] ) )
            $this->images = $this->config['image_sizes'];
    }   


    /**
     * Store image size display
     * 
     * @since 0.9.4
     * @return void
     */
    private function load_image_sizes_display()
    {
        if( isset( $this->config['image_sizes_select'] ) && is_array( $this->config['image_sizes_select'] ) )
            $this->image_sizes_select = $this->config['image_sizes_select'];
    }   


    /**
     * Store default sidebars
     * 
     * @since 0.8.0
     * @return void
     */
    private function load_sidebars()
    {
        if( isset( $this->config['sidebars'] ) && is_array( $this->config['sidebars'] ) )
        {
            $defaults = array();

            foreach( $this->config['sidebars'] as $id => $name ) 
            {
                $defaults[] = array(
                    'name' => $name,
                    'id' => $id,
                );
            }

            $this->sidebars = $defaults;
        }
    } 


    /**
     * Get array of default sidebars
     * 
     * @since 0.8.0
     * @return array 
     */
    public function get_default_sidebars()
    {
        return $this->sidebars;
    } 


    /**
     * Register Image Sizes
     * 
     * @since 0.8.0
     * @return void
     */
    public function register_images()
    {
        foreach ( $this->images as $image => $args ) 
        {
            $width = ( isset( $args['width'] ) ) ? $args['width'] : 0;
            $height = ( isset( $args['height'] ) ) ? $args['height'] : 0;
            $crop = ( isset( $args['crop'] ) ) ? $args['crop'] : 0;

            add_image_size( $image, $width, $height, $crop );                

        } // end foreach
    }


    /**
     * Filter Images Choices available in admin
     * Use defaults set in theme if defined,
     * add extras to the end of the list
     * 
     * @since 0.8.0
     * @return array
     */
    public function image_size_names_choose( $sizes )
    {   
        $theme_sizes_to_display = $this->image_sizes_select;

        foreach ( $sizes as $size => $label ) 
        {
            if( isset( $theme_sizes_to_display[$size] )  )
                continue;
            else
                $theme_sizes_to_display[$size] = $label;
        }

        return $theme_sizes_to_display;
    }


    /**
     * Get default customizer setting
     * 
     * @since 0.8.0
     * @return array
     */
    public function get_defaults()
    {
        return $this->defaults;
    }


    /**
     * Get default customizer setting
     * 
     * @since 0.8.0
     * @param string $id
     * @return string - Returns the default value for the setting.
     */
    public function get_default( $id )
    {
        return ( isset( $this->defaults[$id] ) ) ? $this->defaults[$id] : false;
    }


    /**
     * Register customizer defaults
     *
     * @param  object $wp_customize - the WordPress customizer object
     */
    public function register_defaults( $wp_customize )
    {
        foreach ( $this->get_defaults() as $id => $default )
        {
            $setting = $wp_customize->get_setting( $id );

            // if setting exists, default isn't already defined with value, set the control default
            if( $setting && !$setting->default && isset( $default ) )
                $setting->default = $default;             
        }
    }  


    /**
     * Filter customizer default output.
     * 
     * Adds a filter for every one of our registered defaults. 
     * 
     * @since 0.8.2
     * @return void
     */
    public function customizer_default_filters()
    {
        foreach ( $this->get_defaults() as $id => $default )
        {
            add_filter( "theme_mod_{$id}", function( $value ) use ( $default ) 
            { 
                return ( $value && '' !==  $value ) ? $value : $default;
            });  
        }
    } 


    /**
     * Filters for customizer output.
     * 
     * Override customizer output if post has meta with same id.
     *
     * @since 0.8.2
     * @return void
     */
    public function customizer_filters() 
    {
        $post_meta = get_post_meta( get_the_ID() );

        if( !$post_meta ) return;

        foreach( $post_meta as $id => $value ) 
        {
            add_filter( "theme_mod_{$id}", function( $value ) use ( $id ) 
            { 
                if( rootstrap_post_meta( $id ) && '' !==  rootstrap_post_meta( $id ) && 'default' !==  rootstrap_post_meta( $id ) ) 
                {
                    $value = rootstrap_post_meta( $id );
                }   

                return $value; 
            });
        }
    }


    /**
     * Get array of devices as specified in configuration
     * 
     * @since 0.8.0
     * @return array
     */
    public function get_devices()
    {
        return $this->devices;
    }


    /**
     * Get the device immediately before specified device
     *
     * @since 0.8.0
     * @param string $current - the current device
     * @return string
     */
    public function get_previous_device( $current )
    {
        $devices = array_keys( $this->get_devices() );
        $index = array_search( $current, $devices );

        return ( isset( $devices[$index - 1] ) ) ? $devices[$index - 1] : false;
    }


    /**
     * Get the device immediately after specified device
     *
     * @since 0.8.0
     * @param string $current - the current device
     * @return string
     */
    public function get_next_device( $current )
    {
        $devices = array_keys( $this->get_devices() );
        $index = array_search( $current, $devices );

        return ( isset( $devices[$index + 1] ) ) ? $devices[$index + 1] : false;
    }


    /**
     * Get the device min width
     *
     * @since 0.8.0
     * @param  string $device - the device whose data we want to access
     * @return string
     */
    public function get_device_min( $device )
    {
        $devices = $this->get_devices() ;
        return ( isset( $devices[$device]['min'] ) ) ? $devices[$device]['min'] : false;
    }
    

    /**
     * Get the device max width
     *
     * @since 0.8.0
     * @param string $device - the device whose data we want to access
     * @return string
     */
    public function get_device_max( $device )
    {
        $devices = $this->get_devices() ;
        return ( isset( $devices[$device]['max'] ) ) ? $devices[$device]['max'] : false;
    }


    /**
     * Create array of all combinations of screens from devices
     * 
     * @since 0.8.0
     * @return void
     */
    private function load_screens()
    {
        $screens = new WP_Rootstrap_Screens( $this->get_devices() );
        $this->screens = $screens->get_screens();
    }


    /**
     * Create and return a new style oject
     * 
     * @since 0.8.0
     * @return object
     */
    public function new_styles()
    {
        return new WP_Rootstrap_Styles( $this->screens );
    }


    /**
     * Add custom devices to customizer
     *
     * @since 0.8.0
     * @param array $devices - array of registered devices
     * @return array
     */
    public function customize_previewable_devices( $devices )
    {
        $rootstrap_devices = $this->devices;

        // if no custom devices, use wp defaults
        if( !$rootstrap_devices ) return $devices;

        // generate a label for each device button
        foreach ($rootstrap_devices as $device => $args) 
        {
            $rootstrap_devices[$device]['label'] = sprintf( 'Enter %s preview mode', $device );

            // if no max, assume this is 'desktop' or equivalent, set as default
            if( !isset( $args['max'] ) || '' === $args['max'] )
                $rootstrap_devices[$device]['default'] = true;
        }

        // return our custom device array
        return $rootstrap_devices;
    }


    /**
     * Add custom screen size styles to customizer head
     * 
     * @since 0.8.0
     * @return void
     */
    public function customize_controls_print_styles()
    {
        $devices = $this->devices;
        $styles = new WP_Rootstrap_Styles();
        $overlay_selector = '';

        foreach ( $devices as $device => $args ) 
        {
            if( !isset( $args['max'] ) || '' === $args['max'] ) continue;

            // set customize preview screen max width
            $styles->set_style( array(
                'selector' => sprintf( 'body .preview-%s #customize-preview iframe', $device ),
                'styles' => array(
                    'max-width: %s!important;' => $args['max'],
                ),
            ));

            $preview_button_styles = '';

            // set preview button styles
            if( isset( $args['preview-button']['content'] )  && '' !== $args['preview-button']['content'] )
                $preview_button_styles .= sprintf('content: "%s";', $args['preview-button']['content'] );

            // set preview button styles
            if( isset( $args['preview-button']['style'] )  && '' !== $args['preview-button']['style'] )
                $preview_button_styles .= $args['preview-button']['style'];

            $styles->set_style( array(
                'selector' => sprintf( 'button.preview-%s:before', $device ),
                'styles' => array(
                    $preview_button_styles => 'echo',
                ),
                'cb' => '' !== $preview_button_styles,
            ));

            // build selector for overlay styles
            $overlay_selector .= sprintf('.preview-%s #customize-preview.wp-full-overlay-main,', $device );

        } // end foreach

        // remove comma from last selector
        $overlay_selector = rtrim( $overlay_selector, ',' );

        $styles->set_style( array(
            'selector' => $overlay_selector,
            'styles' => array(
                'background-color: rgba(0, 0, 0, 0); width: 100%; height: 100%; max-width: 100%; max-height: 100%; margin: auto; left: auto; text-align: center;' => 'echo',
            ),
        ));

        $styles->set_style( array(
            'selector' => sprintf( '#customize-preview iframe', $device ),
            'styles' => array(
                'transition: all 0.5s ease-in-out;' => 'echo',
            ),
        ));

        $styles->add_screen('mobile_devices_only', array( 'max' => '1024px' ) );

        $styles->set_style( array(
            'selector' => '#customize-controls .wp-full-overlay-footer .devices',
            'styles' => array(
                'display: block;' => 'echo',
            ),
            'screen' =>'mobile_devices_only'
        ));

        $styles->set_style( array(
            'selector' => '.wp-full-overlay-footer .devices button:before',
            'styles' => array(
                'padding: 4px 6px;' => 'echo',
            ),
        ));

        // print styles
        $styles->print_screens( 'customize-controls' );
    }


    /**
     * Load utility script for customizer controls
     * 
     * @since 0.8.0
     * @return void
     */
    public function customize_controls_enqueue_scripts()
    {
        wp_enqueue_script( 'wp-rootstrap-customizer-controls', $this->dir_uri . 'js/wp-rootstrap-customizer-controls.js', array( 'jquery' ) );
        wp_localize_script( 'wp-rootstrap-customizer-controls', 'rootstrapDevices', $this->devices );      
    }


    /**
     * Load utility script for customizer settings preview
     *
     * @since 0.8.0
     * @return void
     */    
    public function customize_preview_init()
    {
        wp_enqueue_script( 'wp-rootstrap-customizer-preview', $this->dir_uri . 'js/wp-rootstrap-customizer-preview.js', array( 'jquery' ) );
    } 

} // end class WP_Rootstrap
