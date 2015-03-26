<?php
	
if ( ! isset( $content_width ) )
	$content_width = 940;

// Register Theme Features
function yogameister()  {
	remove_action( 'wp_head', 'wp_generator' );
	show_admin_bar( false );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 300, 300, true );
	add_image_size( 'carousel', 940, 360, true );
	add_image_size( 'home', 460, 460, true );
	add_image_size( 'yoga', 300, 300, true );
	add_image_size( 'half', 150, 150, true );
}
add_action( 'after_setup_theme', 'yogameister' );

function ym_scripts() {
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', get_template_directory_uri() . '/js/libs/jquery-1.10.1.min.js', false, '1.10.1', true );
	wp_register_script( 'modernizr', get_template_directory_uri() . '/js/modernizr.js', false, '2.8.1', false );
	wp_register_script( 'gumby', get_template_directory_uri() . '/js/libs/gumby.min.js', false, '2.6', true );
	wp_register_script( 'owl', get_template_directory_uri() . '/owl-carousel/owl.carousel.min.js', false, '1.4.1', true );
	wp_register_script( 'main', get_template_directory_uri() . '/js/main.js', false, '2.6', true );
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'modernizr' );
	wp_enqueue_script( 'gumby' );
	wp_enqueue_script( 'owl' );
	wp_enqueue_script( 'main' );
}
add_action( 'wp_enqueue_scripts', 'ym_scripts' );

function ym_styles() {
	wp_register_style( 'base', get_template_directory_uri() . '/css/base.css', false, '2.6' );
	wp_register_style( 'normalise', get_template_directory_uri() . '/css/normalize.css', false, '3.0.1' );
	wp_register_style( 'fonts', get_template_directory_uri() . '/css/fonts.css', false, '5al6ne' );
	wp_register_style( 'owl', get_template_directory_uri() . '/owl-carousel/owl.carousel.css', false, '3.0.1' );
	wp_register_style( 'theme', get_template_directory_uri() . '/owl-carousel/owl.theme.css', false, '3.0.1' );
	wp_enqueue_style( 'normalise' );
	wp_enqueue_style( 'base' );
	wp_enqueue_style( 'owl' );
	wp_enqueue_style( 'theme' );
	wp_enqueue_style( 'fonts' );
}
add_action( 'wp_enqueue_scripts', 'ym_styles' );

function ym_menu() {
	$locations = array(
		'ymmenu' => __( 'Main Menu', 'ym' ),
	);
	register_nav_menus( $locations );
}
add_action( 'init', 'ym_menu' );

register_sidebar( array(
	'id' => 'sidebar',
	'name' => __( 'Sidebar Widgets', 'ch' ),
	'description' => __( '', 'ym' ),
	'before_title' => '<h5 class="widget">',
	'aftch_title' => '</h5>',
	'before_widget' => '<li id="%1$s" class="widget field %2$s">',
	'after_widget' => '</li>',
));

register_sidebar( array(
	'id' => 'footer',
	'name' => __( 'Footer Widgets', 'ch' ),
	'description' => __( '', 'ym' ),
	'before_title' => '<h5 class="widget">',
	'aftch_title' => '</h5>',
	'before_widget' => '<li id="%1$s" class="widget field %2$s">',
	'after_widget' => '</li>',
));

// Register Carousel Post Type
function carousel() {
	$labels = array(
		'name'				=> _x( 'Carousels', 'Post Type General Name', 'ym' ),
		'singular_name'	   => _x( 'Carousel', 'Post Type Singular Name', 'ym' ),
		'menu_name'		   => __( 'Carousels', 'ym' ),
		'parent_item_colon'   => __( 'Parent Carousel:', 'ym' ),
		'all_items'		   => __( 'All Carousels', 'ym' ),
		'view_item'		   => __( 'View Carousel', 'ym' ),
		'add_new_item'		=> __( 'Add New Carousel', 'ym' ),
		'add_new'			 => __( 'Add New', 'ym' ),
		'edit_item'		   => __( 'Edit Carousel', 'ym' ),
		'update_item'		 => __( 'Update Carousel', 'ym' ),
		'search_items'		=> __( 'Search Carousel', 'ym' ),
		'not_found'		   => __( 'Not found', 'ym' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'ym' ),
	);
	$args = array(
		'label'			   => __( 'carousel', 'ym' ),
		'description'		 => __( 'Home Page Carousel', 'ym' ),
		'labels'			  => $labels,
		'supports'			=> array( 'title', 'thumbnail', ),
		'taxonomies'		  => array( 'category', 'post_tag' ),
		'hierarchical'		=> false,
		'public'			  => true,
		'show_ui'			 => true,
		'show_in_menu'		=> true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'	   => 5,
		'can_export'		  => true,
		'has_archive'		 => false,
		'exclude_from_search' => true,
		'publicly_queryable'  => true,
		'capability_type'	 => 'page',
	);
	register_post_type( 'carousel', $args );
}
add_action( 'init', 'carousel', 0 );

// Register Location Post Type
function location() {
	$labels = array(
		'name'				=> _x( 'Locations', 'Post Type General Name', 'ym' ),
		'singular_name'	   => _x( 'Location', 'Post Type Singular Name', 'ym' ),
		'menu_name'		   => __( 'Locations', 'ym' ),
		'parent_item_colon'   => __( 'Parent Location:', 'ym' ),
		'all_items'		   => __( 'All Locations', 'ym' ),
		'view_item'		   => __( 'View Location', 'ym' ),
		'add_new_item'		=> __( 'Add New Location', 'ym' ),
		'add_new'			 => __( 'Add New', 'ym' ),
		'edit_item'		   => __( 'Edit Location', 'ym' ),
		'update_item'		 => __( 'Update Location', 'ym' ),
		'search_items'		=> __( 'Search Locations', 'ym' ),
		'not_found'		   => __( 'Not found', 'ym' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'ym' ),
	);
	$args = array(
		'label'			   => __( 'locations', 'ym' ),
		'description'		 => __( 'Locations', 'ym' ),
		'labels'			  => $labels,
		'supports'			=> array('title', 'thumbnail' ),
		'taxonomies'		  => array( ),
		'hierarchical'		=> false,
		'public'			  => true,
		'show_ui'			 => true,
		'show_in_menu'		=> true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'	   => 5,
		'can_export'		  => true,
		'has_archive'		 => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'	 => 'page',
	);
	register_post_type( 'location', $args );
}
add_action( 'init', 'location', 0 );

// Register Teacher Post Type
function teacher() {
	$labels = array(
		'name'				=> _x( 'Teacher', 'Post Type General Name', 'ym' ),
		'singular_name'	   => _x( 'Teacher', 'Post Type Singular Name', 'ym' ),
		'menu_name'		   => __( 'Teachers', 'ym' ),
		'parent_item_colon'   => __( 'Parent Teacher:', 'ym' ),
		'all_items'		   => __( 'All Teachers', 'ym' ),
		'view_item'		   => __( 'View Teacher', 'ym' ),
		'add_new_item'		=> __( 'Add New Teacher', 'ym' ),
		'add_new'			 => __( 'Add New', 'ym' ),
		'edit_item'		   => __( 'Edit Teacher', 'ym' ),
		'update_item'		 => __( 'Update Teacher', 'ym' ),
		'search_items'		=> __( 'Search Teachers', 'ym' ),
		'not_found'		   => __( 'Not found', 'ym' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'ym' ),
	);
	$args = array(
		'label'			   => __( 'teachers', 'ym' ),
		'description'		 => __( 'Teachers', 'ym' ),
		'labels'			  => $labels,
		'supports'			=> array('title',  'editor', 'thumbnail', 'excerpt' ),
		'taxonomies'		  => array( ),
		'hierarchical'		=> false,
		'public'			  => true,
		'show_ui'			 => true,
		'show_in_menu'		=> true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'	   => 5,
		'can_export'		  => true,
		'has_archive'		 => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'	 => 'page',
	);
	register_post_type( 'teacher', $args );
}
add_action( 'init', 'teacher', 0 );

// Register Testimonial Post Type
function testimonial() {
	$labels = array(
		'name'				=> _x( 'Testimonials', 'Post Type General Name', 'ym' ),
		'singular_name'	   => _x( 'Testimonials', 'Post Type Singular Name', 'ym' ),
		'menu_name'		   => __( 'Testimonials', 'ym' ),
		'parent_item_colon'   => __( 'Parent Testimonial:', 'ym' ),
		'all_items'		   => __( 'All Testimonials', 'ym' ),
		'view_item'		   => __( 'View Testimonial', 'ym' ),
		'add_new_item'		=> __( 'Add New Testimonial', 'ym' ),
		'add_new'			 => __( 'Add New', 'ym' ),
		'edit_item'		   => __( 'Edit Testimonial', 'ym' ),
		'update_item'		 => __( 'Update Testimonial', 'ym' ),
		'search_items'		=> __( 'Search Testimonials', 'ym' ),
		'not_found'		   => __( 'Not found', 'ym' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'ym' ),
	);
	$args = array(
		'label'			   => __( 'Testimonials', 'ym' ),
		'description'		 => __( 'Testimonials', 'ym' ),
		'labels'			  => $labels,
		'supports'			=> array('title',  'editor', 'excerpt' ),
		'taxonomies'		  => array( ),
		'hierarchical'		=> false,
		'public'			  => true,
		'show_ui'			 => true,
		'show_in_menu'		=> true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'	   => 5,
		'can_export'		  => true,
		'has_archive'		 => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'	 => 'page',
	);
	register_post_type( 'testimonial', $args );
}
add_action( 'init', 'testimonial', 0 );

class Walker_Page_Custom extends Walker_Nav_menu{
	function start_lvl(&$output, $depth=0, $args=array()){
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<div class=\"dropdown\"><ul>\n";
	}
	function end_lvl(&$output , $depth=0, $args=array()){
		$indent = str_repeat("\t", $depth);
		$output .= "$indent</ul></div>\n";
	}
}

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);

function my_theme_wrapper_start() {
	echo '<div class="row" id="page"><div id="main" class="twelve columns">';
}

function my_theme_wrapper_end() {
	echo '</div></div>';
}

function carousel_link( $meta_boxes ) {
	$prefix = '_cmb_';
	$meta_boxes[] = array(
		'id' => 'meta',
		'title' => 'Carousel Link',
		'pages' => array('carousel'),
		'context' => 'normal',
		'priority' => 'high',
		'show_names' => true,
		'fields' => array(
			array(
				'name' => __( 'Link to page', 'ym' ),
				'id' => $prefix . 'url',
				'type' => 'text_url',
			),
		),
	);
	return $meta_boxes;
}
add_filter( 'cmb_meta_boxes', 'carousel_link' );

function class_dates( $meta_boxes ) {
	$prefix = '_cmb_';
	$meta_boxes[] = array(
		'id' => 'meta',
		'title' => 'Class Details',
		'pages' => array('class'),
		'context' => 'normal',
		'priority' => 'high',
		'show_names' => true,
		'fields' => array(
			array(
				'name' => __( 'Link to page', 'ym' ),
				'id' => $prefix . 'url',
				'type' => 'text',
			),
		),
	);
	return $meta_boxes;
}
add_filter( 'cmb_meta_boxes', 'class_dates' );

function location_details( $meta_boxes ) {
	$prefix = '_cmb_';
	$meta_boxes[] = array(
		'id' => 'meta',
		'title' => 'Locations Details',
		'pages' => array('location'),
		'context' => 'normal',
		'priority' => 'high',
		'show_names' => true,
		'fields' => array(
			array(
				'name' => __( 'Booking Button', 'ym' ),
				'textarea_rows' => get_option('default_post_edit_rows', 2),
				'teeny' => true,
				'id' => $prefix . 'bb',
				'type' => 'wysiwyg',
			),
			array(
				'name' => __( 'Street Address', 'ym' ),
				'id' => $prefix . 'street',
				'type' => 'text',
			),
			array(
				'name' => __( 'Street Address', 'ym' ),
				'id' => $prefix . 'street2',
				'type' => 'text',
			),
			array(
				'name' => __( 'Town', 'ym' ),
				'id' => $prefix . 'town',
				'type' => 'text',
			),
			array(
				'name' => __( 'Postcode', 'ym' ),
				'id' => $prefix . 'postcode',
				'type' => 'text',
			),
			array(
				'name' => __( 'Phone', 'ym' ),
				'id' => $prefix . 'tel',
				'type' => 'text',
			),
			array(
				'name' => __( 'Website', 'ym' ),
				'id' => $prefix . 'text_url',
				'type' => 'text_url',
			),
			array(
				'name' => __( 'Google Maps iframe', 'ym' ),
				'id' => $prefix . 'gmi',
				'type' => 'text',
			),
		),
	);
	return $meta_boxes;
}
add_filter( 'cmb_meta_boxes', 'location_details' );

add_action( 'init', 'be_initialize_cmb_meta_boxes', 9999 );
function be_initialize_cmb_meta_boxes() {
	if ( !class_exists( 'cmb_Meta_Box' ) ) {
		require_once( 'metabox/init.php' );
	}
}

function testimonials_to_pages() {
	p2p_register_connection_type( array(
		'name' => 'testimonials_to_pages',
		'from' => 'testimonial',
		'to' => 'page'
	) );
}
add_action( 'p2p_init', 'testimonials_to_pages' );

// Add Custom Post Types to Dashboard
add_action( 'dashboard_glance_items', 'my_add_cpt_to_dashboard' );
function my_add_cpt_to_dashboard() {
	$showTaxonomies = 1;
	if ($showTaxonomies) {
		$taxonomies = get_taxonomies( array( '_builtin' => false ), 'objects' );
		foreach ( $taxonomies as $taxonomy ) {
			$num_terms	= wp_count_terms( $taxonomy->name );
			$num = number_format_i18n( $num_terms );
			$text = _n( $taxonomy->labels->singular_name, $taxonomy->labels->name, $num_terms );
			$associated_post_type = $taxonomy->object_type;
			if ( current_user_can( 'manage_categories' ) ) {
				$output = '<a href="edit-tags.php?taxonomy=' . $taxonomy->name . '&post_type=' . $associated_post_type[0] . '">' . $num . ' ' . $text .'</a>';
			}
			echo '<li class="taxonomy-count">' . $output . ' </li>';
		}
	}
	$post_types = get_post_types( array( '_builtin' => false ), 'objects' );
	foreach ( $post_types as $post_type ) {
		if($post_type->show_in_menu==false) {
			continue;
		}
		$num_posts = wp_count_posts( $post_type->name );
		$num = number_format_i18n( $num_posts->publish );
		$text = _n( $post_type->labels->singular_name, $post_type->labels->name, $num_posts->publish );
		if ( current_user_can( 'edit_posts' ) ) {
			$output = '<a href="edit.php?post_type=' . $post_type->name . '">' . $num . ' ' . $text . '</a>';
		}
		echo '<li class="page-count ' . $post_type->name . '-count">' . $output . '</td>';
	}
}

// Add custom icons to Custom Post Types
function add_menu_icons_styles(){
	echo '<style>
	#adminmenu #menu-posts-product div.wp-menu-image:before, #dashboard_right_now .product-count a:before {
		content: "\f174";
	}
	#adminmenu #menu-posts-teacher div.wp-menu-image:before, #dashboard_right_now .teacher-count a:before {
		content: "\f110";
	}
	#adminmenu #menu-posts-location div.wp-menu-image:before, #dashboard_right_now .location-count a:before {
		content: "\f231";
	}
	#adminmenu #menu-posts-testimonial div.wp-menu-image:before, #dashboard_right_now .testimonial-count a:before {
		content: "\f484";
	}
	#adminmenu #menu-posts-carousel div.wp-menu-image:before, #dashboard_right_now .carousel-count a:before {
		content: "\f233";
	}
	</style>';
}
add_action( 'admin_head', 'add_menu_icons_styles' );

// Add Custom Post Type Archive to menus
function wpclean_add_metabox_menu_posttype_archive() {
	add_meta_box('wpclean-metabox-nav-menu-posttype', 'Custom Post Type Archives', 'wpclean_metabox_menu_posttype_archive', 'nav-menus', 'side', 'default');
}
function wpclean_metabox_menu_posttype_archive() {
	$post_types = get_post_types(array('show_in_nav_menus' => true, 'has_archive' => true), 'object');
	if ($post_types) :
		$items = array();
		$loop_index = 999999;
		foreach ($post_types as $post_type) {
			$item = new stdClass();
			$loop_index++;
			$item->object_id = $loop_index;
			$item->db_id = 0;
			$item->object = 'post_type_' . $post_type->query_var;
			$item->menu_item_parent = 0;
			$item->type = 'custom';
			$item->title = $post_type->labels->name;
			$item->url = get_post_type_archive_link($post_type->query_var);
			$item->target = '';
			$item->attr_title = '';
			$item->classes = array();
			$item->xfn = '';
			$items[] = $item;
		}
		$walker = new Walker_Nav_Menu_Checklist(array());
		echo '<div id="posttype-archive" class="posttypediv">';
		echo '<div id="tabs-panel-posttype-archive" class="tabs-panel tabs-panel-active">';
		echo '<ul id="posttype-archive-checklist" class="categorychecklist form-no-clear">';
		echo walk_nav_menu_tree(array_map('wp_setup_nav_menu_item', $items), 0, (object) array('walker' => $walker));
		echo '</ul>';
		echo '</div>';
		echo '</div>';
		echo '<p class="button-controls">';
		echo '<span class="add-to-menu">';
		echo '<input type="submit"' . disabled(1, 0) . ' class="button-secondary submit-add-to-menu right" value="' . __('Add to Menu', 'stop_ivory') . '" name="add-posttype-archive-menu-item" id="submit-posttype-archive" />';
		echo '<span class="spinner"></span>';
		echo '</span>';
		echo '</p>';
	endif;
}
add_action('admin_head-nav-menus.php', 'wpclean_add_metabox_menu_posttype_archive');
