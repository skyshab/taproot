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

namespace Taproot\Components\Layout\Customize\Content;

use Taproot\Customize\Controls\Range\Range;
use Taproot\Customize\Traits\CustomPropertyStyles;
use Taproot\Customize\Traits\CustomPropertyPreview;

/**
 * Class for range control
 *
 * @since  2.0.0
 * @access public
 */
class Spacing extends Range {

    use CustomPropertyStyles;
    use CustomPropertyPreview;

    /**
     * Custom control ID
     *
     * @since 2.0.0
     * @var string
     */
    public $id = 'layout-spacing';

    /**
     * Label
     *
     * @since 2.0.0
     * @var string
     */
    public $label = 'Spacing';

    /**
     * Default values
     *
     * @since 2.0.0
     * @var array
     */
    public $default = [
        'mobile'    => '7vw',
        'tablet'    => '5vw',
        'desktop'   => '52px'
    ];

    /**
     * Devices
     *
     * @since 2.0.0
     * @var array
     */
    public $devices = ['mobile', 'tablet', 'desktop'];

    /**
     * Range atts
     *
     * @since 2.0.0
     * @var array
     */
    public $atts = [
        'vw' => [
            'min' => 0,
            'max' => 25,
        ],
        'rem' => [
            'min' => 0,
            'max' => 10,
        ],
        'px' => [
            'min' => 0,
            'max' => 100,
        ]
    ];
}
