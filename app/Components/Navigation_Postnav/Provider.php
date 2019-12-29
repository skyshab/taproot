<?php
/**
 * Component service provider.
 *
 * Bind classes to the container and boot once all components have been registered.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */

namespace Taproot\Components\Navigation_Postnav;

use Hybrid\Tools\ServiceProvider;
use Taproot\Components\Navigation_Postnav\Customize\Customize;

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

        // Bind our postnav class.
        $this->app->bind( 'postnav', Postnav::class );

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

        // Add customize component to collection.
        $this->app->resolve( 'customize/components' )->add( 'navigation/postnav', $this->app->resolve( Customize::class ) );
    }
}
