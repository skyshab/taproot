<?php
/**
 * Theme Color.
 *
 * This class handles the customizer control for a theme color.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2020, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Sidebar\Customize\Colors;

use Taproot\Customize\Controls\Color\Color;
use Taproot\Customize\Traits\CustomPropertyStyles;
use Taproot\Customize\Traits\CustomPropertyPreview;

/**
 * Class for color controls
 *
 * @since  2.0.0
 * @access public
 */
class Background_Color extends Color {

    use CustomPropertyStyles;
    use CustomPropertyPreview;

    /**
     * Control name
     *
     * @since 2.0.0
     * @var string
     */
    public $id = 'sidebar--background-color';

    /**
     * Control label
     *
     * @since 2.0.0
     * @var string
     */
    public $label = 'Background Color';

    /**
     * Hide the alpha channel
     *
     * @since 2.0.0
     * @var bool
     */
    public $hide_alpha = TRUE;
}
