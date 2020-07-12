<?php
/**
 * Header Image Default Color.
 *
 * This class handles the customizer control for the header image default color.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2020, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Components\Header\Customize\Image;

use Taproot\Customize\Controls\Color\Color;
use Taproot\Customize\Traits\CustomPropertyStyles;
use Taproot\Customize\Traits\CustomPropertyPreview;
use Taproot\Tools\Mod;

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
    public $name = 'text-color';

    /**
     * Control label
     *
     * @since 2.0.0
     * @var string
     */
    public $label = 'Header Image Text Color';

    /**
     * Editor Styles
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function editorStyles( $styles ) {

        $styles->add([
            'selector' => '.taproot-overlay-preview-text',
            'styles' => [
                'color' => Mod::get( $this->id, '#ffffff' )
            ]
        ]);
    }
}
