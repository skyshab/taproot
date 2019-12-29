<?php
/**
 * Component: Footer service provider.
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

namespace Taproot\Components\Footer;

use Hybrid\Tools\ServiceProvider;
use Taproot\Components\Footer\Customize\Customize;

/**
 * Component service provider class.
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

        // Bind a single instance of our template class.
        $this->app->singleton( Controller::class );

        // Bind a single instance of our customize component class.
        $this->app->singleton( Customize::class );
    }

    /**
     * Boot class instances.
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function boot() {

        // Boot the controller class instance.
        $this->app->resolve( Controller::class )->boot();

        // Add customize component to collection.
        $this->app->resolve( 'customize/components' )->add( 'footer', $this->app->resolve( Customize::class ) );
    }
}
