<?php
/**
 * Hide Logo When Fixed Top.
 *
 * This class handles the customizer control for hiding the logo in the fixed header.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2019, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Components\Navigation_Top\Customize\Top;

use Taproot\Customize\Controls\Checkbox\Checkbox;
use Taproot\Components\Navigation_Top\Functions;
use Taproot\Tools\Mod;

/**
 * Class for checkbox control
 *
 * @since  2.0.0
 * @access public
 */
class Hide extends Checkbox {

    /**
     * Stores control ID
     *
     * @since 2.0.0
     * @var string
     */
    public $name = 'hide';

    /**
     * Stores control label
     *
     * @since 2.0.0
     * @var string
     */
    public $label = 'Hide when not mobile';

    /**
     * Styles
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function styles($styles) {

        if( Mod::get( $this->id ) ) {
            $styles->add([
                'selector' => '.menu--top',
                'styles' => ['display' => 'none'],
                'screen' => Functions::get_desktop_screen(),
            ]);
        }
    }
}