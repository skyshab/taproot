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

namespace Taproot\Post_Types\Post;

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
        $this->app->singleton( 'post-type/post/hooks', Hooks::class );

        // Bind a single instance of the component template class.
        $this->app->singleton( 'post-type/post/template', Template::class );

        // Bind a single instance of the component functions class.
        $this->app->singleton( 'post-type/post/functions', Functions::class );

        // Bind customize component for post type
        $this->app->singleton( 'post-type/post', function() {

            return new Component([
                'id'        => 'post-type-post',
                'title'     => __('Posts', 'taproot'),
                'panel'     => 'post-types',
                'post_type' => 'post',
                'priority'  => 10,
            ]);
        });

        // Bind customize component for single posts
        $this->app->singleton( 'post-type/post/single', function() {

            $component = new Component([
                'title'     => __('Post', 'taproot') ,
                'panel'     => 'post-type-post',
                'post_type' => 'post'
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
                'name'      => 'byline',
                'title'     => __('Byline', 'taproot'),
                'controls'  => [
                    \Taproot\Post_Types\Customize\Single\Byline\Text_Color::class,
                    \Taproot\Post_Types\Customize\Single\Byline\Icon_Color::class,
                    \Taproot\Post_Types\Customize\Single\Byline\Font_Size::class
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
                'title'     => __('Post Nav', 'taproot'),
                'controls'  => [
                    \Taproot\Postnav\Customize\Enable_Postnav::class
                ]
            ]);

            return $component;
        });

        // Bind customize component for post archives
        $this->app->singleton( 'post-type/post/archive', function() {

            $component = new Component([
                'id'        => 'post--archive',
                'title'     => __('Post Archive', 'taproot') ,
                'panel'     => 'post-type-post',
                'post_type' => 'post'
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
                    \Taproot\Post_Types\Customize\Archive\Title\Title::class,
                    \Taproot\Post_Types\Customize\Archive\Title\Text_Color::class,
                    \Taproot\Post_Types\Customize\Archive\Title\Font_Styles::class,
                    \Taproot\Post_Types\Customize\Archive\Title\Font_Size::class,
                    \Taproot\Post_Types\Customize\Archive\Title\Line_Height::class,
                ]
            ]);

            return $component;
        });

        // Bind customize component for post archive entries
        $this->app->singleton( 'post-type/post/entry', function() {

            $component = new Component([
                'id'        => 'post--entry',
                'title'     => __('Post Entry', 'taproot') ,
                'panel'     => 'post-type-post',
                'post_type' => 'post'
            ]);

            $component->section([
                'name'      => 'title',
                'title'     => __('Title', 'taproot'),
                'controls'  => [
                    \Taproot\Post_Types\Customize\Entry\Title\Link_Color::class,
                    \Taproot\Post_Types\Customize\Entry\Title\Link_Color_Hover::class,
                    \Taproot\Post_Types\Customize\Entry\Title\Font_Size::class,
                    \Taproot\Post_Types\Customize\Entry\Title\Font_Styles::class,
                ]
            ]);

            $component->section([
                'name'      => 'byline',
                'title'     => __('Byline', 'taproot'),
                'controls'  => [
                    \Taproot\Post_Types\Customize\Entry\Byline\Text_Color::class,
                    \Taproot\Post_Types\Customize\Entry\Byline\Icon_Color::class,
                    \Taproot\Post_Types\Customize\Entry\Byline\Font_Size::class
                ]
            ]);

            $component->section([
                'name'      => 'link',
                'title'     => __('Link', 'taproot'),
                'controls'  => [
                    \Taproot\Post_Types\Customize\Entry\Link\Type::class,
                    \Taproot\Post_Types\Customize\Entry\Link\Position::class,
                    \Taproot\Post_Types\Customize\Entry\Link\Font_Size::class,
                    \Taproot\Post_Types\Customize\Entry\Link\Read_More_Text::class,
                ]
            ]);

            $component->section([
                'name'      => 'excerpt',
                'title'     => __('Excerpt', 'taproot'),
                'controls'  => [
                    \Taproot\Post_Types\Customize\Entry\Excerpt\Length::class
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
        $this->app->resolve( 'post-type/post/hooks' )->boot();

        // Resolve the customize components.
        $customize = $this->app->resolve( 'customize/components' );

        // Add post type subpanel.
        $customize->add( 'post-type/post',          $this->app->resolve( 'post-type/post' ) );

        // Add single post subpanel.
        $customize->add( 'post-type/post/single',   $this->app->resolve( 'post-type/post/single' ) );

        // Add single post subpanel.
        $customize->add( 'post-type/post/archive',  $this->app->resolve( 'post-type/post/archive' ) );

        // Add single post subpanel.
        $customize->add( 'post-type/post/entry',    $this->app->resolve( 'post-type/post/entry' ) );
    }
}
