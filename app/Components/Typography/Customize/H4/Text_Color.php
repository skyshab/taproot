<?php
/**
 * Text Color.
 *
 * This class handles the customizer control for the component text color.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2019, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Components\Typography\Customize\H4;

use Taproot\Customize\Controls\Color\Color;
use function Taproot\Tools\theme_mod;

/**
 * Class for color controls
 *
 * @since  2.0.0
 * @access public
 */
class Text_Color extends Color {

    /**
     * Control id
     *
     * @since 2.0.0
     * @var string
     */
    public $name = 'text-color';

    /**
     * Control label
     *
     * @since 2.0.0
     * @var string
     */
    public $label = 'Text Color';

    /**
     * Styles
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function styles($styles) {

        $styles->add([
            'selector' => 'h4',
            'styles' => [
                'color' => theme_mod( $this->id )
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
        $this->styles($styles);
    }
}