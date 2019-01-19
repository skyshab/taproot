<?php
/**
 * Template Classes class.
 *
 * This file contains the logic that determines output of template classes.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2018 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */

namespace Taproot\Template\Footer;

use Hybrid\Contracts\Bootable;
use function Rootstrap\get_theme_mod;


/**
 * Handles front end logic
 *
 * @since  1.0.0
 * @access public
 */
class Footer implements Bootable {


	/**
	 * Adds actions on the appropriate customize action hooks.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function boot() {
        add_filter( 'hybrid/attr/app-footer/class', [ $this, 'footer_classes' ], 100, 2  );
        add_action( 'taproot/footer-widgets', [ $this, 'footer_sidebars' ] );
        add_action( 'taproot/footer-credits', [ $this, 'footer_credits' ] );           
    }
    
       
    /**
     *  Add classes to footer
     * 
     * @since 0.8.0
     * @return void
     */
    public function footer_classes( $classes, $context ) {
        if( get_theme_mod( 'footer--styles--fixed', null, true ) )
            $classes[] = 'app-footer--has-fixed';
            $classes[] = 'app-footer--fixed';

        if( get_theme_mod( 'footer--styles--fullwidth' ) )
            $classes[] = 'app-footer--fullwidth';
        else
            $classes[] = 'app-footer--standard-width';

        if( get_theme_mod( 'layout--site--boxed-layout' ) )
            $classes[] = 'boxed-layout';

        return $classes;
    } 


    /**
     *  Get Array of Footer Sidebars
     * 
     * @since 0.8.0
     * @return array - Returns an array of footer sidebar ids and Names
     */
    public function get_footer_sidebars() {

        $footer_sidebars = array(
            'footer-1' => 'Footer Sidebar 1',
            'footer-2' => 'Footer Sidebar 2',
            'footer-3' => 'Footer Sidebar 3',
            'footer-4' => 'Footer Sidebar 4'
        );

        return apply_filters( 'taproot/footer-sidebars/list', $footer_sidebars );
    }


    /**
     *  Has Active Footer Sidebars?
     * 
     * @since 0.8.0
     * @return bool
     */
    public function has_active_footer_sidebars() {

        $has_footer_sidebars = false;

        foreach ( $this->get_footer_sidebars() as $sidebar => $name ) {	
            if( is_active_sidebar( $sidebar ) ) {
                $has_footer_sidebars = true;
                break;
            }
        }	

        return ( $has_footer_sidebars ) ? true : false;
    }


    /**
     *  Get Footer Sidebars
     * 
     * @since 0.8.0
     * @return void
     */
    public function footer_sidebars() {

        $content = '';

        if( $this->has_active_footer_sidebars() ):
            $content .= '<div class="app-footer__widgets">';
        endif;

        foreach ( $this->get_footer_sidebars() as $sidebar => $name ) {
            if( is_active_sidebar( $sidebar ) && function_exists( 'dynamic_sidebar' ) ) {

                $content .= sprintf( '<aside id="%s" class="app-footer__sidebar %s" role="complementary">', esc_attr( $sidebar ), esc_attr( $sidebar ) );
                    
                    ob_start();
                    dynamic_sidebar( $sidebar );
                    $ob_output = ob_get_contents();
                    ob_end_clean();		        	

                    $content .= $ob_output;

                $content .= "</aside>";
            }
        }

        if( $this->has_active_footer_sidebars() ):
            $content .= '</div>';
        endif;

        echo $content;				
    }


    /**
     * Output Footer Credits
     *
     * @since 1.0.0
     * @return string
     */
    public function footer_credits() {
        echo get_theme_mod( 'footer--bottom-bar--content', null, true );
    }      
    
}
