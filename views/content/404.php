<div class="app-content">
    <div class="app-content__container container">
        <main <?php Hybrid\Attr\display( 'app-main', '404', ['id' => 'main'] ) ?>>
            <div class="post post--404">
                <div class="post__content post__content--center">
                    <h1 class="post__title"><?php esc_html_e( 'Whoops!', 'taproot' ) ?></h1>
                    <p><?php esc_html_e( 'This page does not exist. Try a search?', 'taproot' ) ?></p>
                    <?php get_search_form() ?>
                </div>
            </div>
        </main>
    </div>
</div>
