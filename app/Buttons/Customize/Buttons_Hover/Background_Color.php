<?php
/**
 * Background Color.
 *
 * This class handles the customizer control for the background color.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2020, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Buttons\Customize\Buttons_Hover;

use Taproot\Customize\Controls\Color\Color;
use Taproot\Customize\Traits\CustomPropertyStyles;
use Taproot\Customize\Traits\CustomPropertyEditor;
use Taproot\Customize\Traits\CustomPropertyPreview;

/**
 * Class for color controls
 *
 * @since  2.0.0
 * @access public
 */
class Background_Color extends Color {

    use CustomPropertyStyles;
    use CustomPropertyEditor;
    use CustomPropertyPreview;

    /**
     * Custom control id
     *
     * @since 2.0.0
     * @var string
     */
    public $id = 'buttons--hover--background-color';

    /**
     * Stores control label
     *
     * @since 2.0.0
     * @var string
     */
    public $label = 'Background Color';
}
