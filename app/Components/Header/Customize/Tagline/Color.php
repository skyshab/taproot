<?php
/**
 * Fixed Header Default Color.
 *
 * This class handles the customizer control for the fixed header color.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2019, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Components\Header\Customize\Tagline;

use Taproot\Customize\Controls\Color\Color as ColorAbstract;
use function Taproot\Tools\theme_mod;

/**
 * Class for color controls
 *
 * @since  2.0.0
 * @access public
 */
class Color extends ColorAbstract {

    /**
     * Stores control ID
     *
     * @since 2.0.0
     * @var string
     */
    public $name = 'color';

    /**
     * Stores control label
     *
     * @since 2.0.0
     * @var string
     */
    public $label = 'Tagline Color';

    /**
     * Styles
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function styles($styles) {

        // Tagline Styles
        $styles->add([
            'selector' => '.app-header__description',
            'styles' => [
                'color' => theme_mod( $this->id )
            ]
        ]);
    }
}
