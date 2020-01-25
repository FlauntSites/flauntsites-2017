<?php
/**
 * Flauntsites-2017 functions and definitions
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
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

/**
 * Enqueue scripts and styles.
 */
function flauntsites2017_scripts() {
	wp_enqueue_style( 'flauntsites2017-style', get_stylesheet_uri(), array(), '20190514' );
	wp_enqueue_script( 'flauntsites2017-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'flauntsites2017-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	// Adds Swiper Slider Styles.
	wp_enqueue_style( 'swiper_styles', '//cdnjs.cloudflare.com/ajax/libs/Swiper/4.1.0/css/swiper.min.css', array(), '20190514' );
	// Adds Swiper Slider Scripts.
	wp_enqueue_script( 'swiper_scripts', '//cdnjs.cloudflare.com/ajax/libs/Swiper/4.1.0/js/swiper.min.js', array(), '20180522', false );

	// Adds Scrollmagik Support.
	wp_enqueue_script( 'scrollmagic', '//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/ScrollMagic.min.js', array(), '20190523', false );
	wp_enqueue_script( 'scrollmagic_gsap_support', '//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/plugins/animation.gsap.min.js', array(), '20180711', true );

	// Adds Greensock Support.
	wp_enqueue_script( 'greensock_drawSVG', get_template_directory_uri() . '/js/DrawSVGPlugin.min.js', array(), '20180522', true );
	wp_enqueue_script( 'greensock', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.1/TweenMax.min.js', array(), '20180522', true );

	wp_enqueue_script( 'flauntsites2017-header', get_template_directory_uri() . '/js/header.js', array(), '20190522', true );

	if ( is_page( 'pricing' ) ) {
		wp_enqueue_script( 'plan-fix', get_template_directory_uri() . '/js/plan-fix.js', array(), '20151215', true );
	}

	if ( is_front_page() ) {
		wp_enqueue_script( 'flauntsites2017-home', get_template_directory_uri() . '/js/home-min.js', array(), '20180618', true );
	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( 'themes' === get_post_type() ) {
		wp_enqueue_script( 'flauntsites2017-themes', get_template_directory_uri() . '/js/single-themes.js', array(), '20180618', true );
	}

	wp_enqueue_style( 'googleFonts', 'https://fonts.googleapis.com/css?family=Julius+Sans+One|Nunito+Sans:700|Roboto:100i,300,300i,400,400i|Trirong:400,500,600,800,900' );
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




// Register Custom Post Type
function custom_post_types() {

	// SEO Q&A.
	$labels = array(
		'name'                  => _x( 'SEO Q+A', 'Post Type General Name', 'flauntsites2017' ),
		'singular_name'         => _x( 'SEO Q+A', 'Post Type Singular Name', 'flauntsites2017' ),
		'menu_name'             => __( 'SEO Q+A', 'flauntsites2017' ),
		'name_admin_bar'        => __( 'SEO Q+A', 'flauntsites2017' ),
		'archives'              => __( 'SEO Q+A Archives', 'flauntsites2017' ),
		'attributes'            => __( 'SEO Q+A Attributes', 'flauntsites2017' ),
		'parent_item_colon'     => __( 'Parent SEO Q+A:', 'flauntsites2017' ),
		'all_items'             => __( 'All SEO Q+A', 'flauntsites2017' ),
		'add_new_item'          => __( 'Add New SEO Q+A', 'flauntsites2017' ),
		'add_new'               => __( 'Add New', 'flauntsites2017' ),
		'new_item'              => __( 'New SEO Q+A', 'flauntsites2017' ),
		'edit_item'             => __( 'Edit SEO Q+A', 'flauntsites2017' ),
		'update_item'           => __( 'Update SEO Q+A', 'flauntsites2017' ),
		'view_item'             => __( 'View SEO Q+A', 'flauntsites2017' ),
		'view_items'            => __( 'View SEO Q+A', 'flauntsites2017' ),
		'search_items'          => __( 'Search SEO Q+A', 'flauntsites2017' ),
		'not_found'             => __( 'Not found', 'flauntsites2017' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'flauntsites2017' ),
		'featured_image'        => __( 'Featured Image', 'flauntsites2017' ),
		'set_featured_image'    => __( 'Set featured image', 'flauntsites2017' ),
		'remove_featured_image' => __( 'Remove featured image', 'flauntsites2017' ),
		'use_featured_image'    => __( 'Use as featured image', 'flauntsites2017' ),
		'insert_into_item'      => __( 'Insert into item', 'flauntsites2017' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'flauntsites2017' ),
		'items_list'            => __( 'Items list', 'flauntsites2017' ),
		'items_list_navigation' => __( 'Items list navigation', 'flauntsites2017' ),
		'filter_items_list'     => __( 'Filter items list', 'flauntsites2017' ),
	);
	$args = array(
		'label'                 => __( 'SEO Q+A', 'flauntsites2017' ),
		'description'           => __( 'Post Type Description', 'flauntsites2017' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions' ),
		'taxonomies'            => array( 'category' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 7,
		'menu_icon'             => 'dashicons-format-chat',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'show_in_rest'          => true,
	);
	register_post_type( 'seoqa', $args );

	// Themes.
	$labels = array(
		'name'                  => _x( 'Themes', 'Post Type General Name', 'flauntsites2017' ),
		'singular_name'         => _x( 'Theme', 'Post Type Singular Name', 'flauntsites2017' ),
		'menu_name'             => __( 'Themes', 'flauntsites2017' ),
		'name_admin_bar'        => __( 'Themes', 'flauntsites2017' ),
		'archives'              => __( 'Theme Archives', 'flauntsites2017' ),
		'attributes'            => __( 'Theme Attributes', 'flauntsites2017' ),
		'parent_item_colon'     => __( 'Parent Theme:', 'flauntsites2017' ),
		'all_items'             => __( 'All Themes', 'flauntsites2017' ),
		'add_new_item'          => __( 'Add New Theme', 'flauntsites2017' ),
		'add_new'               => __( 'Add New', 'flauntsites2017' ),
		'new_item'              => __( 'New Theme', 'flauntsites2017' ),
		'edit_item'             => __( 'Edit Theme', 'flauntsites2017' ),
		'update_item'           => __( 'Update Theme', 'flauntsites2017' ),
		'view_item'             => __( 'View Theme', 'flauntsites2017' ),
		'view_items'            => __( 'View Themes', 'flauntsites2017' ),
		'search_items'          => __( 'Search Themes', 'flauntsites2017' ),
		'not_found'             => __( 'Not found', 'flauntsites2017' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'flauntsites2017' ),
		'featured_image'        => __( 'Featured Image', 'flauntsites2017' ),
		'set_featured_image'    => __( 'Set featured image', 'flauntsites2017' ),
		'remove_featured_image' => __( 'Remove featured image', 'flauntsites2017' ),
		'use_featured_image'    => __( 'Use as featured image', 'flauntsites2017' ),
		'insert_into_item'      => __( 'Insert into item', 'flauntsites2017' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'flauntsites2017' ),
		'items_list'            => __( 'Items list', 'flauntsites2017' ),
		'items_list_navigation' => __( 'Items list navigation', 'flauntsites2017' ),
		'filter_items_list'     => __( 'Filter items list', 'flauntsites2017' ),
	);
	$args = array(
		'label'                 => __( 'Themes', 'flauntsites2017' ),
		'description'           => __( 'Post Type Description', 'flauntsites2017' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions' ),
		'taxonomies'            => array( 'category' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 8,
		'menu_icon'             => 'dashicons-welcome-widgets-menus',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'show_in_rest'          => true,
	);
	register_post_type( 'fs-themes', $args );

	// Competitors.
	$labels = array(
		'name'                  => _x( 'Competitors', 'Post Type General Name', 'flauntsites2017' ),
		'singular_name'         => _x( 'Competitor', 'Post Type Singular Name', 'flauntsites2017' ),
		'menu_name'             => __( 'Competitors', 'flauntsites2017' ),
		'name_admin_bar'        => __( 'Competitors', 'flauntsites2017' ),
		'archives'              => __( 'Competitor Archives', 'flauntsites2017' ),
		'attributes'            => __( 'Competitor Attributes', 'flauntsites2017' ),
		'parent_item_colon'     => __( 'Parent Competitor:', 'flauntsites2017' ),
		'all_items'             => __( 'All Competitors', 'flauntsites2017' ),
		'add_new_item'          => __( 'Add New Competitor', 'flauntsites2017' ),
		'add_new'               => __( 'Add New', 'flauntsites2017' ),
		'new_item'              => __( 'New Competitor', 'flauntsites2017' ),
		'edit_item'             => __( 'Edit Competitor', 'flauntsites2017' ),
		'update_item'           => __( 'Update Competitor', 'flauntsites2017' ),
		'view_item'             => __( 'View Competitor', 'flauntsites2017' ),
		'view_items'            => __( 'View Competitors', 'flauntsites2017' ),
		'search_items'          => __( 'Search Competitors', 'flauntsites2017' ),
		'not_found'             => __( 'Not found', 'flauntsites2017' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'flauntsites2017' ),
		'featured_image'        => __( 'Featured Image', 'flauntsites2017' ),
		'set_featured_image'    => __( 'Set featured image', 'flauntsites2017' ),
		'remove_featured_image' => __( 'Remove featured image', 'flauntsites2017' ),
		'use_featured_image'    => __( 'Use as featured image', 'flauntsites2017' ),
		'insert_into_item'      => __( 'Insert into item', 'flauntsites2017' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'flauntsites2017' ),
		'items_list'            => __( 'Items list', 'flauntsites2017' ),
		'items_list_navigation' => __( 'Items list navigation', 'flauntsites2017' ),
		'filter_items_list'     => __( 'Filter items list', 'flauntsites2017' ),
	);
	$args = array(
		'label'                 => __( 'Competitor', 'flauntsites2017' ),
		'description'           => __( 'Post Type Description', 'flauntsites2017' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions' ),
		'taxonomies'            => array( 'category' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 9,
		'menu_icon'             => 'dashicons-welcome-view-site',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'show_in_rest'          => true,
	);
	register_post_type( 'competitors', $args );

	// Tutorials.
	$labels = array(
		'name'                  => _x( 'Tutorials', 'Post Type General Name', 'flauntsites2017' ),
		'singular_name'         => _x( 'Tutorial', 'Post Type Singular Name', 'flauntsites2017' ),
		'menu_name'             => __( 'Tutorials', 'flauntsites2017' ),
		'name_admin_bar'        => __( 'Tutorials', 'flauntsites2017' ),
		'archives'              => __( 'Tutorial Archives', 'flauntsites2017' ),
		'attributes'            => __( 'Tutorial Attributes', 'flauntsites2017' ),
		'parent_item_colon'     => __( 'Parent Tutorial:', 'flauntsites2017' ),
		'all_items'             => __( 'All Tutorials', 'flauntsites2017' ),
		'add_new_item'          => __( 'Add New Tutorial', 'flauntsites2017' ),
		'add_new'               => __( 'Add New', 'flauntsites2017' ),
		'new_item'              => __( 'New Tutorial', 'flauntsites2017' ),
		'edit_item'             => __( 'Edit Tutorial', 'flauntsites2017' ),
		'update_item'           => __( 'Update Tutorial', 'flauntsites2017' ),
		'view_item'             => __( 'View Tutorial', 'flauntsites2017' ),
		'view_items'            => __( 'View Tutorials', 'flauntsites2017' ),
		'search_items'          => __( 'Search Tutorials', 'flauntsites2017' ),
		'not_found'             => __( 'Not found', 'flauntsites2017' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'flauntsites2017' ),
		'featured_image'        => __( 'Featured Image', 'flauntsites2017' ),
		'set_featured_image'    => __( 'Set featured image', 'flauntsites2017' ),
		'remove_featured_image' => __( 'Remove featured image', 'flauntsites2017' ),
		'use_featured_image'    => __( 'Use as featured image', 'flauntsites2017' ),
		'insert_into_item'      => __( 'Insert into item', 'flauntsites2017' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'flauntsites2017' ),
		'items_list'            => __( 'Items list', 'flauntsites2017' ),
		'items_list_navigation' => __( 'Items list navigation', 'flauntsites2017' ),
		'filter_items_list'     => __( 'Filter items list', 'flauntsites2017' ),
	);
	$args = array(
		'label'                 => __( 'Tutorial', 'flauntsites2017' ),
		'description'           => __( 'Post Type Description', 'flauntsites2017' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions' ),
		'taxonomies'            => array( 'lessons' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 10,
		'menu_icon'             => 'dashicons-welcome-view-site',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'show_in_rest'          => true,
	);
	register_post_type( 'tutorials', $args );

	register_taxonomy( 'lessons',
		array( 'tutorials' ), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
		array(
			'hierarchical'      => true,     /* if this is true, it acts like categories */
			'labels'            => array(
				'name'              => __( 'Lessons', 'bonestheme' ), /* name of the custom taxonomy */
				'singular_name'     => __( 'Lesson', 'bonestheme' ), /* single taxonomy name */
				'search_items'      => __( 'Search Lessons', 'bonestheme' ), /* search title for taxomony */
				'all_items'         => __( 'All Lessons', 'bonestheme' ), /* all title for taxonomies */
				'parent_item'       => __( 'Parent Lesson', 'bonestheme' ), /* parent title for taxonomy */
				'parent_item_colon' => __( 'Parent Lesson:', 'bonestheme' ), /* parent taxonomy title */
				'edit_item'         => __( 'Edit Lesson', 'bonestheme' ), /* edit custom taxonomy title */
				'update_item'       => __( 'Update Lesson', 'bonestheme' ), /* update title for taxonomy */
				'add_new_item'      => __( 'Add New Lesson', 'bonestheme' ), /* add new title for taxonomy */
				'new_item_name'     => __( 'New Lesson Name', 'bonestheme' ), /* name title for taxonomy */
			),
			'show_admin_column' => true,
			'show_ui'           => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'lessons' ),
		)
	);

}
add_action( 'init', 'custom_post_types', 0 );



/**
 * Removes "Private" from private posts.
 */
function fs_the_title_trim( $title ) {
	$title = esc_attr( $title );
	$findthese = array(
		'#Private:#',
	);

	$replacewith = array(
		'', // What to replace "Private:" with.
	);

	$title = preg_replace( $findthese, $replacewith, $title );
	return $title;
}
add_filter( 'the_title', 'fs_the_title_trim' );


/**
 * Enables placeholders in Gravity Forms
 */
add_filter( 'gform_enable_field_label_visibility_settings', '__return_true' );


/**
 * Adds and Styles Prev and Next buttons at end of posts.
 */
function posts_link_attributes_1() {
	return 'class="prev-post-link"';
}
add_filter( 'previous_posts_link_attributes', 'posts_link_attributes_1' );

function posts_link_attributes_2() {
	return 'class="next-post-link"';
}
add_filter( 'next_posts_link_attributes', 'posts_link_attributes_2' );


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
 * Tutorial custom fields.
 */
if ( function_exists( 'acf_add_local_field_group' ) ) :

	acf_add_local_field_group( array(
		'key'                   => 'group_590d7ae211558',
		'title'                 => 'Tutorials',
		'fields'                => array(
			array(
				'key'               => 'field_590d7af223392',
				'label'             => 'Video URL',
				'name'              => 'fs_video_url',
				'type'              => 'oembed',
				'instructions'      => '',
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => array(
					'width' => '',
					'class' => '',
					'id'    => '',
				),
				'width'             => '',
				'height'            => '',
			),
		),
		'location'              => array(
			array(
				array(
					'param'    => 'post_type',
					'operator' => '==',
					'value'    => 'tutorials',
				),
			),
		),
		'menu_order'            => 0,
		'position'              => 'normal',
		'style'                 => 'default',
		'label_placement'       => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen'        => array(
			0  => 'excerpt',
			1  => 'custom_fields',
			2  => 'discussion',
			3  => 'comments',
			4  => 'slug',
			5  => 'author',
			6  => 'format',
			7  => 'page_attributes',
			8  => 'featured_image',
			9  => 'categories',
			10 => 'tags',
			11 => 'send-trackbacks',
		),
		'active'                => 1,
		'description'           => '',
	));

endif;


/**
 * Let plugins pre-filter the image meta to be able to fix inconsistencies in the stored data.
 *
 * @param string $image The ACF field name (i.e. 'your_photo_name').
 * @param string $size  Thumbnail size (i.e. 'Thumbnail', 'Medium', 'Large').
 */
function fsc_res_bg_img( $image ) {

	$image = get_field( $image );
	$size  = $size;
	$thumb = $image['sizes'][ $size ];

	echo wp_get_attachment_image( $image['ID'], $size, false, array( 'alt' => $image['alt'] ) );

}

/**
 * Adds a photo credit to image card on home page.
 */
function photo_credit( $name, $url ) {
	?>

	<span class="photo-credit">Photo by: <a href="<?php the_field( $url ); ?>"><?php the_field( $name ); ?></a></span>

	<?php
}
