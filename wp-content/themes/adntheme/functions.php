<?php
show_admin_bar( false );
/*
	=======================================
	 Include Scripts
	=======================================
*/
function adn_script_enqueue() {
	//css
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.6', 'all');
	wp_enqueue_style('customstyle', get_template_directory_uri() . '/css/adn.css', array(), '1.0.0', 'all');
	//js
	wp_enqueue_script('jquery');
	wp_enqueue_script( 'bootstrapjs', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '3.3.6', true);
	wp_enqueue_script( 'customjs', get_template_directory_uri() . '/js/adn.js', array(), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'adn_script_enqueue');

/*
	=======================================
	Activate Menus
	=======================================
*/
function adn_theme_setup() {
	add_theme_support('menus');
	register_nav_menu('primary', 'Navegación Principal en el Header');
	register_nav_menu('secondary', 'Navegación de Footer');
}
add_action('init', 'adn_theme_setup');

/*
	=======================================
	Theme support function
	=======================================
*/
add_theme_support('custom-background');
add_theme_support('custom-header');
add_theme_support('post-thumbnails');
add_theme_support('post-formats', array('aside', 'image', 'video'));
add_theme_support('html5', array('search-form'));
/*
	=======================================
	Sidebar function
	=======================================
*/
function adn_widget_setup() {
	register_sidebar( 
		array(
			'name'  => 'Sidebar',
			'id'    => 'sidebar-1',
			'class' => 'custom',
			'description' => 'Estandar Sidebar',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h1 class="widgettitle">',
			'after_title'   => '</h1>',
		)
	);
}
add_action( 'widgets_init', 'adn_widget_setup' );

/*
	=======================================
	Include Walker File
	=======================================
*/
require get_template_directory(). '/inc/walker.php';

/*
	=======================================
	Head function
	=======================================
*/
function adn_remove_version() {
	return '';
}
add_filter( 'the_generator', 'adn_remove_version' );

/*
	=======================================
	Custom Post Type
	=======================================
*/
/*
function adn_custom_post_type (){
	$labels = array(
		'name' => 'Portafolio',
		'singular_name' => 'Portafolio',
		'add_new' => 'Añadir Item',
		'all_items' => 'Todos los Items',
		'add_new_item' => 'Añadir Item',
		'edit_item' => 'Editar Item',
		'new_item' => 'Nuevo Item',
		'view_item' => 'Ver Item',
		'search_item' => 'Buscar Portafolio',
		'not_found' => 'No se encontraron items',
		'not_found_in_trash' => 'No se encontraron item en la papelera',
		'parent_item_colon' => 'Parent Item'
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'has_archive' => true,
		'publicly_queryable' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'supports' => array(
			'title',
			'editor',
			'excerpt',
			'thumbnail',
			'revisions',
			),
		//'taxonomies' => array('category', 'post_tag'),
		'menu_position' => 5,
		'exclude_from_search' => false,
	);
	register_post_type( 'portafolio', $args );
}
add_action( 'init', 'adn_custom_post_type' );
*/
/*
function adn_custom_taxonomies(){
	// add new taxonomy hierarchical
	$labels = array(
		'name' => 'Tipos',
		'singular_name' => 'Tipo',
		'search_items' => 'Buscar Tipos',
		'all_items' => 'Todos los Tipos',
		'parent_item' => 'Parent Tipo',
		'parent_item_colon' => 'Parent Tipo',
		'edit_item' => 'Editar Tipo',
		'update_item' => 'Actualizar Tipo',
		'add_new_item' => 'Añadir Nuevo Tipo de Trabajo',
		'new_item_name' => 'Nuevo Nombre de Tipo',
		'menu_name' => 'Tipos',
		);
	$args = array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'tipo'),
		);
	register_taxonomy( 'tipo', array( 'portafolio' ), $args );

	// add new taxonomy not herarchical
	register_taxonomy( 'software', 'portafolio', array(
		'label' => 'Software',
		'rewrite' => array( 'slug' => 'software' ),
		'hierarchical' => false,
		) );
}
add_action( 'init', 'adn_custom_taxonomies' );
*/
/*
	=======================================
	Custom Term Function
	=======================================
*/
function adn_get_terms($postID, $term ){
	$terms_list = wp_get_post_terms( $postID, $term );
	$output = '';
	$i = 0;
	foreach ($terms_list as $term) {
	 	# imprime las taxonomías del tipo de contenido
	 	$i++;
	 	if ( $i > 1 ) {
	 		$output .= ', ';
	 	}
	 	$output .= '<a href="' . get_term_link( $term ) .'">' . $term->name . '</a>';
	}
	return $output;
}








