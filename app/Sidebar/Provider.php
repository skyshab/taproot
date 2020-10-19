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

namespace Taproot\Sidebar;

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
        $this->app->singleton( 'sidebar/hooks', Hooks::class );

        // Bind customize component config
        $this->app->singleton( 'sidebar/customize', function() {

            $component = new Component([
                'id' => 'sidebar',
                'title' => __( 'Sidebar', 'taproot' ),
                'priority' => 100
            ]);

            $component->section([
                'name'      => 'sidebar',
                'title'     => __('Sidebar', 'taproot'),
                'controls'  => [
                    Customize\Sidebar\Min_Width::class,
                    Customize\Sidebar\Font_Size::class,
                    Customize\Sidebar\Line_Height::class
                ]
            ]);

            $component->section([
                'name'      => 'colors',
                'title'     => __('Sidebar Colors', 'taproot'),
                'controls'  => [
                    Customize\Colors\Background_Color::class,
                    Customize\Colors\Text_Color::class,
                    Customize\Colors\Accent::class,
                    Customize\Colors\Accent_Contrast::class,
                    Customize\Colors\Link_Color::class,
                    Customize\Colors\Link_Color_Hover::class
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
        $this->app->resolve( 'sidebar/hooks' )->boot();

        // Get the customize components collection.
        $customize = $this->app->resolve( 'customize/components' );

        // Get the customize component.
        $component = $this->app->resolve( 'sidebar/customize' );

        // Add customize component to collection.
        $customize->add( 'sidebar', $component );
    }
}
