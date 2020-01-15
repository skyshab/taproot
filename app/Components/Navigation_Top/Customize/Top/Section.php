<?php
/**
 * Section.
 *
 * This class handles the customizer section.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2020, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Components\Navigation_Top\Customize\Top;

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
    public $name = 'top';

    /**
     * Section Title
     *
     * @since 2.0.0
     * @var string
     */
    public $title = 'Top Nav';

    /**
     * Controls
     *
     * @since 2.0.0
     * @var array
     */
    public $controls = [
        'Hide',
        'Background_Color',
        'Align',
        'Font_Family',
        'Font_Styles',
        'Link_Color',
        'Link_Color_Hover',
        'Font_Size',
        'Line_Height',
        'Padding'
    ];
}
