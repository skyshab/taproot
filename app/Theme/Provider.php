<?php
/**
 * Theme service provider.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2020 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */

namespace Taproot\Theme;

use Hybrid\Tools\ServiceProvider;

/**
 * App service provider.
 *
 * @since  1.0.0
 * @access public
 */
class Provider extends ServiceProvider {

    /**
     * Register classes and bind to the container.
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function register() {

        // Bind a single instance of our hooks class.
        $this->app->singleton( 'theme/hooks', Hooks::class );

        // Bind theme stylesheet handle
        $this->app->instance( 'styles/handle', 'taproot-screen' );

        // Bind the Laravel Mix manifest for cache-busting
        $this->app->singleton( 'taproot/mix', function() {

            $file = get_theme_file_path( 'dist/mix-manifest.json' );
            $contents = file_exists( $file ) ? file( $file ) : false;

            return $contents ? json_decode( join( '', $contents ), true ) : null;
        });
    }

    /**
     * Boot Class Instances.
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function boot() {

        // Boot the theme hooks.
        $this->app->resolve( 'theme/hooks' )->boot();
    }
}
