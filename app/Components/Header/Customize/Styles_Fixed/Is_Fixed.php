<?php
/**
 * Enable Fixed Header.
 *
 * This class handles the customizer control for enabling the fixed header functionality.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2020, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Components\Header\Customize\Styles_Fixed;

use Taproot\Customize\Controls\Checkbox\Checkbox;
use Taproot\Tools\Mod;
use function Taproot\Tools\theme_mod;
use Taproot\Components\Layout\Functions as Layout;

/**
 * Class for checkbox control
 *
 * @since  2.0.0
 * @access public
 */
class Is_Fixed extends Checkbox {

    /**
     * Stores control ID
     *
     * @since 2.0.0
     * @var string
     */
    public $name = 'is-fixed';

    /**
     * Stores control label
     *
     * @since 2.0.0
     * @var string
     */
    public $label = 'Enable Fixed Header';

    /**
     * Styles
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function styles( $styles ) {

        // if boxed layout and fixed header
        if( Layout::is_boxed_layout() && Mod::get( $this->id ) ) {

            $fixed_header_width = sprintf( 'calc( 100vw - (2 * %s) )', theme_mod( 'layout--site--boxed-layout--padding', true ) );

            $styles->add([
                'selector' => '.app-header--fixed, .app-header--sticky',
                'styles' => [
                    'width' => $fixed_header_width,
                    'max-width' => theme_mod( 'layout--site--max-content-width' )
                ],
                'screen' => 'desktop'
            ]);
        }
    }
}
