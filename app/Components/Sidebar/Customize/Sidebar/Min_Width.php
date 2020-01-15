<?php
/**
 * Branding logo width.
 *
 * This class handles the customizer control for the branding logo width.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2020, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Components\Sidebar\Customize\Sidebar;

use Taproot\Customize\Controls\Range\Range;
use Taproot\Tools\Mod;
use Taproot\Customize\Traits\CustomPropertyPreview;

/**
 * Class for range control
 *
 * @since  2.0.0
 * @access public
 */
class Min_Width extends Range {

    use CustomPropertyPreview;

    /**
     * Custom control name
     *
     * @since 2.0.0
     * @var string
     */
    public $id = 'sidebar--min-width';

    /**
     * Label
     *
     * @since 2.0.0
     * @var string
     */
    public $label = 'Minimum Sidebar Width';

    /**
     * Default value
     *
     * @since 2.0.0
     * @var array
     */
    public $default = '250px';

    /**
     * Range atts
     *
     * @since 2.0.0
     * @var array
     */
    public $atts = [
        'px' => [
            'max'   => 600,
            'default' => 250
        ],
        '%' => [
            'max'   => 50,
            'default' => 30
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

        $styles->customProperty([
            'name'  => $this->id,
            'value' => Mod::get( $this->id ),
            'screen' => 'desktop'
        ]);
    }
}
