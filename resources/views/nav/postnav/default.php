<?php
/**
 * Template for displaying post navigation
 *
 * @package taproot
 * @since 0.8.0
 */
?>

<?php Taproot\Template\Postnav\display( 'default', [
    'prev_icon' => Taproot\Template\Icons\location('postnav-prev', ['icon' => 'chevron-right', 'class' => 'flip-h']),    
    'next_icon' => Taproot\Template\Icons\location('postnav-next', ['icon' => 'chevron-right']),
])?>