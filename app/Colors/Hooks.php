<?php
/**
 * Hooks class.
 *
 * This file contains actions and callbacks for the component.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2020 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */

namespace Taproot\Colors;

use Hybrid\Contracts\Bootable;
use function Hybrid\app;

/**
 * Handles component logic
 *
 * @since  2.0.0
 * @access public
 */
class Hooks implements Bootable {

    /**
     * Initiate component actions.
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function boot() {
        add_action( 'after_setup_theme', [ $this, 'editor_colors' ], 5 );
        add_action( 'customize_register', [ $this, 'customize_register' ], PHP_INT_MAX );
    }

    /**
     * Define theme color palette for the editor.
     *
     * @since 2.0.0
     */
    public function editor_colors() {

        add_theme_support( 'editor-color-palette', [
            [
                'name'  => __( 'Text Color', 'taproot' ),
                'slug'  => 'text',
                'color' => app('colors/functions')->get_theme_color( 'text' )
            ],
            [
                'name'  => __( 'Accent Color', 'taproot' ),
                'slug'  => 'accent',
                'color' => app('colors/functions')->get_theme_color( 'accent' )
            ],
            [
                'name'  => __( 'Accent Contrast Color', 'taproot' ),
                'slug'  => 'accent-contrast',
                'color' => app('colors/functions')->get_theme_color( 'accent-contrast' )
            ],
            [
                'name'  => __( 'Meta Light', 'taproot' ),
                'slug'  => 'meta-light',
                'color' => app('colors/functions')->get_theme_color( 'meta-light' )
            ],
            [
                'name'  => __( 'Meta Medium', 'taproot' ),
                'slug'  => 'meta-medium',
                'color' => app('colors/functions')->get_theme_color( 'meta-medium' )
            ],
            [
                'name'  => __( 'Meta Dark', 'taproot' ),
                'slug'  => 'meta-dark',
                'color' => app('colors/functions')->get_theme_color( 'meta-dark' )
            ]
        ]);

        // Convert accent color to rgb for the gradients api
        $accent = app('colors/functions')->hex2rgb( app('colors/functions')->get_theme_color( 'accent') );

        // Define gradient presets
        add_theme_support('editor-gradient-presets', [
            [
                'name'     => __( 'Accent to accent', 'taproot' ),
                'gradient' => "linear-gradient(135deg, {$accent} 0%, {$accent} 100%)",
                'slug'     => 'accent-to-accent'
            ],
            [
                'name'     => __( 'Vivid cyan blue to vivid purple', 'taproot' ),
                'gradient' => 'linear-gradient(135deg,rgba(6,147,227,1) 0%,rgb(155,81,224) 100%)',
                'slug'     => 'vivid-cyan-blue-to-vivid-purple'
            ],
            [
                'name'     => __( 'Vivid green cyan to vivid cyan blue', 'taproot' ),
                'gradient' => 'linear-gradient(135deg,rgba(0,208,132,1) 0%,rgba(6,147,227,1) 100%)',
                'slug'     =>  'vivid-green-cyan-to-vivid-cyan-blue',
            ],
            [
                'name'     => __( 'Light green cyan to vivid green cyan', 'taproot' ),
                'gradient' => 'linear-gradient(135deg,rgb(122,220,180) 0%,rgb(0,208,130) 100%)',
                'slug'     => 'light-green-cyan-to-vivid-green-cyan',
            ],
            [
                'name'     => __( 'Luminous vivid amber to luminous vivid orange', 'taproot' ),
                'gradient' => 'linear-gradient(135deg,rgba(252,185,0,1) 0%,rgba(255,105,0,1) 100%)',
                'slug'     => 'luminous-vivid-amber-to-luminous-vivid-orange',
            ],
            [
                'name'     => __( 'Luminous vivid orange to vivid red', 'taproot' ),
                'gradient' => 'linear-gradient(135deg,rgba(255,105,0,1) 0%,rgb(207,46,46) 100%)',
                'slug'     => 'luminous-vivid-orange-to-vivid-red',
            ],
        ]);
    }

    /**
     * Remove header text color from our colors section.
     *
     * @since 2.0.0
     */
    function customize_register( $manager ) {

        if( $manager->get_control( 'header_textcolor' ) ) {
            $manager->remove_control( 'header_textcolor' );
        }
    }

}
