<?php
/**
 * Customize control Range
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */

namespace Taproot\Customize\Controls\Range;

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
    public $type = 'taproot-range';

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

        if( 'mobile' === $device ) {
            $setting_id = 'control';
        } else {
            $setting_id = "control_{$device}";
        }

        $setting_enabled_id = $setting_id . "_enable";

        // calculate defaults
        $default_value = $this->settings[$setting_id]->default;
        $default_number = floatval( $default_value );

        // process the unit value
        $default_unit = preg_replace('/\d/', '', $default_value );
        $default_unit = str_replace('.', '', $default_unit);
        $default_unit = ('' != $default_unit ) ? $default_unit : 'unitless';

        // set default values
        $value = '';
        $numeric_value = '';
        $unit_value = '';

        // if a value is set
        if( $this->value($setting_id) ) {
            $value = $this->value($setting_id);
            $numeric_value = floatval( $value );
            $unit_value = preg_replace('/\d/', '', $value );
            $unit_value = str_replace('.', '', $unit_value);
            $unit_value = ('' != $unit_value ) ? $unit_value : 'unitless';
        }
        // otherwise, is there a default?
        elseif( $default_value ) {
            $value = $default_value;
        }

        $attributes = $this->atts;
        $input_attrs = isset( $attributes[$unit_value] ) ? $attributes[$unit_value] : [];
        $initial_atts = $this->get_attributes( $input_attrs );

        // if a default is set, use it as the unit default
        if( $default_unit ) {
            $attributes[$default_unit]['default'] = $default_number;
        }

        // disable the unit picker if only one unit
        $disabled = ( 1 === count($attributes) ) ? 'disabled' : '';

        ?>
        <div class="customize-control-taproot-range__wrapper">
            <input type="checkbox" class="taproot-range-enable" value="<?php echo esc_attr( $this->value($setting_enabled_id) ); ?>" <?php $this->link($setting_enabled_id); ?> <?php checked( $this->value($setting_enabled_id), 1 ); ?> />
            <span class="taproot-range-enable-message"> <?php echo esc_html__('click to enable', 'taproot'); ?> </span>
            <input type="range" class="taproot-range" <?php echo $initial_atts; ?> value="<?php echo esc_attr( $numeric_value ); ?>" data-reset_value="<?php echo esc_attr( $default_number ); ?>" />
            <input type="number" class="taproot-range-input" <?php echo $initial_atts; ?> value="<?php echo esc_attr( $numeric_value ); ?>" />
            <select class="taproot-unit" data-reset_value="<?php echo esc_attr( $default_unit ); ?>" <?php echo esc_attr( $disabled ) ?> >
                <?php foreach( $attributes as $unit => $atts ) {
                    $unit_name = ( 'unitless' === $unit ) ? '' : $unit;
                    printf( '<option value="%s" %s %s>%s</option>', $unit, selected($unit_value, $unit, false), $this->get_attributes( $atts ), $unit_name );
                } ?>
            </select>
            <input type="hidden" class="taproot-range-value" <?php $this->input_attrs(); ?> value="<?php echo esc_attr( $this->value($setting_id) ); ?>" <?php $this->link($setting_id); ?> />
            <span class="taproot-reset-slider"></span>
        </div>
        <?php
    }

    /**
     * Get Attributes markup
     *
     * @since 1.2.0
     */
    private function get_attributes( $atts ) {
        $attributes = '';
        if( isset( $atts['min'] ) ) {
            $attributes .= sprintf( 'min="%s" ', esc_attr( $atts['min'] ) );
        }
        if( isset( $atts['max'] ) ) {
            $attributes .= sprintf( 'max="%s" ', esc_attr( $atts['max'] ) );
        }
        if( isset( $atts['step'] ) ) {
            $attributes .= sprintf( 'step="%s" ', esc_attr( $atts['step'] ) );
        }
        if( isset( $atts['default'] ) ) {
            $attributes .= sprintf( 'default="%s" ', esc_attr( $atts['default'] ) );
        }
        return $attributes;
    }
}
