<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php bloginfo(  'Name' ); ?><?php wp_title( '|' ); ?></title>
	<meta name="description" content="<?php bloginfo( 'description' ); ?>">
	<?php wp_head(); ?>
</head>
<!-- si es front page se le asigna una clase especial -->
<?php 
	if (is_front_page()):
		$awesome_classes = array('awesome-class', 'my-class');
	else:
		$awesome_classes = array('no-awesome-class');
	endif;
?>
<body <?php body_class($awesome_classes); ?>>
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<nav class="navbar navbar-default navbar-fixed-top">
				  <div class="container">
				    <!-- Brand and toggle get grouped for better mobile display -->
				    <div class="navbar-header">
				      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				        <span class="sr-only">Toggle navegación</span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				      </button>
				      <a class="navbar-brand" href="<?php bloginfo('url'); ?>"><?php bloginfo('Name'); ?></a>
				    </div>
				    <!-- Collect the nav links, forms, and other content for toggling -->
				    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					    <!-- ubicación del menu primario -->
						<?php
							wp_nav_menu(array(
								'theme_location' => 'primary',
								'container' => false,
								'menu_class' => 'nav navbar-nav navbar-right',
								'walker' => new Walker_Nav_Primary()
								)
							);
						?>
				    </div><!-- /.navbar-collapse -->
				  </div><!-- /.container-fluid -->
				</nav>
				<!-- //var_dump(get_custom_header()); -->
			</div>
			<div class="col-xs-12">
				<div class="search-form-container">
					<div class="container">
						<?php get_search_form(); ?>
					</div>
				</div>
			</div>
		</div>
		<!-- codigo para poner la imagen personalizada -->
		<img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>">
	
	
	
	
	