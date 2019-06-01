<div class="app-content">

    <div class="app-content__container container">

        <main <?php Hybrid\Attr\display( 'app-main' ) ?>>

            <div class="entry entry--error">

                <h1 class="entry__title"><?php esc_html_e( 'Whoah, partner!', 'taproot' ) ?></h1>

                <div class="entry__content">
                    <p><?php esc_html_e( 'It looks like you stumbled upon a page that does not exist. Perhaps rolling the dice with a search might help.', 'taproot' ) ?></p>

                    <?php get_search_form() ?>
                </div>

            </div>
            
        </main>

    </div>

</div>
