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

namespace Taproot\Navigation\Footer;

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
        $this->app->singleton( 'navigation/footer/hooks', Hooks::class );

        // Bind a single instance of the component functions class.
        $this->app->singleton( 'navigation/footer/functions', Functions::class );

        // Bind customize component config
        $this->app->singleton( 'navigation/footer/customize', function() {

            $component = new Component( ['id' => 'navigation'] );

            $component->section([
                'name'      => 'footer',
                'title'     => __('Footer Nav', 'taproot'),
                'controls'  => [
                    Customize\Footer\Hide::class,
                    Customize\Footer\Background_Color::class,
                    Customize\Footer\Link_Color::class,
                    Customize\Footer\Link_Color_Hover::class,
                    Customize\Footer\Font_Family::class,
                    Customize\Footer\Font_Styles::class,
                    Customize\Footer\Height::class,
                    Customize\Footer\Font_Size::class,
                    Customize\Footer\Padding::class,
                    Customize\Footer\Align::class,
                    Customize\Footer\Position::class
                ]
            ]);

            $component->section([
                'name'      => 'footer-mobile',
                'title'     => __('Container', 'taproot'),
                'controls'  => [
                    Customize\Footer_Mobile\Breakpoint::class,
                    Customize\Footer_Mobile\Hide::class,
                    Customize\Footer_Mobile\Font_Size::class,
                    Customize\Footer_Mobile\Line_Height::class,
                    Customize\Footer_Mobile\Align::class
                ]
            ]);

            $component->tab([
                'title' => __( 'Footer Nav', 'taproot' ),
                'sections' => [
                    'navigation--footer'        => [ 'label' => 'default', 'hide' => false ],
                    'navigation--footer-mobile' => [ 'label' => 'mobile', 'hide' => true ],
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
        $this->app->resolve( 'navigation/footer/hooks' )->boot();

        // Get the customize components collection.
        $customize = $this->app->resolve( 'customize/components' );

        // Get the customize component.
        $component = $this->app->resolve( 'navigation/footer/customize' );

        // Add customize component to collection.
        $customize->add( 'navigation/footer', $component );
    }
}
