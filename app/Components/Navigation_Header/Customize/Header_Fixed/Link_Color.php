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

namespace Taproot\Components\Navigation_Header\Customize\Header_Fixed;

use Taproot\Customize\Controls\Color\Color;
use function Taproot\Tools\theme_mod;

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

        $styles->add([
            'selector' => '.app-header--fixed .menu--header__link:link, .app-header--fixed .menu--header__link:visited',
            'styles' => [
                'color' => theme_mod( $this->id ),
            ],
            'screen' => 'desktop',
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
                    selector: '.app-header--fixed .menu--header__link:link, .app-header--fixed .menu--header__link:visited',
                    screen: 'desktop',
                    styles: {
                        color: to
                    }
                });
            });
        });
JS;
    }
}
