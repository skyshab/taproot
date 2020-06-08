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

namespace Taproot\Components\Colors\Customize\Colors;

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
class Meta_Light extends Color {

    use CustomPropertyStyles;
    use CustomPropertyEditor;
    use CustomPropertyPreview;

    /**
     * Control id
     *
     * @since 2.0.0
     * @var string
     */
    public $id = 'colors--meta-light';

    /**
     * Control label
     *
     * @since 2.0.0
     * @var string
     */
    public $label = 'Meta Light Color';

    /**
     * Hide the alpha channel
     *
     * @since 2.0.0
     * @var bool
     */
    public $hide_alpha = TRUE;

    /**
     * Default
     *
     * @since 2.0.0
     * @var string
     */
    public $default = '#f4f4f4';

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
