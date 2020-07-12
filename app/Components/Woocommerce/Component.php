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

namespace Taproot\Components\Woocommerce;

use Hybrid\Tools\ServiceProvider;
use Taproot\Customize\Panels\Post_Type;
use Taproot\Customize\Panels\Page\Single;

/**
 * Component service provider class.
 *
 * @since  2.0.0
 * @access public
 */
class Component extends ServiceProvider {

    /**
     * Register classes and bind to the container.
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function register() {

        // Bind a single instance of our proudct post type customize class.
        $this->app->singleton( 'post-type-product', function(){
            return new Post_Type( 'product', [
                'title' => __('Products', 'taproot') ,
                'priority' => 30
            ] );
        });

        // Bind a single instance of our single product customize class.
        $this->app->singleton( 'product-single', function(){
            return new Single( 'product' );
        });

        // Bind a single instance of our hooks class.
        $this->app->singleton( Hooks::class );
    }

    /**
     * Boot class instances.
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function boot() {

        // Resolve the customizer components.
        $customize = $this->app->resolve( 'customize/components' );

        // Add post type subpanel.
        $customize->add( 'post-type-product',  $this->app->resolve( 'post-type-product' ) );

        // Add single post subpanel.
        $customize->add( 'product-single',     $this->app->resolve( 'product-single' ) );

        // Boot the component hooks.
        $this->app->resolve( Hooks::class )->boot();
    }
}
