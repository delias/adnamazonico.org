<!-- asocia el ID del post al id, y todas las clases del post -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<!-- usamos la función title para poner el título y sus etiquetas, como el permanlink, seguro de injección -->
		<?php the_title( sprintf('<h1 class="entry-title"><a href="%s">', esc_url( get_permalink() ) ),'</a></h1>' ); ?>
		<small>Publicado el: <?php the_time('j \d\e F \d\e\l Y'); ?> a las <?php the_time('g:i a'); ?>, en <?php the_category(' '); ?></small>
	</header>
	
	<div class="row">
		<!-- Si tiene thumbnail -->
		<?php if ( has_post_thumbnail() ): ?>
			<div class="col-xs-12 col-sm-4">
				<div class="thumbnail"><?php the_post_thumbnail('medium'); ?></div>
			</div>
			<div class="col-xs-12 col-sm-8">
				<?php the_excerpt(); ?>
			</div>
		<?php else: ?>
			<div class="col-xs-12">
				<?php the_excerpt(); ?>
			</div>
		<?php endif ?>
	</div>
</article>