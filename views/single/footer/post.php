<footer <?php Hybrid\Attr\display( 'post__footer', get_post_type() ) ?> >
    <?php $engine->display( 'nav/postnav' ) ?>
    <?php comments_template() ?>
</footer>
