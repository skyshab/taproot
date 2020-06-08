<?php
/**
 * Buttons Border Radius
 *
 * This class handles the customizer control for the buttons border radius.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2020, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Components\Buttons\Customize\Buttons;

use Taproot\Tools\Mod;
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
class Border_Radius extends Range {

    use CustomPropertyStyles;
    use CustomPropertyEditor;
    use CustomPropertyPreview;

    /**
     * Custom control id
     *
     * @since 2.0.0
     * @var string
     */
    public $id = 'buttons--border-radius';

    /**
     * Label
     *
     * @since 2.0.0
     * @var string
     */
    public $label = 'Border Radius';

    /**
     * Default
     *
     * @since 2.0.0
     * @var array
     */
    public $default = '0px';

    /**
     * Range atts
     *
     * @since 2.0.0
     * @var array
     */
    public $atts = [
        'px' => [
            'max' => 50,
            'default' => 0
        ],
    ];

    /**
     * Styles
     *
     * @since 2.0.0
     * @var string
     */
    public function styles( $styles ) {

        $styles->customProperty([
            'name'  => $this->id,
            'value' => Mod::get( $this->id ),
        ]);
    }

    /**
     * Editor Styles
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function editorStyles( $styles ) {
        $this->styles( $styles );
    }

    /**
     * Preview Styles
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function previewStyles() {

        return <<< JS
        wp.customize( "{$this->id}", function( value ) {
            value.bind( function( to ) {
                rootstrap.customProperty({
                    name: "{$this->id}",
                    value: to
                });
            });
        });
JS;
    }
}
