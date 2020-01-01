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

namespace Taproot\Components\Header\Customize\Title;

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
    public $label = 'Hide Site Title';

    /**
     * Devices
     *
     * @since 2.0.0
     * @var string
     */
    public $devices = ['mobile', 'tablet', 'desktop'];

    /**
     * Styles
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function styles( $styles ) {

        // Hide title mobile
        if( Mod::get( $this->id ) ) {

            $styles->add([
                'selector' => '.app-header__title',
                'styles' => [ 'display' => 'none' ],
                'screen' => 'mobile',
            ]);
        }
        // if we hide the tagline, adjust title to use space accordingly.
        elseif( theme_mod( 'header--tagline--hide' ) ) {
            $styles->add([
                'selector' => '.app-header__title',
                'styles' => [
                    'grid-row-end' => 'span 2',
                    'align-self' => 'center',
                ],
            ]);
        }

        // Hide title tablet
        if( Mod::get( "{$this->id}--tablet" ) ) {

            $styles->add([
                'selector' => '.app-header__title',
                'styles' => [ 'display' => 'none' ],
                'screen' => 'tablet',
            ]);
        }
        // if we hide the tagline, adjust title to use space accordingly.
        elseif( theme_mod( 'header--tagline--hide--tablet' ) ) {
            $styles->add([
                'screen' => 'tablet',
                'selector' => '.app-header__title',
                'styles' => [
                    'grid-row-end' => 'span 2',
                    'align-self' => 'center',
                ],
            ]);
        }

        // Hide title desktop
        if( Mod::get( "{$this->id}--desktop" ) ) {

            $styles->add([
                'selector' => '.app-header__title',
                'styles' => [ 'display' => 'none' ],
                'screen' => 'desktop',
            ]);
        }
        // if we hide the tagline, adjust title to use space accordingly.
        elseif( theme_mod( "header--tagline--hide--desktop" ) ) {

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
