<?php
/**
 * Buttons Text Color.
 *
 * This class handles the customizer control for the buttons text color.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2020, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Buttons\Customize\Buttons;

use Taproot\Tools\Mod;
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
class Text_Color extends Color {

    use CustomPropertyStyles;
    use CustomPropertyEditor;
    use CustomPropertyPreview;

    /**
     * Control id
     *
     * @since 2.0.0
     * @var string
     */
    public $id = 'buttons--text-color';

    /**
     * Control label
     *
     * @since 2.0.0
     * @var string
     */
    public $label = 'Text Color';

    /**
     * Editor styles
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function editorStyles( $styles ) {

        $styles->customProperty([
            'name'      => $this->id,
            'value'     => Mod::get( $this->id ),
        ]);
    }
}
