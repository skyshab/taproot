<?php
/**
 * Customize control Font Styles
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
 * Font style control for Customizer.
 *
 * @since 1.0.0
 */
class Font_Styles extends WP_Customize_Control {


    /**
     * Stores control type.
     *
     * @since 1.0.0
     * @var string
     */
    public $type = 'taproot-font-styles';


    /**
     * Render control markup.
     *
     * @since 1.0.0
     */
    public function render_content()
    { ?>
        <label>
            <?php if( ! empty( $this->label ) ) : ?>
                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
            <?php endif;
            if( ! empty( $this->description ) ) : ?>
                <span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
            <?php endif; ?>
        </label>
        <div class="taproot-font-styles">

            <?php $current_values = explode('|', $this->value() );

            $choices = array(
                'bold'       => esc_html__( 'Bold',         'taproot' ),
                'italic'     => esc_html__( 'Italic',       'taproot' ),
                'underline'  => esc_html__( 'Underline',    'taproot' ),
                'uppercase'  => esc_html__( 'Uppercase',    'taproot' ),
                'capitalize' => esc_html__( 'Capitalize',   'taproot' ),
            );

            foreach ( $choices as $value => $label ) :
                $checked_class = in_array( $value, $current_values ) ? ' taproot-font-style-checked' : '';
                ?>
                    <span class="taproot-font-styles--item taproot-font-styles--<?php echo esc_attr( $value ) . esc_attr( $checked_class ); ?>">
                        <input type="checkbox" class="taproot-font-style-checkbox" value="<?php echo esc_attr( $value ); ?>" <?php checked( in_array( $value, $current_values ) ); ?> />
                    </span>
                <?php
            endforeach;
            ?>
            <span class="taproot-control-reset" ></span>
        </div>
        <input type="hidden" class="taproot-font-styles-input" <?php $this->input_attrs(); ?> value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link(); ?> />
        <?php
    }

}
