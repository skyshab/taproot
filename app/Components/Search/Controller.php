<?php
/**
 * Controller class.
 *
 * This file contains actions and callbacks for the component.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2020 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */

namespace Taproot\Components\Search;

use Hybrid\Contracts\Bootable;
use function Hybrid\Template\locate as locate_template;

/**
 * Class to handle component actions.
 *
 * @since  2.0.0
 * @access public
 */
class Controller implements Bootable {

    /**
     * Adds actions on the appropriate customize action hooks.
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function boot() {
        add_filter( 'get_search_form', [ $this, 'searchform' ] );
    }

    /**
     *  Get search form markup.
     *
     * @since 2.0.0
     * @return string
     */
    public function searchform( $form ) {

        $template = locate_template( ['partials/searchform.php'] );

        if ( $template ) {
            ob_start();
            include $template;
            $form = ob_get_clean();
        }

        return $form;
    }
}
