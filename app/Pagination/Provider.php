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

namespace Taproot\Pagination;

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

        // Bind a single instance of our Hooks class.
        $this->app->singleton( 'pagination/hooks', Hooks::class );

        // Bind a single instance of the component functions class.
        $this->app->singleton( 'pagination/functions', Functions::class );

        // Bind customize component config
        $this->app->singleton( 'pagination/customize', function() {

            $component = new Component( ['id' => 'navigation'] );

            $component->section([
                'name'      => 'pagination',
                'title'     => __('Pagination', 'taproot'),
                'controls'  => [
                    Customize\Pagination\Font_Size::class,
                    Customize\Pagination\Is_Rounded::class,
                    Customize\Pagination\Spacing::class,
                    Customize\Pagination\Background_Color::class,
                    Customize\Pagination\Link_Color::class,
                    Customize\Pagination\Text_Color::class,
                ]
            ]);

            $component->section([
                'name'      => 'pagination-hover',
                'title'     => __('Pagination', 'taproot'),
                'controls'  => [
                    Customize\Pagination_Hover\Background_Color::class,
                    Customize\Pagination_Hover\Text_Color::class,
                    Customize\Pagination_Hover\Link_Color::class
                ]
            ]);

            $component->tab([
                'title' => __('Pagination', 'taproot'),
                'sections' => [
                    "navigation--pagination"        => [ 'label' => 'Default', 'hide' => false ],
                    "navigation--pagination-hover"  => [ 'label' => 'Hover', 'hide' => true ],
                ],
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

        // Boot the Hooks instance.
        $this->app->resolve( 'pagination/hooks' )->boot();

        // Get the customize components collection.
        $customize = $this->app->resolve( 'customize/components' );

        // Get the customize component.
        $component = $this->app->resolve( 'pagination/customize' );

        // Add customize component to collection.
        $customize->add( 'pagination', $component );
    }
}
