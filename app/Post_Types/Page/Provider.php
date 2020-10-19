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

namespace Taproot\Post_Types\Page;

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

        // Bind customize component for page post type
        $this->app->singleton( 'post-type/page', function() {

            return new Component([
                'id'        => 'post-type-page',
                'title'     => __('Pages', 'taproot') ,
                'panel'     => 'post-types',
                'priority' => 20,
                'post_type' => 'page'
            ]);
        });

        // Bind customize component for single pages
        $this->app->singleton( 'post-type/page/single', function() {

            $component = new Component([
                'title'     => __('Page', 'taproot') ,
                'panel'     => 'post-type-page',
                'post_type' => 'page'
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

        // Resolve the customize components.
        $customize = $this->app->resolve( 'customize/components' );

        // Add page post type subpanel.
        $customize->add( 'post-type/page',          $this->app->resolve( 'post-type/page' ) );

        // Add single page subpanel.
        $customize->add( 'post-type/page/single',   $this->app->resolve( 'post-type/page/single' ) );
    }
}
