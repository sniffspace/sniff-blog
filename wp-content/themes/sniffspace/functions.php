<?php
/**
 * sniffspace functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package sniffspace
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function sniffspace_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on sniffspace, use a find and replace
		* to change 'sniffspace' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'sniffspace', get_template_directory() . '/languages' );

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
			'menu-1'                    => esc_html__( 'Primary', 'sniffspace' ),
			'header-menu'               => esc_html__( 'Header Menu', 'sniffspace' ),
			'mobile-side-menu'          => esc_html__( 'Mobile Side Menu', 'sniffspace' ),
			'footer-sniffspace-menu'    => esc_html__( 'Footer Sniffspace Menu', 'sniffspace' ),
			'footer-guest-menu'         => esc_html__( 'Footer Guest Menu', 'sniffspace' ),
			'footer-host-menu'          => esc_html__( 'Footer Host Menu', 'sniffspace' ),
			'footer-support-menu'       => esc_html__( 'Footer Support Menu', 'sniffspace' ),
			'footer-popular-locations-menu' => esc_html__( 'Footer Popular Locations Menu', 'sniffspace' ),
			'footer-legal-menu'         => esc_html__( 'Footer Legal Menu', 'sniffspace' ),
			'footer-social-menu'        => esc_html__( 'Footer Social Menu', 'sniffspace' ),
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
			'sniffspace_custom_background_args',
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
add_action( 'after_setup_theme', 'sniffspace_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function sniffspace_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'sniffspace_content_width', 640 );
}
add_action( 'after_setup_theme', 'sniffspace_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function sniffspace_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'sniffspace' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'sniffspace' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'sniffspace_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function sniffspace_scripts() {
	wp_enqueue_style( 'sniffspace-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'sniffspace-style', 'rtl', 'replace' );

	wp_enqueue_style(
		'sniffspace-header-footer',
		get_template_directory_uri() . '/assets/css/sniffspace-header-footer.css',
		array( 'sniffspace-style' ),
		_S_VERSION
	);

	wp_enqueue_style(
		'sniffspace-blog',
		get_template_directory_uri() . '/assets/css/sniffspace-blog.css',
		array( 'sniffspace-header-footer' ),
		_S_VERSION
	);

	wp_enqueue_script( 'sniffspace-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'sniffspace-header', get_template_directory_uri() . '/assets/js/sniffspace-header.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'sniffspace-blog', get_template_directory_uri() . '/assets/js/sniffspace-blog.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'sniffspace_scripts' );

/**
 * Add helpful browser tooltips to menu links when editors have not supplied one.
 *
 * @param array    $atts Menu link attributes.
 * @param WP_Post  $item Menu item.
 * @param stdClass $args Menu arguments.
 * @return array
 */
function sniffspace_nav_menu_link_attributes( $atts, $item, $args ) {
	if ( empty( $atts['title'] ) && ! empty( $item->title ) ) {
		$atts['title'] = $item->title;
	}

	return $atts;
}
add_filter( 'nav_menu_link_attributes', 'sniffspace_nav_menu_link_attributes', 10, 3 );

/**
 * Get assigned menu items for a location without falling back to another menu.
 *
 * @param string $location Theme menu location.
 * @return array<int, WP_Post>
 */
function sniffspace_get_menu_items_by_location( $location ) {
	$locations = get_nav_menu_locations();

	if ( empty( $locations[ $location ] ) ) {
		return array();
	}

	$items = wp_get_nav_menu_items( $locations[ $location ] );

	return is_array( $items ) ? $items : array();
}

/**
 * Render the site logo from Customizer, with the bundled Sniffspace logo fallback.
 *
 * @param string $class Image class.
 * @param int    $width Fallback/display width.
 * @param int    $height Fallback/display height.
 * @return string
 */
function sniffspace_get_site_logo_image( $class = '', $width = 92, $height = 52 ) {
	$custom_logo_id = get_theme_mod( 'custom_logo' );
	$alt_text       = get_bloginfo( 'name' ) ? get_bloginfo( 'name' ) : __( 'Sniffspace', 'sniffspace' );

	if ( $custom_logo_id ) {
		return wp_get_attachment_image(
			$custom_logo_id,
			'full',
			false,
			array(
				'class' => $class,
				'alt'   => $alt_text,
				'title' => $alt_text,
			)
		);
	}

	return sprintf(
		'<img class="%1$s" src="%2$s" width="%3$d" height="%4$d" alt="%5$s" title="%5$s">',
		esc_attr( $class ),
		esc_url( get_template_directory_uri() . '/assets/images/main-logo.png' ),
		(int) $width,
		(int) $height,
		esc_attr( $alt_text )
	);
}

/**
 * Main React website home URL used by brand/logo links.
 *
 * @return string
 */
function sniffspace_get_main_website_home_url() {
	return apply_filters( 'sniffspace_main_website_home_url', 'https://react.sniffspace.com.au/' );
}

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
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

function sniffspace_allow_svg_uploads($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'sniffspace_allow_svg_uploads');