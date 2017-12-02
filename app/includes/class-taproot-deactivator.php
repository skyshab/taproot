<?php
/**
 * Fired during plugin deactivation
 *
 * @package taproot/includes
 * @since 0.8.0
 */

/**
 * This class defines all code necessary to run during the plugin's deactivation..
 *
 * @since 0.8.0
 */
class Taproot_Deactivator
{
	/**
	 * Deactivate theme
	 *
	 * @since 0.8.0
	 */
	public static function deactivate()
	{
		delete_option('taproot_activation_notice'); 
	}

} // end class taproot deactivator
