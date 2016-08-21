<?php
/* This file was generated using the wizard at 
 * https://generatewp.com/taxonomy/ 
 */

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
