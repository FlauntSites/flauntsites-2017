<?php
/**
 * flauntsites-2017 functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package flauntsites-2017
 */

if ( ! function_exists( 'flauntsites2017_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function flauntsites2017_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on flauntsites-2017, use a find and replace
	 * to change 'flauntsites2017' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'flauntsites2017', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'flauntsites2017' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'flauntsites2017_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'flauntsites2017_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function flauntsites2017_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'flauntsites2017_content_width', 640 );
}
add_action( 'after_setup_theme', 'flauntsites2017_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function flauntsites2017_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'flauntsites2017' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'flauntsites2017' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'flauntsites2017_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function flauntsites2017_scripts() {
	wp_enqueue_style( 'flauntsites2017-style', get_stylesheet_uri() );

	wp_enqueue_script( 'flauntsites2017-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'flauntsites2017-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_style('googleFonts','https://fonts.googleapis.com/css?family=Julius+Sans+One|Nunito+Sans:700');

}
add_action( 'wp_enqueue_scripts', 'flauntsites2017_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';






// // Flush rewrite rules for custom post types
// add_action( 'after_switch_theme', 'fscc_flush_rewrite_rules' );

// // Flush your rewrite rules
// function fscc_flush_rewrite_rules() {
// 	flush_rewrite_rules();
// }


/**
 * Sets up the SEO Q+A Post Type
 * 
 */

function fs_seo_qa_post_type() {

	register_post_type( 'seoqa',

		array( 'labels' => array(
			'name' => __( 'SEO Q+A', 'flaunt_sites_core' ), /* This is the Title of the Group */
			'singular_name' => __( 'SEO Q+A', 'flaunt_sites_core' ), /* This is the individual type */
			'all_items' => __( 'All Custom SEO Q+A', 'flaunt_sites_core' ), /* the all items menu item */
			'add_new' => __( 'Add New', 'flaunt_sites_core' ), /* The add new menu item */
			'add_new_item' => __( 'Add New SEO Q+A', 'flaunt_sites_core' ), /* Add New Display Title */
			'edit' => __( 'Edit', 'flaunt_sites_core' ), /* Edit Dialog */
			'edit_item' => __( 'Edit SEO Q+A', 'flaunt_sites_core' ), /* Edit Display Title */
			'new_item' => __( 'New SEO Q+A', 'flaunt_sites_core' ), /* New Display Title */
			'view_item' => __( 'View SEO Q+A', 'flaunt_sites_core' ), /* View Display Title */
			'search_items' => __( 'Search SEO Q+A', 'flaunt_sites_core' ), /* Search Custom Type Title */
			'not_found' =>  __( 'Nothing found in the Database.', 'flaunt_sites_core' ), /* This displays if there are no entries yet */
			'not_found_in_trash' => __( 'Nothing found in Trash', 'flaunt_sites_core' ), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'This is the example SEO Q+A', 'flaunt_sites_core' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => true,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 7, /* this is what order you want it to appear in on the left hand side menu */
			'menu_icon' => 'dashicons-format-chat', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => 'qa', 'with_front' => true ), /* you can specify its url slug */
			'has_archive' => false, /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'revisions')
		)
	);

	register_taxonomy_for_object_type( 'category', 'seoqa' );

}
add_action( 'init', 'fs_seo_qa_post_type');



/**
 * Enables placeholders in Gravity Forms
 * 
 */

add_filter( 'gform_enable_field_label_visibility_settings', '__return_true' );
