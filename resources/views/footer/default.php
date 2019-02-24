	<footer <?php Hybrid\Attr\display( 'app-footer' ) ?>>

        <?php Hybrid\View\display( 'nav/menu', 'footer', [ 'location' => 'footer' ] ) ?>

        <div class="app-footer__container container">
            <?php Taproot\Template\footer_widgets(); ?>  
            <?php Taproot\Template\footer_additional_content(); ?>                        
        </div>

        <div class="bottom-bar" > 
            <div class="bottom-bar__container container">
                <p class="app-footer__credit">
                    <?php Taproot\Template\footer_credits(); ?>                                        
                </p>
                <?php Taproot\Template\bottom_bar_additional_content(); ?>      
            </div>                  
        </div>        
	</footer>

</div><!-- .app -->

<?php wp_footer() ?>
</body>
</html>
