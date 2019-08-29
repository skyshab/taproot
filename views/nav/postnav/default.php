<?php
/**
 * Template for displaying post navigation
 *
 * @package taproot
 * @since 1.0.0
 */


if( get_theme_mod( 'posts--nav--enable', true ) ) {

    Taproot\Template\Postnav\display( 'default', [
        'nav_class' => 'postnav has-separators',
        'prev_icon' => Taproot\Template\Icons\location('postnav-prev', ['icon' => 'chevron-right', 'class' => 'flip-h']),
        'next_icon' => Taproot\Template\Icons\location('postnav-next', ['icon' => 'chevron-right']),
    ]);
}
