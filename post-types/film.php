<?php

function film_init() {
	register_post_type( 'film', array(
		'labels'            => array(
			'name'                => __( 'Films', 'structure' ),
			'singular_name'       => __( 'Film', 'structure' ),
			'all_items'           => __( 'All Films', 'structure' ),
			'new_item'            => __( 'New Film', 'structure' ),
			'add_new'             => __( 'Add New', 'structure' ),
			'add_new_item'        => __( 'Add New Film', 'structure' ),
			'edit_item'           => __( 'Edit Film', 'structure' ),
			'view_item'           => __( 'View Film', 'structure' ),
			'search_items'        => __( 'Search Films', 'structure' ),
			'not_found'           => __( 'No Films found', 'structure' ),
			'not_found_in_trash'  => __( 'No Films found in trash', 'structure' ),
			'parent_item_colon'   => __( 'Parent Film', 'structure' ),
			'menu_name'           => __( 'Films', 'structure' ),
		),
		'public'            => true,
		'hierarchical'      => false,
		'show_ui'           => true,
		'show_in_nav_menus' => true,
		'supports'          => array( 'title', 'editor' ),
		'has_archive'       => true,
		'rewrite'           => true,
		'query_var'         => true,
		'menu_icon'         => 'dashicons-dashicons-editor-video',
		'show_in_rest'      => true,
		'rest_base'         => 'film',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'film_init' );

function film_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['film'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => sprintf( __('Film updated. <a target="_blank" href="%s">View Film</a>', 'structure'), esc_url( $permalink ) ),
		2 => __('Custom field updated.', 'structure'),
		3 => __('Custom field deleted.', 'structure'),
		4 => __('Film updated.', 'structure'),
		/* translators: %s: date and time of the revision */
		5 => isset($_GET['revision']) ? sprintf( __('Film restored to revision from %s', 'structure'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __('Film published. <a href="%s">View Film</a>', 'structure'), esc_url( $permalink ) ),
		7 => __('Film saved.', 'structure'),
		8 => sprintf( __('Film submitted. <a target="_blank" href="%s">Preview Film</a>', 'structure'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		9 => sprintf( __('Film scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Film</a>', 'structure'),
		// translators: Publish box date format, see http://php.net/date
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		10 => sprintf( __('Film draft updated. <a target="_blank" href="%s">Preview Film</a>', 'structure'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'film_updated_messages' );
