<?php
/**
 * Template for displaying post navigation
 *
 * @package taproot
 * @since 1.0.0
 */

Hybrid\app('postnav/template')->the_postnav( 'default', [
    'prev_icon' => Hybrid\app('icons')->render( ['icon' => 'chevron-right', 'class' => 'flip-h'] ),
    'next_icon' => Hybrid\app('icons')->render( ['icon' => 'chevron-right'] ),
]);
