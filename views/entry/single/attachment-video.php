<article <?php Hybrid\Attr\display( 'entry' ) ?>>

    <header class="entry__header entry__header--single">
        <?php Hybrid\Post\display_title() ?>
    </header>

    <?php Hybrid\Media\display( [ 'type' => 'video' ] ) ?>

    <div class="entry__content entry__content--single">
        <?php the_content() ?>
        <?php Hybrid\View\display( 'nav/pagination', 'post' ) ?>
    </div>

    <div class="media-meta media-meta--video">

        <h3 class="media-meta__title"><?php esc_html_e( 'Video Info', 'taproot' ) ?></h3>

        <ul class="media-meta__items">
            <?php Hybrid\Media\display_meta( 'length_formatted', [ 'tag' => 'li', 'label' => __( 'Run Time', 'taproot' )   ] ) ?>
            <?php Hybrid\Media\display_meta( 'dimensions',       [ 'tag' => 'li', 'label' => __( 'Dimensions', 'taproot' ) ] ) ?>
            <?php Hybrid\Media\display_meta( 'file_name',        [ 'tag' => 'li', 'label' => __( 'Name', 'taproot' )       ] ) ?>
            <?php Hybrid\Media\display_meta( 'mime_type',        [ 'tag' => 'li', 'label' => __( 'Mime Type', 'taproot' )  ] ) ?>
            <?php Hybrid\Media\display_meta( 'file_type',        [ 'tag' => 'li', 'label' => __( 'Type', 'taproot' )       ] ) ?>
            <?php Hybrid\Media\display_meta( 'file_size',        [ 'tag' => 'li', 'label' => __( 'Size', 'taproot' )       ] ) ?>
        </ul>

    </div>

</article>
