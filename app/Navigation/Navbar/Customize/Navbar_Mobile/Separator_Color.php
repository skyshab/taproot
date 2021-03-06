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

namespace Taproot\Navigation\Navbar\Customize\Navbar_Mobile;

use Taproot\Customize\Controls\Color\Color;
use Taproot\Tools\Mod;
use function Hybrid\app;

/**
 * Class for color controls
 *
 * @since  2.0.0
 * @access public
 */
class Separator_Color extends Color {

    /**
     * Custom control id
     *
     * @since 2.0.0
     * @var string
     */
    public $name = 'separator-color';

    /**
     * Stores control label
     *
     * @since 2.0.0
     * @var string
     */
    public $label = 'Separator Color';

    /**
     * Default
     *
     * @since 2.0.0
     * @var string
     */
    public $default = 'rgba(209,209,209,0.4)';

    /**
     * Styles
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function styles( $styles ) {

        $styles->add([
            'selector' => '.menu--navbar__item, .menu--navbar__link',
            'styles' => [
                'border-color' => Mod::get( $this->id),
            ],
            'screen' => app('navigation/navbar/functions')->get_mobile_screen(),
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
                rootstrap.style({
                    id: "{$this->id}",
                    selector: '.menu--navbar__item, .menu--navbar__link',
                    screen: getMobileScreen( wp.customize.instance('navigation--navbar-mobile--breakpoint').get() ),
                    styles: {
                        'border-color': to,
                    }
                });
            });
        });
JS;
    }
}
