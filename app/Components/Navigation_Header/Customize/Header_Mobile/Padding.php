<?php
/**
 * Padding.
 *
 * This class handles the customizer control for the padding.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2020, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Components\Navigation_Header\Customize\Header_Mobile;

use Taproot\Customize\Controls\Range\Range;
use Taproot\Tools\Mod;
use Taproot\Components\Navigation_Header\Functions;

/**
 * Class for range control
 *
 * @since  2.0.0
 * @access public
 */
class Padding extends Range {

    /**
     * Custom control id
     *
     * @since 2.0.0
     * @var string
     */
    public $name = 'padding';

    /**
     * Label
     *
     * @since 2.0.0
     * @var string
     */
    public $label = 'Menu Item Padding';

    /**
     * Default
     *
     * @since 2.0.0
     * @var string
     */
    public $default = '1.25em';

    /**
     * Range atts
     *
     * @since 2.0.0
     * @var array
     */
    public $atts = [
        'px' => [
            'max' => 32,
        ],
        'em' => [
            'max' => 2,
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
            'selector' => '.menu--header__link',
            'styles' => [
                'padding-left'  => Mod::get( $this->id ),
                'padding-right' => Mod::get( $this->id ),
            ],
            'screen' => Functions::get_mobile_screen(),
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
                    selector: '.menu--header__link',
                    screen: getMobileScreen( wp.customize.instance('navigation--header-mobile--breakpoint').get() ),
                    styles: {
                        'padding-left': to,
                        'padding-right': to,
                    }
                });
            });
        });
        JS;
    }
}
