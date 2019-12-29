<?php
/**
 * Title Font Styles
 *
 * This class handles the customizer control for the title font styles.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2019, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Components\Typography\Customize\Headings;

use Taproot\Customize\Controls\Font_Styles\Font_Styles as FontStylesAbstract;
use function Hybrid\app;

/**
 * Class for checkbox control
 *
 * @since  2.0.0
 * @access public
 */
class Font_Styles extends FontStylesAbstract {

    /**
     * Control ID
     *
     * @since 2.0.0
     * @var string
     */
    public $name = 'font-styles';

    /**
     * Label
     *
     * @since 2.0.0
     * @var string
     */
    public $label = 'Font Styles';

    /**
     * Styles
     *
     * @since 2.0.0
     * @var string
     */
    public function styles($styles) {

        // Font Style
        $styles->add([
            'selector' => 'h1, h2, h3, h4, h5, h6',
            'styles' => app('typography')->get_font_styles( $this->id )
        ]);
    }

    /**
     * Editor Styles
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function editorStyles($styles) {
        $this->styles($styles);
    }
}
