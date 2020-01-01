<?php
/**
 * Fixed Header Padding.
 *
 * This class handles the customizer control for the fixed header padding.
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
class Gutter extends Range {

    /**
     * Custom control ID
     *
     * @since 2.0.0
     * @var string
     */
    public $name = 'gutter';

    /**
     * Label
     *
     * @since 2.0.0
     * @var string
     */
    public $label = 'Gutter Width';

    /**
     * Default value
     *
     * @since 2.0.0
     * @var array
     */
    public $default = '16px';

    /**
     * Range atts
     *
     * @since 2.0.0
     * @var array
     */
    public $atts = [
        'px' => [
            'max'   => 50,
            'default' => 16
        ],
        'em' => [
            'max'   => 5,
            'default' => 1
        ],
        '%' => [
            'default' => 5
        ]
    ];

    /**
     * Styles
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function styles( $styles ) {

        $gutter = theme_mod( $this->id );

        if( 'horizontal' === theme_mod( 'header--layout--desktop', true ) && $gutter ) {
            $margin = sprintf( '0 %s 0 0', $gutter );
        }
        elseif( $gutter ) {
            $margin = sprintf( '0 0 %s 0', $gutter );
        }
        else {
            return;
        }

        // Logo Styles
        $styles->add([
            'selector' => '.app-header--fixed .app-header__logo-link',
            'styles' => [
                'margin' => $margin
            ],
            'screen' => 'desktop',
        ]);

    }
}
