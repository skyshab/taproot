<?php
/**
 * TThe view for the widgets page of the admin area
 *
 * @package taproot/admin
 * @since 0.8.0
 */
?>
<div id="taproot-widgets-extra">
    <div id="taproot-title-options">
        <h2><?php esc_html_e( 'Sidebars', 'taproot' ) ?></h2>
        <div id="taproot-options" class="taproot-options">
            <span><img src="<?php echo esc_url( admin_url( 'images/wpspin_light.gif' ) ); ?>" class="ajax-feedback" title="" alt=""></span><a href="themes.php?page=customsidebars" class="button create-sidebar-button"><?php esc_html_e( 'Create a new sidebar', 'taproot' ) ?></a>
        </div>
    </div>
    <div id="taproot-new-sidebar" class="widgets-holder-wrap">

        <div class="sidebar-name">
            <h3><?php esc_html_e( 'New Sidebar', 'taproot' ) ?><span><img src="<?php echo esc_url( admin_url( 'images/wpspin_light.gif' ) ); ?>" class="ajax-feedback" title="" alt=""></span></h3>
        </div>
        <div class="_widgets-sortables" style="min-height: 50px; ">
            <div class="sidebar-form">
                <form action="themes.php?page=customsidebars" method="post">
                    <?php wp_nonce_field( 'taproot-create-sidebar', '_create_nonce');?>
                    <div class="namediv">
                        <label for="sidebar_name"><?php esc_html_e( 'Name', 'taproot' ); ?></label>
                        <input type="text" name="sidebar_name" size="30" tabindex="1" value="" class="sidebar_name" />
                        <p class="description"><?php esc_html_e( 'Choose a unique name for the sidebar', 'taproot' )?></p>
                    </div>
                    <p class="submit submit-sidebar cf">
                        <span><img src="<?php echo esc_url( admin_url( 'images/wpspin_light.gif' ) ); ?>" class="ajax-feedback" title="" alt=""></span>
                        <input type="submit" class="button-primary taproot-create-sidebar alignright" name="taproot-create-sidebar" value="<?php esc_html_e( 'Create Sidebar', 'taproot' ); ?>" />
                        <button class="button-secondary taproot-cancel-sidebar alignright" name="taproot-cancel-sidebar" style="text-align: center; margin-right: 12px; width: 64px;">cancel</button>
                    </p>
                </form>
            </div>
        </div>

    </div>
    <div class="taproot-remove-sidebar"><a class="delete-sidebar widget-control-remove" href="themes.php?page=customsidebars&p=delete&id="><?php esc_html_e( 'Remove', 'taproot' )?></a></div>
    <div id="taproot-save"><?php esc_html_e( 'Save', 'taproot' ); ?></div>
    <span id="taproot-confirm-delete"><?php esc_html_e( 'Are you sure that you want to remove this sidebar?', 'taproot') ?></span>
    <form id="taproot-wpnonces">
        <?php wp_nonce_field( 'taproot-delete-sidebar', '_delete_nonce', false);?>
    </form>

 </div>
