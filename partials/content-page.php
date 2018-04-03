<?php
/**
 * The default content template
 *
 * @package taproot
 * @since 0.8.0
 */
?>
<article <?php post_class(); ?> >

    <?php taproot_entry_header(); ?>

    <div class='entry-content'>
        <?php the_content(); ?>
    </div>

    <?php taproot_entry_footer(); ?>

</article>

<?php comments_template(); ?>
