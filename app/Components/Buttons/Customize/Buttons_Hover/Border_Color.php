<?php
/**
 * Background Color.
 *
 * This class handles the customizer control for the background color.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2019, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Components\Buttons\Customize\Buttons_Hover;

use Taproot\Customize\Controls\Color\Color;
use function Taproot\Tools\theme_mod;

/**
 * Class for color controls
 *
 * @since  2.0.0
 * @access public
 */
class Border_Color extends Color {

    /**
     * Custom control id
     *
     * @since 2.0.0
     * @var string
     */
    public $name = 'border-color';

    /**
     * Stores control label
     *
     * @since 2.0.0
     * @var string
     */
    public $label = 'Border Color';

    /**
     * Styles
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function styles($styles) {

        $styles->add([
            'selector' => '.taproot-button:hover, .comment-respond__submit:hover',
            'styles' => [
                'border-color' => theme_mod( $this->id ),
            ]
        ]);
    }
}
