<?php
/**
 * Template for displaying post navigation
 *
 * @package taproot
 * @since 1.0.0
 */

Taproot\Template\Postnav\display( 'default', [
    'prev_icon' => Taproot\Template\Icons\location('postnav-prev', ['icon' => 'chevron-right', 'class' => 'flip-h']),    
    'next_icon' => Taproot\Template\Icons\location('postnav-next', ['icon' => 'chevron-right']),
]);