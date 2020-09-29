<?php
use const SGI\STL\BASENAME;
?>
<div class="postbox stl-sidebar-widget">
    <h3 class="hndle ui-sortable-handle">
        <span><? _e('Help and support', 'srbtranslatin');?>
    </h3>

    <div class="inside">

        <p>
           <?php
            printf(
                __('Need help? Read the documentation - %s.', 'srbtranslatin'),
                sprintf(
                    '<a href="https://rtfm.sgi.io/srbtranslatin" target="_blank">%s</a>',
                    __('HERE', 'srbtranslatin')
                )
            );
            ?>
        </p>

        <p>
            <?php _e("Are you having issues with the plugin that you can't fix by yourself? Do you need direct assistance? Maybe another feature?", 'srbtranslatin');?>
            <br>
            <?php
            printf(
                __('Open a support request here - %s', 'srbtranslatin'),
                '<a href="https://wordpress.org/support/plugin/srbtranslatin/">SrbTransLatin</a>'
            );
            ?>
        </p>

    </div>

</div>