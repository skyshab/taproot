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

namespace Taproot\Navigation\Navbar;

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
        $this->app->singleton( 'navigation/navbar/hooks', Hooks::class );

        // Bind a single instance of the component functions class.
        $this->app->singleton( 'navigation/navbar/functions', Functions::class );

        // Bind customize component config
        $this->app->singleton( 'navigation/navbar/customize', function() {

            $component = new Component( ['id' => 'navigation'] );

            $component->section([
                'name'      => 'navbar',
                'title'     => __('Navbar', 'taproot'),
                'controls'  => [
                    Customize\Navbar\Hide::class,
                    Customize\Navbar\Background_Color::class,
                    Customize\Navbar\Line_Height::class,
                    Customize\Navbar\Align::class,
                    Customize\Navbar\Font_Family::class,
                    Customize\Navbar\Font_Styles::class,
                    Customize\Navbar\Link_Color::class,
                    Customize\Navbar\Link_Color_Hover::class,
                    Customize\Navbar\Font_Size::class,
                    Customize\Navbar\Padding::class,
                    Customize\Navbar\Dropdown_Background_Color::class,
                    Customize\Navbar\Dropdown_Link_Color::class,
                    Customize\Navbar\Dropdown_Link_Color_Hover::class
                ]
            ]);

            $component->section([
                'name'      => 'navbar-mobile',
                'title'     => __('Navbar Mobile', 'taproot'),
                'controls'  => [
                    Customize\Navbar_Mobile\Breakpoint::class,
                    Customize\Navbar_Mobile\Hide::class,
                    Customize\Navbar_Mobile\Type::class,
                    Customize\Navbar_Mobile\Height::class,
                    Customize\Navbar_Mobile\Toggle_Side::class,
                    Customize\Navbar_Mobile\Icon_Color::class,
                    Customize\Navbar_Mobile\Icon_Size::class,
                    Customize\Navbar_Mobile\Font_Styles::class,
                    Customize\Navbar_Mobile\Background_Color::class,
                    Customize\Navbar_Mobile\Separator_Color::class,
                    Customize\Navbar_Mobile\Link_Color::class,
                    Customize\Navbar_Mobile\Link_Color_Hover::class,
                    Customize\Navbar_Mobile\Font_Size::class,
                    Customize\Navbar_Mobile\Line_Height::class,
                    Customize\Navbar_Mobile\Padding::class
                ]
            ]);

            $component->section([
                'name'      => 'navbar-fixed',
                'title'     => __('Navbar Fixed', 'taproot'),
                'controls'  => [
                    Customize\Navbar_Fixed\Enable::class,
                    Customize\Navbar_Fixed\Hide::class,
                    Customize\Navbar_Fixed\Background_Color::class,
                    Customize\Navbar_Fixed\Height::class,
                    Customize\Navbar_Fixed\Align::class,
                    Customize\Navbar_Fixed\Font_Family::class,
                    Customize\Navbar_Fixed\Font_Styles::class,
                    Customize\Navbar_Fixed\Link_Color::class,
                    Customize\Navbar_Fixed\Link_Color_Hover::class,
                    Customize\Navbar_Fixed\Font_Size::class,
                    Customize\Navbar_Fixed\Padding::class,
                    Customize\Navbar_Fixed\Dropdown_Background_Color::class,
                    Customize\Navbar_Fixed\Dropdown_Link_Color::class,
                    Customize\Navbar_Fixed\Dropdown_Link_Color_Hover::class
                ]
            ]);

            $component->tab([
                'title' => __('Navbar', 'taproot'),
                'sections' => [
                    'navigation--navbar'        => [ 'label' => 'default', 'hide' => false ],
                    'navigation--navbar-mobile' => [ 'label' => 'mobile', 'hide' => true ],
                    'navigation--navbar-fixed'  => [ 'label' => 'fixed', 'hide' => true ],
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
        $this->app->resolve( 'navigation/navbar/hooks' )->boot();

        // Get the customize components collection.
        $customize = $this->app->resolve( 'customize/components' );

        // Get the customize component.
        $component = $this->app->resolve( 'navigation/navbar/customize' );

        // Add customize component to collection.
        $customize->add( 'navigation/navbar', $component );
    }
}
