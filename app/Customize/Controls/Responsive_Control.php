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

namespace Taproot\Customize\Controls;

use WP_Customize_Control;


/**
 * Range-based sliding value picker for Customizer.
 *
 * @since 1.2.0
 */
class Responsive_Control extends WP_Customize_Control {


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
        $this->get_label();
        $this->get_device_picker();
        $this->get_controls();
    }


    /**
     * Render control label
     *
     * @since 1.2.0
     */
    private function get_label() {
        if('checkbox' !== $this->type): ?>
        <label>
            <?php if( ! empty( $this->label ) ) : ?>
                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
            <?php endif; ?>
            <?php if( ! empty( $this->description ) ) : ?>
                <span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
            <?php endif; ?>
        </label>
        <?php
        endif;
    }


    /**
     * Render control markup.
     *
     * @since 1.2.0
     */
    private function get_device_picker() {
        $picker = new Device_Picker( $this->devices );
        $picker->display();
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

		switch ( $this->type ) {
			case 'checkbox': ?>
                <input
                    id="<?php echo esc_attr( $this->id . '--' . $device ) ?>"
                    type="checkbox"
                    value="<?php echo esc_attr( $this->value($setting_id) ) ?>"
                    <?php $this->link($setting_id); ?>
                    <?php checked( $this->value($setting_id) ) ?>
                />
                <label for="<?php echo esc_attr( $this->id . '--' . $device ) ?>"><?php echo esc_html( $this->label ) ?></label>
				<?php
				break;
            case 'range':

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
                <input type="checkbox" class="taproot-range-enable" value="<?php echo esc_attr( $this->value($setting_enabled_id) ); ?>" <?php $this->link($setting_enabled_id); ?> <?php checked( $this->value($setting_enabled_id), 1 ); ?> />
                <span class="taproot-range-enable-message"> <?php echo esc_html__('click to enable', 'taproot'); ?> </span>
                <input type="range" class="taproot-range" <?php echo $initial_atts; ?> value="<?php echo esc_attr( $numeric_value ); ?>" data-reset_value="<?php echo esc_attr( $default_number ); ?>" />
                <input type="number" class="taproot-range-input" <?php echo $initial_atts; ?> value="<?php echo esc_attr( $numeric_value ); ?>" />
                <select class="taproot-unit" data-reset_value="<?php echo esc_attr( $default_unit ); ?>" <?php echo esc_attr( $disabled ) ?> >
                    <?php
                    foreach( $attributes as $unit => $atts ) {
                        $unit_name = ( 'unitless' === $unit ) ? '' : $unit;
                        printf( '<option value="%s" %s %s>%s</option>', $unit, selected($unit_value, $unit, false), $this->get_attributes( $atts ), $unit_name );
                    } ?>
                </select>
                <input type="hidden" class="taproot-range-value" <?php $this->input_attrs(); ?> value="<?php echo esc_attr( $this->value($setting_id) ); ?>" <?php $this->link($setting_id); ?> />
                <span class="taproot-reset-slider"></span>
                <?php
                break;
            case 'radio':
                if ( empty( $this->choices ) ) {
					return;
                }
                $input_id = '_customize-input-' . $this->id . '--' . $device;
				$name = '_customize-radio-' . $this->id . '--' . $device;
				?>
				<?php foreach ( $this->choices as $value => $label ) : ?>
					<span class="customize-inside-control-row">
						<input
							id="<?php echo esc_attr( $input_id . '--' . $value ); ?>"
							type="radio"
							value="<?php echo esc_attr( $value ); ?>"
							name="<?php echo esc_attr( $name ); ?>"
							<?php $this->link($setting_id); ?>
							<?php checked( $this->value($setting_id), $value ); ?>
							/>
						<label for="<?php echo esc_attr( $input_id . '--' . $value ); ?>"><?php echo esc_html( $label ); ?></label>
					</span>
				<?php endforeach; ?>
				<?php
				break;
            case 'select':
                if ( empty( $this->choices[$device] ) ) {
                    return;
                } ?>
                <select id="<?php echo esc_attr( $this->id . '--' . $device ); ?>" <?php $this->link($setting_id); ?>>
                    <?php
                    foreach ( $this->choices[$device] as $value => $label ) {
                        echo '<option value="' . esc_attr( $value ) . '"' . selected( $this->value(), $value, false ) . '>' . $label . '</option>';
                    } ?>
                </select>
                <?php
                break;
        }

    } // end get_control


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
