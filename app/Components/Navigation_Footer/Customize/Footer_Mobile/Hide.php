<?php
/**
 * Hide.
 *
 * This class handles the customizer control for hiding an element.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2020, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Components\Navigation_Footer\Customize\Footer_Mobile;

use Taproot\Customize\Controls\Checkbox\Checkbox;
use Taproot\Tools\Mod;
use Taproot\Components\Navigation_Footer\Functions;
use function Hybrid\app;

/**
 * Class for checkbox control
 *
 * @since  2.0.0
 * @access public
 */
class Hide extends Checkbox {

    /**
     * Stores control ID
     *
     * @since 2.0.0
     * @var string
     */
    public $name = 'hide';

    /**
     * Stores control label
     *
     * @since 2.0.0
     * @var string
     */
    public $label = 'Hide When Mobile';

    /**
     * Styles
     *
     * @since 2.0.0
     * @var string
     */
    public function styles( $styles ) {

        if( Mod::get( $this->id ) ) {
            $styles->add([
                'selector' => '.menu--footer',
                'styles' => ['display' => 'none'],
                'screen' => Functions::get_mobile_screen()
            ]);
        }
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
                if ( to ) {
                    rootstrap.style({
                        id: "{$this->id}",
                        selector: '.menu--footer',
                        screen: getMobileScreen( wp.customize.instance('navigation--footer-mobile--breakpoint').get() ),
                        styles: { 'display': 'none'},
                    });
                }
            });
        });
JS;
    }
}
