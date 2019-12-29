<?php
/**
 * Hide Logo When Fixed Header.
 *
 * This class handles the customizer control for hiding the logo in the fixed header.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2019, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Components\Buttons\Customize\Buttons;

use Taproot\Customize\Controls\Checkbox\Checkbox;
use function Taproot\Tools\theme_mod;

/**
 * Class for checkbox control
 *
 * @since  2.0.0
 * @access public
 */
class Is_Rounded extends Checkbox {

    /**
     * Stores control ID
     *
     * @since 2.0.0
     * @var string
     */
    public $name = 'is-rounded';

    /**
     * Stores control label
     *
     * @since 2.0.0
     * @var string
     */
    public $label = 'Enable Rounded Buttons';

    /**
     * Default
     *
     * @since 2.0.0
     * @var bool
     */
    public $default = FALSE;

    /**
     * Styles
     *
     * @since 2.0.0
     * @var string
     */
    public function styles($styles) {

        $styles->add([
            'selector' => '.taproot-button, .wp-block-button__link, .comment-respond__submit',
            'styles' => [
                'border-radius' => ( theme_mod( $this->id ) ) ? '100px' : '0px',
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
                'border-radius' => ( theme_mod( $this->id ) ) ? '100px' : '0px',
            ]
        ]);
    }
}
