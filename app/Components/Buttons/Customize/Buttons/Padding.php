<?php
/**
 * Padding.
 *
 * This class handles the customizer control for the padding.
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
class Padding extends Range {

    /**
     * Custom control id
     *
     * @since 2.0.0
     * @var string
     */
    public $name = 'padding';

    /**
     * Label
     *
     * @since 2.0.0
     * @var string
     */
    public $label = 'Padding';

    /**
     * Range atts
     *
     * @since 2.0.0
     * @var array
     */
    public $atts = [
        'px' => [
            'max' => 50,
        ],
        'em' => [
            'max' => 4,
        ],
        'rem' => [
            'max' => 4,
        ]
    ];

    /**
     * Default
     *
     * @since 2.0.0
     * @var array
     */
    public $default = '1.25em';

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
                'padding-left'  => theme_mod( 'elements--buttons--padding' ),
                'padding-right' => theme_mod( 'elements--buttons--padding' ),
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
                'padding-left'      =>  Mod::get( $this->id ),
                'padding-right'     =>  Mod::get( $this->id ),
                'padding-top'       => '0px',
                'padding-bottom'    => '0px',
            ]
        ]);
    }
}
