<?php
use const SGI\STL\BASENAME;
?>
<div class="postbox stl-sidebar-widget">
    <h3 class="hndle ui-sortable-handle">
        <span><? _e('Supercharge your website', 'srbtranslatin');?>
    </h3>

    <div class="inside">

        <p>
            <?php
            printf(
                __('Get 50%% discount on WordPress hosting and Website optimization with promocode %s', 'srbtranslatin'),
                '<strong>SRBTRANSLATIN50</strong>'
            );
            ?>
        </p>

        <a target="_blank" href="https://moj.oblak.host/cart.php?gid=11">
            <img class="img-responsive" src="<?php echo plugins_url("assets/img/oblak-banner.jpg",BASENAME);?>">
        </a>

    </div>

</div>