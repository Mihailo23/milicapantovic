<?php get_header(); ?>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="align-center">
                <!-- TODO: sometime make this normal -->
                <?php // echo sprintf( __( '%s Search Results for ', 'wp_theme' ), $wp_query->found_posts ); echo get_search_query(); ?>
                <?php echo sprintf( __( 'Pronađeni su sledeći rezultati za: ', 'wp_theme' ), $wp_query->found_posts ); echo get_search_query(); ?>
            </h1>



            <?php get_template_part('/template-parts/loop'); ?>
        </div>
    </div>
</div>

<?php // get_sidebar(); ?>

<?php get_footer(); ?>