<?php
/**
 * Preview Styles.
 *
 * This trait contains a method to add custom properties in the theme styles.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2020, Sky Shabatura
 * @link      https://github.com/skyshab/Taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Customize\Traits;

use function Taproot\Tools\theme_mod;

/**
 * Trait for custom property method.
 *
 * @since  2.0.0
 * @access public
 */
trait CustomPropertyStyles {

    /**
     * Styles
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function styles( $styles ) {

        // Default/mobile
        $styles->customProperty([
            'name' => $this->id,
            'value' => theme_mod( $this->id ),
            'screen' => 'default'
        ]);

        // Tablet
        if( isset( $this->devices ) && in_array( 'tablet', $this->devices ) ) {
            $styles->customProperty([
                'name' => $this->id,
                'value' => theme_mod( "{$this->id}--tablet" ),
                'screen' => 'tablet'
            ]);
        }

        // Desktop
        if( isset( $this->devices ) && in_array( 'desktop', $this->devices ) ) {
            $styles->customProperty([
                'name' => $this->id,
                'value' => theme_mod( "{$this->id}--desktop" ),
                'screen' => 'desktop'
            ]);
        }
    }
}
