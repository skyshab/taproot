<?php
/**
 * Section.
 *
 * This class handles functionality for a customizer section.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2019, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Components\Colors\Customize\Colors;

use Taproot\Customize\Abstracts\Section as SectionAbstract;

/**
 * Extend the Customize Section class
 *
 * @since  2.0.0
 * @access public
 */
class Section extends SectionAbstract {

    /**
     * Section namespace
     *
     * @since 2.0.0
     * @var int
     */
    public $namespace = __NAMESPACE__;

    /**
     * Section ID
     *
     * @since 2.0.0
     * @var string
     */
    public $id = 'colors';

    /**
     * Controls
     *
     * @since 2.0.0
     * @var array
     */
    public $controls = [
        'Accent',
        'Accent_Contrast',
        'Meta_Light',
        'Meta_Medium',
        'Meta_Dark'
    ];

    /**
     * Sections.
     *
     * This is a core section, and doesn't need to be created.
     *
     * @since 2.0.0
     */
    public function sections( $manager ){}
}
