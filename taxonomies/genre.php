<?php

function genre_init() {
	register_taxonomy( 'genre', array( 'film' ), array(
		'hierarchical'      => false,
		'public'            => true,
		'show_in_nav_menus' => true,
		'show_ui'           => true,
		'show_admin_column' => false,
		'query_var'         => true,
		'rewrite'           => true,
		'capabilities'      => array(
			'manage_terms'  => 'edit_posts',
			'edit_terms'    => 'edit_posts',
			'delete_terms'  => 'edit_posts',
			'assign_terms'  => 'edit_posts'
		),
		'labels'            => array(
			'name'                       => __( 'Genres', 'structure' ),
			'singular_name'              => _x( 'Genre', 'taxonomy general name', 'structure' ),
			'search_items'               => __( 'Search Genres', 'structure' ),
			'popular_items'              => __( 'Popular Genres', 'structure' ),
			'all_items'                  => __( 'All Genres', 'structure' ),
			'parent_item'                => __( 'Parent Genre', 'structure' ),
			'parent_item_colon'          => __( 'Parent Genre:', 'structure' ),
			'edit_item'                  => __( 'Edit Genre', 'structure' ),
			'update_item'                => __( 'Update Genre', 'structure' ),
			'add_new_item'               => __( 'New Genre', 'structure' ),
			'new_item_name'              => __( 'New Genre', 'structure' ),
			'separate_items_with_commas' => __( 'Genres separated by comma', 'structure' ),
			'add_or_remove_items'        => __( 'Add or remove Genres', 'structure' ),
			'choose_from_most_used'      => __( 'Choose from the most used Genres', 'structure' ),
			'not_found'                  => __( 'No Genres found.', 'structure' ),
			'menu_name'                  => __( 'Genres', 'structure' ),
		),
		'show_in_rest'      => true,
		'rest_base'         => 'genre',
		'rest_controller_class' => 'WP_REST_Terms_Controller',
	) );

}
add_action( 'init', 'genre_init' );
