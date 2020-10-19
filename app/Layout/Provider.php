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

namespace Taproot\Layout;

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
        $this->app->singleton( 'layout/hooks', Hooks::class );

        // Bind a single instance of the component functions class.
        $this->app->singleton( 'layout/functions', Functions::class );

        // Bind customize component config
        $this->app->singleton( 'layout/customize', function() {

            $component = new Component([
                'id' => 'layout',
                'title' => __( 'Layout', 'taproot' ),
                'priority' => 20
            ]);

            $component->section([
                'name'      => 'content',
                'title'     => __('Content', 'taproot'),
                'controls'  => [
                    Customize\Content\Max_Width::class,
                    Customize\Content\Spacing::class
                ]
            ]);

            $component->section([
                'name'      => 'container',
                'title'     => __('Container', 'taproot'),
                'controls'  => [
                    Customize\Container\Width::class,
                    Customize\Container\Max_Width::class
                ]
            ]);

            return $component;
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
        $this->app->resolve( 'layout/hooks' )->boot();

        // Get the customize components collection.
        $customize = $this->app->resolve( 'customize/components' );

        // Get the customize component.
        $component = $this->app->resolve( 'layout/customize' );

        // Add customize component to collection.
        $customize->add( 'layout', $component );
    }
}
