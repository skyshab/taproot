<?php
/**
 * Text Color.
 *
 * This class handles the customizer control for the component text color.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2020, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Post_Types\Customize\Single\Title;

use Taproot\Customize\Controls\Color\Color;
use function Taproot\Tools\theme_mod;

/**
 * Class for color controls
 *
 * @since  2.0.0
 * @access public
 */
class Text_Color extends Color {

    /**
     * Control id
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
    public $label = 'Text Color';

    /**
     * Styles
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function styles( $styles ) {

        $styles->customProperty([
            'name'      => 'post--title--text-color',
            'value'     => theme_mod( $this->id ),
            'selector'  => ".single-{$this->post_type}"
        ]);
    }

    /**
     * Editor styles
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function editorStyles( $styles ) {

        $styles->customProperty([
            'name'      => 'post--title--text-color',
            'value'     => theme_mod( $this->id ),
            'selector'  => ".post-type-{$this->post_type} .editor-styles-wrapper .wp-block .editor-post-title__input"
        ]);
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
                    name: 'post--title--text-color',
                    selector: ".single-{$this->post_type}",
                    value: to
                });
            });
        });
JS;
    }
}
