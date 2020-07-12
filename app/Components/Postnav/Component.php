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

namespace Taproot\Components\Postnav;

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

        // Bind a single instance of our Hooks class.
        $this->app->singleton( Hooks::class );

        // Bind our postnav template class.
        $this->app->bind( 'postnav/template', Template::class );

        // Bind our postnav functions class.
        $this->app->bind( 'postnav/functions', Functions::class );
    }

    /**
     * Boot class instances.
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function boot() {

        // Boot the Hooks instance.
        $this->app->resolve( Hooks::class )->boot();
    }
}
