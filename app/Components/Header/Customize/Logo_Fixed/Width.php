<?php
/**
 * Fixed Header Logo Width.
 *
 * This class handles the customizer control for the fixed header logo width.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2019, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Components\Header\Customize\Logo_Fixed;

use Taproot\Customize\Controls\Range\Range;
use function Taproot\Tools\theme_mod;

/**
 * Class for range control
 *
 * @since  2.0.0
 * @access public
 */
class Width extends Range {

    /**
     * Custom control ID
     *
     * @since 2.0.0
     * @var string
     */
    public $name = 'width';

    /**
     * Label
     *
     * @since 2.0.0
     * @var string
     */
    public $label = 'Logo Width';

    /**
     * Range atts
     *
     * @since 2.0.0
     * @var array
     */
    public $atts = [
        'px' => [
            'max'   => 500,
            'default' => 75
        ],
        '%' => [
            'default' => 25
        ],
    ];

    /**
     * Styles
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function styles( $styles ) {

        $styles->add([
            'selector' => '.app-header--fixed .app-header__logo-link',
            'styles' => [
                'width' => theme_mod( $this->id )
            ],
            'screen' => 'desktop',
        ]);
    }
}
