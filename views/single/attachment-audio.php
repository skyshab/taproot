<article <?php Hybrid\Attr\display( 'entry', 'post', ['class' => 'post'] ) ?>>

    <?php $engine->display( 'single/header', 'attachment' ) ?>

    <div <?php Hybrid\Attr\display( 'post__content', 'attachment' ) ?> >

        <?php Hybrid\Media\display( [ 'type' => 'audio' ] ) ?>

        <?php the_content() ?>

        <div class="media-meta media-meta--audio">

            <h3 class="media-meta__title"><?php esc_html_e( 'Audio Info', 'taproot' ) ?></h3>

            <ul class="media-meta__items">
                <?php Hybrid\Media\display_meta( 'length_formatted', [ 'tag' => 'li', 'label' => __( 'Run Time', 'taproot' )     ] ) ?>
                <?php Hybrid\Media\display_meta( 'artist',           [ 'tag' => 'li', 'label' => __( 'Artist', 'taproot' )       ] ) ?>
                <?php Hybrid\Media\display_meta( 'album',            [ 'tag' => 'li', 'label' => __( 'Album', 'taproot' )        ] ) ?>
                <?php Hybrid\Media\display_meta( 'track_number',     [ 'tag' => 'li', 'label' => __( 'Track Number', 'taproot' ) ] ) ?>
                <?php Hybrid\Media\display_meta( 'year',             [ 'tag' => 'li', 'label' => __( 'Year', 'taproot' )         ] ) ?>
                <?php Hybrid\Media\display_meta( 'genre',            [ 'tag' => 'li', 'label' => __( 'Genre', 'taproot' )        ] ) ?>
                <?php Hybrid\Media\display_meta( 'file_name',        [ 'tag' => 'li', 'label' => __( 'Name', 'taproot' )         ] ) ?>
                <?php Hybrid\Media\display_meta( 'mime_type',        [ 'tag' => 'li', 'label' => __( 'Mime Type', 'taproot' )    ] ) ?>
                <?php Hybrid\Media\display_meta( 'file_type',        [ 'tag' => 'li', 'label' => __( 'Type', 'taproot' )         ] ) ?>
                <?php Hybrid\Media\display_meta( 'file_size',        [ 'tag' => 'li', 'label' => __( 'Size', 'taproot' )         ] ) ?>
            </ul>

        </div>

    </div>

</article>
