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
use Rootstrap\Rootstrap;
use Rootstrap\Customize\Manager as CustomizeManager;
use Rootstrap\Customize\Defaults\Manager as CustomizeDefaultsManager;

/**
 * App service provider.
 *
 * @since  1.0.0
 * @access public
 */
class RootstrapProvider extends ServiceProvider {


	/**
	 * Register classes and bind to the container
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function register() {

		$this->app->singleton( Rootstrap::class, Rootstrap::instance() );
		$this->app->singleton( CustomizeManager::class, CustomizeManager::instance() );
		$this->app->singleton( CustomizeDefaultsManager::class, CustomizeDefaultsManager::instance() );

	}


	/**
	 * Boot Class Instances
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function boot() {

        $this->app->resolve( Rootstrap::class )->boot();
        $this->app->resolve( CustomizeManager::class )->boot();
        $this->app->resolve( CustomizeDefaultsManager::class )->boot();

    }

}
