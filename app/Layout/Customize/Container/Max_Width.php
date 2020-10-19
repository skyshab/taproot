<?php
/**
 * Branding logo width.
 *
 * This class handles the customizer control for the branding logo width.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2020, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Layout\Customize\Container;

use Taproot\Customize\Controls\Range\Range;
use Taproot\Customize\Traits\CustomPropertyPreview;
use Taproot\Tools\Mod;

/**
 * Class for range control
 *
 * @since  2.0.0
 * @access public
 */
class Max_Width extends Range {

    use CustomPropertyPreview;

    /**
     * Custom control ID
     *
     * @since 2.0.0
     * @var string
     */
    public $name = 'max-width';

    /**
     * Label
     *
     * @since 2.0.0
     * @var string
     */
    public $label = 'Max Width';

    /**
     * Default value
     *
     * @since 2.0.0
     * @var array
     */
    public $default = '1060px';

    /**
     * Range atts
     *
     * @since 2.0.0
     * @var array
     */
    public $atts = [
        'px' => [
            'min'   => 600,
            'max'   => 1600,
            'default' => 1060
        ],
        'rem' => [
            'min'   => 10,
            'max'   => 100,
            'default' => 62
        ],
    ];

    /**
     * Styles
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function styles( $styles ) {

        $styles->customProperty([
            'name'  => 'container-max-width',
            'value' => Mod::get( $this->id )
        ]);
    }

    /**
     * Editor Styles
     *
     * @since  2.0.0
     * @access public
     * @param object $styles
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

        $script = <<< JS
        wp.customize( "{$this->id}", function( value ) {
            value.bind( function( to ) {
                rootstrap.customProperty({
                    name: 'container-max-width',
                    value: to
                });
            });
        });
JS;
        return $script;
    }
}
