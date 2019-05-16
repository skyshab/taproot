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

use function Rootstrap\Devices\get_devices;
use function Rootstrap\Devices\get_devices_array;
use function Rootstrap\Screens\get_screens_array;


/**
 * Creates a new Rootstrap object.
 *
 * @since  1.0.0
 * @access public
 */
class Manager extends Bootable {


    /**
     * Stores Resources Path
     *
     * @since 1.0.0
     * @var array
     */
    private $resources;


    /**
     * Load resources.
     *
     * @since 1.0.0
     * @return object
     */
    public function boot() {

        // get the vendor path
        $vendor = apply_filters( 'rootstrap/resources/vendor', false );
        if ( !$vendor ) return;
        $this->resources = $vendor . '/skyshab/rootstrap/resources';

        // resources url should be defined by this point. add customizer actions
        add_action( 'customize_controls_enqueue_scripts', [ $this, 'customize_resources' ] );
        add_action( 'customize_preview_init', [ $this, 'customize_preview'  ] );
        add_action( 'customize_save_after', [ $this, 'clear_cache' ] );

        // Set Customizer Devices
        add_filter( 'customize_previewable_devices', [ $this, 'customize_previewable_devices' ] );

        // Add Customizer Screen Styles
        add_action( 'customize_controls_print_styles', [ $this, 'customize_controls_print_styles' ] );
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
