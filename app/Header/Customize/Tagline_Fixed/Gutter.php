<?php
/**
 * Gutter.
 *
 * This class handles the component gutter spacing.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2020, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Header\Customize\Tagline_Fixed;

use Taproot\Customize\Controls\Range\Range;
use Taproot\Customize\Traits\CustomPropertyPreview;
use Taproot\Tools\Mod;
use function Taproot\Tools\theme_mod;

/**
 * Class for range control
 *
 * @since  2.0.0
 * @access public
 */
class Gutter extends Range {

    use CustomPropertyPreview;

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
    public $label = 'Gutter';

    /**
     * Range atts
     *
     * @since 2.0.0
     * @var array
     */
    public $atts = [
        'px' => [
            'max' => 100,
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

        // Mobile: If tagline is not hidden
        if( ! Mod::get( "header--tagline-fixed--hide" ) ) {

            $styles->customProperty([
                'name' => $this->id,
                'value' => theme_mod( $this->id ),
                'screen' => 'default'
            ]);
        }
    }
}
