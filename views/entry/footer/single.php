<footer class="entry__footer entry__footer--single">

    <?php Hybrid\View\display( 'partials/post-meta', 'post', [
        'author' => false,
        'date' => false,
        'taxonomies' => ['category', 'post_tag'],
        'className' => 'taproot-meta entry__footer__taxonomies is-style-stacked',
    ]) ?>

    <?php Hybrid\View\display( 'nav/postnav' ) ?>

</footer>