<?php
/**
 * Component service provider.
 *
 * Bind classes to the container and boot once all components have been registered.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright Copyright (c) 2020, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Breadcrumbs;

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
        $this->app->singleton( 'breadcrumbs/hooks', Hooks::class );

        // Bind a single instance of the component template class.
        $this->app->singleton( 'breadcrumbs/template', Template::class );

        // Bind a single instance of the component template class.
        $this->app->singleton( 'breadcrumbs/functions', Functions::class );

        // Bind customize component config
        $this->app->singleton( 'breadcrumbs/customize', function() {

            $component = new Component( ['id' => 'navigation'] );

            $component->section([
                'name'      => 'breadcrumbs',
                'title'     => __('Breadcrumbs', 'taproot'),
                'controls'  => [
                    Customize\Align::class,
                    Customize\Has_Separators::class,
                    Customize\Font_Size::class,
                    Customize\Text_Color::class,
                    Customize\Link_Color_Hover::class,
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

        // Boot the customizer class instance
        $this->app->resolve( 'breadcrumbs/hooks' )->boot();

        // Get the customize components collection.
        $customize = $this->app->resolve( 'customize/components' );

        // Get the customize component.
        $component = $this->app->resolve( 'breadcrumbs/customize' );

        // Add customize component to collection.
        $customize->add( 'breadcrumbs', $component );
    }
}
