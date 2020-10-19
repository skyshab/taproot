<?php
/**
 * Rootstrap service provider.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2020 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */

namespace Taproot\Rootstrap;

use Hybrid\Tools\ServiceProvider;

/**
 * App service provider.
 *
 * @since  2.0.0
 * @access public
 */
class Provider extends ServiceProvider {

    /**
     * Register classes and bind to the container.
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function register() {

        // Rootstrap Core
        $this->app->singleton( 'rootstrap', \Rootstrap\Rootstrap::class );

        // Devices Manager
        $this->app->singleton( 'rootstrap/devices', \Rootstrap\Devices\Manager::class );

        // Screens Manager
        $this->app->singleton( 'rootstrap/screens', function() {

            return new \Rootstrap\Screens\Manager(
                $this->app->resolve('rootstrap/devices')->collection()
            );
        });

        // Styles Manager
        $this->app->singleton( 'rootstrap/styles', function() {

            return new \Rootstrap\Styles\Manager(
                // Stylesheet handle
                $this->app->resolve('styles/handle'),
                // Screens Collection
                $this->app->resolve('rootstrap/screens')->collection()
            );
        });

        // Defaults
        $this->app->singleton( 'rootstrap/defaults', \Rootstrap\Defaults\CustomizeDefaults::class );

        // Tabs
        $this->app->singleton( 'rootstrap/tabs', \Rootstrap\Tabs\Manager::class );

        // Sequences
        $this->app->singleton( 'rootstrap/sequences', \Rootstrap\Sequences\Manager::class );

        // Panels
        $this->app->singleton( 'rootstrap/panels', \Rootstrap\Panels\Manager::class );

        // Hooks
        $this->app->singleton( 'rootstrap/hooks', Hooks::class );
    }

    /**
     * Boot Modules
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function boot() {

        // Boot the Rootstrap modules.
        array_map( function( $module ) {
            $this->app->resolve($module)->boot();
        }, [
            'rootstrap',
            'rootstrap/devices',
            'rootstrap/styles',
            'rootstrap/tabs',
            'rootstrap/sequences',
            'rootstrap/panels',
            'rootstrap/hooks',
        ]);
    }
}
