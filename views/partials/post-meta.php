<?php
/**
 * Template for displaying post meta component
 *
 * @package taproot
 * @since 1.0.0
 */

use function Taproot\Template\Icons\location as icon;
use function Hybrid\Post\display_date as display_date;
use function Hybrid\Post\display_terms as display_terms;

// define defaults
$defaults = [
    'author' => true,
    'date'   => true,
    'taxonomies' => [],
    'textColor' => false,
    'customTextColor' => false,
    'align' => false,
    'className' => 'taproot-meta',
    'styles' => '',
    'icons' => false
];

// merge incoming data with defaults
$data = wp_parse_args($data, $defaults);

// Open element
printf('<p class="%s" style="%s">', $data['className'], $data['styles'] );

// Display Author
if( $data['author'] !== false ) {
    global $post;
    $author_id = $post->post_author;
    $author_name = sprintf('<span class="taproot-meta__item__content">%s</span>', get_the_author_meta('display_name', $author_id) );
    $author_label = ( $data['icons'] ) ?
        icon( 'author', ['icon' => 'user'] ) :
        sprintf('<span class="taproot-meta__label">%s:</span>', esc_html__('Author', 'taproot') );

    printf('<span class="taproot-meta__item taproot-meta__item--author">%s %s</span>', $author_label, $author_name);
}

// Display Published Date
if( $data['date'] !== false ) {
    $date_label = ( $data['icons'] ) ?
        icon( 'date', ['icon' => 'calendar'] ) :
        sprintf('<span class="taproot-meta__label">%s:</span>', esc_html__('Published', 'taproot') );

    display_date([
        'class' => 'taproot-meta__item__content',
        'before' => '<span class="taproot-meta__item taproot-meta__item--date ">' . $date_label,
        'after' => '</span>'
    ]);
}

// Display Taxonomies
if( !empty( $data['taxonomies'] ) ) {
    foreach( $data['taxonomies'] as $tax ) {
        if( taxonomy_exists($tax) ) {

            if( $data['icons'] ) {
                $tax_label = ( is_taxonomy_hierarchical( $tax ) ) ?
                    icon( 'categories', ['icon' => 'list-ul'] ) :
                    icon( 'tags', ['icon' => 'tags'] );
            }
            else {
                $tax_labels = get_taxonomy_labels( get_taxonomy( $tax ) );
                $tax_label = sprintf('<span class="taproot-meta__item__label">%s:</span>', esc_html($tax_labels->name) );
            }

            display_terms([
                'taxonomy' => $tax,
                'before' => sprintf( '<span class=" taproot-meta__item taproot-meta__item--%s">%s', $tax, $tax_label ),
                'after' => '</span>',
                'class' => sprintf( 'taproot-meta__terms taproot-meta__terms--%s', $tax)
            ]);
        }
    }
}

// Close element
echo '</p>';
