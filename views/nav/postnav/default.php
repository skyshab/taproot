<?php
/**
 * Template for displaying post navigation
 *
 * @package taproot
 * @since 1.0.0
 */

if( get_theme_mod( 'posts--nav--enable', true ) ) {

    Hybrid\app('postnav')->display( 'default', [
        'nav_class' => 'postnav has-separators',
        'prev_icon' => Hybrid\app('icons')->location('postnav-prev', ['icon' => 'chevron-right', 'class' => 'flip-h']),
        'next_icon' => Hybrid\app('icons')->location('postnav-next', ['icon' => 'chevron-right']),
    ]);
}
