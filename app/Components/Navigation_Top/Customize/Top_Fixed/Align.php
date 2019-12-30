<?php
/**
 * Fixed header type
 *
 * This class handles the customizer control for the fixed header type.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2019, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Components\Navigation_Top\Customize\Top_Fixed;

use Taproot\Customize\Controls\Select\Select;
use Taproot\Tools\Mod;

/**
 * Class for checkbox control
 *
 * @since  2.0.0
 * @access public
 */
class Align extends Select {

    /**
     * Control ID
     *
     * @since 2.0.0
     * @var string
     */
    public $name = 'align';

    /**
     * Label
     *
     * @since 2.0.0
     * @var string
     */
    public $label = 'Nav Align';

    /**
     * Default
     *
     * @since 2.0.0
     * @var string
     */
    public $default = 'flex-start';

    /**
     * Get Choices
     *
     * @since 2.0.0
     * @var string
     */
    public function get_choices() {
        return [
            'flex-start'    => esc_html__( 'Left', 'taproot' ),
            'flex-end'      => esc_html__( 'Right', 'taproot' ),
            'center'        => esc_html__( 'Center', 'taproot' ),
            'space-between' => esc_html__( 'Fill', 'taproot' ),
        ];
    }

    /**
     * Styles
     *
     * @since 2.0.0
     * @var string
     */
    public function styles($styles) {

        $styles->add([
            'selector' => '.app-header--fixed .menu--top__items',
            'styles' => [
                'justify-content' => Mod::get( $this->id ),
                'flex-direction' => 'row',
            ],
            'screen' => 'desktop',
        ]);
    }
}