<?php
/**
 * Height Class.
 *
 * This class handles the customizer control for the component height.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2020, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Navigation\Navbar\Customize\Navbar_Fixed;

use Taproot\Customize\Controls\Range\Range;
use Taproot\Tools\Mod;

/**
 * Class for range control
 *
 * @since  2.0.0
 * @access public
 */
class Height extends Range {

    /**
     * Control ID
     *
     * @since 2.0.0
     * @var string
     */
    public $name = 'height';

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
    public $default = '3rem';    

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
        'rem' => [
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
            'name'      => 'navigation--navbar--height',
            'value'     => Mod::get( $this->id ),
            'screen'    => 'desktop',
            'selector'  => '.app-header--fixed',
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
                    name: 'navigation--navbar--height',
                    screen: 'desktop',
                    value: to,
                    selector: '.app-header--fixed'
                });
            });
        });
JS;
    }
}
