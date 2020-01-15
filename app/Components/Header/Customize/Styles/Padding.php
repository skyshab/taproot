<?php
/**
 * Fixed Header Padding.
 *
 * This class handles the customizer control for the fixed header padding.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2020, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Components\Header\Customize\Styles;

use Taproot\Customize\Controls\Range\Range;
use Taproot\Customize\Traits\CustomPropertyStyles;
use Taproot\Customize\Traits\CustomPropertyPreview;

/**
 * Class for range control
 *
 * @since  2.0.0
 * @access public
 */
class Padding extends Range {

    use CustomPropertyStyles;
    use CustomPropertyPreview;

    /**
     * Custom control name
     *
     * @since 2.0.0
     * @var string
     */
    public $id = 'header--padding';

    /**
     * Label
     *
     * @since 2.0.0
     * @var string
     */
    public $label = 'Header Padding';

    /**
     * Default value
     *
     * @since 2.0.0
     * @var array
     */
    public $default = '16px';

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
            'max' => 20,
            'default' => 5
        ],
        'px' => [
            'max' => 100,
            'default' => 24
        ]
    ];
}
