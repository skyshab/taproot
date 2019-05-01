<header class="entry__header entry__header--single">

    <?php Hybrid\Post\display_title(['class' => 'entry__title entry__title--single']) ?>

    <p class="entry__byline entry__byline--single">
        <?php Hybrid\Post\display_author([
            'class' => 'entry__author entry__author--single',
            'before' => '<span class="entry__byline__item">' . Taproot\Template\Icons\location( 'author', ['icon' => 'user'] ),
            'after' => '</span>'
        ])?>

        <?php Hybrid\Post\display_date([
            'class' => 'entry__published entry__published--single',
            'before' => '<span class="entry__byline__item">' . Taproot\Template\Icons\location( 'date', ['icon' => 'calendar'] ),
            'after' => '</span>'
        ])?>
    </p>

</header>