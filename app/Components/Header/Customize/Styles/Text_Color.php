<?php
/**
 * Header Default Color.
 *
 * This class handles the customizer control for the header color.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2020, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Components\Header\Customize\Styles;

use Taproot\Customize\Controls\Color\Color;
use Taproot\Customize\Traits\CustomPropertyStyles;
use Taproot\Customize\Traits\CustomPropertyPreview;

/**
 * Class for color controls
 *
 * @since  2.0.0
 * @access public
 */
class Text_Color extends Color {

    use CustomPropertyStyles;
    use CustomPropertyPreview;

    /**
     * Control name
     *
     * @since 2.0.0
     * @var string
     */
    public $id = 'header--text-color';

    /**
     * Control label
     *
     * @since 2.0.0
     * @var string
     */
    public $label = 'Header Text Color';

    /**
     * Default
     *
     * @since 2.0.0
     * @var string
     */
    public $default = '#ffffff';
}
