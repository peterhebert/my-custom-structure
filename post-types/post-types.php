<?php
/* This file was generated using the wizard at
 * https://generatewp.com/post-type/
 */

// 'Film' Post Type
function my_structure_film_post_type() {

	$labels = array(
		'name'                  => _x( 'Films', 'Post Type General Name', 'structure' ),
		'singular_name'         => _x( 'Film', 'Post Type Singular Name', 'structure' ),
		'menu_name'             => __( 'Films', 'structure' ),
		'name_admin_bar'        => __( 'Film', 'structure' ),
		'archives'              => __( 'Film Archives', 'structure' ),
		'parent_item_colon'     => __( 'Parent Film:', 'structure' ),
		'all_items'             => __( 'All Films', 'structure' ),
		'add_new_item'          => __( 'Add New Film', 'structure' ),
		'add_new'               => __( 'Add New', 'structure' ),
		'new_item'              => __( 'New Film', 'structure' ),
		'edit_item'             => __( 'Edit Film', 'structure' ),
		'update_item'           => __( 'Update Film', 'structure' ),
		'view_item'             => __( 'View Film', 'structure' ),
		'search_items'          => __( 'Search Film', 'structure' ),
		'not_found'             => __( 'Not found', 'structure' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'structure' ),
		'featured_image'        => __( 'Featured Image', 'structure' ),
		'set_featured_image'    => __( 'Set featured image', 'structure' ),
		'remove_featured_image' => __( 'Remove featured image', 'structure' ),
		'use_featured_image'    => __( 'Use as featured image', 'structure' ),
		'insert_into_item'      => __( 'Insert into film', 'structure' ),
		'uploaded_to_this_item' => __( 'Uploaded to this film', 'structure' ),
		'items_list'            => __( 'Films list', 'structure' ),
		'items_list_navigation' => __( 'Films list navigation', 'structure' ),
		'filter_items_list'     => __( 'Filter films list', 'structure' ),
	);
	$args = array(
		'label'                 => __( 'Film', 'structure' ),
		'description'           => __( 'Motion pictures', 'structure' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions'),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-editor-video',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite' => array('slug' => 'film', 'with_front' => FALSE),
		'capability_type'       => 'page',
	);
	register_post_type( 'film', $args );
}
add_action( 'init', 'my_structure_film_post_type', 0 );

// add 'film' post type to home query
function add_film_post_type_to_query( $query ) {
    if ( $query->is_home() && $query->is_main_query() ) {
        $query->set( 'post_type', array('post', 'film') );
    }
}
add_action( 'pre_get_posts', 'add_film_post_type_to_query' );
