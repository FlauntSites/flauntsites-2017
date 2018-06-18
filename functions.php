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
 * REMOVES WP EMOJI
 */
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );




/**
 * Enqueue scripts and styles.
 */
function flauntsites2017_scripts() {
	wp_enqueue_style( 'flauntsites2017-style', get_stylesheet_uri() );

	wp_enqueue_script( 'flauntsites2017-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'flauntsites2017-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );


	//Adds Swiper Slider Styles
	wp_enqueue_style( 'swiper_styles', '//cdnjs.cloudflare.com/ajax/libs/Swiper/4.1.0/css/swiper.min.css' );
	//Adds Swiper Slider Scripts
	wp_enqueue_script( 'swiper_scripts', '//cdnjs.cloudflare.com/ajax/libs/Swiper/4.1.0/js/swiper.min.js', array(), '20180522', false );

	//Adds Greensock Support
	wp_enqueue_script( 'greensock', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.1/TweenMax.min.js', true);  

	//Adds Scrollmagik support
	wp_enqueue_script( 'scrollmagic', '//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/ScrollMagic.min.js', array('jquery'), '20180522' );
	wp_enqueue_script( 'scrollmagic_indicators', '//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/plugins/debug.addIndicators.min.js', array(), '20180522' );
	wp_enqueue_script( 'scrollmagic_gsap_support', '//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/plugins/animation.gsap.min.js', array('jquery'), '20180522' );


	wp_enqueue_script( 'flauntsites2017-header', get_template_directory_uri() . '/js/header.js', array(), '20151215', true );
	wp_enqueue_script( 'plan-fix', get_template_directory_uri() . '/js/plan-fix.js', array(), '20151215', true );
	
	if ( is_front_page() ){
		wp_enqueue_script( 'flauntsites2017-hero', get_template_directory_uri() . '/js/hero-min.js', array(), '20151215', true );
	}
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_style('googleFonts','https://fonts.googleapis.com/css?family=Julius+Sans+One|Nunito+Sans:700|Roboto:100i,300,300i,400,400i|Trirong:400,500,600,800,900');


	//Adds Font Awesome icon support
	wp_enqueue_script( 'fontAwesome', 'https://use.fontawesome.com/15483990a8.js' );

	// experimental test for SEO Q+A Rest project.
	wp_enqueue_script( 'flauntsites2017-app', get_template_directory_uri() . '/js/data.js', array(), '20151215', true );


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

/**
 * Include the Widget locations
 */
 require get_template_directory() . '/inc/widgets.php';

/**
 * Include the Competitor List function
 */
require get_template_directory() . '/inc/competitor-list.php';



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
			'has_archive' => true, /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'revisions'),
			'show_in_rest'	=> true,
			'rest_base'          	=> 'seoqa',
			'rest_controller_class' => 'WP_REST_Posts_Controller',
		)
	);

	register_taxonomy_for_object_type( 'category', 'seoqa' );

}
add_action( 'init', 'fs_seo_qa_post_type');



/**
 * Sets up the Themes Post Type
 * 
 */

 function fs_themes_post_type() {
	
		register_post_type( 'themes',
	
			array( 'labels' => array(
				'name' => __( 'Themes', 'flaunt_sites_core' ), /* This is the Title of the Group */
				'singular_name' => __( 'Theme', 'flaunt_sites_core' ), /* This is the individual type */
				'all_items' => __( 'All Custom Themes', 'flaunt_sites_core' ), /* the all items menu item */
				'add_new' => __( 'Add New', 'flaunt_sites_core' ), /* The add new menu item */
				'add_new_item' => __( 'Add New Theme', 'flaunt_sites_core' ), /* Add New Display Title */
				'edit' => __( 'Edit', 'flaunt_sites_core' ), /* Edit Dialog */
				'edit_item' => __( 'Edit Theme', 'flaunt_sites_core' ), /* Edit Display Title */
				'new_item' => __( 'New Theme', 'flaunt_sites_core' ), /* New Display Title */
				'view_item' => __( 'View Theme', 'flaunt_sites_core' ), /* View Display Title */
				'search_items' => __( 'Search Themes', 'flaunt_sites_core' ), /* Search Custom Type Title */
				'not_found' =>  __( 'Nothing found in the Database.', 'flaunt_sites_core' ), /* This displays if there are no entries yet */
				'not_found_in_trash' => __( 'Nothing found in Trash', 'flaunt_sites_core' ), /* This displays if there is nothing in the trash */
				'parent_item_colon' => ''
				), /* end of arrays */
				'description' => __( 'This is the example Theme', 'flaunt_sites_core' ), /* Custom Type Description */
				'public' => true,
				'publicly_queryable' => true,
				'exclude_from_search' => true,
				'show_ui' => true,
				'query_var' => true,
				'menu_position' => 7, /* this is what order you want it to appear in on the left hand side menu */
				'menu_icon' => 'dashicons-welcome-widgets-menus', /* the icon for the custom post type menu */
				'rewrite'	=> array( 'slug' => 'themes', 'with_front' => true ), /* you can specify its url slug */
				'has_archive' => true, /* you can rename the slug here */
				'capability_type' => 'post',
				'hierarchical' => false,
				/* the next one is important, it tells what's enabled in the post editor */
				'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'revisions'),
				'show_in_rest'	=> true,
				'rest_base'          	=> 'themes',
				'rest_controller_class' => 'WP_REST_Posts_Controller',
			)
		);
	
		register_taxonomy_for_object_type( 'category', 'themes' );
	
	}
	add_action( 'init', 'fs_themes_post_type');
	
	


/**
 * Sets up the Competitors Post Type
 * 
 */

function fs_competitor_post_type() {
	
	register_post_type( 'competitors',

		array( 'labels' => array(
			'name' => __( 'Competitors', 'flaunt_sites_core' ), /* This is the Title of the Group */
			'singular_name' => __( 'Competitor', 'flaunt_sites_core' ), /* This is the individual type */
			'all_items' => __( 'All Custom Competitors', 'flaunt_sites_core' ), /* the all items menu item */
			'add_new' => __( 'Add New', 'flaunt_sites_core' ), /* The add new menu item */
			'add_new_item' => __( 'Add New Competitor', 'flaunt_sites_core' ), /* Add New Display Title */
			'edit' => __( 'Edit', 'flaunt_sites_core' ), /* Edit Dialog */
			'edit_item' => __( 'Edit Competitor', 'flaunt_sites_core' ), /* Edit Display Title */
			'new_item' => __( 'New Competitor', 'flaunt_sites_core' ), /* New Display Title */
			'view_item' => __( 'View Competitor', 'flaunt_sites_core' ), /* View Display Title */
			'search_items' => __( 'Search Competitors', 'flaunt_sites_core' ), /* Search Custom Type Title */
			'not_found' =>  __( 'Nothing found in the Database.', 'flaunt_sites_core' ), /* This displays if there are no entries yet */
			'not_found_in_trash' => __( 'Nothing found in Trash', 'flaunt_sites_core' ), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'This is the example Competitor', 'flaunt_sites_core' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => true,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 7, /* this is what order you want it to appear in on the left hand side menu */
			'menu_icon' => 'dashicons-welcome-view-site', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => 'competitors', 'with_front' => true ), /* you can specify its url slug */
			'has_archive' => false, /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'author', 'thumbnail', 'revisions'),
			'show_in_rest'	=> true,
			'rest_base'          	=> 'competitors',
			'rest_controller_class' => 'WP_REST_Posts_Controller',
		)
	);


}
add_action( 'init', 'fs_competitor_post_type');




// Register Custom Post Type
function fs_tutorials_post_type() {

	$labels = array(
		'name'                  => _x( 'Tutorials', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Tutorial', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Tutorials', 'text_domain' ),
		'name_admin_bar'        => __( 'Tutorial', 'text_domain' ),
		'archives'              => __( 'Tutorial Archives', 'text_domain' ),
		'attributes'            => __( 'Tutorial Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Tutorial:', 'text_domain' ),
		'all_items'             => __( 'All Tutorials', 'text_domain' ),
		'add_new_item'          => __( 'Add New Tutorial', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Tutorial', 'text_domain' ),
		'edit_item'             => __( 'Edit Tutorial', 'text_domain' ),
		'update_item'           => __( 'Update Tutorial', 'text_domain' ),
		'view_item'             => __( 'View Tutorial', 'text_domain' ),
		'view_items'            => __( 'View Tutorials', 'text_domain' ),
		'search_items'          => __( 'Search Tutorial', 'text_domain' ),
		'not_found'             => __( 'Nothing here yet. How about adding some content?', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into Tutorial', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Tutorial', 'text_domain' ),
		'items_list'            => __( 'Tutorials list', 'text_domain' ),
		'items_list_navigation' => __( 'Tutorials list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter Tutorials list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Tutorial', 'text_domain' ),
		'description'           => __( 'Tutorials on Flaunt Sites', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( ),
		'taxonomies'            => array( 'lessons' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 10,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'show_in_rest'			=> true,
		'rest_base'          	=> 'tutorial',
  		'rest_controller_class' => 'WP_REST_Posts_Controller',

	);
	register_post_type( 'tutorials', $args );

}

add_action( 'init', 'fs_tutorials_post_type', 0 );


/**
 * Forces the Tutorial plugin to be Private by default.
 * 
 */

register_taxonomy( 'lessons', 
		array('tutorials'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
		array('hierarchical' => true,     /* if this is true, it acts like categories */
			'labels' => array(
				'name' => __( 'Lessons', 'bonestheme' ), /* name of the custom taxonomy */
				'singular_name' => __( 'Lesson', 'bonestheme' ), /* single taxonomy name */
				'search_items' =>  __( 'Search Lessons', 'bonestheme' ), /* search title for taxomony */
				'all_items' => __( 'All Lessons', 'bonestheme' ), /* all title for taxonomies */
				'parent_item' => __( 'Parent Lesson', 'bonestheme' ), /* parent title for taxonomy */
				'parent_item_colon' => __( 'Parent Lesson:', 'bonestheme' ), /* parent taxonomy title */
				'edit_item' => __( 'Edit Lesson', 'bonestheme' ), /* edit custom taxonomy title */
				'update_item' => __( 'Update Lesson', 'bonestheme' ), /* update title for taxonomy */
				'add_new_item' => __( 'Add New Lesson', 'bonestheme' ), /* add new title for taxonomy */
				'new_item_name' => __( 'New Lesson Name', 'bonestheme' ) /* name title for taxonomy */
			),
			'show_admin_column' => true, 
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'lessons' ),
		)
	);








/**
 * Removes "Private" from private posts.
 * 
 */

function fs_the_title_trim($title) {

	$title = esc_attr($title);

	$findthese = array(
		'#Private:#'
	);

	$replacewith = array(
		'' // What to replace "Private:" with
	);

	$title = preg_replace($findthese, $replacewith, $title);
	return $title;
}

add_filter('the_title', 'fs_the_title_trim');




/**
 * Enables placeholders in Gravity Forms
 * 
 */

add_filter( 'gform_enable_field_label_visibility_settings', '__return_true' );





/**
 * Adds and Styles Prev and Next buttons at end of posts.
 * 
 */


function posts_link_attributes_1() {
    return 'class="prev-post-link"';
}
add_filter('previous_posts_link_attributes', 'posts_link_attributes_1');



function posts_link_attributes_2() {
    return 'class="next-post-link"';
}
add_filter('next_posts_link_attributes', 'posts_link_attributes_2');





function fs_next_post_links(){ ?>

	<nav class="navigation posts-navigation" role="navigation">

		<div class="nav-links">

			<div class="prev-post">
				<i class="fa fa-chevron-circle-left" aria-hidden="true"></i><?php previous_post_link( '%link' ); ?>  
			</div>

			<div class="next-post">
				<?php next_post_link( '%link' ); ?><i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
			</div>

		</div>

	</nav>

<?php }






/**
 * Tutorial custom fields
 * 
 */


if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array (
	'key' => 'group_590d7ae211558',
	'title' => 'Tutorials',
	'fields' => array (
		array (
			'key' => 'field_590d7af223392',
			'label' => 'Video URL',
			'name' => 'fs_video_url',
			'type' => 'oembed',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'width' => '',
			'height' => '',
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'tutorials',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => array (
		0 => 'excerpt',
		1 => 'custom_fields',
		2 => 'discussion',
		3 => 'comments',
		4 => 'slug',
		5 => 'author',
		6 => 'format',
		7 => 'page_attributes',
		8 => 'featured_image',
		9 => 'categories',
		10 => 'tags',
		11 => 'send-trackbacks',
	),
	'active' => 1,
	'description' => '',
));

endif;



function fsc_res_bg_img( $image ){
	
	/**
	* Let plugins pre-filter the image meta to be able to fix inconsistencies in the stored data.
	*
	* @param string 		$image    			The ACF field name (i.e. 'your_photo_name').
	* @param string  		$size    				Thumbnail size (i.e. 'Thumbnail', 'Medium', 'Large')
	*/

	$image = get_field( $image );
	$size = $size;
	$thumb = $image['sizes'][ $size ];
		
	echo wp_get_attachment_image( $image['ID'], $size, false, array( 'alt' => $image['alt'] ) );  

}
