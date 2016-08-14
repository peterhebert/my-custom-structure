<?php
// Crew Position Taxonomy
function my_structure_crew_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Crew Positions', 'Taxonomy General Name', 'structure' ),
		'singular_name'              => _x( 'Position', 'Taxonomy Singular Name', 'structure' ),
		'menu_name'                  => __( 'Crew Positions', 'structure' ),
		'all_items'                  => __( 'All Positions', 'structure' ),
		'parent_item'                => __( 'Parent Position', 'structure' ),
		'parent_item_colon'          => __( 'Parent Position:', 'structure' ),
		'new_item_name'              => __( 'New Position Name', 'structure' ),
		'add_new_item'               => __( 'Add New Position', 'structure' ),
		'edit_item'                  => __( 'Edit Position', 'structure' ),
		'update_item'                => __( 'Update Position', 'structure' ),
		'view_item'                  => __( 'View Position', 'structure' ),
		'separate_items_with_commas' => __( 'Separate Positions with commas', 'structure' ),
		'add_or_remove_items'        => __( 'Add or Remove Positions', 'structure' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'structure' ),
		'popular_items'              => __( 'Popular Positions', 'structure' ),
		'search_items'               => __( 'Search Positions', 'structure' ),
		'not_found'                  => __( 'Not Found', 'structure' ),
		'no_terms'                   => __( 'No items', 'structure' ),
		'items_list'                 => __( 'Positions list', 'structure' ),
		'items_list_navigation'      => __( 'Positions list navigation', 'structure' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => false,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => false,
	);
	register_taxonomy( 'position', array(), $args );

}
add_action( 'init', 'my_structure_crew_taxonomy', 0 );

// Register Custom Taxonomy
function my_structure_film_video_format_taxonomy() {

	$labels = array(
		'name'                         => _x( 'Film/Video Formats', 'Taxonomy General Name', 'structure' ),
		'singular_name'                => _x( 'Format', 'Taxonomy Singular Name', 'structure' ),
		'menu_name'                    => __( 'Formats', 'structure' ),
		'all_formats'                  => __( 'All Formats', 'structure' ),
		'parent_item'                  => __( 'Parent Format', 'structure' ),
		'parent_item_colon'            => __( 'Parent Format:', 'structure' ),
		'new_item_name'                => __( 'New Format Name', 'structure' ),
		'add_new_item'                 => __( 'Add New Format', 'structure' ),
		'edit_item'                    => __( 'Edit Format', 'structure' ),
		'update_item'                  => __( 'Update Format', 'structure' ),
		'view_item'                    => __( 'View Format', 'structure' ),
		'separate_formats_with_commas' => __( 'Separate formats with commas', 'structure' ),
		'add_or_remove_formats'        => __( 'Add or remove formats', 'structure' ),
		'choose_from_most_used'        => __( 'Choose from the most used', 'structure' ),
		'popular_formats'              => __( 'Popular Formats', 'structure' ),
		'search_formats'               => __( 'Search Formats', 'structure' ),
		'not_found'                    => __( 'Not Found', 'structure' ),
		'no_terms'                     => __( 'No formats', 'structure' ),
		'formats_list'                 => __( 'Formats list', 'structure' ),
		'formats_list_navigation'      => __( 'Formats list navigation', 'structure' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'film-video-format', array( 'film' ), $args );

}
add_action( 'init', 'my_structure_film_video_format_taxonomy', 0 );

// Genre Taxonomy
function my_structure_film_genre_taxonomy()
{
    $labels = array(
      'name'                       => _x('Genres', 'Taxonomy General Name', 'structure'),
      'singular_name'              => _x('Genre', 'Taxonomy Singular Name', 'structure'),
      'menu_name'                  => __('Genres', 'structure'),
      'all_items'                  => __('All Genres', 'structure'),
      'parent_item'                => __('Parent Genre', 'structure'),
      'parent_item_colon'          => __('Parent Genre:', 'structure'),
      'new_item_name'              => __('New Genre Name', 'structure'),
      'add_new_item'               => __('Add New Genre', 'structure'),
      'edit_item'                  => __('Edit Genre', 'structure'),
      'update_item'                => __('Update Genre', 'structure'),
      'view_item'                  => __('View Genre', 'structure'),
      'separate_items_with_commas' => __('Separate genres with commas', 'structure'),
      'add_or_remove_items'        => __('Add or remove genres', 'structure'),
      'choose_from_most_used'      => __('Choose from the most used', 'structure'),
      'popular_items'              => __('Popular Genres', 'structure'),
      'search_items'               => __('Search Genres', 'structure'),
      'not_found'                  => __('Not Found', 'structure'),
      'items_list'                 => __('Genres list', 'structure'),
      'items_list_navigation'      => __('Genres list navigation', 'structure'),
    );
    $args = array(
        'labels'            => $labels,
				'hierarchical'      => false,
				'public'            => true,
				'show_ui'           => true,
				'show_admin_column' => true,
				'show_in_nav_menus' => true,
				'show_tagcloud'     => true,
    );
    register_taxonomy( 'genre', array( 'film' ), $args );
}
add_action('init', 'my_structure_film_genre_taxonomy', 0);
