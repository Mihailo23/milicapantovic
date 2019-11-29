<?php get_header(); ?>
<div class="container">
	<div class="row">
		<div class="col-lg-12">
		<h1 class="align-center">
			Kategorija:
			<?php single_cat_title(); ?>
		</h1>

		<?php get_template_part('/template-parts/loop'); ?>
		</div>
	</div>
</div>

<?php // get_sidebar(); ?>

<?php get_footer(); ?>