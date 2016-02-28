<?php get_header(); ?>
<!-- <small>Este usa el page-5.php</small> -->
<div class="row">
	<div class="col-xs-12">
		<div id="seb-carrusel" class="carousel slide" data-ride="carousel">

		  	<!-- Wrapper for slides -->
		  	<div class="carousel-inner" role="listbox">
		  		<?php
					// Crea una consulta personalizada, muestra  el ultimo post
					$args_cat = array(
						'include' => '5, 6, 7',
					);
					$categories = get_categories( $args_cat );
					// var_dump($categories);
					$count = 0;
					$bullets = '';
					foreach ($categories as $category): 
						$args = array(
							'type' => 'post',
							'posts_per_page' => 1,
							'category__in' => $category->term_id,
							'category__not_in' => array( 10 ),		
						);
						$CabecerasBlog = new WP_Query($args);
						if ($CabecerasBlog->have_posts()):
							while ($CabecerasBlog->have_posts()): $CabecerasBlog->the_post(); 
								//echo 'Este es el formato: '.get_post_format();;?>
								<div class="item <?php if($count == 0): echo 'active'; endif; ?>">
							      <?php the_post_thumbnail('medium'); ?>
							      <div class="carousel-caption">
							      	<?php the_title( sprintf('<h1 class="entry-title"><a href="%s">', esc_url( get_permalink() ) ),'</a></h1>' ); ?>
									<small><?php the_category(' '); ?></small>
							      </div>
							    </div>
							    <?php $bullets .= '<li data-target="#seb-carrusel" data-slide-to="'.$count.'" class="'; ?>
							    <?php if($count == 0): $bullets .= 'active'; endif; ?>
								<?php  $bullets .= '"></li>'; ?>
							<?php
							endwhile;
						endif;
						// limpia los querypost
						wp_reset_postdata();
						$count++;
					endforeach
				?>
				<!-- Indicators -->
				<ol class="carousel-indicators">
					<?php echo $bullets; ?>
				</ol> 
			</div>
		  	<!-- Controls -->
			<a class="left carousel-control" href="#seb-carrusel" role="button" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#seb-carrusel" role="button" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-8">
		<?php 
		if (have_posts()):

			while (have_posts()): the_post(); //echo 'Este es el formato '.get_post_format();;?>
				<!-- obtiene el post por tipo de formato -->
				<?php get_template_part('content', get_post_format()); ?>
				
			<?php
			endwhile;
		endif;

		// Muestra los otros post mas no el primero
/*
		$args = array(
			'type' => 'post',
			'post_per_page' => 2,
			'offset' => 1,
		);
		$dosSiguientesBlog = new WP_Query($args);
		if ($dosSiguientesBlog->have_posts()):
			while ($dosSiguientesBlog->have_posts()): $dosSiguientesBlog->the_post(); 
				echo 'Este es el formato: '.get_post_format();;?>
				<!-- obtiene el post por tipo de formato -->
				<?php get_template_part('content', get_post_format()); ?>
			<?php
			endwhile;
		endif;
		// limpia los querypost
		wp_reset_postdata();
*/
		?>
		<!-- <hr> -->

		<?php 
/*
		// Muestra sólo los tutoriales
		//$dosSiguientesBlog = new WP_Query('type=post&posts_per_page=-1&cat=9');
		$dosSiguientesBlog = new WP_Query('type=post&posts_per_page=-1&category_name=tutoriales');
		if ($dosSiguientesBlog->have_posts()):
			while ($dosSiguientesBlog->have_posts()): $dosSiguientesBlog->the_post(); echo 'Este es el formato: '.get_post_format();;?>
				<!-- obtiene el post por tipo de formato -->
				<?php get_template_part('content', get_post_format()); ?>
			<?php
			endwhile;
		endif;
		// limpia los querypost
		wp_reset_postdata();
*/
		?>

	</div>
	<div class="col-xs-12 col-sm-4">
		<?php get_sidebar(); ?>
	</div>
</div>

<?php get_footer(); ?>