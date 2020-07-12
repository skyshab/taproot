<?php
/**
 * Component service provider.
 *
 * Bind classes to the container and boot once all components have been registered.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2020 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */

namespace Taproot\Components\Navigation;

use Hybrid\Tools\ServiceProvider;

/**
 * Component service provider class.
 *
 * @since  2.0.0
 * @access public
 */
class Component extends ServiceProvider {

    /**
     * Register classes and bind to the container.
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function register() {

        // Bind a single instance of our hooks class.
        $this->app->singleton( Hooks::class );

        // Bind a single instance of our customize component class.
        $this->app->singleton( Customize::class );

        // Bind a single instance of the component functions class.
        $this->app->singleton( 'navigation/functions', Functions::class );
    }

    /**
     * Boot class instances.
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function boot() {

        // Boot the component hooks.
        $this->app->resolve( Hooks::class )->boot();

        // Add customize component to collection.
        $this->app->resolve( 'customize/components' )->add( 'navigation', $this->app->resolve( Customize::class ) );
    }
}
