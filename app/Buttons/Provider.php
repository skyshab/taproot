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

namespace Taproot\Buttons;

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

        // Bind a single instance of our customize component class.
        $this->app->singleton( 'buttons/customize', function() {

            $component = new Component( ['id' => 'typography'] );

            $component->section([
                'name'      => 'buttons',
                'title'     => __('Buttons', 'taproot'),
                'controls'  => [
                    Customize\Buttons\Background_Color::class,
                    Customize\Buttons\Text_Color::class,
                    Customize\Buttons\Font_Size::class,
                    Customize\Buttons\Line_Height::class,
                    Customize\Buttons\Padding::class,
                    Customize\Buttons\Border_Radius::class,
                    Customize\Buttons\Font_Family::class,
                    Customize\Buttons\Font_Styles::class
                ]
            ]);

            $component->section([
                'name'      => 'buttons-hover',
                'title'     => __('Buttons Hover', 'taproot'),
                'controls'  => [
                    Customize\Buttons_Hover\Background_Color::class,
                    Customize\Buttons_Hover\Text_Color::class,
                ]
            ]);

            $component->tab([
                'title' => __( 'Buttons', 'taproot' ),
                'sections' => [
                    'typography--buttons'         => [ 'label' => 'default', 'hide' => false ],
                    'typography--buttons-hover'   => [ 'label' => 'hover', 'hide' => true ],
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

        // The customize components.
        $customize = $this->app->resolve( 'customize/components' );

        // The component customize config.
        $component = $this->app->resolve( 'buttons/customize' );

        // Add component customize config to collection.
        $customize->add( 'buttons', $component );
    }
}
