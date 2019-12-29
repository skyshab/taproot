<?php
/**
 * Rootstrap service provider.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */

namespace Taproot\Providers;

use Hybrid\Tools\ServiceProvider;
use Rootstrap\Rootstrap                         as Controller;
use Rootstrap\Devices\Manager                   as RootstrapDevices;
use Rootstrap\Screens\Manager                   as RootstrapScreens;
use Rootstrap\Styles\Manager                    as RootstrapStyles;
use Rootstrap\Defaults\CustomizeDefaults        as RootstrapDefaults;
use Rootstrap\Tabs\Manager                      as RootstrapTabs;
use Rootstrap\Sequences\Manager                 as RootstrapSequences;
use Rootstrap\Panels\Manager                    as RootstrapPanels;

/**
 * App service provider.
 *
 * @since  1.0.0
 * @access public
 */
class Rootstrap extends ServiceProvider {

    /**
     * Register classes and bind to the container.
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function register() {

        /**
         * Rootstrap Core
         */
        $this->app->singleton( 'rootstrap',
            new Controller()
        );

        /**
         * Devices Manager
         */
        $this->app->singleton( 'rootstrap/devices',
            new RootstrapDevices()
        );

        /**
         * Screens Manager
         */
        $this->app->singleton( 'rootstrap/screens',
            new RootstrapScreens(
                $this->app->resolve('rootstrap/devices')->collection()
            )
        );

        /**
         * Rootstrap Styles Manager
         */
        $this->app->singleton( 'rootstrap/styles',
            new RootstrapStyles(
                // Stylesheet handle
                $this->app->resolve('styles/handle'),
                // Screens Collection
                $this->app->resolve('rootstrap/screens')->collection()
            )
        );

        /**
         * Rootstrap Defaults
         */
        $this->app->singleton( 'customize/defaults',
            new RootstrapDefaults()
        );

        /**
         * Rootstrap Tabs
         */
        $this->app->singleton( 'rootstrap/tabs',
            new RootstrapTabs()
        );

        /**
         * Rootstrap Sequences
         */
        $this->app->singleton( 'rootstrap/sequences',
            new RootstrapSequences()
        );

        /**
         * Rootstrap Panels
         */
        $this->app->singleton( 'rootstrap/panels',
            new RootstrapPanels()
        );
    }

    /**
     * Boot Modules
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function boot() {

        array_map( function( $module ) {
            $this->app->resolve($module)->boot();
        }, [
            'rootstrap',
            'rootstrap/devices',
            'rootstrap/styles',
            'rootstrap/tabs',
            'rootstrap/sequences',
            'rootstrap/panels',
        ]);

        // Add action for interacting with the customize defaults collection
        add_action( 'init', function() {
            $defaults = $this->app->resolve( 'customize/defaults' );
            do_action( 'customize/defaults', $defaults );
        }, PHP_INT_MAX );
    }
}
