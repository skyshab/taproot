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

namespace Taproot\Components\Header\Customize\Tagline;

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
    public $label = 'Hide Site Tagline';

    /**
     * Devices
     *
     * @since 2.0.0
     * @var string
     */
    public $devices = ['mobile', 'tablet', 'desktop'];

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

        // Hide tagline mobile
        if( Mod::get( $this->id ) ) {

            $styles->add([
                'selector' => '.app-header__tagline',
                'styles' => [ 'display' => 'none' ],
                'screen' => 'mobile',
            ]);
        }

        // Hide tagline tablet
        if( Mod::get( "{$this->id}--tablet" ) ) {

            $styles->add([
                'selector' => '.app-header__tagline',
                'styles' => [ 'display' => 'none' ],
                'screen' => 'tablet',
            ]);
        }

        // Hide tagline desktop
        if( Mod::get( "{$this->id}--desktop" ) ) {

            $styles->add([
                'selector' => '.app-header__tagline',
                'styles' => [ 'display' => 'none' ],
                'screen' => 'desktop',
            ]);
        }
    }
}
