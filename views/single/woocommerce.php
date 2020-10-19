
<div class="app-content">
    <div class="app-content__container container">

        <main <?php Hybrid\Attr\display( 'app-main', 'woocommerce', ['id' => 'main'] ) ?>>

            <article class="post post--product">

                <?php $engine->display( 'single/header', 'woocommerce' ) ?>

                <div <?php Hybrid\Attr\display( 'post__content', 'product' ) ?> >

                    <?php while ( have_posts() ) : the_post() ?>
                        <?php wc_get_template_part( 'content', 'single-product' ); ?>
                    <?php endwhile ?>

                </div>

                <?php $engine->display( 'single/footer', 'woocommerce' ) ?>

            </article>

        </main>

        <?php $engine->display( 'sidebar', 'primary', [ 'sidebar' => 'primary' ] ) ?>

    </div>
</div>
