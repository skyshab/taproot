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

namespace Taproot\Navigation\Top;

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
        $this->app->singleton( 'navigation/top/hooks', Hooks::class );

        // Bind a single instance of the component functions class.
        $this->app->singleton( 'navigation/top/functions', Functions::class );

        // Bind customize component config
        $this->app->singleton( 'navigation/top/customize', function() {

            $component = new Component( ['id' => 'navigation'] );

            $component->section([
                'name'      => 'top',
                'title'     => __('Top Nav', 'taproot'),
                'controls'  => [
                    Customize\Top\Hide::class,
                    Customize\Top\Background_Color::class,
                    Customize\Top\Align::class,
                    Customize\Top\Font_Family::class,
                    Customize\Top\Font_Styles::class,
                    Customize\Top\Link_Color::class,
                    Customize\Top\Link_Color_Hover::class,
                    Customize\Top\Height::class,
                    Customize\Top\Font_Size::class,
                    Customize\Top\Padding::class
                ]
            ]);

            $component->section([
                'name'      => 'top-mobile',
                'title'     => __('Top Nav', 'taproot'),
                'controls'  => [
                    Customize\Top_Mobile\Breakpoint::class,
                    Customize\Top_Mobile\Hide::class,
                    Customize\Top_Mobile\Font_Size::class,
                    Customize\Top_Mobile\Line_Height::class,
                    Customize\Top_Mobile\Align::class
                ]
            ]);

            $component->section([
                'name'      => 'top-fixed',
                'title'     => __('Top Nav', 'taproot'),
                'controls'  => [
                    Customize\Top_Fixed\Enable::class,
                    Customize\Top_Fixed\Hide::class,
                    Customize\Top_Fixed\Background_Color::class,
                    Customize\Top_Fixed\Link_Color::class,
                    Customize\Top_Fixed\Link_Color_Hover::class,
                    Customize\Top_Fixed\Font_Family::class,
                    Customize\Top_Fixed\Font_Styles::class,
                    Customize\Top_Fixed\Height::class,
                    Customize\Top_Fixed\Font_Size::class,
                    Customize\Top_Fixed\Padding::class,
                    Customize\Top_Fixed\Align::class
                ]
            ]);

            $component->tab([
                'title' => __('Top Nav', 'taproot'),
                'sections' => [
                    'navigation--top'        => [ 'label' => 'default', 'hide' => false ],
                    'navigation--top-mobile' => [ 'label' => 'mobile', 'hide' => true ],
                    'navigation--top-fixed'  => [ 'label' => 'fixed', 'hide' => true ],
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
        $this->app->resolve( 'navigation/top/hooks' )->boot();

        // Get the customize components collection.
        $customize = $this->app->resolve( 'customize/components' );

        // Get the customize component.
        $component = $this->app->resolve( 'navigation/top/customize' );

        // Add customize component to collection.
        $customize->add( 'navigation/top', $component );
    }
}
