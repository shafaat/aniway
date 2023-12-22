<?php
/**
 * Aniway functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Aniway
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.1.2' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function aniway_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Aniway, use a find and replace
		* to change 'aniway' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'aniway', get_template_directory() . '/languages' );

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
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'aniway' ),
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
			'aniway_custom_background_args',
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
add_action( 'after_setup_theme', 'aniway_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function aniway_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'aniway_content_width', 640 );
}
add_action( 'after_setup_theme', 'aniway_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function aniway_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Sidebar 1', 'aniway' ),
			'id'            => 'footer-sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'aniway' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '<a href="#" class="opener"><strong class="title">',
			'after_title'   => '</strong></a>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Sidebar 2', 'aniway' ),
			'id'            => 'footer-sidebar-2',
			'description'   => esc_html__( 'Add widgets here.', 'aniway' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '<a href="#" class="opener"><strong class="title">',
			'after_title'   => '</strong></a>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Sidebar 3', 'aniway' ),
			'id'            => 'footer-sidebar-3',
			'description'   => esc_html__( 'Add widgets here.', 'aniway' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '<a href="#" class="opener"><strong class="title">',
			'after_title'   => '</strong></a>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Sidebar 4', 'aniway' ),
			'id'            => 'footer-sidebar-4',
			'description'   => esc_html__( 'Add widgets here.', 'aniway' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '<a href="#" class="opener"><strong class="title">',
			'after_title'   => '</strong></a>',
		)
	);
}
add_action( 'widgets_init', 'aniway_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function aniway_scripts() {
	// /wp_enqueue_style( 'aniway-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_script('jquery');
	wp_enqueue_style('swap-fonts','https://fonts.googleapis.com/css2?family=Sora:wght@700&display=swap',array());
	wp_enqueue_style( 'aniway-main', get_template_directory_uri() . '/css/main.css', array(), _S_VERSION );
	///wp_style_add_data( 'aniway-style', 'rtl', 'replace' );
	wp_enqueue_script( 'aniway-main-bs', get_template_directory_uri() . '/js/jquery.main-base.js', array(), _S_VERSION, true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'aniway_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';
require get_template_directory() . '/inc/custom-register.php';

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
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
function myplugin_custom_walker( $args ) {
    return array_merge( $args, array(
        'container_class' => 'slide',
		'menu_class'	=> 'footer-menu',
        // another setting go here ... 
    ) );
}
add_filter( 'wp_nav_menu_args', 'myplugin_custom_walker' );
function aniway_languages_list(){
    $languages = apply_filters( 'wpml_active_languages', NULL, 'skip_missing=0&orderby=code' );
	$output  = '';
    if( !empty( $languages ) ){
        $output  .= '<ul>';
        foreach( $languages as $l ){
            $output  .= '<li>';
            if(!$l['active']) $output  .= '<a href="'.$l['url'].'">'; else $output  .= '<a href="#">';
            	$output  .= $l['translated_name'];
            $output  .= '</a>';
            $output  .= '</li>';
        }
        $output  .= '</ul>';
		return $output;
    }
}
add_shortcode( 'languages_list', 'aniway_languages_list' );

function aniway_language_active(){
    $languages = apply_filters( 'wpml_active_languages', NULL, 'skip_missing=0&orderby=code' );
	$output  = '';
    if( !empty( $languages ) ){
        $output  .= '<span class="selected">';
        foreach( $languages as $l ){
            if($l['active']) $output  .= $l['translated_name'];
        }
        $output  .= '</span>';
		return $output;
    }
}
add_shortcode( 'active_language', 'aniway_language_active' );