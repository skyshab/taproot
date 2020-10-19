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

namespace Taproot\Post_Types\Product;

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
        $this->app->singleton( 'post-type/product/hooks', Hooks::class );

        // Bind an instance of our functions class.
        $this->app->singleton( 'post-type/product/functions', Functions::class );

        // Bind an instance of our template class.
        $this->app->singleton( 'post-type/product/template', Template::class );

        // Bind customize component for product post type.
        $this->app->singleton( 'post-type/product', function() {

            $component =  new Component([
                'id'        => 'post-type-product',
                'title'     => __('Products', 'taproot') ,
                'panel'     => 'post-types',
                'priority'  => 30,
            ]);

            return $component;
        });

        // Bind customize component for product post type.
        $this->app->singleton( 'post-type/product/single', function() {

            $component = new Component([
                'id'        => 'product',
                'title'     => __('Product', 'taproot') ,
                'panel'     => 'post-type-product',
                'post_type' => 'product'
            ]);

            $component->section([
                'name'      => 'layout',
                'title'     => __('Layout', 'taproot'),
                'controls'  => [
                    \Taproot\Sidebar\Customize\Settings\Layout::class,
                    \Taproot\Post_Types\Customize\Content_Layout::class
                ]
            ]);

            $component->section([
                'name'      => 'title',
                'title'     => __('Title', 'taproot'),
                'controls'  => [
                    \Taproot\Post_Types\Customize\Single\Title\Text_Color::class,
                    \Taproot\Post_Types\Customize\Single\Title\Font_Styles::class,
                    \Taproot\Post_Types\Customize\Single\Title\Font_Size::class,
                    \Taproot\Post_Types\Customize\Single\Title\Line_Height::class
                ]
            ]);

            $component->section([
                'name'      => 'breadcrumbs',
                'title'     => __('Breadcrumbs', 'taproot'),
                'controls'  => [
                    \Taproot\Breadcrumbs\Customize\Enable_Breadcrumbs::class
                ]
            ]);

            $component->section([
                'name'      => 'postnav',
                'title'     => __('Postnav', 'taproot'),
                'controls'  => [
                    \Taproot\Postnav\Customize\Enable_Postnav::class
                ]
            ]);

            return $component;
        });

        // Bind customize component for product post type.
        $this->app->singleton( 'post-type/product/archive', function() {

            $component = new Component([
                'id'        => 'product--archive',
                'title'     => __('Product Archive', 'taproot') ,
                'panel'     => 'post-type-product',
                'post_type' => 'product'
            ]);

            $component->section([
                'name'      => 'layout',
                'title'     => __('Layout', 'taproot'),
                'controls'  => [
                    \Taproot\Sidebar\Customize\Settings\Layout::class,
                    \Taproot\Post_Types\Customize\Content_Layout::class
                ]
            ]);

            $component->section([
                'name'      => 'title',
                'title'     => __('Title', 'taproot'),
                'controls'  => [
                    \Taproot\Post_Types\Customize\Archive\Title\Text_Color::class,
                    \Taproot\Post_Types\Customize\Archive\Title\Font_Styles::class,
                    \Taproot\Post_Types\Customize\Archive\Title\Font_Size::class,
                    \Taproot\Post_Types\Customize\Archive\Title\Line_Height::class,
                ]
            ]);

            return $component;
        });

        // Bind customize component for cart.
        $this->app->singleton( 'post-type/product/cart', function() {

            $component = new Component([
                'id'        => 'product--cart',
                'title'     => __('Cart', 'taproot') ,
                'panel'     => 'post-type-product',
                'post_type' => 'product'
            ]);

            $component->section([
                'name'      => 'widget',
                'title'     => __('Cart Widget', 'taproot'),
                'controls'  => [
                    Customize\Menu_Location::class,
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
        $this->app->resolve( 'post-type/product/hooks' )->boot();

        // Resolve the customizer components.
        $customize = $this->app->resolve( 'customize/components' );

        // Add customize component to collection.
        $customize->add( 'post-type/product',           $this->app->resolve( 'post-type/product' ) );

        // Add single post subpanel.
        $customize->add( 'post-type/product/single',    $this->app->resolve( 'post-type/product/single' ) );

        // Add single post subpanel.
        $customize->add( 'post-type/product/archive',   $this->app->resolve( 'post-type/product/archive' ) );

        // Add cart subpanel.
        $customize->add( 'post-type/product/cart',      $this->app->resolve( 'post-type/product/cart' ) );
    }
}
