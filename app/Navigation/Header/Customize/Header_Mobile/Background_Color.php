<?php
/**
 * Background Color.
 *
 * This class handles the customizer control for the background color.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2020, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Navigation\Header\Customize\Header_Mobile;

use Taproot\Customize\Controls\Color\Color;
use Taproot\Tools\Mod;
use function Hybrid\app;
/**
 * Class for color controls
 *
 * @since  2.0.0
 * @access public
 */
class Background_Color extends Color {

    /**
     * Custom control id
     *
     * @since 2.0.0
     * @var string
     */
    public $name = 'background-color';

    /**
     * Stores control label
     *
     * @since 2.0.0
     * @var string
     */
    public $label = 'Menu Background Color';

    /**
     * Default
     *
     * @since 2.0.0
     * @var string
     */
    public $default = '#424242';

    /**
     * Styles
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function styles( $styles ) {

        $styles->customProperty([
            'name'      => 'navigation--header-mobile--background-color',
            'value'     => Mod::get( $this->id ),
            'screen'    => app('navigation/header/functions')->get_mobile_screen()
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
                    name: 'navigation--header-mobile--background-color',
                    value: to,
                    screen: getMobileScreen( wp.customize.instance('navigation--header-mobile--breakpoint').get() ),
                });
            });
        });
JS;
        return $script;
    }
}
