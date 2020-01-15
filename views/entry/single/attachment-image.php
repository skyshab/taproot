<article <?php Hybrid\Attr\display( 'entry' ) ?>>

    <header class="entry__header entry__header--single">
        <?php Hybrid\Post\display_title() ?>

        <div class="entry__byline entry__byline--single">
            <?php Hybrid\Media\display_image_sizes( [
                // Translators: %s is a list of image size links.
                'text' => esc_html__( 'Sizes: %s', 'taproot' )
            ]) ?>
        </div>
    </header>

    <?php echo wp_get_attachment_image( get_the_ID(), 'large', false, [ 'class' => 'aligncenter' ] ) ?>

    <div class="entry__content entry__content--single">
        <?php the_content() ?>
        <?php Hybrid\View\display( 'nav/pagination', 'post' ) ?>
    </div>

    <?php $gallery = gallery_shortcode( [
        'columns'     => 4,
        'numberposts' => 8,
        'orderby'     => 'rand',
        'id'          => get_queried_object()->post_parent,
        'exclude'     => get_the_ID()
    ] ) ?>

    <?php if ( $gallery ) : ?>

        <div class="media-gallery">
            <h3 class="media-gallery__title"><?php esc_html_e( 'Gallery', 'taproot' ) ?></h3>
            <?php echo $gallery ?>
        </div>

    <?php endif ?>

    <div class="media-meta media-meta--image">

        <h3 class="media-meta__title"><?php esc_html_e( 'Image Info', 'taproot' ) ?></h3>

        <ul class="media-meta__items">
            <?php Hybrid\Media\display_meta( 'dimensions',        [ 'tag' => 'li', 'label' => __( 'Dimensions', 'taproot' )    ] ) ?>
            <?php Hybrid\Media\display_meta( 'created_timestamp', [ 'tag' => 'li', 'label' => __( 'Date', 'taproot' )          ] ) ?>
            <?php Hybrid\Media\display_meta( 'camera',            [ 'tag' => 'li', 'label' => __( 'Camera', 'taproot' )        ] ) ?>
            <?php Hybrid\Media\display_meta( 'aperture',          [ 'tag' => 'li', 'label' => __( 'Aperture', 'taproot' )      ] ) ?>
            <?php Hybrid\Media\display_meta( 'focal_length',      [ 'tag' => 'li', 'label' => __( 'Focal Length', 'taproot' )  ] ) ?>
            <?php Hybrid\Media\display_meta( 'iso',               [ 'tag' => 'li', 'label' => __( 'ISO', 'taproot' )           ] ) ?>
            <?php Hybrid\Media\display_meta( 'shutter_speed',     [ 'tag' => 'li', 'label' => __( 'Shutter Speed', 'taproot' ) ] ) ?>
            <?php Hybrid\Media\display_meta( 'file_name',         [ 'tag' => 'li', 'label' => __( 'Name', 'taproot' )          ] ) ?>
            <?php Hybrid\Media\display_meta( 'mime_type',         [ 'tag' => 'li', 'label' => __( 'Mime Type', 'taproot' )     ] ) ?>
            <?php Hybrid\Media\display_meta( 'file_type',         [ 'tag' => 'li', 'label' => __( 'Type', 'taproot' )          ] ) ?>
            <?php Hybrid\Media\display_meta( 'file_size',         [ 'tag' => 'li', 'label' => __( 'Size', 'taproot' )          ] ) ?>
        </ul>

    </div>

</article>
