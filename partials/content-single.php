<?php
/**
 * The default content template
 *
 * @package taproot
 * @since 0.8.0
 */
?>

<?php taproot_post_nav_top(); ?>

<article <?php post_class(); ?>>

    <?php taproot_entry_header(); ?>

    <div class='entry-content'>
        <?php the_content(); ?>
    </div>

    <?php taproot_entry_footer(); ?>

</article>

<?php
// post detail config
$post_detail_args = array(
    'icons' => false,
    'categories' => true,
    'tags' => true,
    'author' => false,
    'date' => false,
    'time' => false,
    'comments' => false,
    'meta_intro_text' => '',
);

taproot_post_details( $post_detail_args ); 
?>

<?php taproot_post_nav_bottom(); ?>

<?php comments_template(); ?>
