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

namespace Taproot\Typography;

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
        $this->app->singleton( 'typography/hooks', Hooks::class );

        // Bind a single instance of our functions class.
        $this->app->singleton( 'typography/functions', Functions::class );

        // Bind a single instance of our customize component class.
        $this->app->singleton( 'typography/customize', function() {

            $component = new Component([
                'id'        => 'typography',
                'title'     => __( 'Typography', 'taproot' ),
                'priority'  => 60,
            ]);

            $component->section([
                'name'      => 'body',
                'title'     => __('Body', 'taproot'),
                'controls'  => [
                    Customize\Body\Text_Color::class,
                    Customize\Body\Font_Family::class,
                    Customize\Body\Font_Size::class,
                    Customize\Body\Line_Height::class
                ]
            ]);

            $component->section([
                'name'      => 'headings',
                'title'     => __('Headings', 'taproot'),
                'controls'  => [
                    Customize\Headings\Text_Color::class,
                    Customize\Headings\Font_Family::class,
                    Customize\Headings\Font_Styles::class,
                ]
            ]);

            $component->section([
                'name'      => 'h1',
                'title'     => __('h1', 'taproot'),
                'controls'  => [
                    Customize\H1\Text_Color::class,
                    Customize\H1\Font_Family::class,
                    Customize\H1\Font_Styles::class,
                    Customize\H1\Font_Size::class,
                    Customize\H1\Line_Height::class
                ]
            ]);

            $component->section([
                'name'      => 'h2',
                'title'     => __('h2', 'taproot'),
                'controls'  => [
                    Customize\H2\Text_Color::class,
                    Customize\H2\Font_Family::class,
                    Customize\H2\Font_Styles::class,
                    Customize\H2\Font_Size::class,
                    Customize\H2\Line_Height::class
                ]
            ]);

            $component->section([
                'name'      => 'h3',
                'title'     => __('h3', 'taproot'),
                'controls'  => [
                    Customize\H3\Text_Color::class,
                    Customize\H3\Font_Family::class,
                    Customize\H3\Font_Styles::class,
                    Customize\H3\Font_Size::class,
                    Customize\H3\Line_Height::class
                ]
            ]);

            $component->section([
                'name'      => 'h4',
                'title'     => __('h4', 'taproot'),
                'controls'  => [
                    Customize\H4\Text_Color::class,
                    Customize\H4\Font_Family::class,
                    Customize\H4\Font_Styles::class,
                    Customize\H4\Font_Size::class,
                    Customize\H4\Line_Height::class
                ]
            ]);

            $component->section([
                'name'      => 'h5',
                'title'     => __('h5', 'taproot'),
                'controls'  => [
                    Customize\H5\Text_Color::class,
                    Customize\H5\Font_Family::class,
                    Customize\H5\Font_Styles::class,
                    Customize\H5\Font_Size::class,
                    Customize\H5\Line_Height::class
                ]
            ]);

            $component->section([
                'name'      => 'h6',
                'title'     => __('h6', 'taproot'),
                'controls'  => [
                    Customize\H6\Text_Color::class,
                    Customize\H6\Font_Family::class,
                    Customize\H6\Font_Styles::class,
                    Customize\H6\Font_Size::class,
                    Customize\H6\Line_Height::class
                ]
            ]);

            $component->section([
                'name'      => 'links',
                'title'     => __('Links', 'taproot'),
                'controls'  => [
                    Customize\Links\Link_Color::class,
                    Customize\Links\Link_Color_Visited::class,
                    Customize\Links\Link_Color_Hover::class,
                    Customize\Links\Link_Color_Active::class,
                    Customize\Links\Underline::class
                ]
            ]);

            $component->tab([
                'title' => esc_html__('Heading Styles', 'taproot'),
                'sections' => [
                    'typography--h1' => [ 'label' => 'h1', 'hide' => true ],
                    'typography--h2' => [ 'label' => 'h2', 'hide' => true ],
                    'typography--h3' => [ 'label' => 'h3', 'hide' => true ],
                    'typography--h4' => [ 'label' => 'h4', 'hide' => true ],
                    'typography--h5' => [ 'label' => 'h5', 'hide' => true ],
                    'typography--h6' => [ 'label' => 'h6', 'hide' => true ],
                ]
            ]);

            $sequence_args = [
                'hide' => true,
                'prev' => [
                    'label' => esc_html__('all headings', 'taproot'),
                    'link'  => 'typography--headings'
                ],
                'next' => ['link' => false],
            ];

            $component->sequence([
                'sections' => [
                    'typography--headings' => [
                        'hide' => false,
                        'next' => [ 'label' => esc_html__('headings', 'taproot') ]
                    ],
                    'typography--h1' => $sequence_args,
                    'typography--h2' => $sequence_args,
                    'typography--h3' => $sequence_args,
                    'typography--h4' => $sequence_args,
                    'typography--h5' => $sequence_args,
                    'typography--h6' => $sequence_args,
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
        $this->app->resolve( 'typography/hooks' )->boot();

        // Get the customize components collection.
        $customize = $this->app->resolve( 'customize/components' );

        // Get the customize component.
        $component = $this->app->resolve( 'typography/customize' );

        // Add customize component to collection.
        $customize->add( 'typography', $component );
    }
}
