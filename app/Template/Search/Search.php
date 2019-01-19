<?php
/**
 * Template class.
 *
 * This file contains the logic that determines output of template classes.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2018 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */

namespace Taproot\Template\Search;

use Hybrid\Contracts\Bootable;
use function Hybrid\Template\locate as locate_template;


/**
 * Handles front end logic
 *
 * @since  1.0.0
 * @access public
 */
class Search implements Bootable {


	/**
	 * Adds actions on the appropriate customize action hooks.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function boot() {
        add_filter( 'get_search_form', [ $this, 'searchform' ] );
    }
    
       
    /**
     *  Get search form markup
     * 
     * @since 0.8.0
     * @return void
     */
    public function searchform( $form ) {
        $template = locate_template( 'partials/searchform.php' );
        if ( $template ) {
            ob_start();
            include $template;
            $form = ob_get_clean();
        }
        return $form;
    }

}
