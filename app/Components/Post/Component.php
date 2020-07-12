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

namespace Taproot\Components\Post;

use Hybrid\Tools\ServiceProvider;
use Taproot\Customize\Panels\Post_Type;
use Taproot\Customize\Panels\Archive\Archive;
use Taproot\Customize\Panels\Entry\Entry;
use Taproot\Customize\Panels\Post\Single;

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

        // Bind a single instance of our hooks class.
        $this->app->singleton( Hooks::class );

        // Bind a single instance of our post type customize class.
        $this->app->singleton( 'post-type-post', function(){
            return new Post_Type( 'post', [
                'title' => __('Posts', 'taproot') ,
                'priority' => 10
            ] );
        });

        // Bind a single instance of our single post customize class.
        $this->app->singleton( 'post-single', function(){
            return new Single( 'post' );
        });

        // Bind a single instance of our archive post customize class.
        $this->app->singleton( 'post-archive', function(){
            return new Archive( 'post' );
        });

        // Bind a single instance of our entry post customize class.
        $this->app->singleton( 'post-entry', function(){
            return new Entry( 'post' );
        });

        // Bind a single instance of the component template class.
        $this->app->singleton( 'post/template', Template::class );

        // Bind a single instance of the component functions class.
        $this->app->singleton( 'post/functions', Functions::class );
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
        $this->app->resolve( Hooks::class )->boot();

        // Resolve the components.
        $customize = $this->app->resolve( 'customize/components' );

        // Add single post subpanel
        $customize->add( 'post-type-post',  $this->app->resolve( 'post-type-post' ) );

        // Add single post subpanel
        $customize->add( 'post-single',     $this->app->resolve( 'post-single' ) );

        // Add archive subpanel
        $customize->add( 'post-archive',    $this->app->resolve( 'post-archive' ) );

        // Add archive entry subpanel
        $customize->add( 'post-entry',      $this->app->resolve( 'post-entry' ) );
    }
}
