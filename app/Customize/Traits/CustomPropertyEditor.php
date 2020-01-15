<?php
/**
 * Preview Editor Styles.
 *
 * This trait contains a method to add custom properties in the editor.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2020, Sky Shabatura
 * @link      https://github.com/skyshab/Taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Customize\Traits;

use Taproot\Tools\Mod;

/**
 * Trait for custom property method.
 *
 * @since  2.0.0
 * @access public
 */
trait CustomPropertyEditor {

    /**
     * Editor Styles
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function editorStyles( $styles ) {

        // mobile default
        $styles->customProperty([
            'name' => $this->id,
            'value' => Mod::get($this->id),
            'selector' => '.editor-styles-wrapper .wp-block',
        ]);

        // Tablet
        if( isset( $this->devices ) && in_array( 'tablet', $this->devices ) ) {

            // tablet size when settings panel closed, use mobile when open
            $styles->customProperty([
                'name' => $this->id,
                'value' => Mod::get("{$this->id}--tablet"),
                'screen' => 'editor-tablet',
                'selector' => '.edit-post-layout:not(.is-sidebar-opened)'
            ]);

            // tablet size when settings panel open
            $styles->customProperty([
                'name' => $this->id,
                'value' => Mod::get("{$this->id}--tablet"),
                'screen' => 'editor-desktop',
                'selector' => '.editor-styles-wrapper .wp-block',
            ]);
        }

        // Desktop
        if( isset( $this->devices ) && in_array( 'desktop', $this->devices ) ) {

            // desktop size when settings panel closed
            $styles->customProperty([
                'name' => $this->id,
                'value' => Mod::get("{$this->id}--desktop"),
                'screen' => 'editor-desktop',
                'selector' => '.edit-post-layout:not(.is-sidebar-opened)'
            ]);
        }
    }
}
