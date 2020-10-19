<?php
/**
 * Icon Size.
 *
 * This class handles the customizer control for the icon font size.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2020, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Navigation\Navbar\Customize\Navbar_Mobile;

use Taproot\Customize\Controls\Range\Range;
use Taproot\Tools\Mod;
use function Hybrid\app;

/**
 * Class for range control
 *
 * @since  2.0.0
 * @access public
 */
class Icon_Size extends Range {

    /**
     * Custom control ID
     *
     * @since 2.0.0
     * @var string
     */
    public $name = 'icon-size';

    /**
     * Label
     *
     * @since 2.0.0
     * @var string
     */
    public $label = 'Icon Size';

    /**
     * Range atts
     *
     * @since 2.0.0
     * @var array
     */
    public $atts = [
        'px' => [
            'max' => 48,
        ],
        'em' => [
            'max' => 3,
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

        $styles->add([
            'selector' => '.menu--navbar .menu--toggle',
            'styles' => [
                'font-size' => Mod::get( $this->id ),
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
                    selector: '.menu--navbar .menu--toggle',
                    screen: getMobileScreen( wp.customize.instance('navigation--navbar-mobile--breakpoint').get() ),
                    styles: {
                        'font-size': to,
                    }
                });
            });
        });
JS;
    }
}
