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

namespace Taproot\Components\Header\Customize\Logo_Fixed;

use Taproot\Customize\Controls\Checkbox\Checkbox;
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
    public $label = 'Hide when fixed header';

    /**
     * Styles
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function styles($styles) {

        // Hide logo when fixed header
        if( Mod::get( $this->id ) ) {
            $styles->add([
                'selector' => '.app-header--fixed .app-header__logo-link',
                'styles' => ['display' => 'none'],
                'screen' => 'desktop',
            ]);
        }
    }
}
