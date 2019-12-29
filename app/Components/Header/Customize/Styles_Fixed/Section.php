<?php
/**
 * Section Fixed Header.
 *
 * This class handles the customizer section for the fixed header controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2019, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Components\Header\Customize\Styles_Fixed;

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
    public $name = 'fixed';

    /**
     * Section Title
     *
     * @since 2.0.0
     * @var string
     */
    public $title = 'Header Fixed';

    /**
     * Controls
     *
     * @since 2.0.0
     * @var array
     */
    public $controls = [
        'Is_Fixed',
        'Fixed_Type',
        'Background_Color',
        'Text_Color',
        'Link_Color_Hover',
        'Padding'
    ];
}
