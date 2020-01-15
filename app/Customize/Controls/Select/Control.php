<?php
/**
 * Customize control select
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2020 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */

namespace Taproot\Customize\Controls\Select;

use WP_Customize_Control;

use Taproot\Customize\Controls\Device_Picker;

/**
 * Select control for the customizer.
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
    public $type = 'taproot-select';

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

        // If there's content for the label
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

        $choices = $this->get_choices($device);

        if ( empty( $choices ) ) {
            return;
        }

        if( 'mobile' === $device ) {
            $setting_id = 'control';
            $control = $this->id;
        } else {
            $setting_id = "control_{$device}";
            $control = "{$this->id}--{$device}";
        }

        printf('<select id="%s" %s>', esc_attr($control), $this->get_link($setting_id) );

        foreach ( $choices as $value => $label ) {
            printf( '<option value="%s" %s>%s</option>', esc_attr( $value ), selected( $this->value(), $value, FALSE ), esc_attr( $label ) );
        }

        echo '</select>';
    }


   /**
     * Render control markup.
     *
     * @since 1.2.0
     *
     * @param string $device
     * @return array
     */
    private function get_choices( $device = 'mobile' ) {

        // If device specific choices are set
        if( isset( $this->choices[$device] ) && is_array( $this->choices[$device] ) ) {
            return $this->choices[$device];
        }

        return ( isset( $this->choices ) && is_array( $this->choices ) ) ? $this->choices : [];
    }
}
