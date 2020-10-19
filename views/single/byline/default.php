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

</p>