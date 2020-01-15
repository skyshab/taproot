<?php
/**
 * Padding.
 *
 * This class handles the customizer control for the padding.
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
class Padding extends Range {

    use CustomPropertyStyles;
    use CustomPropertyEditor;
    use CustomPropertyPreview;

    /**
     * Custom control id
     *
     * @since 2.0.0
     * @var string
     */
    public $id = 'buttons--padding';

    /**
     * Label
     *
     * @since 2.0.0
     * @var string
     */
    public $label = 'Padding';

    /**
     * Default
     *
     * @since 2.0.0
     * @var array
     */
    public $default = '1.25em';

    /**
     * Range atts
     *
     * @since 2.0.0
     * @var array
     */
    public $atts = [
        'px' => [
            'max' => 50,
        ],
        'em' => [
            'max' => 4,
        ],
        'rem' => [
            'max' => 4,
        ]
    ];
}
