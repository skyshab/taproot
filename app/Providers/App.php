<?php
/**
 * App service provider.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2020 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */

namespace Taproot\Providers;

use Hybrid\Tools\ServiceProvider;
use function Taproot\Tools\asset;

/**
 * App service provider.
 *
 * @since  1.0.0
 * @access public
 */
class App extends ServiceProvider {

    /**
     * Register classes and bind to the container.
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function register() {

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
     * Boot Class Instances
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function boot() {

        // Enqueue theme resources
        add_action( 'wp_enqueue_scripts', function() {

            // Enqueue theme styles
            wp_enqueue_style( $this->app->resolve( 'styles/handle' ), asset( 'css/theme.css' ), null, null );

            // Enqueue theme scripts
            wp_enqueue_script( 'taproot-app', asset( 'js/app.js' ), null, null, true );
        });
    }
}
