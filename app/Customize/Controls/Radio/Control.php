<?php
/**
 * Customizer radio control
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2020 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */

namespace Taproot\Customize\Controls\Radio;

use WP_Customize_Control;

use Taproot\Customize\Controls\Device_Picker;

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
    public $type = 'taproot-radio';

    /**
     * Add support for per unit attributes
     */
    public $atts;

    /**
     * Stores array of devices to render controls for
     */
    public $devices;

    /**
     * Render control markup.
     *
     * @since 1.2.0
     */
    public function render_content() {

        // Print the label and/or description
        if( ! empty( $this->label ) || ! empty( $this->description ) ) {
            $this->get_label();
        }

        // If there's devices
        if( $this->has_devices() ) {

            // Add device picker
            $picker = new Device_Picker( $this->devices );
            $picker->display();

            // Add controls
            $this->get_controls();
        }
        // Or, add single control
        else {
            $this->get_control();
        }
    }

    /**
     * Render control label
     *
     * @since 1.2.0
     */
    private function get_label() {

        echo '<label>';
            if( ! empty( $this->label ) ) {
                printf('<span class="customize-control-title">%s</span>', esc_html( $this->label ) );
            }
            if( ! empty( $this->description ) ) {
                printf('<span class="description customize-control-description">%s</span>', esc_html( $this->description ) );
            }
        echo '</label>';
    }

    /**
     * Has Devices?
     */
    public function has_devices() {

        // If array with multiple device choices
        if( isset( $this->devices ) && is_array( $this->devices ) && count( $this->devices ) > 1 ) {
            return true;
        }

        // Otherwise, return false
        return false;
    }

    /**
     * Render control markup.
     *
     * @since 1.2.0
     */
    private function get_controls() {

        // Open device wrapper
        echo '<div class="device-group">';

            // Print control for each device
            foreach( $this->devices as $device) {
                printf( '<div class="device-group__item device-group__item--%1$s" data-device="%1$s">', esc_attr($device) );
                    // Print control
                    $this->get_control($device);
                echo '</div>';
            }

        // Close device wrapper
        echo '</div>';
    }

    /**
     * Render control markup.
     *
     * @since 1.2.0
     */
    private function get_control( $device = 'mobile') {

        // Define setting id
        if( 'mobile' === $device ) {
            $setting_id = 'control';
        } else {
            $setting_id = "control_{$device}";
        }

        // If no choices set, bail
        if ( empty( $this->choices ) ) {
            return;
        }

        $input_id = '_customize-input-' . $this->id . '--' . $device;
        $name = '_customize-radio-' . $this->id . '--' . $device;

        // Print control for each choice
        foreach ( $this->choices as $value => $label ) {

            // Open control wrapper
            echo '<span class="customize-control-taproot-radio__wrapper">';

                // Print radio control
                printf('<input id="%s" name="%s" type="radio" value="%s" %s %s />',
                    esc_attr( $input_id . '--' . $value ),
                    esc_attr( $name ),
                    esc_attr( $value ),
                    $this->get_link($setting_id),
                    checked( $this->value($setting_id), $value, FALSE )
                );

                // Print label for this choice
                printf('<label for="%s">%s</label>', esc_attr( $input_id . '--' . $value ), esc_html( $label ) );

            // Close control wrapper
            echo '</span>';
        }
    }
}
