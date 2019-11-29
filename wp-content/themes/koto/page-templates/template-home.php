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
            <div class="overlay"></div>
            <div class="owl-slide-content">
                <span class="owl-slide-category">u <span><?php echo get_the_category()[0]->name ?></span></span>
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
                    <a href="#" class="button right">Pročitaj više</a>
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
                                <img src="<?php echo get_the_post_thumbnail_url() ?>" alt="">
                                <p class="article-category">u <a href="<?php echo get_category_link(get_the_category()[0]->term_id) ?>"><?php echo get_the_category()[0]->name ?></a></p>
                                <h2 class="article-title"><?php the_title() ?></h2>
                                <p class="article-excerpt"><?php echo get_the_excerpt() ?></p>
                                <a href="<?php echo get_permalink() ?>" class="read-more">Pročitaj više</a>
                                <ul class="article-social-share list-reset">
                                    <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><i class="icon-facebook"></i></a></li>
                                    <li><a href="https://twitter.com/home?status=<?php the_title(); ?>"><i class="icon-twitter"></i></a></li>
                                    <li><a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>&summary=<?php echo get_the_excerpt() ?>&source=<?php echo get_home_url(); ?>"><i class="icon-instagram"></i></a></li>
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
                    <a href="#" class="button right">Pročitaj više</a>
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
                            <iframe width="100%" height="315" src="https://www.youtube.com/embed/<?php echo get_field('video_url')?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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
                <div class="subscribe" style="background-image: url('<?php echo $subscribe_image_url; ?>')">
                    <div class="overlay"></div>
                    <div class="subscribe-content">
                        <h2>Budite u toku</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem, accusamus.</p>
                        <div class="subscribe-form"><input type="text"><button class="button right">Pošalji</button></div>    
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /subscribe -->
<?php get_footer(); ?>