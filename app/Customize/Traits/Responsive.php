<?php
/**
 * Responsive control methods.
 *
 * This trait contains methods for our responsive control classes.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2020, Sky Shabatura
 * @link      https://github.com/skyshab/Taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Customize\Traits;

/**
 * Class for checkbox controls
 *
 * @since  2.0.0
 * @access public
 */
trait Responsive {

    use Base;

    /**
     * Control Setup
     *
     * @return void
     */
    public function setup() {

        // Add setting for each device
        foreach( $this->devices as $device ) {

            if( 'mobile' === $device ) {
                $this->settings['control'] = $this->id;
            }
            else {
                $this->settings["control_{$device}"] = "{$this->id}--{$device}";
            }
        }
    }

    /**
     * Defaults
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function defaults( $defaults ) {

        // Loop through the devices
        foreach( $this->devices as $device ) {

            // Handle default value
            if( is_array( $this->default ) ) {
                $default = ( isset( $this->default[$device] ) ) ? $this->default[$device] : false;
            } else {
                $default = $this->default;
            }

            // If no default, skip to the next device
            if( ! $default ) continue;

            // If mobile, just use the control name
            if( 'mobile' === $device ) {
                $defaults->add( $this->id, $default );
            }
            // Otherwise, append the device to the name
            else {
                $defaults->add( "{$this->id}--{$device}", $default );
            }
        }
    }
}
