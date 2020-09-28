<?php 
	if (have_posts()) { 
?>
<div class="row">
    <?php 
		while (have_posts()) {
			the_post();
	?>
    <div class="col-lg-6">
        <div class="article">
            <div class="article-image">
                <a href="<?php echo get_permalink() ?>">
                    <img src="<?php echo get_the_post_thumbnail_url() ?>" alt="">
                </a>
            </div>
            <span><?php echo get_the_date('F d, Y')?></span>
            <!-- <p class="article-category">u <a href="<?php // echo get_category_link(get_the_category()[0]->term_id) ?>"><?php echo get_the_category()[0]->name ?></a></p> -->
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
                <li><a href="https://twitter.com/home?status=<?php the_title(); ?>"><i class="icon-twitter"></i></a>
                </li>
                <li><a
                        href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>&summary=<?php echo get_the_excerpt() ?>&source=<?php echo get_home_url(); ?>"><i
                            class="icon-instagram"></i></a></li>
                <li><a href="#"><i class="icon-tumblr"></i></a></li>
            </ul>
        </div>
    </div>
    <?php
		}
	?>
</div>
<?php
	}
?>