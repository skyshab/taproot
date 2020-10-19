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

namespace Taproot\Fonts;

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
        $this->app->singleton( 'fonts/hooks', Hooks::class );

        // Bind a single instance of our functions class.
        $this->app->singleton( 'fonts/functions', Functions::class );

        // Bind customize component config
        $this->app->singleton( 'fonts/customize', function() {

            $component = new Component( ['id' => 'typography'] );

            $component->section([
                'name'      => 'fonts',
                'title'     => __('Google Fonts', 'taproot'),
                'priority'  => 5,
                'controls'  => [ Customize\Google::class ],
                'description' => sprintf( '%s <a href="%s" target="_blank">%s</a> %s<br><br>%s',
                    esc_html__( 'Visit', 'taproot' ),
                    esc_url( 'https://fonts.google.com' ),
                    esc_html__( 'Google Fonts', 'taproot' ),
                    esc_html__( "to create a font profile. Paste in the font list from the end of the embed URL. Each font name should be separated by a \"|\" and use a \"+\" for spaces. To start using the fonts, save and refresh the customizer.", 'taproot' ),
                    esc_html__( 'Example: Oswald|Roboto+Slab:400,700', 'taproot' )
                )
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
        $this->app->resolve( 'fonts/hooks' )->boot();

        // Get the customize components collection.
        $customize = $this->app->resolve( 'customize/components' );

        // Get the customize component.
        $component = $this->app->resolve( 'fonts/customize' );

        // Add customize component to collection.
        $customize->add( 'fonts', $component );
    }
}
