<?php
/**
 * Footer Widgets Layout.
 *
 * This class handles the customizer control for the footer widgets layout.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2019, Sky Shabatura
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
            'value' => Mod::get( $this->id ),
            'screen' => 'default'
        ]);

        // Tablet
        $styles->customProperty([
            'name' => $this->id,
            'value' => Mod::get( "{$this->id}--tablet" ),
            'screen' => 'tablet'
        ]);

        // Desktop
        $styles->customProperty([
            'name' => $this->id,
            'value' => Mod::get( "{$this->id}--desktop" ),
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
}
