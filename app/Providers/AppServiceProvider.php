<?php
/**
 * App service provider.
 *
 * Service providers are essentially the bootstrapping code for your theme.
 * They allow you to add bindings to the container on registration and boot them
 * once everything has been registered.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2018 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */

namespace Taproot\Providers;

use Hybrid\Tools\ServiceProvider;
use Rootstrap\Rootstrap;
use Taproot\Customize\Customize;
use Taproot\Template\Template;
use Taproot\Admin\Editor\Editor;

/**
 * App service provider.
 *
 * @since  1.0.0
 * @access public
 */
class AppServiceProvider extends ServiceProvider {


	/**
	 * Register classes and bind to the container
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function register() {

		// Bind a single instance of the main Roostrap class.
		$this->app->singleton( Rootstrap::class, Rootstrap::instance() );

		// Bind a single instance of our customizer class.
        $this->app->singleton( Customize::class );
        
        // Bind SVG icons to our icons class
        $this->app->bind( 'Taproot\Template\Icons', 'Taproot\Template\Icons\SVG' );        

		// Bind the Laravel Mix manifest for cache-busting.
		$this->app->singleton( 'taproot/mix', function() {

			$file = get_theme_file_path( 'dist/mix-manifest.json' );

			return file_exists( $file ) ? json_decode( file_get_contents( $file ), true ) : null;
		} );
	}

	/**
	 * Boot Class Instances
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function boot() {

        // Boot the Rootstrap class instance.
		$this->app->resolve( Rootstrap::class )->boot();

		// Boot the customizer class instance.
        $this->app->resolve( Customize::class )->boot();
        
		// Boot the Editor class
        $this->app->resolve( Editor::class )->boot();
        
		// Boot the Template class
        $this->app->resolve( Template::class )->boot();         

	}
}
