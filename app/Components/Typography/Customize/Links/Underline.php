<?php
/**
 * Link underline.
 *
 * This class handles the link underline styles.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2020, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Components\Typography\Customize\Links;

use Taproot\Customize\Controls\Radio\Radio;
use function Taproot\Tools\theme_mod;

/**
 * Class for radio control
 *
 * @since  2.0.0
 * @access public
 */
class Underline extends Radio {

    /**
     * Control id
     *
     * @since 2.0.0
     * @var string
     */
    public $name = 'underline';

    /**
     * Control label
     *
     * @since 2.0.0
     * @var string
     */
    public $label = 'Links Underline';

    /**
     * Default
     *
     * @since 2.0.0
     * @var array
     */
    public $default = 'hover';

    /**
     * Get Choices
     *
     * @since 2.0.0
     * @var string
     */
    public function get_choices() {
        return [
            'none'      => esc_html__( 'None', 'taproot' ),
            'underline' => esc_html__( 'Underline', 'taproot' ),
            'hover'     => esc_html__( 'On Hover', 'taproot' ),
        ];
    }

    /**
     * Styles
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function styles( $styles ) {

        $underline = theme_mod( $this->id );

        if( 'underline' === $underline ) {
            $styles->add([
                'selector' => 'a:link',
                'styles' => [
                    'text-decoration' => 'underline'
                ]
            ]);
        }
        elseif( 'hover' === $underline ) {
            $styles->add([
                'selector' => 'a:link',
                'styles' => [
                    'text-decoration' => 'none'
                ]
            ]);
            $styles->add([
                'selector' => 'a:hover, a:active',
                'styles' => [
                    'text-decoration' => 'underline'
                ]
            ]);
        }
        elseif( 'none' === $underline ) {
            $styles->add([
                'selector' => 'a:link, a:hover, a:active',
                'styles' => [
                    'text-decoration' => 'none'
                ]
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
                if( 'underline' === to ) {
                    rootstrap.style({
                        id: "{$this->id}",
                        selector: 'a:link',
                        styles: {
                            'text-decoration': 'underline'
                        }
                    });
                }
                else if( 'hover' === to ) {
                    rootstrap.style({
                        id: "{$this->id}",
                        selector: 'a:link',
                        styles: {
                            'text-decoration': 'none'
                        }
                    });
                    rootstrap.style({
                        id: "{$this->id}",
                        selector: 'a:hover, a:active',
                        styles: {
                            'text-decoration': 'underline'
                        }
                    });
                }
                else if( 'none' === to ) {
                    rootstrap.style({
                        id: "{$this->id}",
                        selector: 'a:link, a:hover, a:active',
                        styles: {
                            'text-decoration': 'none'
                        }
                    });
                }
            });
        });
JS;
    }
}
