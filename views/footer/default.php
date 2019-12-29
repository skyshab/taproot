    <footer <?php Hybrid\Attr\display( 'app-footer' ) ?>>

        <?php Hybrid\View\display( 'nav/menu', 'footer', [ 'location' => 'footer' ] ) ?>

        <div class="app-footer__container container">
            <?php do_action('taproot/footer-widgets') ?>
            <?php do_action('taproot/footer/additional-content') ?>
        </div>

        <div class="bottom-bar" >
            <div class="bottom-bar__container container">
                <p class="app-footer__credit">
                    <?php do_action('taproot/footer-credits') ?>
                </p>
                <?php do_action('taproot/bottom-bar/additional-content') ?>
            </div>
        </div>
    </footer>

</div><!-- .app -->

<?php wp_footer() ?>
</body>
</html>
