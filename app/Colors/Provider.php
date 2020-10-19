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

namespace Taproot\Colors;

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
        $this->app->singleton( 'colors/hooks', Hooks::class );

        // Bind a single instance of the component functions class.
        $this->app->singleton( 'colors/functions', Functions::class );

        // Bind customize component config
        $this->app->singleton( 'colors/customize', function() {

            $component = new Component([
                'id' => 'colors',
                'title' => __('Colors', 'taproot')
            ]);

            $component->section([
                'id'        => 'colors',
                'priority'  => 50,
                'controls'  => [
                    Customize\Accent::class,
                    Customize\Accent_Contrast::class,
                    Customize\Meta_Light::class,
                    Customize\Meta_Medium::class,
                    Customize\Meta_Dark::class,
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
        $this->app->resolve( 'colors/hooks' )->boot();

        // Get the customize components collection.
        $customize = $this->app->resolve( 'customize/components' );

        // Get the customize component.
        $component = $this->app->resolve( 'colors/customize' );

        // Add customize component to collection.
        $customize->add( 'colors', $component );
    }
}
