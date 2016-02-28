<?php get_header(); ?>
<h1>Este usa la página page-5.php</h1>
<div class="row">
	<div class="col-xs-12 col-sm-8">
		<?php 
		if (have_posts()):
			# code...
			while (have_posts()): the_post(); ?>
				<p><?php the_content(); ?></p>
				<h3><?php the_title(); ?></h3>
				<hr>
			<?php
			endwhile;
		endif;
		?>
	</div>
	<div class="col-xs-12 col-sm-4">
		<?php get_sidebar(); ?>
	</div>
</div>

<?php get_footer(); ?>