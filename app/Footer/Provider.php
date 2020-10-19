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
 * @copyright 2020 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */

namespace Taproot\Footer;

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

        // Bind an instance of our hooks class.
        $this->app->singleton( 'footer/hooks',      Hooks::class );

        // Bind an instance of the component template class.
        $this->app->singleton( 'footer/template',   Template::class );

        // Bind an instance of the component functions class.
        $this->app->singleton( 'footer/functions',  Functions::class );

        // Bind an instance of our customize component class.
        $this->app->singleton( 'footer/customize',  function() {

            $component = new Component([
                'id'        => 'footer',
                'title'     => __( 'Footer', 'taproot' ),
                'priority'  => 40,
            ]);

            $component->section([
                'name'      => 'footer',
                'title'     => __('Footer Styles', 'taproot'),
                'controls'  => [
                    Customize\Footer\Is_Fixed::class,
                    Customize\Footer\Background_Color::class,
                    Customize\Footer\Text_Color::class,
                    Customize\Footer\Link_Color_Hover::class,
                    Customize\Footer\Padding::class
                ]
            ]);

            $component->section([
                'name'      => 'widgets',
                'title'     => __('Footer Widgets', 'taproot'),
                'controls'  => [
                    Customize\Widgets\Layout::class,
                    Customize\Widgets\Heading_Color::class,
                    Customize\Widgets\Text_Color::class,
                    Customize\Widgets\Link_Color::class,
                    Customize\Widgets\Link_Color_Hover::class,
                    Customize\Widgets\Font_Size::class,
                    Customize\Widgets\Line_Height::class,
                    Customize\Widgets\Title_Font_Size::class,
                    Customize\Widgets\Title_Line_Height::class,
                    Customize\Widgets\Gutter::class
                ]
            ]);

            $component->section([
                'name'      => 'bottom-bar',
                'title'     => __('Bottom Bar', 'taproot'),
                'controls'  => [
                    Customize\Bottom_Bar\Background_Color::class,
                    Customize\Bottom_Bar\Text_Color::class,
                    Customize\Bottom_Bar\Link_Color_Hover::class,
                    Customize\Bottom_Bar\Content::class
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
        $this->app->resolve( 'footer/hooks' )->boot();

        // Get the customize components collection.
        $customize = $this->app->resolve( 'customize/components' );

        // Get the customize component.
        $component = $this->app->resolve( 'footer/customize' );

        // Add customize component to collection.
        $customize->add( 'footer', $component );
    }
}
