<?php 
/*
	Template Name: Portafolio Template
*/
get_header(); ?>
<h1>Este usa el page-portafolio-template.php</h1>
<?php 
$args = array(
	'post_type' => 'portafolio',
	'post_per_page' => 3
	);
$loop = new WP_Query( $args );
if ($loop->have_posts()):
	while ($loop->have_posts()): $loop->the_post(); ?>
		<?php get_template_part( 'content', 'archive' ); ?>
	<?php
	endwhile;
endif;
?>
<?php get_footer(); ?>