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
use Taproot\Tools\Mod;
use function Taproot\Tools\theme_mod;

/**
 * Class for range control
 *
 * @since  2.0.0
 * @access public
 */
class Line_Height extends Range {

    /**
     * Custom control ID
     *
     * @since 2.0.0
     * @var string
     */
    public $name = 'line-height';

    /**
     * Label
     *
     * @since 2.0.0
     * @var string
     */
    public $label = 'Line Height';


    /**
     * Default
     *
     * @since 2.0.0
     * @var string
     */
    public $default = '2.5';

    /**
     * Range atts
     *
     * @since 2.0.0
     * @var array
     */
    public $atts = [
        'unitless' => [
            'min' => 0.5,
            'max' => 3,
            'step' => 0.01,
            'default' => 1
        ],
        'px' => [
            'min' => 0,
            'max' => 72,
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
                'line-height' => theme_mod( $this->id )
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
            'selector' => '.editor-styles-wrapper .wp-block-button .wp-block-button__link, .editor-styles-wrapper .wp-block-button .mce-content-body, .editor-styles-wrapper .taproot-button',
            'styles' => [
                'line-height' => Mod::get( $this->id )
            ]
        ]);
    }
}
