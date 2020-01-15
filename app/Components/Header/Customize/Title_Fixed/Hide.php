<?php
/**
 * Hide Logo When Fixed Header.
 *
 * This class handles the customizer control for hiding the logo in the fixed header.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2020, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Components\Header\Customize\Title_Fixed;

use Taproot\Customize\Controls\Checkbox\Checkbox;
use Taproot\Tools\Mod;
use function Taproot\Tools\theme_mod;

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
    public $label = 'Hide title when fixed';

    /**
     * Transport
     *
     * @since 2.0.0
     * @var string
     */
    public $transport = 'refresh';

    /**
     * Styles
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function styles( $styles ) {

        // Hide Title when fixed
        if( Mod::get( $this->id ) ) {

            $styles->add([
                'selector' => '.app-header--fixed .app-header__title',
                'styles' => [ 'display' => 'none' ],
                'screen' => 'desktop',
            ]);
        }
        // If hide the tagline, adjust title to use space accordingly.
        elseif( theme_mod( 'header--tagline-fixed--hide' ) ) {

            $styles->add([
                'selector' => '.app-header__title',
                'styles' => [
                    'grid-row-end' => 'span 2',
                    'align-self' => 'center',
                ],
                'screen' => 'desktop',
            ]);
        }
    }
}
