<?php
/**
 * Customizer service provider.
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

namespace Taproot\Customize;

use Hybrid\Tools\ServiceProvider;

/**
 * Customizer service provider class.
 *
 * @since  1.0.0
 * @access public
 */
class Provider extends ServiceProvider {


	/**
	 * Register classes and bind to the container
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function register() {

		// Bind a single instance of our customizer class.
        $this->app->singleton( Customize::class );

	}

	/**
	 * Boot Class Instances
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function boot() {

		// Boot the customizer class instance.
        $this->app->resolve( Customize::class )->boot();

	}
}
