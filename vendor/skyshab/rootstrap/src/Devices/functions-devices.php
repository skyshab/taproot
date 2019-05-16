<?php
/**
 * Devices functions.
 *
 * Helper functions related to devices.
 *
 * @package   Rootstrap
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2019, Sky Shabatura
 * @link      https://github.com/skyshab/rootstrap
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Rootstrap\Devices;

use function Rootstrap\rootstrap;


/**
 * Get site Devices instance.
 *
 * @since  1.0.0
 * @access public
 * @return Devices
 */
function devices() {
    return rootstrap()->getDevices();
}


/**
 * Add a device
 *
 * @since  1.0.0
 * @access public
 * @param  string   $name
 * @param  array    $args
 * @return void
 */
function add_device( $name, $args ) {
    devices()->add( $name, $args );
}


/**
 * Get a Device
 *
 * @since  1.0.0
 * @access public
 * @param  string   $name
 * @return object
 */
function get_device( $name ) {
    return devices()->get( $name );
}


/**
 * Get Devices
 *
 * @since  1.0.0
 * @access public
 * @return array
 */
function get_devices() {
    return devices()->all();
}


/**
 * Get Devices Array
 *
 * @since  1.0.0
 * @access public
 * @return array
 */
function get_devices_array() {
    $array = [];
    foreach( get_devices() as $name => $device ) {
        $array[$name]['min'] = $device->min();
        $array[$name]['max'] = $device->max();
    }
    return $array;
}


/**
 * Get Devices List
 *
 * @since  1.0.0
 * @access public
 * @return array
 */
function get_devices_list() {
    return array_keys( get_devices_array() );
}


/**
 * Get the device immediately before specified device
 *
 * @since 1.0.0
 * @param string    $current
 * @return string
 */
function get_previous_device( $current ) {
    $devices = get_devices_list();
    $index = array_search( $current, $devices );
    return ( isset( $devices[$index - 1] ) ) ? $devices[$index - 1] : false;
}


/**
 * Get the device immediately after specified device
 *
 * @since 1.0.0
 * @param string    $current
 * @return string
 */
function get_next_device( $current ) {
    $devices = get_devices_list();
    $index = array_search( $current, $devices );
    return ( isset( $devices[$index + 1] ) ) ? $devices[$index + 1] : false;
}


/**
 * Get the device min width
 *
 * @since 1.0.0
 * @param  string   $device
 * @return string
 */
function get_device_min( $device ) {
    $device = get_device( $device );
    return $device->min();
}


/**
 * Get the device max width
 *
 * @since 1.0.0
 * @param string    $device
 * @return string
 */
function get_device_max( $device ) {
    $device = get_device( $device );
    return $device->max();
}
