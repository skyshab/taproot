<?php
/**
 * Header Template class
 *
 * This file contains callbacks for hooks within the site header.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */

namespace Taproot\Template\Branding;

use Hybrid\Contracts\Bootable;
use function Rootstrap\get_theme_mod;


/**
 * Handles front end logic
 *
 * @since  1.0.0
 * @access public
 */
class Branding implements Bootable {


	/**
	 * Adds actions on the appropriate customize action hooks.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function boot() {
        add_filter( 'hybrid/site/title', [ $this, 'site_title' ]  );
        add_filter( 'hybrid/site/description', [ $this, 'site_description' ]  );
    }


    /**
     * Display Site Title filter
     *
     * @since 1.0.0
     * @param string    $title
     * @return string
     */
    public function site_title( $title ) {
        if( get_theme_mod( 'branding--title--display-title', null, true ) )
            return $title;

        return false;
    }


    /**
     * Display Site Tagline filter
     *
     * @since 1.0.0
     * @param string    $tagline
     * @return string
     */
    public function site_description( $description ) {
        if( get_theme_mod( 'branding--tagline--display-tagline', null, true ) )
            return $description;

        return false;
    }

}
