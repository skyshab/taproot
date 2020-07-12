<?php
/**
 * Header height.
 *
 * This class handles the customizer control for the header height.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2020, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Components\Navigation_Navbar\Customize\Navbar;

use Taproot\Customize\Controls\Range\Range;
use Taproot\Components\Navigation_Navbar\Functions;
use function Taproot\Tools\theme_mod;

/**
 * Class for range control
 *
 * @since  2.0.0
 * @access public
 */
class Line_Height extends Range {

    /**
     * Control ID
     *
     * @since 2.0.0
     * @var string
     */
    public $name = 'line-height';

    /**
     * Label
     *
     * @since 2.0.0
     * @var string
     */
    public $label = 'Menu Height';

    /**
     * Default values
     *
     * @since 2.0.0
     * @var array
     */
    public $default = '3em';

    /**
     * Range atts
     *
     * @since 2.0.0
     * @var array
     */
    public $atts = [
        'px' => [
            'max' => 100,
            'default' => 50,
        ],
        'em' => [
            'max' => 6,
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
            'name'      => $this->id,
            'value'     => theme_mod( $this->id ),
            'screen'    => Functions::get_desktop_screen(),
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
                    name: "{$this->id}",
                    screen: getDesktopScreen( wp.customize.instance('navigation--navbar-mobile--breakpoint').get() ),
                    value: to
                });
            });
        });
JS;
    }
}
