<?php

add_action('cmb2_init', 'my_structure_films_metabox');
function my_structure_films_metabox()
{
  $prefix = '_cmb2_';

  $films = new_cmb2_box(array(
  'id'           => $prefix . 'films',
  'title'        => __('Film Info', 'structure'),
  'object_types' => array('film'),
  'context'      => 'normal',
  'priority'     => 'default',
  ));

  $films->add_field(array(
  'name'    => __('Release Date', 'structure'),
  'id'      => $prefix . 'release_date',
  'type'    => 'text_date',
  'desc'    => __('Date the film was released', 'structure'),
  ));

  $films->add_field( array(
    'name'    => __('Duration', 'structure'),
    'id'      => $prefix . 'duration',
    'type' => 'text_number',
    'desc'    => __('Length of film in minutes', 'structure'),
  ) );

  // director
  $films->add_field(array(
    'name'       => __('Director', 'structure'),
    'id'         => $prefix . 'director',
    'type'       => 'text',
    'repeatable' => false,
  ));

}
