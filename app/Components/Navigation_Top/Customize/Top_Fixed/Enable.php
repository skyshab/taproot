<?php
/**
 * Hide Logo When Fixed Top.
 *
 * This class handles the customizer control for hiding the logo in the fixed header.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2020, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Components\Navigation_Top\Customize\Top_Fixed;

use Taproot\Customize\Controls\Checkbox\Checkbox;
use Taproot\Tools\Mod;

/**
 * Class for checkbox control
 *
 * @since  2.0.0
 * @access public
 */
class Enable extends Checkbox {

    /**
     * Stores control ID
     *
     * @since 2.0.0
     * @var string
     */
    public $name = 'enable';

    /**
     * Stores control label
     *
     * @since 2.0.0
     * @var string
     */
    public $label = 'Show When Fixed';

    /**
     * Transport
     *
     * @since 2.0.0
     * @var bool
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

        if( ! Mod::get( $this->id ) ) {

            $styles->add([
                'selector' => '.app-header--fixed .menu--top',
                'styles' => ['display' => 'none'],
                'screen' => 'desktop',
            ]);

            $styles->add([
                'selector' => '.app-header--fixed .menu--top__container',
                'styles' => [
                    'width' => '100%'
                ],
                'screen' => 'desktop',
            ]);
        }
    }
}
