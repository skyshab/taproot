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
use Rootstrap\Devices\Devices;
use Rootstrap\Screens\Screens;


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
     * Store vendor path if passed in on instantiation.
     *
     * @since 1.0.0
     * @param object $vendor_path
     * @return void
     */
    public function __construct( $vendor_path = false ) {
        $this->vendor_path = $vendor_path;
    }


    /**
     * Load resources.
     *
     * @since 1.0.0
     * @return object
     */
    public function boot() {
        add_filter( 'rootstrap/resources/vendor', [ $this, 'vendor_path' ] );
        add_action( 'init', [ $this, 'init' ], 110 );
    }

    /**
     * Load resources.
     *
     * @since 1.0.0
     * @return object
     */
    public function vendor_path() {
        return ( $this->vendor_path ) ? $this->vendor_path : get_template_directory_uri() . '/vendor';
    }


    /**
     * Load Rootstrap Modules when required
     *
     * @since 1.0.0
     * @return void
     */
    public function init() {

        $this->devicesInit();
        $this->screensInit();

        $manager = Manager::instance();
        $manager->boot();

        do_action( 'rootstrap/loaded' );
    }



    /**
     * Load Rootstrap Modules when required
     *
     * @since 1.0.0
     * @return void
     */
    private function devicesInit() {

        // create devices object
        // add default devices
        // hook for altering devices
        // store object

        $devices = new Devices;

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

}
