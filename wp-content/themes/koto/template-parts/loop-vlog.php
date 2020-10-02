<?php 
	if (have_posts()) { 
?>
	<div class="row">
	<?php 
		while (have_posts()) {
			the_post();
	?>
		<div class="col-md-12 col-lg-6">
			<div class="article">
				<iframe width="100%" height="315" src="https://www.youtube.com/embed/<?php echo get_field('video_url')?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				<h2 class="article-title"><?php the_title() ?>.</h2>
				<p class="article-excerpt"><?php echo get_the_excerpt() ?></p>
				<ul class="article-social-share list-reset">	
					<li><a href="https://www.facebook.com/sharer/sharer.php?u=https://www.youtube.com/embed/<?php echo get_field('video_url')?>" target="_blank"><i class="icon-facebook"></i></a></li>
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

		