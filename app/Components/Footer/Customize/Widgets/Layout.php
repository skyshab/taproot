<?php
/**
 * Footer Widgets Layout.
 *
 * This class handles the customizer control for the footer widgets layout.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2020, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Components\Footer\Customize\Widgets;

use Taproot\Customize\Controls\Select\Select;
use Taproot\Tools\Mod;

/**
 * Class for select control
 *
 * @since  2.0.0
 * @access public
 */
class Layout extends Select {

    /**
     * Control ID
     *
     * @since 2.0.0
     * @var string
     */
    public $name = 'layout';

    /**
     * Label
     *
     * @since 2.0.0
     * @var string
     */
    public $label = 'Footer Widgets Layout';

    /**
     * Devices
     *
     * @since 2.0.0
     * @var string
     */
    public $devices = [ 'mobile', 'tablet', 'desktop' ];

    /**
     * Default
     *
     * @since 2.0.0
     * @var string
     */
    public $default = [
        'mobile' => 'full',
        'tablet' => 'halves',
        'desktop' => 'thirds'
    ];

    /**
     * Get Choices
     *
     * @since 2.0.0
     * @var string
     */
    public function get_choices() {
        return [
            'mobile' => [
                'halves' => esc_html__( 'Halves', 'taproot' ),
                'full' => esc_html__( 'Full', 'taproot' ),
            ],
            'tablet' => [
                'quarters' => esc_html__( 'Quarters', 'taproot' ),
                'thirds' => esc_html__( 'Thirds', 'taproot' ),
                'halves' => esc_html__( 'Halves', 'taproot' ),
                'full' => esc_html__( 'Full', 'taproot' ),
                'one-third-two-thirds' => esc_html__( 'One Third / Two Thirds', 'taproot' ),
                'two-thirds-one-third' => esc_html__( 'Two Thirds / One Third', 'taproot' ),
                'quarter-quarter-half' => esc_html__( 'Quarter / Quarter / Half', 'taproot' ),
                'half-quarter-quarter' => esc_html__( 'Half / Quarter / Quarter', 'taproot' ),
            ],
            'desktop' => [
                'quarters' => esc_html__( 'Quarters', 'taproot' ),
                'thirds' => esc_html__( 'Thirds', 'taproot' ),
                'halves' => esc_html__( 'Halves', 'taproot' ),
                'full' => esc_html__( 'Full', 'taproot' ),
                'one-third-two-thirds' => esc_html__( 'One Third / Two Thirds', 'taproot' ),
                'two-thirds-one-third' => esc_html__( 'Two Thirds / One Third', 'taproot' ),
                'quarter-quarter-half' => esc_html__( 'Quarter / Quarter / Half', 'taproot' ),
                'half-quarter-quarter' => esc_html__( 'Half / Quarter / Quarter', 'taproot' ),
            ]
        ];
    }

    /**
     * Styles
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function styles( $styles ) {

        // Mobile
        $styles->customProperty([
            'name' => $this->id,
            'value' => $this->get_layout_style( Mod::get( $this->id ) ),
            'screen' => 'default'
        ]);

        // Tablet
        $styles->customProperty([
            'name' => $this->id,
            'value' => $this->get_layout_style( Mod::get( "{$this->id}--tablet" ) ),
            'screen' => 'tablet'
        ]);

        // Desktop
        $styles->customProperty([
            'name' => $this->id,
            'value' => $this->get_layout_style( Mod::get( "{$this->id}--desktop" ) ),
            'screen' => 'desktop'
        ]);
    }

    /**
     * Get footer widget layout style
     *
     * @since  1.1.0
     * @param  string
     * @return string
     */
    private function get_layout_style($layout) {

        $layouts = [
            'quarters' => 'repeat(4, 1fr)',
            'thirds' => 'repeat(3, 1fr)',
            'halves' => 'repeat(2, 1fr)',
            'full' => '100%',
            'one-third-two-thirds' => '1fr 2fr',
            'two-thirds-one-third' => '2fr 1fr',
            'quarter-quarter-half' => '1fr 1fr 2fr',
            'half-quarter-quarter' => '2fr 1fr 1fr'
        ];

        return ( isset($layouts[$layout]) ) ? $layouts[$layout] : false;
    }

    /**
     * Preview Styles
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function previewStyles() {

        // Default/mobile
        $script = <<< JS
        wp.customize( "{$this->id}", function( value ) {
            value.bind( function( to ) {

                switch( to ) {

                    case 'halves':
                        to = 'repeat(2, 1fr)';
                        break;

                    case 'full':
                        to = '100%';
                        break;

                    default:
                        to = false;
                }

                rootstrap.customProperty({
                    name: "{$this->id}",
                    value: to
                });
            });
        });
        JS;

        // Tablet
        if( isset( $this->devices ) && in_array( 'tablet', $this->devices ) ) {

            $script .= <<< JS
            wp.customize( "{$this->id}--tablet", function( value ) {
                value.bind( function( to ) {

                    switch( to ) {

                        case 'quarters':
                            to = 'repeat(4, 1fr)';
                            break;

                        case 'thirds':
                            to = 'repeat(3, 1fr)';
                            break;

                        case 'halves':
                            to = 'repeat(2, 1fr)';
                            break;

                        case 'full':
                            to = '100%';
                            break;

                        case 'one-third-two-thirds':
                            to = '1fr 2fr';
                            break;

                        case 'two-thirds-one-third':
                            to = '2fr 1fr';
                            break;

                        case 'quarter-quarter-half':
                            to = '1fr 1fr 2fr';
                            break;

                        case 'half-quarter-quarter':
                            to = '2fr 1fr 1fr';
                            break;

                        default:
                            to = false;
                    }

                    rootstrap.customProperty({
                        name: "{$this->id}",
                        value: to,
                        screen: 'tablet'
                    });
                });
            });
            JS;
        }

        // Desktop
        if( isset( $this->devices ) && in_array( 'desktop', $this->devices ) ) {

            $script .= <<< JS
            wp.customize( "{$this->id}--desktop", function( value ) {
                value.bind( function( to ) {

                    switch( to ) {

                        case 'quarters':
                            to = 'repeat(4, 1fr)';
                            break;

                        case 'thirds':
                            to = 'repeat(3, 1fr)';
                            break;

                        case 'halves':
                            to = 'repeat(2, 1fr)';
                            break;

                        case 'full':
                            to = '100%';
                            break;

                        case 'one-third-two-thirds':
                            to = '1fr 2fr';
                            break;

                        case 'two-thirds-one-third':
                            to = '2fr 1fr';
                            break;

                        case 'quarter-quarter-half':
                            to = '1fr 1fr 2fr';
                            break;

                        case 'half-quarter-quarter':
                            to = '2fr 1fr 1fr';
                            break;

                        default:
                            to = false;
                    }

                    rootstrap.customProperty({
                        name: "{$this->id}",
                        value: to,
                        screen: 'desktop'
                    });
                });
            });
            JS;
        }

        // Return custom property scripts
        return $script;
    }
}
