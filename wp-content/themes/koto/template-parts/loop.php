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
            <div class="article-thumbnail">
                <a href="<?php echo get_permalink() ?>">
                    <img src="<?php echo get_the_post_thumbnail_url() ?>" alt="">
                </a>
            </div>
            <p class="article-date"><?php the_time('F d, Y')?></p>
            <!-- <p class="article-category">u <a href="<?php // echo get_category_link(get_the_category()[0]->term_id) ?>"><?php echo get_the_category()[0]->name ?></a></p> -->
            <h2 class="article-title">
                <a href="<?php echo get_permalink() ?>">
                    <?php the_title() ?>
                </a>
            </h2>
            <p class="article-excerpt"><?php echo get_the_excerpt() ?></p>
            <a href="<?php echo get_permalink() ?>" class="read-more">Pročitaj više</a>
            <ul class="article-social-share list-reset">
                <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank"><i
                            class="icon-facebook"></i></a></li>
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