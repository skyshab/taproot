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

namespace Taproot\Components\Post_Types;

use Hybrid\Tools\ServiceProvider;
use Taproot\Tools\Mod;
use Taproot\Components\Post_Types\Customize\Customize                       as Component;
use Taproot\Components\Post_Types\Customize\Post_Type\Customize             as ComponentPostType;
use Taproot\Components\Post_Types\Customize\Single\Customize                as ComponentSingle;
use Taproot\Components\Post_Types\Customize\Single\Customize_Hierarchical   as ComponentSingleHierarchical;
use Taproot\Components\Post_Types\Customize\Archive\Customize               as ComponentArchive;
use Taproot\Components\Post_Types\Customize\Archive_Entry\Customize         as ComponentArchiveEntry;

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

        // Bind a single instance of our template class.
        $this->app->singleton( Controller::class );

        // Bind a single instance of our customize component class.
        $this->app->singleton( Component::class );

        // Bind a single instance of the component template class.
        $this->app->singleton( 'post-types/template', Template::class );
    }

    /**
     * Boot class instances.
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function boot() {

        // Boot the controller class instance.
        $this->app->resolve( Controller::class )->boot();

        // Resolve the components.
        $components = $this->app->resolve( 'customize/components' );

        // Add customize component to collection.
        $components->add( 'post-types', $this->app->resolve( Component::class ) );

        // Once post types have been registered
        add_action( 'init', function() use ( $components ) {

            // Supported post types array
            $supported = apply_filters('components/post-types/customizer-support', explode( ',', Mod::get( 'enabled-post-types', 'post,page' ) ) );

            // Get all supported public post types
            $post_types = array_intersect( get_post_types( ['public' => TRUE] ), $supported );

            // Get all supported hierarchical posts
            $hierarchical_post_types = array_intersect( get_post_types( ['hierarchical' => TRUE] ), $supported );

            // Get all supported non-hierarchical posts
            $standard_post_types = array_intersect( get_post_types( ['hierarchical' => FALSE] ), $supported );

            // Loop through supported post types
            foreach ( $post_types as $post_type ) {

                // Create a panel for the post type to hold our sub panels
                $components->add( "post-types\{$post_type}", new ComponentPostType( $post_type ) );
            }

            // Loop through supported post types
            foreach ( $hierarchical_post_types as $post_type ) {

                // Add hierarchical post subpanel
                $components->add( "post-types\hierarchical\{$post_type}", new ComponentSingleHierarchical( $post_type ) );
            }

            // Loop through supported post types
            foreach ( $standard_post_types as $post_type ) {

                // Add single post subpanel
                $components->add( "post-type\{$post_type}\single", new ComponentSingle( $post_type ) );

                // Add archive subpanel
                $components->add( "post-type\{$post_type}\archive", new ComponentArchive( $post_type ) );

                // Add archive entry subpanel
                $components->add( "post-type\{$post_type}\archive-entry", new ComponentArchiveEntry( $post_type ) );
            }
        });
    }
}
