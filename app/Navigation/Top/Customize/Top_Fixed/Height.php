<?php
/**
 * Header height.
 *
 * This class handles the customizer control for the header height.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2021, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Navigation\Top\Customize\Top_Fixed;

use Taproot\Customize\Controls\Range\Range;
use Taproot\Tools\Mod;

/**
 * Class for range control
 *
 * @since  2.1.0
 * @access public
 */
class Height extends Range {

    /**
     * Control ID
     *
     * @since 2.1.0
     * @var string
     */
    public $name = 'height';

    /**
     * Label
     *
     * @since 2.1.0
     * @var string
     */
    public $label = 'Menu Height';

    /**
     * Default values
     *
     * @since 2.1.0
     * @var array
     */
    public $default = '2.5rem';    

    /**
     * Range atts
     *
     * @since 2.1.0
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
     * @since  2.1.0
     * @access public
     * @return void
     */
    public function styles( $styles ) {

        $styles->customProperty([
            'name'      => 'navigation--top--height',
            'value'     => Mod::get( $this->id ),
            'screen'    => 'desktop',
            'selector'  => '.app-header--fixed',
        ]);        
    }

    /**
     * Preview Styles
     *
     * @since  2.1.0
     * @access public
     * @return void
     */
    public function previewStyles() {

        return <<< JS
        wp.customize( "{$this->id}", function( value ) {
            value.bind( function( to ) {
                rootstrap.customProperty({
                    name: 'navigation--top--height',
                    screen: 'desktop',
                    value: to,
                    selector: '.app-header--fixed'
                });
            });
        });
JS;
    }
}
