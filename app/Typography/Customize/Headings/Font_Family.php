<?php
/**
 * Title Font Family
 *
 * This class handles the customizer control for the title font famil.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2020, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Typography\Customize\Headings;

use Taproot\Customize\Controls\Select\Select;
use Taproot\Tools\Mod;
use function Hybrid\app;

/**
 * Class for checkbox control
 *
 * @since  2.0.0
 * @access public
 */
class Font_Family extends Select {

    /**
     * Control ID
     *
     * @since 2.0.0
     * @var string
     */
    public $name = 'font-family';

    /**
     * Label
     *
     * @since 2.0.0
     * @var string
     */
    public $label = 'Font Family';

    /**
     * Default
     *
     * @since 2.0.0
     * @var string
     */
    public $default = 'default';

    /**
     * Get Choices
     *
     * @since 2.0.0
     * @var string
     */
    public function get_choices() {
        return app('fonts/functions')->get_font_choices();
    }

    /**
     * Styles
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function styles( $styles ) {

        $styles->customProperty([
            'name'  => $this->id,
            'value' => app('fonts/functions')->get_font_family( Mod::get( $this->id ) ),
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
        $this->styles($styles);
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
                    value: getFontFamily( to )
                });
            });
        });
JS;
    }
}
