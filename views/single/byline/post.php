<p class="byline post__byline">

    <?php Hybrid\Post\display_author([
        'class' => 'entry__author',
        'before' => '<span class="byline__item">' . Hybrid\app('icons')->render( ['icon' => 'user'] ),
        'after' => '</span>'
    ])?>

    <?php Hybrid\Post\display_date([
        'class' => 'entry__published',
        'before' => '<span class="byline__item">' . Hybrid\app('icons')->render( ['icon' => 'calendar'] ),
        'after' => '</span>'
    ])?>

    <?php if( taxonomy_exists('category') ):
        Hybrid\Post\display_terms([
            'taxonomy' => 'category',
            'before' => '<span class="byline__item">' . Hybrid\app('icons')->render( ['icon' => 'list-ul'] ),
            'after' => '</span>',
            'class' => 'entry__terms--category'
        ]);
    endif; ?>

    <?php if( taxonomy_exists('post_tag') ):
        Hybrid\Post\display_terms([
            'taxonomy' => 'post_tag',
            'before' => '<span class="byline__item">' . Hybrid\app('icons')->render( ['icon' => 'tags'] ),
            'after' => '</span>',
            'class' => 'entry__terms--post_tag'
        ]);
    endif; ?>
</p>