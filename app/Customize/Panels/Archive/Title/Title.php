<?php
/**
 * Footer bottom bar content.
 *
 * This class handles the customizer control for the footer bottom bar content.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2020, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Customize\Panels\Archive\Title;

use Taproot\Customize\Controls\Control\Control;

/**
 * Class for color controls
 *
 * @since  2.0.0
 * @access public
 */
class Title extends Control {

    /**
     * Control id
     *
     * @since 2.0.0
     * @var string
     */
    public $name = 'title';

    /**
     * Control type
     *
     * @since 2.0.0
     * @var string
     */
    public $type = 'text';

    /**
     * Sanitization callback
     *
     * @since 2.0.0
     * @var string
     */
    public $sanitize_callback = 'wp_kses_post';

    /**
     * Label
     *
     * @since 2.0.0
     * @var string
     */
    public $label = 'Archive Title';

    /**
     * Transport method
     *
     * @since 2.0.0
     * @var string
     */
    public $transport = 'postMessage';

    /**
     * Partials
     *
     * @since  2.0.0
     * @access public
     * @param  array - $manager
     * @return void
     */
    public function partials( $manager ) {

        if( isset( $manager->selective_refresh ) ) {
            $manager->selective_refresh->add_partial( $this->id, [
                'selector'              => ".archive-header__title--{$this->post_type}",
                'container_inclusive'   => FALSE,
                'fallback_refresh'      => FALSE,
                'render_callback'       => 'get_the_archive_title',
            ]);
        }
    }
}
