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

namespace Taproot\Components\Footer\Customize\Footer;

use Taproot\Customize\Controls\Checkbox\Checkbox;
use Taproot\Components\Layout\Functions as Layout;
use function Taproot\Tools\theme_mod;

/**
 * Class for checkbox control
 *
 * @since  2.0.0
 * @access public
 */
class Is_Fixed extends Checkbox {

    /**
     * Name
     *
     * @since 2.0.0
     * @var string
     */
    public $id = 'footer--is-fixed';

    /**
     * Label
     *
     * @since 2.0.0
     * @var string
     */
    public $label = 'Enable Fixed Footer';

    /**
     * Default
     *
     * @since 2.0.0
     * @var string
     */
    public $default = TRUE;

    /**
     * Styles
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function styles($styles) {

        if( Layout::is_boxed_layout() && theme_mod( $this->id ) ) {

            $styles->add([
                'selector' => '.app-footer--fixed',
                'styles' => [
                    'margin-bottom' => theme_mod( 'layout--boxed--outer-padding' )
                ],
                'screen' => 'desktop'
            ]);
        }
    }
}
