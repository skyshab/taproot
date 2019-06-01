<?php
/**
 * App service provider.
 *
 * Service providers are essentially the bootstrapping code for your theme.
 * They allow you to add bindings to the container on registration
 * and boot them once everything has been registered.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */


namespace Taproot\Providers;

use Hybrid\Tools\ServiceProvider;


/**
 * App service provider.
 *
 * @since  1.0.0
 * @access public
 */
class AppProvider extends ServiceProvider {


	/**
	 * Register classes and bind to the container
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function register() {

		// Bind the Laravel Mix manifest for cache-busting.
		$this->app->singleton( 'taproot/mix', function() {

            $file = get_theme_file_path( 'dist/mix-manifest.json' );
            $contents = file_exists( $file ) ? file( $file ) : false;

            return $contents ? json_decode( join( '', $contents ), true ) : null;
		});
    }

}
