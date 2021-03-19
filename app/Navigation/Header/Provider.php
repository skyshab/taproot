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

namespace Taproot\Navigation\Header;

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
        $this->app->singleton( 'navigation/header/hooks', Hooks::class );

        // Bind a single instance of the component functions class.
        $this->app->singleton( 'navigation/header/functions', Functions::class );

        // Bind customize component config
        $this->app->singleton( 'navigation/header/customize', function() {

            $component = new Component( ['id' => 'navigation'] );

            $component->section([
                'name'      => 'header',
                'title'     => __('Header Nav', 'taproot'),
                'controls'  => [
                    Customize\Header\Hide::class,
                    Customize\Header\Link_Color::class,
                    Customize\Header\Link_Color_Hover::class,
                    Customize\Header\Font_Family::class,
                    Customize\Header\Font_Styles::class,
                    Customize\Header\Font_Size::class,
                    Customize\Header\Height::class,
                    Customize\Header\Padding::class,
                    Customize\Header\Align::class,
                    Customize\Header\Dropdown_Background_Color::class,
                    Customize\Header\Dropdown_Link_Color::class,
                    Customize\Header\Dropdown_Link_Color_Hover::class
                ]
            ]);

            $component->section([
                'name'      => 'header-mobile',
                'title'     => __('Header Mobile', 'taproot'),
                'controls'  => [
                    Customize\Header_Mobile\Breakpoint::class,
                    Customize\Header_Mobile\Hide::class,
                    Customize\Header_Mobile\Type::class,
                    Customize\Header_Mobile\Icon_Size::class,
                    Customize\Header_Mobile\Icon_Color::class,
                    Customize\Header_Mobile\Background_Color::class,
                    Customize\Header_Mobile\Separator_Color::class,
                    Customize\Header_Mobile\Link_Color::class,
                    Customize\Header_Mobile\Link_Color_Hover::class,
                    Customize\Header_Mobile\Font_Styles::class,
                    Customize\Header_Mobile\Font_Size::class,
                    Customize\Header_Mobile\Line_Height::class,
                    Customize\Header_Mobile\Padding::class
                ]
            ]);

            $component->section([
                'name'      => 'header-fixed',
                'title'     => __('Header Fixed', 'taproot'),
                'controls'  => [
                    Customize\Header_Fixed\Enable::class,
                    Customize\Header_Fixed\Hide::class,
                    Customize\Header_Fixed\Link_Color::class,
                    Customize\Header_Fixed\Link_Color_Hover::class,
                    Customize\Header_Fixed\Font_Family::class,
                    Customize\Header_Fixed\Font_Styles::class,
                    Customize\Header_Fixed\Font_Size::class,
                    Customize\Header_Fixed\Height::class,
                    Customize\Header_Fixed\Padding::class,
                    Customize\Header_Fixed\Align::class,
                    Customize\Header_Fixed\Dropdown_Background_Color::class,
                    Customize\Header_Fixed\Dropdown_Link_Color::class,
                    Customize\Header_Fixed\Dropdown_Link_Color_Hover::class
                ]
            ]);

            $component->tab([
                'title' => __('Header Nav', 'taproot'),
                'sections' => [
                    'navigation--header'        => [ 'label' => 'default', 'hide' => false ],
                    'navigation--header-mobile' => [ 'label' => 'mobile', 'hide' => true ],
                    'navigation--header-fixed'  => [ 'label' => 'fixed', 'hide' => true ],
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
        $this->app->resolve( 'navigation/header/hooks' )->boot();

        // Get the customize components collection.
        $customize = $this->app->resolve( 'customize/components' );

        // Get the customize component.
        $component = $this->app->resolve( 'navigation/header/customize' );

        // Add customize component to collection.
        $customize->add( 'navigation/header', $component );
    }
}
