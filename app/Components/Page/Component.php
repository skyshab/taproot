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

namespace Taproot\Components\Page;

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

        // Bind a single instance of our post type customize class.
        $this->app->singleton( 'post-type-page', function(){
            return new Post_Type( 'page', [
                'title' => __('Pages', 'taproot') ,
                'priority' => 20
            ]);
        });

        // Bind a single instance of our single page customize class.
        $this->app->singleton( 'page-single', function(){
            return new Single( 'page' );
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

        // Resolve the customize components.
        $customize = $this->app->resolve( 'customize/components' );

        // Add single post subpanel.
        $customize->add( 'post-type-page',  $this->app->resolve( 'post-type-page' ) );

        // Add single post subpanel.
        $customize->add( 'page-single',     $this->app->resolve( 'page-single' ) );
    }
}
