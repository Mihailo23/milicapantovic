<?php get_header(); ?>

	<?php if (have_posts()): while (have_posts()) : the_post(); ?>

		<article class="article">
			
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						
						<h1 class="align-center">
							<?php the_title(); ?>
						</h1>
						
						<p class="align-center article-date">
							<?php the_time('F j, Y'); ?>
						</p>

						<img src="<?php the_post_thumbnail_url(); ?>" alt="">
						<div class="single-content">
							<?php the_content();?>
						</div>
						<ul class="single-social-share list-reset">
							<li>
								<a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank">
									<i class="icon-facebook"></i>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>

		</article>

	<?php endwhile; ?>

	<?php endif; ?>

<?php get_footer(); ?>
