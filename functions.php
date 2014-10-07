<?php

// set upload sizes
@ini_set( 'upload_max_size' , '64M' );
@ini_set( 'post_max_size', '64M');
@ini_set( 'max_execution_time', '300' );

function bss_theme()  {
	global $wp_version;
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 235, 450, true );
	add_image_size( 'sidebar', 320, 550 );
	add_image_size( 'grid', 300, 175, true );
	remove_action( 'wp_head', 'wp_generator' );
	show_admin_bar( false );
	$background = array(
		'default-color'          => '000000',
		'default-image'          => get_template_directory_uri() . '/images/bg.jpg',
		'wp-head-callback'       => '',
		'admin-head-callback'    => '',
		'admin-preview-callback' => '',
	);
	$header = array(
		'default-image'          => get_template_directory_uri() . '/images/headers/logo.png',
		'width'                  => 493,
		'height'                 => 371,
		'flex-width'             => false,
		'flex-height'            => false,
		'random-default'         => false,
		'header-text'            => false,
		'default-text-color'     => '',
		'uploads'                => true,
		'wp-head-callback'       => '',
		'admin-head-callback'    => '',
		'admin-preview-callback' => '',
	);
	$formats = array( 
		'status'
	);
	add_theme_support( 'custom-header', $header );
	add_theme_support( 'custom-background', $background );
	add_theme_support( 'post-formats', $formats );
}
add_action( 'after_setup_theme', 'bss_theme' );

function bss_sidebar() {
	$args = array(
		'id' 					=> 'left_sidebar',
		'name' 					=> __( 'Main Sidebar', 'bss' ),
		'description' 			=> __( 'Sidebar', 'bss' ),
		'class' 				=> 'sidebar',
	);
	register_sidebar( $args );
}
add_action( 'widgets_init', 'bss_sidebar' );

function si_menu() {
	$locations = array(
		'Header' 				=> __( 'Main Menu', 'bss' ),
	);
	register_nav_menus( $locations );
}
add_action( 'init', 'si_menu' );

function bss_scripts() {
	$path = get_template_directory_uri();
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', $path . '/js/jquery.js', false, '1.11.1', false );
	wp_register_script( 'isotope', $path . '/js/isotope.js', false, '2.0.0', false );
	wp_register_script( 'modernizr', $path . '/js/modernizr.js', false, '2.8.1', false );
	wp_register_script( 'main', $path . '/js/main.js', false, '1.1', true );
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'isotope' );
	wp_enqueue_script( 'modernizr' );
	wp_enqueue_script( 'main' );
}
add_action( 'wp_enqueue_scripts', 'bss_scripts' );

function si_css() {
	wp_register_style( 'normalise', get_template_directory_uri() . '/css/normalize.css', false, false );
	wp_register_style( 'grid', get_template_directory_uri() . '/css/grid.css', false, false );
	wp_enqueue_style( 'normalise' );
	wp_enqueue_style( 'grid' );
}
add_action( 'wp_enqueue_scripts', 'si_css' ); 

function remove_menus () {
global $menu;
	$restricted = array( __('Posts', 'bss'), __('Media', 'bss'), __('Links', 'bss'), __('Tools', 'bss'), __('Comments', 'bss'), __('Plugins', 'bss'), __('Settings', 'bss'), __('Users', 'bss'));
	end ($menu);
	while (prev($menu)){
		$value = explode(' ',$menu[key($menu)][0]);
		if(in_array($value[0] != NULL?$value[0]:"" , $restricted)){unset($menu[key($menu)]);}
	}
}
add_action('admin_menu', 'remove_menus');

function my_remove_menu_pages() {
	remove_submenu_page ('themes.php', 'themes.php');
	remove_submenu_page ('themes.php', 'theme-editor.php');
	remove_submenu_page ('themes.php', 'customize.php');
}
add_action( 'admin_init', 'my_remove_menu_pages' );

function speaker() {
	$labels = array(
		'name'                => _x( 'Speakers', 'Post Type General Name', 'bss' ),
		'singular_name'       => _x( 'Speaker', 'Post Type Singular Name', 'bss' ),
		'menu_name'           => __( 'Speakers', 'bss' ),
		'parent_item_colon'   => __( 'Parent Speaker:', 'bss' ),
		'all_items'           => __( 'All Speakers', 'bss' ),
		'view_item'           => __( 'View Speaker', 'bss' ),
		'add_new_item'        => __( 'Add New Speaker', 'bss' ),
		'add_new'             => __( 'Add New', 'bss' ),
		'edit_item'           => __( 'Edit Speaker', 'bss' ),
		'update_item'         => __( 'Update Speaker', 'bss' ),
		'search_items'        => __( 'Search Speaker', 'bss' ),
		'not_found'           => __( 'Not found', 'bss' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'bss' ),
	);
	$args = array(
		'label'               => __( 'speaker', 'bss' ),
		'description'         => __( 'Speakers', 'bss' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail', 'page-attributes' ),
		'taxonomies'          => array('categories' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'           => '',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'speaker', $args );
}
add_action( 'init', 'speaker', 0 );

function agenda() {
	$labels = array(
		'name'                => _x( 'Agendum', 'Post Type General Name', 'bss' ),
		'singular_name'       => _x( 'Agenda', 'Post Type Singular Name', 'bss' ),
		'menu_name'           => __( 'Agenda', 'bss' ),
		'parent_item_colon'   => __( 'Parent Agenda:', 'bss' ),
		'all_items'           => __( 'All Agendas', 'bss' ),
		'view_item'           => __( 'View Agenda', 'bss' ),
		'add_new_item'        => __( 'Add New Agenda', 'bss' ),
		'add_new'             => __( 'Add New', 'bss' ),
		'edit_item'           => __( 'Edit Agenda', 'bss' ),
		'update_item'         => __( 'Update Agenda', 'bss' ),
		'search_items'        => __( 'Search Agenda', 'bss' ),
		'not_found'           => __( 'Not found', 'bss' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'bss' ),
	);
	$args = array(
		'label'               => __( 'agenda', 'bss' ),
		'description'         => __( 'Agenda', 'bss' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'post-formats'),
		'taxonomies'          => array( 'category', 'post_tag' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'           => '',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'agendum', $args );
}
add_action( 'init', 'agenda', 0 );

function locations() {
	$labels = array(
		'name'                => _x( 'Locations', 'Post Type General Name', 'bss' ),
		'singular_name'       => _x( 'Location', 'Post Type Singular Name', 'bss' ),
		'menu_name'           => __( 'Locations', 'bss' ),
		'parent_item_colon'   => __( 'Parent Location:', 'bss' ),
		'all_items'           => __( 'All Locations', 'bss' ),
		'view_item'           => __( 'View Location', 'bss' ),
		'add_new_item'        => __( 'Add New Location', 'bss' ),
		'add_new'             => __( 'Add New', 'bss' ),
		'edit_item'           => __( 'Edit Location', 'bss' ),
		'update_item'         => __( 'Update Location', 'bss' ),
		'search_items'        => __( 'Search Location', 'bss' ),
		'not_found'           => __( 'Not found', 'bss' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'bss' ),
	);
	$args = array(
		'label'               => __( 'location', 'bss' ),
		'description'         => __( 'Venues', 'bss' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'thumbnail', ),
		'taxonomies'          => array('categories' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'           => '',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'location', $args );
}
add_action( 'init', 'locations', 0 );

function speaker_meta( $meta_boxes ) {
	$prefix = '_cmb_';
	$meta_boxes[] = array(
		'id' => 'meta',
		'title' => 'Speaker Info',
		'pages' => array('speaker'),
		'context' => 'normal',
		'priority' => 'high',
		'show_names' => true,
		'fields' => array(
			array(
				'name' => 'Job Title',
				'desc' => '',
				'type' => 'text',
				'id' => $prefix . 'job'
			),
			array(
				'name' => 'Company',
				'desc' => '',
				'type' => 'text',
				'id' => $prefix . 'company'
			)
		),
	);
	return $meta_boxes;
}
add_filter( 'cmb_meta_boxes', 'speaker_meta' );

function agenda_meta( $meta_boxes ) {
	$prefix = '_cmb_';
	$meta_boxes[] = array(
		'id' => 'meta',
		'title' => 'Agenda Info',
		'pages' => array('agendum'),
		'context' => 'normal',
		'priority' => 'high',
		'show_names' => true,
		'fields' => array(
			array(
				'name' => 'Time',
				'desc' => '',
				'type' => 'text',
				'id' => $prefix . 'time'
			)
		),
	);
	return $meta_boxes;
}
add_filter( 'cmb_meta_boxes', 'agenda_meta' );

function location_meta( $meta_boxes ) {
	$prefix = '_cmb_';
	$meta_boxes[] = array(
		'id' => 'meta',
		'title' => 'Location Info',
		'pages' => array('location'),
		'context' => 'normal',
		'priority' => 'high',
		'show_names' => true,
		'fields' => array(
			array(
				'name' => 'Address',
				'desc' => '',
				'type' => 'text',
				'id' => $prefix . 'address'
			),
			array(
				'name' => 'Telephone',
				'desc' => '',
				'type' => 'text',
				'id' => $prefix . 'phone'
			),
			array(
				'name' => 'Website',
				'desc' => '',
				'type' => 'text',
				'id' => $prefix . 'www'
			)
		),
	);
	return $meta_boxes;
}
add_filter( 'cmb_meta_boxes', 'location_meta' );

add_action( 'init', 'be_initialize_cmb_meta_boxes', 9999 );
function be_initialize_cmb_meta_boxes() {
	if ( !class_exists( 'cmb_Meta_Box' ) ) {
		require_once( 'metabox/init.php' );
	}
}
