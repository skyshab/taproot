<?php
/**
 * Link Color.
 *
 * This class handles the customizer control for the component link color.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2020, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Navigation\Top\Customize\Top_Fixed;

use Taproot\Customize\Controls\Color\Color;
use Taproot\Tools\Mod;

/**
 * Class for color controls
 *
 * @since  2.0.0
 * @access public
 */
class Link_Color extends Color {

    /**
     * Control id
     *
     * @since 2.0.0
     * @var string
     */
    public $name = 'color';

    /**
     * Control label
     *
     * @since 2.0.0
     * @var string
     */
    public $label = 'Link Color';

    /**
     * Styles
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function styles( $styles ) {

        $styles->customProperty([
            'name'      => 'navigation--top--color',
            'value'     => Mod::get( $this->id ),
            'screen'    => 'desktop',
            'selector'  => '.app-header--fixed'
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

        $script = <<< JS
        wp.customize( "{$this->id}", function( value ) {
            value.bind( function( to ) {
                rootstrap.customProperty({
                    name: 'navigation--top--color',
                    value: to,
                    screen: 'desktop',
                    selector: '.app-header--fixed'
                });
            });
        });
JS;
        return $script;
    }
}
