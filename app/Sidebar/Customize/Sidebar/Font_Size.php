<?php
/**
 * Font Size.
 *
 * This class handles the customizer control for the  * Font Size.
 *
 * This class handles the component font size.font size.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2020, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Sidebar\Customize\Sidebar;

use Taproot\Customize\Controls\Range\Range;
use Taproot\Customize\Traits\CustomPropertyStyles;
use Taproot\Customize\Traits\CustomPropertyPreview;

/**
 * Class for range control
 *
 * @since  2.0.0
 * @access public
 */
class Font_Size extends Range {

    use CustomPropertyStyles;
    use CustomPropertyPreview;

    /**
     * Custom control name
     *
     * @since 2.0.0
     * @var string
     */
    public $id = 'sidebar--font-size';

    /**
     * Label
     *
     * @since 2.0.0
     * @var string
     */
    public $label = 'Font Size';

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
    public $default = [
        'mobile' => '16px',
        'tablet' => '18px',
        'desktop' => '16px'
    ];

    /**
     * Range atts
     *
     * @since 2.0.0
     * @var array
     */
    public $atts = [
        'em' => [
            'min' => 0.8,
            'max' => 4,
        ],
        'rem' => [
            'min' => 0.8,
            'max' => 4,
        ],
        'px' => [
            'min' => 14,
            'max' => 72,
        ]
    ];
}
