<?php
/**
 * Header Default Color.
 *
 * This class handles the customizer control for the header color.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2019, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Components\Header\Customize\Styles;

use Taproot\Customize\Controls\Color\Color;
use function Taproot\Tools\theme_mod;

/**
 * Class for color controls
 *
 * @since  2.0.0
 * @access public
 */
class Default_Color extends Color {

    /**
     * Control name
     *
     * @since 2.0.0
     * @var string
     */
    public $id = 'header--default-color';

    /**
     * Control label
     *
     * @since 2.0.0
     * @var string
     */
    public $label = 'Header Default Color';

    /**
     * Default
     *
     * @since 2.0.0
     * @var string
     */
    public $default = '#edba1d';

    /**
     * Styles
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function styles($styles) {
        $styles->customProperty([
            'name'  => $this->id,
            'value' => theme_mod( $this->id ),
        ]);
    }
}
