<?php
/**
 * Header Template class
 *
 * This file contains callbacks for hooks within the site header.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2018 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */

namespace Taproot\Template\Header;

use Hybrid\Contracts\Bootable;
use function Rootstrap\get_theme_mod;


/**
 * Handles front end logic
 *
 * @since  1.0.0
 * @access public
 */
class Header implements Bootable {


	/**
	 * Adds actions on the appropriate customize action hooks.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function boot() {
        add_filter( 'hybrid/attr/app-header/class', [ $this, 'header_classes' ], 10, 2  );
        add_filter( 'theme_mod_header_image', [ $this, 'custom_header' ] );    
    }
    

    /**
     *  Add classes to header
     * 
     * @since 1.0.0
     * @return void
     */
    public function header_classes( $classes, $context) {

        // fixed header - don't do sticky headers on custom header pages
        if( get_theme_mod( 'header--styles-fixed--fixed', null, true ) ) {
            $fixed_type = get_theme_mod( 'header--styles-fixed--type', null, true );

            if( $this->hasCustomHeader() && 'sticky' === $fixed_type ) {
            
            }
            // if( !$this->hasCustomHeader() || 'sticky' !== $fixed_type ) {
            else {
                $classes[] = 'app-header--has-fixed';
                $classes[] = 'app-header--static';
                $classes[] = sprintf( 'fixed-type--%s', $fixed_type );
            }
        }

        // fullwidth header
        if( get_theme_mod( 'header--styles--fullwidth' ) )
            $classes[] = 'app-header--fullwidth';
        else
            $classes[] = 'app-header--standard-width';

        // branding mobile
        if( get_theme_mod( 'branding--layout-mobile--layout', null, true ) === 'vertical' )
            $classes[] = 'app-header--mobile--vertical';
        else
            $classes[] = 'app-header--mobile--horizontal';

        // branding tablet
        if( get_theme_mod( 'branding--layout-tablet--layout', null, true ) === 'vertical' )
            $classes[] = 'app-header--tablet--vertical';
        else
            $classes[] = 'app-header--tablet--horizontal';    

        // branding desktop
        if( get_theme_mod( 'branding--layout-desktop--layout', null, true ) === 'vertical' )
            $classes[] = 'app-header--desktop--vertical';
        else
            $classes[] = 'app-header--desktop--horizontal';  

        // boxed layout
        if( get_theme_mod( 'layout--site--boxed-layout' ) )
            $classes[] = 'boxed-layout';

        return $classes;
    } 


    /**
     * Filter for Custom Header Image display
     * 
     * Only display header image on front page
     * 
     * @since 1.0.0
     * @return void
     */
    public function custom_header( $value ) {
        return ( is_front_page() ) ? $value : 'remove-header';
    }


    /**
     * Does the page have a custom header?
     * 
     * @since 1.0.0
     * @return void
     */
    public function hasCustomHeader() {
        if( get_theme_mod('header_image') && get_theme_mod('header_image') !== 'remove-header' ) {
            return true;
        }
        else return false;
    }    

}
