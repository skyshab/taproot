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

namespace Taproot\Header;

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
        $this->app->singleton( 'header/hooks', Hooks::class );

        // Bind a single instance of the component template class.
        $this->app->singleton( 'header/template', Template::class );

        // Bind a single instance of the component functions class.
        $this->app->singleton( 'header/functions', Functions::class );

        // Bind a single instance of our customize component class.
        $this->app->singleton( 'header/customize', function() {

            $component = new Component([
                'id'        => 'header',
                'title'     => __( 'Header', 'taproot' ),
                'priority'  => 30,
            ]);

            $component->section([
                'name'      => 'styles',
                'title'     => __('Header Styles', 'taproot'),
                'controls'  => [
                    Customize\Styles\Background_Color::class,
                    Customize\Styles\Text_Color::class,
                    Customize\Styles\Padding::class
                ]
            ]);

            $component->section([
                'name'      => 'fixed',
                'title'     => __('Header Fixed', 'taproot'),
                'controls'  => [
                    Customize\Styles_Fixed\Is_Fixed::class,
                    Customize\Styles_Fixed\Fixed_Type::class,
                    Customize\Styles_Fixed\Background_Color::class,
                    Customize\Styles_Fixed\Text_Color::class,
                    Customize\Styles_Fixed\Padding::class
                ]
            ]);

            $component->section([
                'name'      => 'layout',
                'title'     => __('Layout', 'taproot'),
                'controls'  => [ Customize\Layout\Layout::class ]
            ]);

            $component->section([
                'name'      => 'image',
                'title'     => __('Image', 'taproot'),
                'controls'  => [
                    Customize\Image\Header_Image::class,
                    Customize\Image\Height::class,
                    Customize\Image\Overlay_Color::class,
                    Customize\Image\Overlay_Opacity::class,
                    Customize\Image\Text_Color::class,
                ]
            ]);

            $component->section([
                'name'      => 'logo',
                'title'     => __('Logo', 'taproot'),
                'controls'  => [
                    Customize\Logo\Custom_Logo::class,
                    Customize\Logo\Width::class,
                    Customize\Logo\Gutter::class
                ]
            ]);

            $component->section([
                'name'      => 'logo-fixed',
                'title'     => __('Logo', 'taproot'),
                'controls'  => [
                    Customize\Logo_Fixed\Hide::class,
                    Customize\Logo_Fixed\Width::class,
                    Customize\Logo_Fixed\Gutter::class
                ]
            ]);

            $component->section([
                'name'      => 'title',
                'title'     => __('Title', 'taproot'),
                'controls'  => [
                    Customize\Title\Blog_Name::class,
                    Customize\Title\Enable::class,
                    Customize\Title\Hide::class,
                    Customize\Title\Color::class,
                    Customize\Title\Font_Family::class,
                    Customize\Title\Font_Styles::class,
                    Customize\Title\Font_Size::class,
                    Customize\Title\Line_Height::class
                ]
            ]);

            $component->section([
                'name'      => 'title-fixed',
                'title'     => __('Title', 'taproot'),
                'controls'  => [
                    Customize\Title_Fixed\Hide::class,
                    Customize\Title_Fixed\Color::class,
                    Customize\Title_Fixed\Font_Size::class,
                    Customize\Title_Fixed\Line_Height::class
                ]
            ]);

            $component->section([
                'name'      => 'tagline',
                'title'     => __('Tagline', 'taproot'),
                'controls'  => [
                    Customize\Tagline\Blog_Description::class,
                    Customize\Tagline\Enable::class,
                    Customize\Tagline\Hide::class,
                    Customize\Tagline\Color::class,
                    Customize\Tagline\Font_Family::class,
                    Customize\Tagline\Font_Styles::class,
                    Customize\Tagline\Font_Size::class,
                    Customize\Tagline\Line_Height::class,
                    Customize\Tagline\Gutter::class,
                ]
            ]);

            $component->section([
                'name'      => 'tagline-fixed',
                'title'     => __('Tagline', 'taproot'),
                'controls'  => [
                    Customize\Tagline_Fixed\Hide_Tagline::class,
                    Customize\Tagline_Fixed\Color::class,
                    Customize\Tagline_Fixed\Font_Size::class,
                    Customize\Tagline_Fixed\Line_Height::class,
                    Customize\Tagline_Fixed\Gutter::class,
                ]
            ]);

            $component->section([
                'name'      => 'content',
                'title'     => __('Content', 'taproot'),
                'controls'  => [ Customize\Content\Min_Height::class ]
            ]);

            $component->tab([
                'title' => __('Header Styles', 'taproot'),
                'sections' => [
                    'header--styles' => [ 'label' => __('default', 'taproot'), 'hide' => false ],
                    'header--fixed' => [ 'label' => __('fixed', 'taproot'), 'hide' => true ],
                ],
            ]);

            $component->tab([
                'title' => __('Logo', 'taproot'),
                'sections' => [
                    'header--logo' => [ 'label' => __('default', 'taproot'), 'hide' => false ],
                    'header--logo-fixed' => [ 'label' => __('fixed', 'taproot'), 'hide' => true ],
                ],
            ]);

            $component->tab([
                'title' => __('Title', 'taproot'),
                'sections' => [
                    'header--title' => [ 'label' => __('default', 'taproot'), 'hide' => false ],
                    'header--title-fixed' => [ 'label' => __('fixed', 'taproot'), 'hide' => true ],
                ],
            ]);

            $component->tab([
                'title' => __('Tagline', 'taproot'),
                'sections' => [
                    'header--tagline' => [ 'label' => __('default', 'taproot'), 'hide' => false ],
                    'header--tagline-fixed' => [ 'label' => __('fixed', 'taproot'), 'hide' => true ],
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

        // Boot the component hooks.
        $this->app->resolve( 'header/hooks' )->boot();

        // Get the customize components collection.
        $customize = $this->app->resolve( 'customize/components' );

        // Get the customize component.
        $component = $this->app->resolve( 'header/customize' );

        // Add customize component to collection.
        $customize->add( 'header', $component );
    }
}
