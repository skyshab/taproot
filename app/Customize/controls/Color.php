<?php
/**
 * Color control
 * 
 * Creates color picker with alpha channel. 
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
 * Alpha Color Picker Customizer Control
 */

class Color extends WP_Customize_Control {


	/**
	 * Official control name
	 */
	public $type = 'alpha-color';

	/**
	 * Add support for palettes to be passed in
	 *
	 * Supported palette values are true, false, or an array of RGBa and Hex colors.
	 */
	public $palette;

	/**
	 * Add support for showing the opacity value on the slider handle
	 */
	public $hide_alpha = false;



	/**
	 * Enqueue color script
	 */
	public function enqueue() {
        wp_enqueue_script( 'wp-color-picker' );
    }


	/**
	 * Render the control
	 */
	public function render_content() {

		// Process the palette
		if ( is_array( $this->palette ) ) {
			$palette = implode( '|', $this->palette );
        } 
        else {
			$palette = ( false === $this->palette || 'false' === $this->palette ) ? 'false' : 'true';
		}

		// Support passing hide_alpha as string or boolean. Default to false
		$hide_alpha = ( $this->hide_alpha && 'false' !== $this->hide_alpha ) ? 'true' : 'false';

		// Output the label if passed in
		if ( isset( $this->label ) && '' !== $this->label ) {
			echo '<span class="customize-control-title">' . esc_html( $this->label ) . '</span>';
		}

		// Output the description if passed in
		if ( isset( $this->description ) && '' !== $this->description ) {
			echo '<span class="description customize-control-description">' . esc_html( $this->description ) . '</span>';
		} 
		?>
		<div class="customize-control-content">
			<label>
				<input class="alpha-color-control" type="text" data-hide-alpha="<?php echo esc_attr( $hide_alpha ); ?>" data-palette="<?php echo esc_attr( $palette ); ?>" data-default-color="<?php echo esc_attr( $this->settings['default']->default ); ?>" <?php $this->link(); ?>  />
			</label>
		</div>
		<?php
    }
    
}
