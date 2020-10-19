<?php
/**
 * Customize control multicheck.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2020 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */

namespace Taproot\Customize\Controls\Multicheck;

use WP_Customize_Control;

class Control extends WP_Customize_Control {

	/**
	 * The type of customize control being rendered.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $type = 'checkbox-multiple';

	/**
	 * Displays the control content.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function render_content() {

		if ( empty( $this->choices ) )
			return; ?>

		<?php if ( !empty( $this->label ) ) : ?>
			<span class="customize-control-title"><?php echo esc_html( $this->label ) ?></span>
		<?php endif; ?>

		<?php if ( !empty( $this->description ) ) : ?>
			<span class="description customize-control-description"><?php echo $this->description ?></span>
		<?php endif; ?>

		<?php $multi_values = !is_array( $this->value() ) ? explode( ',', $this->value() ) : $this->value() ?>

        <?php foreach ( $this->choices as $value => $label ) : ?>

            <span class="customize-control-checkbox-multiple__wrapper">
                <input type="checkbox" value="<?php echo esc_attr( $value ) ?>" <?php checked( in_array( $value, $multi_values ) ) ?> />
                <label><?php echo esc_html( $label ) ?></label>
            </span>

        <?php endforeach; ?>

		<input type="hidden" <?php $this->link() ?> value="<?php echo esc_attr( implode( ',', $multi_values ) ) ?>" />
	<?php }
}