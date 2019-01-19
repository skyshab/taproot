<?php
/**
 * Customize control Range
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2018 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */

namespace Taproot\Customize;

use WP_Customize_Control;


/** 
 * Range-based sliding value picker for Customizer.
 *
 * @since 0.8.0
 */
class Range extends WP_Customize_Control {


    /**
     * Stores control type.
     *
     * @since 0.8.0
     * @var string
     */     
    public $type = 'taproot-range';


    /**
     * Add support for per unit attributes
     */
    public $atts;


    /**
     * Render control markup.
     *
     * @since 0.8.0
     */ 
    public function render_content() {     

        $default_value = $this->settings[0]->default;
        $default_number = floatval( $default_value );

        // process the unit value
        $default_unit = preg_replace('/\d/', '', $default_value );
        $default_unit = str_replace('.', '', $default_unit); 
        $default_unit = ('' != $default_unit ) ? $default_unit : 'unitless';    

        // is control enabled?
        $control_enabled = ( null !== $this->value(1) ) ? $this->value(1) : 1;

        // set default values
        $value = '';          
        $numeric_value = '';
        $unit_value = ''; 

        // if a value is set
        if( $this->value(0) ) {
            $value = $this->value(0);
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
        if( $default_number && $default_unit ) {
            $attributes[$default_unit]['default'] = $default_number;
        }

    ?>
        <label>
            <?php if( ! empty( $this->label ) ) : ?>
                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
            <?php endif; ?>
            <?php if( ! empty( $this->description ) ) : ?>
                <span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
            <?php endif; ?>

        </label>

            <div class="range-group">

                <input type="checkbox" class="taproot-range-enable" value="<?php echo esc_attr( $this->value(1) ); ?>" <?php $this->link(1); ?> <?php checked( $this->value(1), 1 ); ?> />
                <span class="taproot-range-enable-message"> <?php echo __('click to enable', 'taproot'); ?> </span>
                <input type="range" class="taproot-range" <?php echo $initial_atts; ?> value="<?php echo esc_attr( $numeric_value ); ?>" data-reset_value="<?php echo esc_attr( $default_number ); ?>" />
                <input type="number" class="taproot-range-input" <?php echo $initial_atts; ?> value="<?php echo esc_attr( $numeric_value ); ?>" />
                
                <?php $disabled = ( 1 === count($attributes) ) ? 'disabled' : ''; ?>

                <select class="taproot-unit" data-reset_value="<?php echo esc_attr( $default_unit ); ?>" <?php echo $disabled; ?> >
                    <?php
                    foreach( $attributes as $unit => $atts ) {
                        $a_list = $this->get_attributes( $atts );  
                        $unit_name = ( 'unitless' === $unit ) ? '' : $unit;                     
                        printf( '<option value="%s" %s %s>%s</option>', $unit, selected($unit_value, $unit, false), $a_list, $unit_name );
                    } ?>
                </select>

                <input type="hidden" class="taproot-range-value" <?php $this->input_attrs(); ?> value="<?php echo esc_attr( $this->value(0) ); ?>" <?php $this->link(); ?> />

                <span class="taproot-reset-slider"></span>
                <span class="taproot-range-disable"><?php echo __('disable', 'taproot'); ?></span>
            </div>
    <?php
    }




    /**
     * Get Attributes markup
     *
     * @since 0.8.0
     */ 
    public function get_attributes( $atts ) {

        $attributes = '';

        if( isset( $atts['min'] ) ) {
            $attributes .= sprintf( 'min="%s" ', $atts['min'] );
        }

        if( isset( $atts['max'] ) ) {
            $attributes .= sprintf( 'max="%s" ', $atts['max'] );
        }    
        
        if( isset( $atts['step'] ) ) {
            $attributes .= sprintf( 'step="%s" ', $atts['step'] );
        }     
        
        if( isset( $atts['default'] ) ) {
            $attributes .= sprintf( 'default="%s" ', $atts['default'] );
        } 

        return $attributes;
    }

}
