<?php
/**
 * Section Tagline.
 *
 * This class handles the customizer section for the tagline controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2019, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Components\Header\Customize\Tagline;

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
     * @var string
     */
    public $namespace = __NAMESPACE__;

    /**
     * Section ID
     *
     * @since 2.0.0
     * @var string
     */
    public $name = 'tagline';

    /**
     * Section Title
     *
     * @since 2.0.0
     * @var string
     */
    public $title = 'Tagline';

    /**
     * Controls
     *
     * @since 2.0.0
     * @var array
     */
    public $controls = [
        'Blog_Description',
        'Enable',
        'Hide',
        'Color',
        'Font_Family',
        'Font_Styles',
        'Font_Size',
        'Line_Height',
        'Gutter',
    ];
}
