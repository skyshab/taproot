<?php
/**
 * Line Height
 *
 * This class handles the component line height.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2020, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Components\Buttons\Customize\Buttons;

use Taproot\Customize\Controls\Range\Range;
use Taproot\Customize\Traits\CustomPropertyStyles;
use Taproot\Customize\Traits\CustomPropertyEditor;
use Taproot\Customize\Traits\CustomPropertyPreview;

/**
 * Class for range control
 *
 * @since  2.0.0
 * @access public
 */
class Line_Height extends Range {

    use CustomPropertyStyles;
    use CustomPropertyEditor;
    use CustomPropertyPreview;

    /**
     * Custom control ID
     *
     * @since 2.0.0
     * @var string
     */
    public $id = 'buttons--line-height';

    /**
     * Label
     *
     * @since 2.0.0
     * @var string
     */
    public $label = 'Line Height';

    /**
     * Default
     *
     * @since 2.0.0
     * @var string
     */
    public $default = '2.5';

    /**
     * Range atts
     *
     * @since 2.0.0
     * @var array
     */
    public $atts = [
        'unitless' => [
            'min' => 2,
            'max' => 4,
            'step' => 0.1,
            'default' => 2.5
        ]
    ];
}
