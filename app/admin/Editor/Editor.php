<?php
/**
 * Blog Template class
 *
 * This file contains callbacks for hooks within the blog pages.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2018 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */

namespace Taproot\Admin\Editor;

use Hybrid\Contracts\Bootable;
use Rootstrap\Modules\Styles\Styles;
use function Taproot\asset;


/**
 * Handles block editor functionality
 *
 * @since  1.0.0
 * @access public
 */
class Editor implements Bootable {


	/**
	 * Adds actions on the appropriate customize action hooks.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function boot() {
        add_action( 'enqueue_block_editor_assets', [ $this, 'assets' ] );
    }


    /**
     *  Enqueue Editor Assets
     * 
     * @since 1.0.0
     * @return void
     */
    public function assets() {

        // Enqueue theme editor styles.
        wp_enqueue_style( 'taproot-editor', asset( 'css/editor.css' ), null, null );
    
        // add our custom styles and vars
        wp_add_inline_style( 'taproot-editor', $this->editor_styles() );
    
        // Unregister core block and theme styles.
        wp_deregister_style( 'wp-block-library' );
        wp_deregister_style( 'wp-block-library-theme' );
    
        // Re-register core block and theme styles with an empty string. 
        // This is necessary to get styles set up correctly.
        wp_register_style( 'wp-block-library', '' );
        wp_register_style( 'wp-block-library-theme', '' );

        // Google Fonts
        if( $google_fonts = get_theme_mod( 'taproot-google-fonts' ) ) {
            $google_link = sprintf( '//fonts.googleapis.com/css?family=%s', esc_attr( $google_fonts ) );
            wp_enqueue_style('taproot-google-fonts', esc_url( $google_link ) );
        }        
    }   


    /**
     * Get styles and vars for editor
     * 
     * @since 1.0.0
     * @return string - Returns CSS string 
     */
    public function editor_styles() {

        $styles = new Styles();
        
        // add screen
        $styles->add_screen( 'editor-tablet', [
            'min' => '768px'
        ]);

        // add screen
        $styles->add_screen( 'editor-desktop', [
            'min' => '960px'
        ]);

        // get the style files
        include_once 'styles/styles.php';

        // generate and return CSS
        return $styles->get_styles();
    }          

}
