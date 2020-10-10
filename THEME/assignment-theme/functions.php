<?php
/**
 * assignment-theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package assignment-theme
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'assignment_theme_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function assignment_theme_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on assignment-theme, use a find and replace
		 * to change 'assignment-theme' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'assignment-theme', get_template_directory() . '/languages' );

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

		add_theme_support( 'menus' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary Menu', 'assignment-theme' ),
				'menu-2' => esc_html__( 'Footer Menu', 'assignment-theme' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'assignment_theme_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'assignment_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function assignment_theme_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'assignment_theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'assignment_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function assignment_theme_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'assignment-theme' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'assignment-theme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'assignment_theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function assignment_theme_scripts() {

	wp_enqueue_style( 'assignment-theme-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'assignment-theme-style', 'rtl', 'replace' );

	wp_enqueue_script( 'assignment-theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	// Main js file
	wp_enqueue_script( 'main-script', get_template_directory_uri() . '/js/main.js', 'main', false, true );
	wp_localize_script( 'main-script', 'directory_name', array( 'templateUrl' => get_stylesheet_directory_uri() ) );

	// custom css
	wp_enqueue_style( 'main-style', get_template_directory_uri() . '/layout/css/main.css' );

	// bootstrap scripts
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/lib/bs-4.3.1/js/bootstrap.min.js', 'jquery', false, true );

	// bootstrap styles
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/lib/bs-4.3.1/css/bootstrap.min.css' );

	// jquery script
	wp_enqueue_script( 'jquery', get_template_directory_uri() . '/lib/jquery3.4.1/jquery.js' );

	// Media queryes
	wp_enqueue_style( 'media-query', get_template_directory_uri() . '/layout/css/media-queries.css' );
	// sidebar style
	wp_enqueue_style( 'sidebar-style', get_template_directory_uri() . '/layout/sidebar.css' );

	// dashicons support
	wp_enqueue_style('dashicons');
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );


	}
}
add_action( 'wp_enqueue_scripts', 'assignment_theme_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Custom widget 'Portfolio'
 */
require get_template_directory() . '/inc/widgets.php';

/**
 * Load Protfolio File.
 */
//include 'portfolio.php';
require get_template_directory() . '/portfolio.php';
/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
/**
 * Read More.
 */
function new_excerpt_more( $more ) {
    if ( ! is_single() ) {
        $more = sprintf( '<a class="read-more" href="%1$s">%2$s</a>',
            get_permalink( get_the_ID() ),
            __( 'Read more', 'textdomain' )
        );
    }
 
    return $more;
}
add_filter( 'excerpt_more', 'new_excerpt_more' );

add_filter( 'the_excerpt', 'do_shortcode' );
add_filter( 'widget_text', 'do_shortcode' );
 
function wpdocs_custom_excerpt_length( $length ) {
    return 35;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

/**
* Popular Post Code.
*/
function set_post_views($postID)
	{
		$count_key = 'post_view_count';
		$count = get_post_meta($postID, $count_key, true);
		if($count=='')
		{
			$count = 0;
			delete_post_meta($postID, $count_key );
			add_post_meta($postID, $count_key, '0' );
		}
		else
		{
			$count++;
			update_post_meta($postID, $count_key, $count );
		}
	}
	remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );

?>