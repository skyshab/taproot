<?php
/**
 * Fired during theme activation
 *
 * @package taproot
 * @since 0.8.0
 */

/**
 * Class that handles theme activation. 
 *
 * @since 0.8.0
 */
class Taproot_Activator
{
	/**
	 * Activate theme
	 *
	 * @since 0.8.0
	 */
	public static function activate()
	{
	    update_option( 'taproot_activation_notice', 'true' );
	}

} // end class taproot activator
