<?php
/**
 * Jay – Developer Portfolio: theme setup en assets.
 *
 * @package jay-portfolio
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Directe toegang blokkeren.
}

/**
 * Theme-ondersteuning registreren.
 */
function jayportfolio_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'custom-logo' );
	add_theme_support(
		'html5',
		array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' )
	);

	register_nav_menus(
		array(
			'primary' => __( 'Hoofdmenu', 'jay-portfolio' ),
		)
	);
}
add_action( 'after_setup_theme', 'jayportfolio_setup' );

/**
 * Stylesheets en lettertypes inladen.
 */
function jayportfolio_assets() {
	// Google Fonts.
	wp_enqueue_style(
		'jayportfolio-fonts',
		'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Space+Grotesk:wght@500;600;700&display=swap',
		array(),
		null
	);

	// Gecompileerde SASS.
	$main_css = get_theme_file_path( 'assets/css/main.css' );
	$version  = file_exists( $main_css ) ? filemtime( $main_css ) : '1.0.0';

	wp_enqueue_style(
		'jayportfolio-main',
		get_theme_file_uri( 'assets/css/main.css' ),
		array( 'jayportfolio-fonts' ),
		$version
	);

	// Front-end script (in de footer geladen).
	$main_js    = get_theme_file_path( 'assets/js/main.js' );
	$js_version = file_exists( $main_js ) ? filemtime( $main_js ) : '1.0.0';

	wp_enqueue_script(
		'jayportfolio-main',
		get_theme_file_uri( 'assets/js/main.js' ),
		array(),
		$js_version,
		true
	);
}
add_action( 'wp_enqueue_scripts', 'jayportfolio_assets' );
