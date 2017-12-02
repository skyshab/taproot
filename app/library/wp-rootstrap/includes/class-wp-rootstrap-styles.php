<?php
/**
 * Utility for generating styleblocks using screens defined by our plugin
 *
 * @package wp-rootstrap
 * @since 0.8.0
 */

if( !class_exists('WP_Rootstrap_Styles') )
{
	class WP_Rootstrap_Styles
	{
		/**
	     * Stores registered screens
	     */
		private $screens = array();


		/**
	     * Setup our obect
	     *
         * @since 0.8.0   
	     * @param array $screens - the registered screens
	     */
	    public function __construct( $screens = false )
		{
			// store any initial screens
			if( $screens && is_array( $screens ) )
				$this->screens = $screens;
		}


		/**
	     * Add styles to respective screen array
	     *
         * @since 0.8.0   
	     * @param array $style_array - contains parameters for our style object
	     */
		public function set_style( $style_array )
		{
			// default style setting values
			$defaults = array(
				'screen' => 'default',
				'selector' => '',
				'styles' => array(),
				'cb' => true
			);

			// merge our style with defaults
			$style_array = array_merge( $defaults, $style_array );

			// if a callback is set and false, exit
			if( isset( $style_array['cb'] ) && $style_array['cb'] !== true ) return;

			// get the screen name
			$screen = $style_array['screen'];

			// if previous screen styles exist, start with them. else use an empty array
			$styles = ( isset( $this->screens[$screen]['styles']) ) ? $this->screens[$screen]['styles'] : array();

			// remove the screen name from the array, we don't need it anymore
			unset( $style_array['screen'] );

			// add our new style to the existing styles
			array_push( $styles, $style_array );

			// update screen styles
			$this->screens[$screen]['styles'] = $styles;
		}


		/**
	     * Print opening of media query block, when applicable
	     *
         * @since 0.8.0   
		 * @param string $min - the min width of our query
		 * @param string $max - the max width of our query
	     */
		private function open_screen( $min = false, $max = false )
		{
			if( $min || $max )
			{
				echo '@media';

				if( $min )
				{
					printf( '(min-width: %s)', esc_attr( $min ) );
					if( $max ) echo ' and ';
				}

				if( $max ) printf( '(max-width: %s)', esc_attr( $max ) );

				echo '{';
			}
		}


		/**
	     * Assemble styles and return sanitized string
	     *
         * @since 0.8.0   
	     * @param array $screen_styles - all the styles of a particular screen
	     */
		private function get_screen_styles( $screen_styles )
		{
			$css = '';

			foreach ( $screen_styles as $s => $args )
			{
				$styles = $args['styles'];
				$styleblock = '';

				foreach ($styles as $style => $value)
				{
					if( 'echo' === $value && $style )
						$styleblock .= $style;

					elseif( $value && '' !== $value && $style )
						$styleblock .= str_replace( '%s', $value, $style );
				}

				if( '' !== $styleblock )
					$css .= sprintf( '%s{%s}', $args['selector'], $styleblock );
			}

			return $css;
		}


		/**
	     * Print closing tag of media query block, when applicable
	     *
         * @since 0.8.0   
		 * @param string $min - the min width of our query
		 * @param string $max - the max width of our query
	     */
		private function close_screen( $min = false, $max = false )
		{
			if( $min || $max ) echo '}';
		}


		/**
		 * Create a new screen
		 *
         * @since 0.8.0   
		 * @param string $screen_name - the name of the new screen
		 * @param array $args - parameters used to create the new screen
		 */
		public function add_screen( $screen_name, $args )
		{
			$this->screens[$screen_name] = $this->sanitize_screen_args( $args );
		}


		/**
	     * Sanitize screen args
	     *
         * @since 0.8.0   
		 * @param array $args - parameters to sanitize
	     */
		private function sanitize_screen_args( $args )
		{
			$sanitized = array( 'styles' => array() );
			$sanitized['min'] = ( isset( $args['min'] ) && '' !== $args['min'] ) ? $args['min'] : '';
			$sanitized['max'] = ( isset( $args['max'] ) && '' !== $args['max'] ) ? $args['max'] : '';
			return $sanitized;
		}


		/**
	     * Print the styles from all screens
	     *
         * @since 0.8.0   
		 * @param string $id - the id to add to the styleblock
	     */
		public function print_screens( $id = false )
		{
			// open styleblock
			if( $id )
				printf( '<style id="wprs-%s">', esc_attr( $id ) );

			// print styles for each screen
			foreach ( $this->screens as $screen => $s )
			{
				if( !empty( $s['styles']) )
				{
					// get styles for this screen
					$screen_styles = $this->get_screen_styles( $s['styles'] );

					// if there's no styles, don't bother with output. skip to next screen
					if( '' == $screen_styles ) continue;

					// set our min and max widths
					$min = ( isset($s['min']) && '' !== $s['min'] ) ? $s['min'] : false;
					$max = ( isset($s['max']) && '' !== $s['max'] ) ? $s['max'] : false;

					// open screen query
					$this->open_screen( $min, $max );

					// print screen styles
					echo wp_strip_all_tags( $screen_styles );

					// close screen query
					$this->close_screen( $min, $max );
				}

			} // end foreach

			// close styleblock
			if( $id )
				echo '</style>';
		}

	} // end class WP_Rootstrap_Styles
}