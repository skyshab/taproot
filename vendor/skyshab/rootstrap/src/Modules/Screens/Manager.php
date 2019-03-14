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

namespace Rootstrap\Modules\Screens;

use Rootstrap\Abstracts\Bootable;
use function Rootstrap\Modules\Devices\get_devices;


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
        
        // Register screens
        add_action( 'rootstrap/register', [ $this, 'register' ], 20 );    
        
        // add js data
        add_filter( 'rootstrap/resources/js-data', [ $this, 'js_data' ] );          
    }


    /**
     * Creates intial screens from registered devices.
     * Executes the action hook for plugins or themes to register their screens.
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function register() {

        // Create initial screens from registered devices
        $screens = $this->generate_screens();

        // create our intial screens as defined in Rootstrap config
        foreach( $screens as $screen => $args ) {
            add_screen( $screen, $args );
        }

        // action hook for plugins and child themes to add or remove screens
        do_action( 'rootstrap/register/screens', screens() );
    }


    /**
     * Expand registered devices into all possible screen combinations.
     * 
     * @since 1.0.0   
     * @access private
     * @return array
     */
    private function generate_screens() {

        // should we do this, or add a hook/filter
        $devices = get_devices();
        $screens = [ 'default' => [] ];


        // 'and up' screens loop
        foreach ( $devices as $name => $device ) {

            $min = $device->min();
            $max = $device->max();

            if( $min && $max ) $id  = sprintf( '%s-and-up', $name );
            elseif( $min ) $id  = $name;
            else continue;

            $screens[$id]['min'] = $min;
        }


        // 'and under' screens loop
        foreach ( $devices as $name => $device ) {

            $min = $device->min();
            $max = $device->max();

            if( $min && $max ) $id  = sprintf( '%s-and-under', $name );
            elseif( $max ) $id  = $name;
            else continue;

            $screens[$id]['max'] = $max;
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
                        $screens[$id]['min'] = $outer_min;
                        $screens[$id]['max'] = $inner_max;

                    } // end if max

                } // end inner loop

            } // end if min

        } // end outer loop


        // return expanded screen object
        return $screens;

    } // end expand_screens


    /**
     * Makes data about our screens available in customizer js
     *
     * @since  1.0.0
     * @access public
     * @param  array  $data - the data array to filter
     * @return array  returns modified data
     */
    public function js_data( $data ) {   
        
        // add screen data
        $data['screens'] = get_screens_array();

        // return modified data
        return $data;
    }

}
