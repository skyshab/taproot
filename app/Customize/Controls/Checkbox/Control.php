<?php
/**
 * Customizer Checkbox Control.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */

namespace Taproot\Customize\Controls\Checkbox;

use Taproot\Customize\Controls\Device_Picker;
use WP_Customize_Control;

/**
 * Range-based sliding value picker for Customizer.
 *
 * @since 1.2.0
 */
class Control extends WP_Customize_Control {

    /**
     * Stores control type.
     *
     * @since 2.0.0
     * @var string
     */
    public $type = 'taproot-checkbox';

    /**
     * Add support for per unit attributes
     */
    public $atts;

    /**
     * Stores array of devices to render controls for
     */
    public $devices;

    /**
     * Render control markup
     */
    public function render_content() {

        // If there's devices
        if( $this->has_devices() ) {

            // Add device picker
            $picker = new Device_Picker( $this->devices );
            $picker->display();

            // Add controls
            $this->get_controls();
        }
        // Or single control
        else {
            $this->get_control();
        }
    }

    /**
     * Has Devices?
     */
    public function has_devices() {

        // If array with multiple device choices
        if( isset( $this->devices ) && is_array( $this->devices ) && count( $this->devices ) > 1 ) {
            return true;
        }

        return false;
    }

    /**
     * Render control markup.
     *
     * @since 1.2.0
     */
    private function get_controls() {

        echo '<div class="device-group">';

            foreach( $this->devices as $device) {
                printf( '<div class="device-group__item device-group__item--%1$s" data-device="%1$s">', esc_attr($device) );

                    $this->get_control($device);

                echo '</div>';
            }

        echo '</div>';
    }

    /**
     * Render control markup.
     *
     * @since 1.2.0
     */
    private function get_control( $device = 'mobile') {

        echo '<div class="customize-control-taproot-checkbox__wrapper">';

            if( 'mobile' === $device ) {
                $setting_id = 'control';
                $control_id = $this->id;

            } else {
                $setting_id = "control_{$device}";
                $control_id = "{$this->id}--{$device}";
            }

            printf('<input id="%s" type="checkbox" value="%s" %s %s />',
                esc_attr( $control_id ),
                esc_attr( $this->value($setting_id) ),
                $this->get_link($setting_id),
                checked( $this->value($setting_id), TRUE, FALSE )
            );

            printf('<label for="%s">%s</label>', esc_html( $control_id ), esc_html( $this->label ) );

        echo '</div>';
    }
}
