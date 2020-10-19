<div class="app-content">
    <div class="app-content__container container woo">

        <main <?php Hybrid\Attr\display( 'app-main', 'woo', ['id' => 'main'] ) ?>>

            <div <?php Hybrid\Attr\display( 'archive', 'product' ) ?>>

                <header <?php Hybrid\Attr\display( 'archive__header', 'product' ) ?> >

                    <?php Hybrid\app('post-title/template')->the_archive_title() ?>

                    <?php if ( ! is_paged() && get_the_archive_description() ) : ?>
                        <div <?php Hybrid\Attr\display( 'archive__description', 'product' ) ?>>
                            <?php the_archive_description() ?>
                        </div>
                    <?php endif ?>

                </header>

                <div <?php Hybrid\Attr\display( 'archive__entries', 'product' ) ?>>

                    <?php
                    if ( woocommerce_product_loop() ) {

                        do_action( 'woocommerce_before_shop_loop' );

                        woocommerce_product_loop_start();

                        if ( wc_get_loop_prop( 'total' ) ) {

                            while ( have_posts() ) {
                                the_post();

                                do_action( 'woocommerce_shop_loop' );

                                wc_get_template_part( 'content', 'product' );
                            }
                        }

                        woocommerce_product_loop_end();

                        do_action( 'woocommerce_after_shop_loop' );

                    } else {
                        do_action( 'woocommerce_no_products_found' );
                    }
                    ?>

                </div>

            </div>

        </main>

        <?php $engine->display( 'sidebar', 'primary', [ 'sidebar' => 'primary' ] ) ?>

    </div>
</div>
