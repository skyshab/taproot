<header class="entry__header entry__header--single">

    <?php Hybrid\Post\display_title(['class' => 'entry__title entry__title--single']) ?>

    <p class="entry__byline entry__byline--single">
        <?php Hybrid\Post\display_author([
            'class' => 'entry__author entry__author--single',
            'before' => Taproot\Template\Icons\location( 'author', ['icon' => 'user'] ) 
        ])?>

        <?php Hybrid\Post\display_date([
            'before' => Taproot\Template\Icons\location( 'date', ['icon' => 'calendar'] ), 
            'class' => 'entry__published entry__published--single'
        ])?>
    </p>

</header>