<?php get_header(); ?>
<small>Este usa el search.php</small>

<div class="row">
	<div class="col-xs-12 col-sm-8">
		<div class="row">
		<?php 
		if (have_posts()): $i = 0;

			while (have_posts()): the_post();?>
				<?php get_template_part('content', 'search'); ?>
			<?php
			endwhile;
		endif;
		?>
		</div>
	</div>
	<div class="col-xs-12 col-sm-4">
		<?php get_sidebar(); ?>
	</div>
</div>

<?php get_footer(); ?>