<?php 
/*
	Template Name: Página Estática con Imagen
*/
get_header(); ?>

<div class="row">
	<div class="col-xs-12 col-sm-8">
		<?php 
		if (have_posts()):
			# code...
			while (have_posts()): the_post(); ?>
				<h1><?php the_title(); ?></h1>
				<small>Publicado el: <?php the_time('j \d\e F \d\e\l Y'); ?> a las <?php the_time('g:i a'); ?></small>
				<hr>
				<div class="thumbnail"><?php the_post_thumbnail('normal'); ?></div>
				<?php the_content(); ?>
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