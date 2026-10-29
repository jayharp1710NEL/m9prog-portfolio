<?php
/**
 * Custom Post Type "project" en taxonomie "technologie" (les 8).
 *
 * @package jay-portfolio
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Registreert het Custom Post Type "project".
 */
function jayportfolio_register_project_cpt() {
	$labels = array(
		'name'               => __( 'Projecten', 'jay-portfolio' ),
		'singular_name'      => __( 'Project', 'jay-portfolio' ),
		'menu_name'          => __( 'Projecten', 'jay-portfolio' ),
		'add_new'            => __( 'Nieuw project', 'jay-portfolio' ),
		'add_new_item'       => __( 'Nieuw project toevoegen', 'jay-portfolio' ),
		'edit_item'          => __( 'Project bewerken', 'jay-portfolio' ),
		'new_item'           => __( 'Nieuw project', 'jay-portfolio' ),
		'view_item'          => __( 'Project bekijken', 'jay-portfolio' ),
		'view_items'         => __( 'Projecten bekijken', 'jay-portfolio' ),
		'search_items'       => __( 'Projecten zoeken', 'jay-portfolio' ),
		'not_found'          => __( 'Geen projecten gevonden', 'jay-portfolio' ),
		'not_found_in_trash' => __( 'Geen projecten in de prullenbak', 'jay-portfolio' ),
		'all_items'          => __( 'Alle projecten', 'jay-portfolio' ),
		'archives'           => __( 'Projectarchief', 'jay-portfolio' ),
	);

	register_post_type(
		'project',
		array(
			'labels'        => $labels,
			'public'        => true,
			'has_archive'   => true,              // Zorgt voor archive-project.php.
			'show_in_rest'  => true,              // REST-ondersteuning (blok-editor + API).
			'menu_icon'     => 'dashicons-portfolio',
			'menu_position' => 5,
			'supports'      => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
			'rewrite'       => array( 'slug' => 'projecten' ),
		)
	);
}
add_action( 'init', 'jayportfolio_register_project_cpt' );

/**
 * Registreert de taxonomie "technologie" (gebruikte technieken) voor projecten.
 */
function jayportfolio_register_technologie_taxonomy() {
	$labels = array(
		'name'          => __( 'Technologieën', 'jay-portfolio' ),
		'singular_name' => __( 'Technologie', 'jay-portfolio' ),
		'menu_name'     => __( 'Technologieën', 'jay-portfolio' ),
		'all_items'     => __( 'Alle technologieën', 'jay-portfolio' ),
		'edit_item'     => __( 'Technologie bewerken', 'jay-portfolio' ),
		'add_new_item'  => __( 'Nieuwe technologie toevoegen', 'jay-portfolio' ),
		'search_items'  => __( 'Technologieën zoeken', 'jay-portfolio' ),
	);

	register_taxonomy(
		'technologie',
		'project',
		array(
			'labels'       => $labels,
			'public'       => true,
			'hierarchical' => false,              // Tag-achtig (bv. PHP, JavaScript, Docker).
			'show_in_rest' => true,
			'rewrite'      => array( 'slug' => 'technologie' ),
		)
	);
}
add_action( 'init', 'jayportfolio_register_technologie_taxonomy' );

/**
 * Permalinks verversen bij het activeren van het theme, zodat de
 * project-archief- en detailpagina's meteen werken.
 */
function jayportfolio_rewrite_flush() {
	jayportfolio_register_project_cpt();
	jayportfolio_register_technologie_taxonomy();
	flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'jayportfolio_rewrite_flush' );
