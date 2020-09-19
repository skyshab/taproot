<?php
/**
 * Widget Spacing.
 *
 * This class handles the customizer control for the widget spacing.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2020, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Footer\Customize\Widgets;

use Taproot\Customize\Controls\Range\Range;
use Taproot\Customize\Traits\CustomPropertyStyles;
use Taproot\Customize\Traits\CustomPropertyPreview;

/**
 * Class for range control
 *
 * @since  2.0.0
 * @access public
 */
class Gutter extends Range {

    use CustomPropertyStyles;
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
    public $label = 'Widgets Spacing';

    /**
     * Devices
     *
     * @since 2.0.0
     * @var array
     */
    public $devices = ['mobile', 'tablet', 'desktop'];

    /**
     * Default
     *
     * @since 2.0.0
     * @var string
     */
    public $default = '16px';

    /**
     * Range atts
     *
     * @since 2.0.0
     * @var array
     */
    public $atts = [
        'vw' => [
            'max' => 20,
            'default' => 5
        ],
        'px' => [
            'max' => 100,
            'default' => 24
        ]
    ];
}
