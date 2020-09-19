<?php
/**
 * Footer Default Hover Color.
 *
 * This class handles the customizer control for the footer hover color.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2020, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Footer\Customize\Footer;

use Taproot\Customize\Controls\Color\Color;
use Taproot\Customize\Traits\CustomPropertyStyles;
use Taproot\Customize\Traits\CustomPropertyPreview;

/**
 * Class for color controls
 *
 * @since  2.0.0
 * @access public
 */
class Link_Color_Hover extends Color {

    use CustomPropertyStyles;
    use CustomPropertyPreview;

    /**
     * Stores name
     *
     * @since 2.0.0
     * @var string
     */
    public $id = 'footer--link-color--hover';

    /**
     * Stores control label
     *
     * @since 2.0.0
     * @var string
     */
    public $label = 'Link Color: Hover';
}