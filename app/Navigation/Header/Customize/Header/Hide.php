<?php
/**
 * Hide Logo When Fixed Header.
 *
 * This class handles the customizer control for hiding the logo in the fixed header.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2020, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Navigation\Header\Customize\Header;

use Taproot\Customize\Controls\Checkbox\Checkbox;
use Taproot\Tools\Mod;
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
    public $label = 'Hide when not mobile';

    /**
     * Styles
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function styles( $styles ) {

        if( Mod::get( $this->id ) ) {
            $styles->add([
                'selector' => '.menu--header',
                'styles' => ['display' => 'none'],
                'screen' => app('navigation/header/functions')->get_desktop_screen(),
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
                if( to ) {
                    rootstrap.style({
                        id: "{$this->id}",
                        selector: '.menu--header',
                        screen: getDesktopScreen( wp.customize.instance('navigation--header-mobile--breakpoint').get() ),
                        styles: { display: 'none'}
                    });
                }
            });
        });
JS;
    }
}
