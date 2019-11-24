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
?>
    <!-- owl-carousel -->
    <?php
        if ($featured_posts_query->have_posts()) {
    ?>
    <div class="owl-carousel">
        <?php 
            while ($featured_posts_query->have_posts()) {
                $featured_posts_query->the_post();
        ?>
        <a href="<?php echo get_permalink() ?>" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>')" class="owl-slide item">
            <div class="owl-slide-content">
                <span class="owl-slide-category">in <span><?php echo get_the_category()[0]->name ?></span></span>
                <h2><?php echo get_the_title() ?></h2>
                <span class="owl-slide-category"><?php echo get_the_date(); ?> od <span><?php echo get_author_name(); ?></span></span>
            </div>
        </a>
        <?php
            }
        ?>
    </div>
    <?php
        }
    ?>
    <!-- /owl-carousel -->
    <!-- about -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="home-section align-center">
                    <img class="centered-image" src="https://placehold.it/50x50" alt="">
                    <h2>O meni</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla quo dolores tempora eum quasi sint odit hic nemo fugit, placeat quis eaque exercitationem dignissimos deserunt. Eum aliquid delectus non voluptatibus?</p>
                    <a href="#" class="button">Pročitaj više</a>
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
                    <img class="image-center" src="https://placehold.it/50x50" alt="">
                    <h2 class="align-center">Pravo iz mog mastila</h2>
                    <div class="row">
                    <?php 
                        while ($featured_posts_query->have_posts()) {
                            $featured_posts_query->the_post();
                    ?>
                        <div class="col-lg-6">
                            <div class="article">
                                <img src="https://placehold.it/800x600" alt="">
                                <p class="article-category">u <a href="<?php echo get_category_link(get_the_category()[0]->term_id) ?>"><?php echo get_the_category()[0]->name ?></a></p>
                                <h2 class="article-title"><?php the_title() ?>.</h2>
                                <p class="article-excerpt"><?php echo get_the_excerpt() ?></p>
                                <a href="<?php echo get_permalink() ?>" class="read-more">Pročitaj više</a>
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
        }
        ?>
    </div>
    <!-- /featured posts -->
    <!-- about the book -->
    <div class="container">
        <div class="row center">
            <div class="col-lg-8">
                <div class="home-section align-center">
                    <img class="centered-image" src="https://placehold.it/50x50" alt="">
                    <h2>Knjiga "Ljubav je budna"</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla quo dolores tempora eum quasi sint odit hic nemo fugit, placeat quis eaque exercitationem dignissimos deserunt. Eum aliquid delectus non voluptatibus?</p>
                    <a href="#" class="button">Pročitaj više</a>
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
                    <img class="image-center" src="https://placehold.it/50x50" alt="">
                    <h2 class="align-center">Za one koji više vole da slušaju - Vlog</h2>
                    <div class="row">
                    <?php 
                        while ($vlog_featured_posts_query->have_posts()) {
                            $vlog_featured_posts_query->the_post();
                    ?>
                        <div class="col-lg-6">
                            <div class="article">
                                <img src="https://placehold.it/800x600" alt="">
                                <p class="article-category">u <a href="<?php echo get_category_link(get_the_category()[0]->term_id) ?>"><?php echo get_the_category()[0]->name ?></a></p>
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
        }
        ?>
    </div>
    <!-- /vlog featured posts -->
    <!-- subscribe -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="subscribe" style="background-image: url('https://placehold.it/1000x300')">
                    <h2>Budite u toku</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem, accusamus.</p>
                    <div class="subscribe-form"><input type="text"><button class="button">Pošalji</button></div>
                </div>
            </div>
        </div>
    </div>
    <!-- /subscribe -->
    <!-- instagram feed -->
    <div class="feed">
        <a href="#" class="feed-link">
            <span>Find us on instagram</span>
            <h3>milica.m.pantovic</h3>
        </a>
        <div class="feed-images">
            <a href="#" style="background-image: url('https://placehold.it/200x300')"></a>
            <a href="#" style="background-image: url('https://placehold.it/200x300')"></a>
            <a href="#" style="background-image: url('https://placehold.it/200x300')"></a>
            <a href="#" style="background-image: url('https://placehold.it/200x300')"></a>
            <a href="#" style="background-image: url('https://placehold.it/200x300')"></a>
        </div>
    </div>
    <!-- /instagram feed -->
<?php get_footer(); ?>