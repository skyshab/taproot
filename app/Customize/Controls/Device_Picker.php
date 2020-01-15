<?php
/**
 * Device Picker
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2020 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */

namespace Taproot\Customize\Controls;

/**
 * Class to create device picker for customizer controls
 *
 * @since 1.2.0
 */
class Device_Picker {

    /**
     * Array of devices
     */
    private $devices;

    /**
     * Set up our device picker
     *
     * @since 1.2.0
     *
     * @param array $devices
     */
    public function __construct( $devices ) {
        $this->devices = $devices;
    }

    /**
     * Render device picker
     *
     * @since 1.2.0
     * @return string
     */
    public function render() {

        $devices = $this->devices;
        $current_device = 'desktop';

        // if only mobile
        if( !$devices || empty($devices) ) {
            return;
        }

        if( in_array('mobile', $devices) && count($devices) <= 1 ) {
            return;
        }

        // if desktop device doesn't exist
        if( !in_array('desktop', $devices) ) {
            $current_device = end($devices);
        }

        // open component
        $html = sprintf('<span class="device-picker" data-current-device="%s">', esc_attr($current_device) );

        // get each device
        foreach( $devices as $device) {
            $html .= sprintf('<span class="device-picker__device device-picker__device--%1$s" data-device="%1$s">', esc_attr($device) );
            $html .= sprintf('<span class="screen-reader-text">%s</span>', sprintf( esc_html__( 'Enter %s preview mode', 'taproot' ), $device ));
            $html .= '</span>';
        }

        // close component
         $html .= '</span>';

         return $html;
    }

    /**
     * Display device picker
     *
     * @since 1.2.0
     */
    public function display() {
        echo $this->render();
    }
}
