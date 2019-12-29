<?php
/**
 * Font Size.
 *
 * This class handles the customizer control for the taglin font size.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2019, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Components\Buttons\Customize\Buttons;

use Taproot\Customize\Controls\Range\Range;
use function Taproot\Tools\theme_mod;

/**
 * Class for range control
 *
 * @since  2.0.0
 * @access public
 */
class Border_Width extends Range {

    /**
     * Custom control ID
     *
     * @since 2.0.0
     * @var string
     */
    public $name = 'border-width';

    /**
     * Label
     *
     * @since 2.0.0
     * @var string
     */
    public $label = 'Border Width';

    /**
     * Range atts
     *
     * @since 2.0.0
     * @var array
     */
    public $atts = [
        'px' => [
            'max'       => 10,
            'default'   => 0
        ]
    ];

    /**
     * Styles
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function styles($styles) {
        $styles->add([
            'selector' => '.taproot-button, .wp-block-button__link, .comment-respond__submit',
            'styles' => [
                'border-width' => theme_mod( $this->id ),
            ]
        ]);
    }

    /**
     * Editor Styles
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function editorStyles($styles) {

        $styles->add([
            'selector' => '.editor-styles-wrapper .wp-block-button .wp-block-button__link, .editor-styles-wrapper .taproot-button',
            'styles' => [
                'border-width' => theme_mod( $this->id ),
            ]
        ]);
    }
}
