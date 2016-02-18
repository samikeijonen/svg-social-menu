<?php
/**
 * svg-social-menu functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package svg-social-menu
 */

if ( ! function_exists( 'svg_social_menu_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function svg_social_menu_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on svg-social-menu, use a find and replace
	 * to change 'svg-social-menu' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'svg-social-menu', get_template_directory() . '/languages' );

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
		'social' => esc_html__( 'Social Links', 'svg-social-menu' ),
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
	add_theme_support( 'custom-background', apply_filters( 'svg_social_menu_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
	
	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', svg_social_menu_fonts_url() ) );
	
}
endif;
add_action( 'after_setup_theme', 'svg_social_menu_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function svg_social_menu_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'svg_social_menu_content_width', 640 );
}
add_action( 'after_setup_theme', 'svg_social_menu_content_width', 0 );

/**
 * Register Google fonts.
 *
 * @since 1.0.0
 *
 * @return string Google fonts URL for the theme.
 */
function svg_social_menu_fonts_url() {
	
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by Lato, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== esc_attr_x( 'on', 'Lato font: on or off', 'olari' ) ) {
		$fonts[] = 'Lato:400,900italic,900,700italic,700,400italic';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}

/**
 * Enqueue scripts and styles.
 */
function svg_social_menu_scripts() {
	
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'svg-social-menu-fonts', svg_social_menu_fonts_url(), array(), null );
	
	// Add main styles. 
	wp_enqueue_style( 'svg-social-menu-style', get_stylesheet_uri() );
	
	// Add skip link.
	wp_enqueue_script( 'svg-social-menu-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	
	// Add comment reply link.
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
}
add_action( 'wp_enqueue_scripts', 'svg_social_menu_scripts' );

/**
 * Display SVG icons in social navigation.
 *
 * @since 1.0.0
 *
 * @param string  $item_output The menu item output.
 * @param WP_Post $item        Menu item object.
 * @param int     $depth       Depth of the menu.
 * @param array   $args        wp_nav_menu() arguments.
 * @return string Menu item with possible description.
 */
function svg_social_menu_icons( $item_output, $item, $depth, $args ) {
	
	// Supported social icons.
	$social_icons = apply_filters( 'svg_social_menu_supported_icons', array(
		'twitter.com'   => 'twitter',
		'facebook.com'  => 'facebook',
		'instagram.com' => 'instagram',
	) );
	
	// Change SVG icon inside social links menu if there is supported URL.
	if ( 'social' == $args->theme_location ) {
		foreach ( $social_icons as $attr => $value ) {
			if ( false !== strpos( $item_output, $attr ) ) {
				$item_output = str_replace( $args->link_after, '</span><svg class="icon icon-' . esc_attr( $value ) . '"><use xlink:href="#icon-' . esc_attr( $value ) . '"></use></svg>', $item_output );
			}
		}
	}

	return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'svg_social_menu_icons', 10, 4 );

