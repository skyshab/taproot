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
use Rootstrap\Styles\Styles;
use Rootstrap\Devices\Devices;
use Rootstrap\Screens\Screens;
use function Rootstrap\Devices\get_devices;
use function Rootstrap\Devices\get_devices_array;
use function Rootstrap\Screens\get_screens_array;


/**
 * Creates a new Rootstrap object.
 *
 * @since  1.0.0
 * @access public
 */
class Rootstrap extends Bootable {


    /**
     * Stores Devices object
     *
     * @since 1.0.0
     * @var array
     */
    private $devices;


    /**
     * Stores Screens object
     *
     * @since 1.0.0
     * @var array
     */
    private $screens;


    /**
     * Stores Vendor Path
     *
     * @since 1.0.0
     * @var array
     */
    private $vendor_path;


    /**
     * Stores Resources Path
     *
     * @since 1.0.0
     * @var array
     */
    private $resources;


    /**
     * Store vendor path if passed in on instantiation.
     *
     * @since 1.0.0
     * @param object $vendor_path
     * @return void
     */
    public function __construct( $vendor_path = false ) {
        $this->vendor_path = ($vendor_path) ? $vendor_path : get_template_directory_uri() . '/vendor';
    }


    /**
     * Load resources.
     *
     * @since 1.0.0
     * @return object
     */
    public function boot() {

        // add vendor path filter
        add_filter( 'rootstrap/resources/vendor', [ $this, 'getVendorPath' ] );

        // Store resources path
        $this->resources = $this->getVendorPath() . '/skyshab/rootstrap/resources';

        // Initiate Core Modules
        add_action( 'after_setup_theme', [ $this, 'init' ], PHP_INT_MAX );

        // Enqueue controls scripts
        add_action( 'customize_controls_enqueue_scripts', [ $this, 'customize_resources' ] );

        // Enqueue preview scripts
        add_action( 'customize_preview_init', [ $this, 'customize_preview'  ] );

        // Clear cache
        add_action( 'customize_save_after', [ $this, 'clear_cache' ] );

        // Set Customizer Devices
        add_filter( 'customize_previewable_devices', [ $this, 'customize_previewable_devices' ] );

        // Add Customizer Screen Styles
        add_action( 'customize_controls_print_styles', [ $this, 'customize_controls_print_styles' ] );
    }


    /**
     * Initiate Core Modules
     *
     * @since 1.1.0
     * @return object
     */
    public function init() {

        // Initialize devices
        $this->devicesInit();

        // Initialize screens
        $this->screensInit();

        // Actions to perform once core modules are inititialized
        do_action( 'rootstrap/loaded', $this );
    }


    /**
     * Load resources.
     *
     * @since 1.0.0
     * @return object
     */
    public function getVendorPath() {
        return $this->vendor_path;
    }


    /**
     * Load Rootstrap Modules when required
     *
     * @since 1.0.0
     * @return void
     */
    private function devicesInit() {

        // create devices object
        $devices = new Devices;

        // add default devices

        $devices->add( 'mobile', [
            'min' => '',
            'max' => '767px',
            'icon' => '"\\f470"',
            'preview_width' => '375px',
            'preview_height' => '677px'
        ]);

        $devices->add( 'tablet', [
            'min' => '768px',
            'max' => '1024px',
            'icon' => '"\\f471"',
            'preview_width' => '768px',
            'preview_height' => '100%'
        ]);

        $devices->add( 'desktop', [
            'min' => '1025px',
            'max' => '',
            'icon' => '"\\f472"',
            'preview_width' => '100%',
            'preview_height' => '100%'
        ]);

        // action hook for plugins and child themes to add or remove devices
        do_action( 'rootstrap/register/devices', $devices );

        // store object
        $this->devices = $devices;
    }

    /**
     * Get Devices Object
     *
     * @since 1.0.0
     * @return void
     */
    public function getDevices() {
        return $this->devices;
    }

    /**
     * Load Rootstrap Modules when required
     *
     * @since 1.0.0
     * @return void
     */
    private function screensInit() {

        $screensArray = [ 'default' => [] ];
        $devicesObj = $this->getDevices();
        $devices = $devicesObj->all();

        // 'and up' screens loop
        foreach ( $devices as $name => $device ) {

            $min = $device->min();
            $max = $device->max();

            if( $min && $max ) $id  = sprintf( '%s-and-up', $name );
            elseif( $min ) $id  = $name;
            else continue;

            $screensArray[$id]['min'] = $min;
        }


        // 'and under' screens loop
        foreach ( $devices as $name => $device ) {

            $min = $device->min();
            $max = $device->max();

            if( $min && $max ) $id  = sprintf( '%s-and-under', $name );
            elseif( $max ) $id  = $name;
            else continue;

            $screensArray[$id]['max'] = $max;
        }


        // generate all possible screen combinations that have both a min and max
        foreach ( $devices as $outer_name => $outer_device ) {

            $outer_min = ( $outer_device->min() && '' !== $outer_device->min() ) ? $outer_device->min() : false;

            if( $outer_min ) {

                foreach ( $devices as $inner_name => $inner_device ) {

                    $inner_min = $inner_device->min();
                    $inner_max = $inner_device->max();

                    if( !$inner_max ) continue;

                    $outer_min_value = filter_var( $outer_min, FILTER_SANITIZE_NUMBER_INT );
                    $inner_min_value = filter_var( $inner_min, FILTER_SANITIZE_NUMBER_INT );
                    $inner_max_value = filter_var( $inner_max, FILTER_SANITIZE_NUMBER_INT );

                    if( $outer_min_value <= $inner_min_value && $outer_min_value < $inner_max_value ) {

                        $id = ( $outer_name === $inner_name ) ? $outer_name : sprintf( '%s-%s', $outer_name, $inner_name );
                        $screensArray[$id]['min'] = $outer_min;
                        $screensArray[$id]['max'] = $inner_max;

                    } // end if max

                } // end inner loop

            } // end if min

        } // end outer loop

        $screens = new Screens;

        // create our intial screens as defined in Rootstrap config
        foreach( $screensArray as $screen => $args ) {
            $screens->add( $screen, $args );
        }

        // action hook for plugins and child themes to add or remove screens
        do_action( 'rootstrap/register/screens', $screens );

        $this->screens = $screens;
    }


    /**
     * Get Screens Object
     *
     * @since 1.0.0
     * @return void
     */
    public function getScreens() {
        return $this->screens;
    }


    /**
     * Enqueue scripts and styles.
     *
     *  If filters are applied defining file locations, load scripts and styles.
     *
     * @since 1.0.0
     */
    public function customize_resources() {
        wp_enqueue_script( 'rootstrap-customize-controls', $this->resources . '/js/customize-controls.min.js', ['customize-controls', 'jquery'], "1.2", true );
        wp_localize_script( 'rootstrap-customize-controls', 'rootstrapData', $this->js_data() );
        wp_enqueue_style( 'rootstrap-customize-controls', $this->resources . '/css/customize-controls.min.css' );
    }


    /**
     * Enqueue customize preview scripts
     *
     * If filters are applied defining file locations, load scripts.
     *
     * @since 1.0.0
     */
    public function customize_preview() {
        wp_enqueue_script( 'rootstrap-customize-preview',
            $this->resources . '/js/customize-preview.min.js',
            array(),
            filemtime( get_template_directory().'/style.css' )
        );
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


    /**
     * Get data to make available to JS
     *
     * @since  1.0.0
     * @access public
     * @return array  returns array of js data
     */
    public function js_data() {

        $data = [];

        // add device data
        $data['devices'] = get_devices_array();

        // add screen data
        $data['screens'] = get_screens_array();

        // filter to modify the js data
        $js_data = apply_filters( 'rootstrap/resources/js-data', $data );

        // return filtered data
        return $js_data;
    }


    /**
     * Add custom devices to customizer.
     * These are output in the order they occur in the array,
     * and there is no width associated with the defaults here.
     * Unfortunately, this means this is an all or nothing thing.
     *
     * @since 1.0.0
     * @param array $devices - array of registered devices
     * @return array
     */
    public function customize_previewable_devices( $defaults ) {

        $devices = get_devices();

        // if no custom devices, use wp defaults
        if( !$devices ) return $defaults;

        $device_array = [];

        // generate a label for each device button
        foreach ($devices as $name => $device) {

            // this should have a translation
            $device_array[$name]['label'] =  esc_html( sprintf('Enter %s preview mode', $name ) );

            // if no max, assume this is 'desktop' or equivalent, set as default
            if( !$device->max() )
                $device_array[$name]['default'] = true;
        }

        // return our custom device array
        return $device_array;
    }


    /**
     * Add custom screen size styles to customizer head
     *
     * @since 1.0.0
     * @return string
     */
    public function customize_controls_print_styles() {

        $styles = new Styles();
        $styles->add_screen( 'mobile-devices-only', ['max' => '1024px'] );

        foreach ( get_devices() as $name => $device ) {

            // add icon to preview button
            $styles->add([
                'selector' => sprintf( 'button.preview-%s:before', $name ),
                'styles' => [
                    'content' => $device->icon()
                ]
            ]);

            // add icon to section title
            $styles->add([
                'selector' => sprintf( '.control-section-rootstrap-device--%s .customize-section-title h3:after', $name ),
                'styles' => [
                    'content' => $device->icon()
                ]
            ]);

            // set customize preview screen max width
            $styles->add([
                'selector' => sprintf( '.preview-%s #customize-preview', $name ),
                'styles' => [
                    'width' => $device->preview_width() . '!important',
                    'height' => $device->preview_height() . '!important',
                ],
            ]);

        } // end foreach

        $styles->add([
            'screen' =>'mobile-devices-only',
            'selector' => '#customize-controls .wp-full-overlay-footer .devices',
            'styles' => [
                'display' => 'block'
            ]
        ]);

        $styles->add([
            'selector' => '.wp-full-overlay-footer .devices button:before',
            'styles' => [
                'padding' => '4px 6px'
            ]
        ]);

        // print styles
        echo $styles->get_styleblock( 'customize-controls' );
    }

}
