<?php
/**
 * Screens manager.
 *
 * This class is used to boot the screen manager and handle its action and
 * filter hooks.
 *
 * @package   Rootstrap
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2019, Sky Shabatura
 * @link      https://github.com/skyshab/rootstrap
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Rootstrap\Modules\Devices;

use Rootstrap\Abstracts\Bootable;
use Rootstrap\Modules\Styles\Styles;


/**
 * Screen manager class.
 *
 * @since  1.0.0
 * @access public
 */
class Manager extends Bootable {


    /**
     * Sets up the screens manager actions and filters.
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function boot() {

        // Add registration callback for devices.
        add_action( 'rootstrap/register', [ $this, 'register' ] );    
        
        // Register JS data for devices.        
        add_filter( 'rootstrap/resources/js-data', [ $this, 'js_data' ] );          
        
        // Set Customizer Devices
        add_filter( 'customize_previewable_devices', [ $this, 'customize_previewable_devices' ] );

        // Add Customizer Screen Styles
        add_action( 'customize_controls_print_styles', [ $this, 'customize_controls_print_styles' ] ); 
    }


    /**
     * Register devices
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function register() {

        // get default devices
        $devices = get_device_defaults();

        // create our intial screens as defined in Rootstrap config
        foreach( $devices as $device => $args ) {
            add_device( $device, $args );
        }

        // action hook for plugins and child themes to add or remove devices
        do_action( 'rootstrap/register/devices', devices() );        
    }


    /**
     * Makes data about our devices available in customizer js
     *
     * @since  1.0.0
     * @access public
     * @param  array  $data - the data array to filter
     * @return array  returns modified data
     */
    public function js_data( $data ) {   
        
        // add device data
        $data['devices'] = get_devices_array();

        // return modified data
        return $data;
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
