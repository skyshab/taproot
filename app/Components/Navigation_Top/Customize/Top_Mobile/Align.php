<?php
/**
 * Align class.
 *
 * This class handles the customizer control for the component alignment.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2019, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Components\Navigation_Top\Customize\Top_Mobile;

use Taproot\Customize\Controls\Select\Select;
use Taproot\Components\Navigation_Top\Functions;
use function Taproot\Tools\theme_mod;

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
    public $default = 'center';

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
    public function styles( $styles ) {

        $styles->add([
            'selector' => '.menu--top__link',
            'styles' => [
                'text-align' => theme_mod( $this->id ),
            ],
            'screen' => Functions::get_mobile_screen()
        ]);
    }
}
