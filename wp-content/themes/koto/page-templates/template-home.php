<?php /* Template Name: Home Page Template */ get_header(); 
$featured_args = array(
    'posts_per_page' => -1,
    'category__not_in' => array(6),
    'meta_query' => array(
        array(
        'key' => 'featured',
        'value' => '1',
        )
    )
);
$vlog_featured_args = array(
    'posts_per_page' => -1,
    'category_name' => 'vlog',
    'meta_query' => array(
        array(
        'key' => 'featured',
        'value' => '1',
        )
    )
);
$featured_posts_query = new WP_Query($featured_args);
$vlog_featured_posts_query = new WP_Query($vlog_featured_args);

$subscribe_image = get_field('subscribe_image');
$subscribe_image_url = $subscribe_image['url'];
?>



<!-- hero -->
<!-- <div class="hero">
    <div class="container">
        <div class="row center">
            <div class="col-lg-12">
                <div class="hero-image align-center">
                    <svg version="1.0" xmlns="http://www.w3.org/2000/svg" height="100" viewBox="110 240 914 285">
                        <path
                            d="M441 250.4c-2.5.6-6.7 2.7-9.5 4.6-8.8 6-23.5 22.7-24.9 28.2-.3 1.5-1.8 4-3.2 5.5-7.9 8.5-12.6 27-10 39.1.7 2.8.5 3.2-1.9 3.8-4.2 1-6.5 7.1-6.5 17.4 0 4.7.5 10.1 1.1 12 .6 1.9 1.4 7.6 1.9 12.7.5 6.6 1.4 10.1 2.9 12.7 3.1 4.9 9.6 7.8 17.6 7.9 12.6.1 22.9-8.1 27.4-22 3-9.2 2.5-10.7-1.4-3.8-4.4 7.8-10.8 14.3-16.4 16.8-6.5 2.8-17.2 2-20.9-1.6-6.5-6.6-2.9-27.1 10.3-57.7 3.8-8.8 6.4-14.2 9.7-19.8 1.1-1.7 1.8-3.2 1.5-3.2-.2 0-2.9 3.9-6 8.7-6.7 10.7-15 27.2-18.8 37.3l-2.8 7.5v-11c-.1-10.9-.1-11 2.6-12.5 2.6-1.5 2.7-1.9 2.9-9.6.1-6.6.8-10.3 3.9-19.3l3.8-11.1 2.3 3.7 2.3 3.8.1-6c0-10 1.2-12.5 9.6-20.5 7.8-7.4 18-14.6 22.2-15.7 3.2-.8 4.2 1 4.2 7.5 0 9.4-6.3 24.2-17.2 40.4-4.5 6.8-5.5 8.8-4.1 8.8 1-.1 2.9-.7 4.3-1.5s3.3-1.4 4.3-1.5c2.8 0 .5 3.4-8.8 13-4.5 4.7-9 9.8-10 11.4l-1.9 2.9 2.7 2.1 2.8 2.2-8.6 10.9c-8.8 11.3-10.2 14.2-6.2 13 6.9-2.2 12.5-8.1 16.4-17.4 2.8-7 2.9-9.1.4-9.1-3.5 0-3.1-1.6.8-3.8 4.8-2.7 12.3-10.7 15-16 3.8-7.5 2.1-13.2-3.6-11.7l-2.6.6 3.5-4.3c17.7-21.9 24.6-43.5 17.1-53.6-2.4-3.2-2.8-3.3-8.3-1.8zM293.3 273.8c-7 6.9-15.2 25.2-33.2 73.9-21.2 57.5-28.9 72.7-46.1 90.7-18 18.9-39.7 30.4-70.5 37-10.2 2.3-10.6 2.4-5.7 2.5 23.7.4 52.5-8.4 71-21.6 9.5-6.8 21.2-19 28.2-29.5 13.4-20 20.8-38.2 38.5-94.9 13.4-42.9 17.5-54 21.1-57.6 3-3 5.4-3 5.5-.1 0 2.2.1 2.2.8.3 2.3-5.8-4.1-6.3-9.6-.7zM649.3 276.5c-46.1 8.4-65.3 39.1-46.9 75.3 1.5 2.9 2.8 5.2 3 5.2.2 0-.7-3.2-2-7.1-10.8-31.9 2.7-54.2 38.1-63.1 12.9-3.2 28-3.1 35.2.1 5.7 2.5 12.7 9.4 14.8 14.4 5.3 12.9.5 28.1-10.2 32.9-3.7 1.7-6 1.9-11.7 1.5-6.7-.4-17.6-4-17.6-5.7 0-2.3 10.3-23.6 12.7-26.3 2-2.1 3.3-2.2 3.3-.2 0 2.5 2.9 1.7 3.6-.9 1.1-4.6.2-6.1-4-6.4-5.7-.5-9.3 3.5-16.2 18.4l-5.8 12.3-5.1-3.6-5-3.6 4.6 4.9 4.7 4.9-6.9 21c-3.7 11.5-7.8 24.4-8.9 28.5l-2.1 7.5-16.2 16c-9 8.8-20.6 19.1-26 23-8.3 6-9.6 7.3-9.1 9.3.9 4.3-.5 5.9-6.9 8.3-4.7 1.7-8 4-13.5 9.2-16.6 15.5-38.3 26.2-61.6 30.2-4.9.8-10 1.5-11.5 1.6-1.8 0-.6.8 3.9 2.3l6.5 2.3-6.5.6c-3.6.4-10.9 1-16.2 1.4-5.4.3-9.5 1-9.2 1.4.3.5 2.4 1.4 4.7 2.1 3.9 1.2 2.9 1.3-12.8 1.8l-17 .5 8.1 4.2c10.3 5.3 25.8 10.7 38.8 13.5 13.7 2.9 38.2 3.1 50.6.5 15.5-3.4 36.1-13.2 38-18.2.6-1.6 1.5-2.2 2.7-1.9 2.6.7 18.2-15.6 25.6-26.7 10.2-15.3 20.8-40.1 26.2-61 2.3-8.9 1.2-8.3-1.4.8-5.6 19.2-16 41.8-26.3 57.1-5.7 8.5-21.6 25.5-22.9 24.6-.5-.3-.9-2-1-3.7-.1-7.4-1.5-7-3.8 1.2-2.6 8.9-3.3 9.7-13.1 14.6-23.7 11.9-53.5 13.8-84 5.1-16.9-4.7-16.7-5 4-5.6l18.5-.5-6.8-2.4c-4-1.5-6.2-2.8-5.5-3.2.7-.3 8.6-1.2 17.6-1.9 8.9-.7 16.2-1.4 16.2-1.6 0-.2-3.4-1.3-7.5-2.5s-7.3-2.4-7.1-2.7c.3-.2 5-1.9 10.5-3.8 17.7-5.9 29.2-12.8 42.8-25.6 6.5-6.3 10.2-8.9 14.1-10.3 7.1-2.6 9.2-4.7 9.2-9.3 0-3.1.6-4.1 3.9-6.4 7.5-5.3 23.2-20 32.3-30.2 5.1-5.8 9.4-10.3 9.6-10.1.6.6-13.6 29.4-19.1 38.7-19.3 32.8-44.6 55.3-75.9 67.7-8.2 3.2-26.2 8.1-29.9 8.1-1.2 0-2 .3-1.6.6.9 1 16-1.4 26.3-4.1 25.5-6.7 49.4-22.3 67.7-44.3 11.6-13.9 23.8-34.4 30.8-51.9 2.2-5.7 3.6-7.9 4.2-7 .6.8.7.4.4-1.1-.3-1.2-.1-2.2.4-2.2s.9-.9.9-2c0-4.1 18.6-56 20.9-58.3.6-.6 2.6 0 5.3 1.6 6.7 3.9 15.2 6 22 5.4 23.6-2.1 33-35 15.5-54.4-4.7-5.2-12-9.1-20.4-10.8-8.2-1.8-13.4-1.8-23 0z" />
                        <path
                            d="M302.9 280.2c-.9 2.4-5 11.5-9.1 20.4-13.4 28.7-19.7 47.5-20.5 61-1.1 16.7 6.3 25.4 17.6 20.8 7.2-2.8 10.9-8.4 18.5-27.5 10-25.1 18.5-45.5 18.6-44.6 0 .5-2.7 11.3-5.9 24-3.3 12.8-6.7 27-7.7 31.5-2 10.3-1.3 19.6 2 24.4 1.9 2.9 2.8 3.3 6.6 3.4l4.5.2-3.9-.7c-6.4-1-8.1-4.3-8-15.4.1-8.2.8-11.5 6.3-29.7 16.6-55.1 18-61.1 14.7-62.3-.9-.4-2.3-.4-3.1-.1-1.8.7-8.9 14.6-23 44.9-15.5 33.2-18.1 38.1-21.4 40.4-1.6 1.2-3.1 2.1-3.4 2.1-1.6 0-2.9-8-2.4-14.5 1-11.6 4.3-24.3 16.3-62.4 3-9.6 5.4-18 5.2-18.8-.2-.8-1 .5-1.9 2.9zM995.5 296.4c-15.5 4.9-28.8 20-30.2 34.4l-.5 4.7 3.5-7c6.5-13.1 15.7-23.3 27.5-30.2 2.3-1.4 4.2-2.7 4.2-2.9 0-.2-.1-.4-.2-.3-.2 0-2.1.6-4.3 1.3zM782.5 297.4c-10.1 4.4-21.5 26.9-23.9 47.2-.6 4.6-.4 4.3 2.4-3.6 4.5-12.5 11.3-25.9 15.9-31.1 6.6-7.6 15.9-9.7 18.3-4.3 1.3 2.9-.4 10.8-5.3 23.8-3.6 9.4-3.6 9.5-11.2 12.1-4.4 1.6-10.7 6.6-10.7 8.5 0 .5 1.6-.2 3.6-1.5 3.7-2.5 11-5.2 11.9-4.4.2.3-1.6 6.3-4.1 13.4-9.4 26.8-6.5 38.6 9.5 38.8 8.3 0 13.7-3.5 19-12.3 2-3.4 2.1-3.4 2.1-.9 0 3.8 3.9 9.1 8.3 11.3 10.5 5.1 22.4-4 27.8-21.5 2.4-7.8 2.5-18.2.1-22.8-2.6-5.3-6.5-7.6-12.5-7.6-6.6 0-12.2 2.8-16.4 8.4-2.4 3.1-3.3 3.8-3.4 2.4-.1-1-.5.4-1 3.2-1.5 8.1-5.7 19.9-8.9 24.9-3.8 6-8.2 8.6-14.2 8.6-11.6 0-11.7-8.2-.6-36.8l4-10.2 8.6-.1c8.6-.1 8.7-.1 4.7-1.4-2.2-.7-5.7-1.6-7.8-2-2.4-.4-3.6-1.1-3.3-1.8 4.3-10.3 7-21 7-28 .1-7.6 0-7.9-3.2-10.8-2.7-2.4-4.1-2.9-8.5-2.9-2.8.1-6.5.7-8.2 1.4zm57.5 49.5c4.1 2.9 5.4 8.4 4.1 16.4-2.1 12.6-9.8 24.6-17 26.2-10.4 2.3-15-5.6-13-22 1.2-8.9 4.9-16.7 9.5-19.5 6.8-4.3 11.6-4.6 16.4-1.1zM365.2 309.6c-1.2.8-2.7 2.4-3.3 3.5-1 2-.9 2 2 .5 4.2-2.2 7.4-2 9.9.7s2.8 6.5.8 9.3c-1.3 1.7-1.8 1.8-4.5.7-3.5-1.3-4-.4-1.3 2 4.8 4.4 12.2-.1 12.2-7.4 0-8.1-9.5-13.8-15.8-9.3zM451.2 310.7c-1.4.5-4.2 5.5-4.2 7.4 0 .7 1.1 0 2.5-1.5 3.9-4.2 9.6-2.9 11 2.5.8 3.2-1.2 5.7-5.1 6.5-2.2.4-3.6.1-4.7-1.1-1.4-1.3-1.7-1.4-1.7-.2 0 2.2 2.5 3.8 6.7 4.4 9.8 1.3 14-11.9 5.4-17-2.8-1.6-7.2-2.1-9.9-1zM892.9 331.1c-1.2 1.2-4.8 7.8-8.1 14.8-11.8 25-17 34.9-20.3 38.5-3.4 3.8-6.9 4.7-7.9 2-1.9-5 .4-21.9 5.8-41.6 1.4-4.8 2.2-8.8 2-8.8-.9 0-9.2 18.4-11.8 26-6.3 19-4.9 31.9 3.9 33.6 4.9.9 8-.1 12.4-4.2 6.1-5.5 14.3-22.9 22.1-46.9 3.1-9.7 4.7-12.5 7-12.5 1.3 0 2.2 1 2.9 3.2l.9 3.3.1-3.1c.1-3.3-2.4-6.4-5.2-6.4-.9 0-2.7 1-3.8 2.1zM533.7 334.4c-7.8 2.8-15.2 10-19.9 19.6-2.8 5.5-3.3 7.4-3.3 14 0 5.7.5 8.3 1.8 10.4 1 1.5 1.7 2.9 1.5 3.1-1.3 1.2-11.8 3.8-18.9 4.7-9.9 1.2-14.9.6-17.5-2.3-5.3-5.9 1.8-33.2 11-41.8 1.7-1.6 3.3-2.2 5.7-1.9 2.8.2 3.5.7 3.7 3 .2 1.5-.2 3.6-.8 4.8-.6 1.1-.8 2-.6 2 1 0 3.6-5.9 3.6-7.9 0-2.5-3.6-5.1-7.3-5.1-4.3 0-8.1 2.5-12 7.7-8.1 11.1-12.1 22.8-11.5 33.4.6 11.8 5.7 15.9 19.3 15.9 10.4 0 20-2.1 29.4-6.4 4.2-1.9 9-3.7 10.6-4.1 1.7-.4 5.5-1.9 8.5-3.5l5.6-2.8 3.4 6.5c3.7 7.3 7.5 10.3 13 10.3 2.9 0 4.3-.9 9.2-6 6.6-6.8 8-10.5 1.6-4.3-5.2 4.9-7.7 6.3-11.7 6.3-3.4 0-6.2-3.1-10.6-12-1.5-3-2.9-5.7-3-5.8-.2-.2-2.3.8-4.8 2.2-2.4 1.4-4.7 2.6-5.1 2.6-.4 0 2.2-3.5 5.8-7.8 11.1-13.1 16.4-27 12.3-32.3-3.1-4-11.5-5.1-19-2.5zm14.1 7.8c.8 6.4-10.4 22.5-22.3 32-3.2 2.7-6.2 4.8-6.7 4.8-1.5 0-3.8-6-3.8-9.8 0-10 6.8-21.4 16-27 4.7-2.8 6.3-3.2 11-3 5.1.3 5.5.5 5.8 3zM359.4 337.7c-2.6 2.8-16.8 23.3-16.1 23.3.2 0 3.6-4.2 7.6-9.4 3.9-5.1 7.8-9.9 8.6-10.6.8-.7-.5 3.6-3 9.4-5.6 13.4-10.5 29-10.5 33.4 0 4.6 2.5 9.6 5.7 11.3 3.8 2 10.6 1.5 14.9-1.1 6.6-4.2 13.8-17.9 15.9-30.6.6-3.4.1-2.8-4 4.6-7.7 14-13.6 20-19.9 20-1.9 0-2.7-.7-3.2-2.6-1.4-5.5.5-18.9 4.5-32.4 5.4-17.9 5.3-21.6-.5-15.3zM443.7 341.1l-4.2 4.2 4.3-3.7c4-3.4 8.2-4.8 8.2-2.6 0 .6-2.7 7.2-5.9 14.8-10 23.1-11.9 31.7-8.2 36.3 2.6 3.2 10.3 3.4 14.3.4 5.8-4.3 11.7-17.8 13.1-30l.6-5-5.2 10c-6.3 12.2-10.1 17.3-13.5 18.2-3 .7-5.2-1.7-5.2-5.7 0-3.5 2.9-14 7.8-28 2.2-6.3 3.8-11.8 3.5-12.3-1.2-2-5.7-.4-9.6 3.4z" />
                        <path
                            d="M731.5 343.7c-1 3.2-3.3 11.8-5.1 19.2-3.6 14-8 23.9-12.2 27.2-3.1 2.4-8.3 2.4-11.3 0-3.7-3-3.9-13.6-.5-24.5 3-9.7 3.2-11.8.6-6.1l-1.9 4v-3c-.3-9.3-6-16.5-13-16.5-10.4 0-22.3 16.8-22.4 31.5-.1 6.9 1.7 11 6.3 14.9 5.8 4.8 13.6 3.1 19.2-4.1l2.7-3.5.7 2.8c1.9 7.9 6 11.4 13.4 11.4 4.9 0 9.1-2 11.8-5.7l1.9-2.7 1.2 2.2c.6 1.2 2 2.2 3 2.2 3.2 0 7.1-5.8 15.1-22.6 4.3-8.9 8.2-16.4 8.9-16.8 1.4-.9 1.5-1.3-1.5 8.5-6.4 21.1-3.2 32.8 8.9 32.9 8.5 0 14.8-6.3 14.6-14.7l-.1-3.8-.8 3.2c-1.8 7.6-6.8 11.9-13.1 11-2.2-.3-4.6-1.1-5.4-1.7-2.1-1.7-1.9-9.3.5-20.1 1.1-5 2.1-11.1 2.2-13.5.4-8-4.7-9.6-9.5-3.1-1.3 1.8-5 9.3-8.2 16.7-6.2 14.3-9.9 21-11.5 21-1.8 0-1-6.5 1.9-15 3-8.8 5.5-19.9 6.9-30.8 1.1-8.2-1-8.5-3.3-.5zM691 351c3.6 1.9 4.9 10.9 3.3 22.5-.5 4.1-1.5 5.8-5.8 10.2-6.9 7.1-11.5 7.3-15.6.7-3.8-6.3-2.2-16.7 4-25.8 5.1-7.4 9.8-9.9 14.1-7.6zM948.2 339.5c-13 4-26.2 21.9-26.2 35.3.1 13.1 9.7 22.5 21.3 20.8 8.2-1.3 19.6-9.8 26.8-20.3 4.1-6 3.6-6.2-2-1-7 6.5-16.2 12.3-22 13.7-13.6 3.2-20-9.2-12.1-23.9 7.6-14.2 19.3-21.5 28.4-17.7 6.5 2.7 6.1 6.5-1.5 15.7-5.5 6.5-4 6.6 3.5.2 5.3-4.4 7.6-8.1 7.6-12.1 0-4.7-2.4-7.7-8-10.1-5.5-2.4-9.6-2.6-15.8-.6zM912 345.5c-.7.9-1 1.8-.7 2.2.3.3-.7 2.4-2.2 4.7-11.3 16.5-14.5 36-6.9 42.3 1.3 1.1 1.4.5 1-4.2-.6-6.9.7-11.6 7.5-27.8 6.6-15.9 7.3-18.7 4.5-18.7-1.1 0-2.5.7-3.2 1.5z" />
                    </svg>
                </div>
            </div>
        </div>
        <div class="row center">
            <div class="col-lg-8">
                <p class="align-center">Sloboda se ne čeka, ona se uzme. Ona se uzme. I živi se. Pisanje je moj
                    nacin da udišem vazduh. I jedini način da izdišem slobodu.</p>
            </div>
        </div>
    </div>
</div> -->
<!-- /hero -->

<!-- owl-carousel -->
<?php
        if ($featured_posts_query->have_posts()) {
    ?>
<div class="owl-carousel">
    <?php 
            while ($featured_posts_query->have_posts()) {
                $featured_posts_query->the_post();
        ?>
    <a href="<?php echo get_permalink() ?>" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>')"
        class="owl-slide item">
        <div class="overlay"></div>
        <div class="owl-slide-content">
            <span class="owl-slide-category">u <span><?php echo get_the_category()[0]->name ?></span></span>
            <h2><?php echo get_the_title() ?></h2>
            <span class="owl-slide-category"><?php echo get_the_date(); ?> od
                <span><?php echo get_author_name(); ?></span></span>
        </div>
    </a>
    <?php
            }
        ?>
</div>
<?php
wp_reset_postdata();
        }
    ?>
<!-- /owl-carousel -->
<!-- about -->
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="home-section align-center">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="48"
                    height="52">
                    <image data-name="quill-drawing-a-line copy" width="48" height="52"
                        xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAA0CAMAAAD7TUujAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAACplBMVEXilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLYAAAD9vVJ4AAAA4HRSTlMADUeAraULEBgSaLv5T2kbXQg2obesfHsCbwq+3fFhKaIGqeNWScAxDoJ4U35i3vyTSwVu7C7g35CncPbY7y3a8pS/nfCHEx9B4fqXm9L3y56MtW3zrnLmjmb09avXxdREqJUgGtDEkUjk1rKZd2QyJOLuzMg0/vsEIXNUFNnVUkDOxqRR5x6g/XG6HRFVdAw7UNMJRtFb6A9ZyVcZ3D19Iq9NB4NaetvHilxCw5ZlnLhn7RVqf4imwcqGhXZDws9FmF/qOviwj1jphLxgP7k4tkqzowE3jScsF5p1HCYlqvFMpe8AAAABYktHROFfCM+mAAAACXBIWXMAAAsSAAALEgHS3X78AAAAB3RJTUUH4wsNEBY5hgW07wAAA7dJREFUSMeN1vs/U2EYAPC3dEG2qLDFlJRSRmZYtspYJbKQWraS1BnDKlO6ISrRTZFLlJTWjaSL7veSLrqodFV6/pTOOdt0lveM54ft3ft8z3Oe877nnM8QGlIMG243YuSo0ch+SNrBcYwTAHC4Y51dhsDHjac0wARXN3cef+KgvXiAOTwFXpMmg5dt7o2mWDz4TJ3mC57TbfEZfjNn9XtXf2FA4GxhEDsXBYshJNTMwyRzwqUgmwvhrH7efACZu4lHyCPdoqiBYsFCFr4oejGZHymmVEzskjhOHIByaXxCIg/vlyXNpijtl69QrUxWkwMNeawzfilXwWqZuXkZN2VN6lrTWJO2DuvXEwBaE3HyT9e4Z+gA1JlZ2foNURtxflMOKQ20zxWGbd6SRg/ztpIfqm0Yv11nWXknO7lyx87+n2TswPj8Aku2cFdhQdFyBodi0UDvstuSjeIr9+wtYXrdPswJ0s1JtbC0bH8Ck8OBgxh/SGpKxhUVGw5H/sN5nonlR3ArlGzKTziqWlzhw6ieV7n/GHYLTDuUVSWorklitlObU47jx+syqWxilbR+WZlV/4oTWF8voW6elFSpx0wrHhh/EucnaqGU3OCGUwKPRiYXS05j2+edIYtXQlK0T70do/n4prMIH0YyXRYG56orz0PZhRSCuJh1qXkSYo2WPLqi8YyOD5pqgrjcyq2omHXFrU2I994NtL/qL7gWY3XB12/gD2insyU1Wx0jrDxwWDraTO9nneFmqLVvZ/E36Owt7e07Vry2ie2S91Lpu/fWyJmcCB7Gukb3ybyyRsD/p1UJIexLivIPkEQf8EBhejlkujY+DMrwZvdn61QAkdmuF+knueCRr2/u4yc26rtkPCXLPntu7O8nolxkw6OORvJB1ocGO5n5C0k+shkPOskVejmHMFe/tJ1n26MlOgh89foNXbzrrX3yu0E8eg/wslgvld1ubf+wa3zkPFZoX+TlxyW/CSgJ13Yr6NuvwQvfj8PHe13PAz6lBx+lD+DWhlNa8DkIx3u++N1Vd7m1HLJMPCJisxtA1VqF3aqNX3Ny5KlWqdTD16MlzbgXMzrOjzPEdvT8P+1xC3+R356qfc8NfKS9a/ibcLyjU9n2HVunQHx6wCSPkyI2/sCf+Kcd5/8mF/YGyBzxL1OEOADNVhOiplXS7mk9iC26S2N+MZZl5x5D5fmxyEZ8DdOa2/49NSFX09Xbh2yHccW7V9f06Z2EovBP76kh/IH6IkqT39c7t/RtG9xS8Rd8fpcrrnwg0wAAAABJRU5ErkJggg==" />
                </svg>
                <h2>O meni</h2>
                <p><?php the_field('about'); ?></p>
                <a href="<?php the_permalink(13); ?>" class="button right">Pročitaj više</a>
            </div>
        </div>
    </div>
</div>
<!-- /about -->
<!--  featured posts -->
<?php
        if ($featured_posts_query->have_posts()) {
    ?>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="home-section">
                <div class="align-center">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="48"
                        height="52">
                        <image data-name="quill-drawing-a-line copy" width="48" height="52"
                            xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAA0CAMAAAD7TUujAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAACplBMVEXilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLYAAAD9vVJ4AAAA4HRSTlMADUeAraULEBgSaLv5T2kbXQg2obesfHsCbwq+3fFhKaIGqeNWScAxDoJ4U35i3vyTSwVu7C7g35CncPbY7y3a8pS/nfCHEx9B4fqXm9L3y56MtW3zrnLmjmb09avXxdREqJUgGtDEkUjk1rKZd2QyJOLuzMg0/vsEIXNUFNnVUkDOxqRR5x6g/XG6HRFVdAw7UNMJRtFb6A9ZyVcZ3D19Iq9NB4NaetvHilxCw5ZlnLhn7RVqf4imwcqGhXZDws9FmF/qOviwj1jphLxgP7k4tkqzowE3jScsF5p1HCYlqvFMpe8AAAABYktHROFfCM+mAAAACXBIWXMAAAsSAAALEgHS3X78AAAAB3RJTUUH4wsNEBY5hgW07wAAA7dJREFUSMeN1vs/U2EYAPC3dEG2qLDFlJRSRmZYtspYJbKQWraS1BnDKlO6ISrRTZFLlJTWjaSL7veSLrqodFV6/pTOOdt0lveM54ft3ft8z3Oe877nnM8QGlIMG243YuSo0ch+SNrBcYwTAHC4Y51dhsDHjac0wARXN3cef+KgvXiAOTwFXpMmg5dt7o2mWDz4TJ3mC57TbfEZfjNn9XtXf2FA4GxhEDsXBYshJNTMwyRzwqUgmwvhrH7efACZu4lHyCPdoqiBYsFCFr4oejGZHymmVEzskjhOHIByaXxCIg/vlyXNpijtl69QrUxWkwMNeawzfilXwWqZuXkZN2VN6lrTWJO2DuvXEwBaE3HyT9e4Z+gA1JlZ2foNURtxflMOKQ20zxWGbd6SRg/ztpIfqm0Yv11nWXknO7lyx87+n2TswPj8Aku2cFdhQdFyBodi0UDvstuSjeIr9+wtYXrdPswJ0s1JtbC0bH8Ck8OBgxh/SGpKxhUVGw5H/sN5nonlR3ArlGzKTziqWlzhw6ieV7n/GHYLTDuUVSWorklitlObU47jx+syqWxilbR+WZlV/4oTWF8voW6elFSpx0wrHhh/EucnaqGU3OCGUwKPRiYXS05j2+edIYtXQlK0T70do/n4prMIH0YyXRYG56orz0PZhRSCuJh1qXkSYo2WPLqi8YyOD5pqgrjcyq2omHXFrU2I994NtL/qL7gWY3XB12/gD2insyU1Wx0jrDxwWDraTO9nneFmqLVvZ/E36Owt7e07Vry2ie2S91Lpu/fWyJmcCB7Gukb3ybyyRsD/p1UJIexLivIPkEQf8EBhejlkujY+DMrwZvdn61QAkdmuF+knueCRr2/u4yc26rtkPCXLPntu7O8nolxkw6OORvJB1ocGO5n5C0k+shkPOskVejmHMFe/tJ1n26MlOgh89foNXbzrrX3yu0E8eg/wslgvld1ubf+wa3zkPFZoX+TlxyW/CSgJ13Yr6NuvwQvfj8PHe13PAz6lBx+lD+DWhlNa8DkIx3u++N1Vd7m1HLJMPCJisxtA1VqF3aqNX3Ny5KlWqdTD16MlzbgXMzrOjzPEdvT8P+1xC3+R356qfc8NfKS9a/ibcLyjU9n2HVunQHx6wCSPkyI2/sCf+Kcd5/8mF/YGyBzxL1OEOADNVhOiplXS7mk9iC26S2N+MZZl5x5D5fmxyEZ8DdOa2/49NSFX09Xbh2yHccW7V9f06Z2EovBP76kh/IH6IkqT39c7t/RtG9xS8Rd8fpcrrnwg0wAAAABJRU5ErkJggg==" />
                    </svg>
                </div>
                <h2 class="align-center">Pravo iz mog mastila</h2>
                <div class="row">
                    <?php 
                        while ($featured_posts_query->have_posts()) {
                            $featured_posts_query->the_post();
                    ?>
                    <div class="col-lg-6">
                        <div class="article">
                            <a class="article-image" href="<?php echo get_permalink() ?>">
                                <img src="<?php echo get_the_post_thumbnail_url() ?>" alt="">
                            </a>
                            <p class="article-category">u <a
                                    href="<?php echo get_category_link(get_the_category()[0]->term_id) ?>"><?php echo get_the_category()[0]->name ?></a>
                            </p>
                            <h2 class="article-title">
                                <a href="<?php echo get_permalink() ?>">
                                    <?php the_title() ?>
                                </a>
                            </h2>
                            <p class="article-excerpt"><?php echo get_the_excerpt() ?></p>
                            <a href="<?php echo get_permalink() ?>" class="read-more">Pročitaj više</a>
                            <ul class="article-social-share list-reset">
                                <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><i
                                            class="icon-facebook"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php
    wp_reset_postdata();
        }
        ?>
</div>
<!-- /featured posts -->
<!-- about the book -->
<div class="container">
    <div class="row center">
        <div class="col-lg-8">
            <div class="home-section align-center">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="48"
                    height="52">
                    <image data-name="quill-drawing-a-line copy" width="48" height="52"
                        xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAA0CAMAAAD7TUujAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAACplBMVEXilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLYAAAD9vVJ4AAAA4HRSTlMADUeAraULEBgSaLv5T2kbXQg2obesfHsCbwq+3fFhKaIGqeNWScAxDoJ4U35i3vyTSwVu7C7g35CncPbY7y3a8pS/nfCHEx9B4fqXm9L3y56MtW3zrnLmjmb09avXxdREqJUgGtDEkUjk1rKZd2QyJOLuzMg0/vsEIXNUFNnVUkDOxqRR5x6g/XG6HRFVdAw7UNMJRtFb6A9ZyVcZ3D19Iq9NB4NaetvHilxCw5ZlnLhn7RVqf4imwcqGhXZDws9FmF/qOviwj1jphLxgP7k4tkqzowE3jScsF5p1HCYlqvFMpe8AAAABYktHROFfCM+mAAAACXBIWXMAAAsSAAALEgHS3X78AAAAB3RJTUUH4wsNEBY5hgW07wAAA7dJREFUSMeN1vs/U2EYAPC3dEG2qLDFlJRSRmZYtspYJbKQWraS1BnDKlO6ISrRTZFLlJTWjaSL7veSLrqodFV6/pTOOdt0lveM54ft3ft8z3Oe877nnM8QGlIMG243YuSo0ch+SNrBcYwTAHC4Y51dhsDHjac0wARXN3cef+KgvXiAOTwFXpMmg5dt7o2mWDz4TJ3mC57TbfEZfjNn9XtXf2FA4GxhEDsXBYshJNTMwyRzwqUgmwvhrH7efACZu4lHyCPdoqiBYsFCFr4oejGZHymmVEzskjhOHIByaXxCIg/vlyXNpijtl69QrUxWkwMNeawzfilXwWqZuXkZN2VN6lrTWJO2DuvXEwBaE3HyT9e4Z+gA1JlZ2foNURtxflMOKQ20zxWGbd6SRg/ztpIfqm0Yv11nWXknO7lyx87+n2TswPj8Aku2cFdhQdFyBodi0UDvstuSjeIr9+wtYXrdPswJ0s1JtbC0bH8Ck8OBgxh/SGpKxhUVGw5H/sN5nonlR3ArlGzKTziqWlzhw6ieV7n/GHYLTDuUVSWorklitlObU47jx+syqWxilbR+WZlV/4oTWF8voW6elFSpx0wrHhh/EucnaqGU3OCGUwKPRiYXS05j2+edIYtXQlK0T70do/n4prMIH0YyXRYG56orz0PZhRSCuJh1qXkSYo2WPLqi8YyOD5pqgrjcyq2omHXFrU2I994NtL/qL7gWY3XB12/gD2insyU1Wx0jrDxwWDraTO9nneFmqLVvZ/E36Owt7e07Vry2ie2S91Lpu/fWyJmcCB7Gukb3ybyyRsD/p1UJIexLivIPkEQf8EBhejlkujY+DMrwZvdn61QAkdmuF+knueCRr2/u4yc26rtkPCXLPntu7O8nolxkw6OORvJB1ocGO5n5C0k+shkPOskVejmHMFe/tJ1n26MlOgh89foNXbzrrX3yu0E8eg/wslgvld1ubf+wa3zkPFZoX+TlxyW/CSgJ13Yr6NuvwQvfj8PHe13PAz6lBx+lD+DWhlNa8DkIx3u++N1Vd7m1HLJMPCJisxtA1VqF3aqNX3Ny5KlWqdTD16MlzbgXMzrOjzPEdvT8P+1xC3+R356qfc8NfKS9a/ibcLyjU9n2HVunQHx6wCSPkyI2/sCf+Kcd5/8mF/YGyBzxL1OEOADNVhOiplXS7mk9iC26S2N+MZZl5x5D5fmxyEZ8DdOa2/49NSFX09Xbh2yHccW7V9f06Z2EovBP76kh/IH6IkqT39c7t/RtG9xS8Rd8fpcrrnwg0wAAAABJRU5ErkJggg==" />
                </svg>
                <h2>Knjiga "Ljubav je budna"</h2>
                <p><?php the_field('love'); ?></p>
                <a href="<?php the_permalink(79) ?>" class="button right">Pročitaj više</a>
            </div>
        </div>
    </div>
</div>
<!-- /about the book -->
<!--  vlog featured posts -->
<?php
        if ($vlog_featured_posts_query->have_posts()) {
    ?>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="home-section">
                <div class="align-center">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="48"
                        height="52">
                        <image data-name="quill-drawing-a-line copy" width="48" height="52"
                            xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAA0CAMAAAD7TUujAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAACplBMVEXilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLYAAAD9vVJ4AAAA4HRSTlMADUeAraULEBgSaLv5T2kbXQg2obesfHsCbwq+3fFhKaIGqeNWScAxDoJ4U35i3vyTSwVu7C7g35CncPbY7y3a8pS/nfCHEx9B4fqXm9L3y56MtW3zrnLmjmb09avXxdREqJUgGtDEkUjk1rKZd2QyJOLuzMg0/vsEIXNUFNnVUkDOxqRR5x6g/XG6HRFVdAw7UNMJRtFb6A9ZyVcZ3D19Iq9NB4NaetvHilxCw5ZlnLhn7RVqf4imwcqGhXZDws9FmF/qOviwj1jphLxgP7k4tkqzowE3jScsF5p1HCYlqvFMpe8AAAABYktHROFfCM+mAAAACXBIWXMAAAsSAAALEgHS3X78AAAAB3RJTUUH4wsNEBY5hgW07wAAA7dJREFUSMeN1vs/U2EYAPC3dEG2qLDFlJRSRmZYtspYJbKQWraS1BnDKlO6ISrRTZFLlJTWjaSL7veSLrqodFV6/pTOOdt0lveM54ft3ft8z3Oe877nnM8QGlIMG243YuSo0ch+SNrBcYwTAHC4Y51dhsDHjac0wARXN3cef+KgvXiAOTwFXpMmg5dt7o2mWDz4TJ3mC57TbfEZfjNn9XtXf2FA4GxhEDsXBYshJNTMwyRzwqUgmwvhrH7efACZu4lHyCPdoqiBYsFCFr4oejGZHymmVEzskjhOHIByaXxCIg/vlyXNpijtl69QrUxWkwMNeawzfilXwWqZuXkZN2VN6lrTWJO2DuvXEwBaE3HyT9e4Z+gA1JlZ2foNURtxflMOKQ20zxWGbd6SRg/ztpIfqm0Yv11nWXknO7lyx87+n2TswPj8Aku2cFdhQdFyBodi0UDvstuSjeIr9+wtYXrdPswJ0s1JtbC0bH8Ck8OBgxh/SGpKxhUVGw5H/sN5nonlR3ArlGzKTziqWlzhw6ieV7n/GHYLTDuUVSWorklitlObU47jx+syqWxilbR+WZlV/4oTWF8voW6elFSpx0wrHhh/EucnaqGU3OCGUwKPRiYXS05j2+edIYtXQlK0T70do/n4prMIH0YyXRYG56orz0PZhRSCuJh1qXkSYo2WPLqi8YyOD5pqgrjcyq2omHXFrU2I994NtL/qL7gWY3XB12/gD2insyU1Wx0jrDxwWDraTO9nneFmqLVvZ/E36Owt7e07Vry2ie2S91Lpu/fWyJmcCB7Gukb3ybyyRsD/p1UJIexLivIPkEQf8EBhejlkujY+DMrwZvdn61QAkdmuF+knueCRr2/u4yc26rtkPCXLPntu7O8nolxkw6OORvJB1ocGO5n5C0k+shkPOskVejmHMFe/tJ1n26MlOgh89foNXbzrrX3yu0E8eg/wslgvld1ubf+wa3zkPFZoX+TlxyW/CSgJ13Yr6NuvwQvfj8PHe13PAz6lBx+lD+DWhlNa8DkIx3u++N1Vd7m1HLJMPCJisxtA1VqF3aqNX3Ny5KlWqdTD16MlzbgXMzrOjzPEdvT8P+1xC3+R356qfc8NfKS9a/ibcLyjU9n2HVunQHx6wCSPkyI2/sCf+Kcd5/8mF/YGyBzxL1OEOADNVhOiplXS7mk9iC26S2N+MZZl5x5D5fmxyEZ8DdOa2/49NSFX09Xbh2yHccW7V9f06Z2EovBP76kh/IH6IkqT39c7t/RtG9xS8Rd8fpcrrnwg0wAAAABJRU5ErkJggg==" />
                    </svg>
                </div>
                <h2 class="align-center">Za one koji više vole da slušaju - Vlog</h2>
                <div class="row">
                    <?php 
                        while ($vlog_featured_posts_query->have_posts()) {
                            $vlog_featured_posts_query->the_post();
                    ?>
                    <div class="col-lg-6">
                        <div class="article">
                            <iframe width="100%" height="315"
                                src="https://www.youtube.com/embed/<?php echo get_field('video_url')?>" frameborder="0"
                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                            <p class="article-category">u <a
                                    href="<?php echo get_category_link(get_the_category()[0]->term_id) ?>"><?php echo get_the_category()[0]->name ?></a>
                            </p>
                            <h2 class="article-title"><?php the_title() ?>.</h2>
                            <p class="article-excerpt"><?php echo get_the_excerpt() ?></p>
                            <ul class="article-social-share list-reset">
                                <li><a href="#"><i class="icon-facebook"></i></a></li>
                                <li><a href="#"><i class="icon-twitter"></i></a></li>
                                <li><a href="#"><i class="icon-instagram"></i></a></li>
                                <li><a href="#"><i class="icon-tumblr"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php
        wp_reset_postdata();
        }
        ?>
</div>
<!-- /vlog featured posts -->
<!-- subscribe -->
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="subscribe" style="background-image: url('<?php echo $subscribe_image_url; ?>')">
                <div class="overlay"></div>
                <div class="subscribe-content">
                    <h2>Budite u toku</h2>
                    <p><?php the_field('subscribe')?></p>
                    <div class="subscribe-form"><input type="text"><button class="button right">Pošalji</button></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /subscribe -->
<?php get_footer(); ?>