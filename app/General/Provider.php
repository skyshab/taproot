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

namespace Taproot\General;

use Hybrid\Tools\ServiceProvider;
use Taproot\Customize\Component;

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

        // Bind a single instance of our hooks class.
        $this->app->singleton( 'general/hooks', Hooks::class );;

        // Bind customize component for general panel
        $this->app->singleton( 'general/customize', function() {

            return new Component([
                'id'        => 'general',
                'title'     => __('General', 'taproot') ,
                'priority'  => 10,
            ]);
        });
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
        $this->app->resolve( 'general/hooks' )->boot();

        // Get the customize component collection.
        $customize = $this->app->resolve( 'customize/components' );

        // Get the customize component
        $component = $this->app->resolve( 'general/customize' );

        // Add the customize component to the collection.
        $customize->add( 'general/customize', $component );
    }
}
