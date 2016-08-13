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
  'default' => 'now',
  'desc'    => __('select the date the film was released', 'structure'),
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

  $credits = new_cmb2_box(array(
  'id'           => $prefix . 'credits',
  'title'        => __('Credits', 'phs'),
  'object_types' => array('film'),
  'context'      => 'normal',
  'priority'     => 'default',
  ));

  // cast
  $cast = $credits->add_field(array(
  'id'              => $prefix . 'credits_cast',
  'type'            => 'group',
  'description'     => __('Cast', 'structure'),
  'options'         => array(
    'group_title'   => __('Cast member {#}', 'structure'), // since version 1.1.4, {#} gets replaced by row number
    'add_button'    => __('Add Cast Credit', 'structure'),
    'remove_button' => __('Remove Cast Credit', 'structure'),
    'sortable'      => true, // beta
    ),
  ));

$credits->add_group_field($cast, array(
  'id'   => $prefix . 'credits_cast_name',
  'name' => 'Actor Name',
  'type' => 'text',
));

$credits->add_group_field($cast, array(
  'id'   => $prefix . 'credits_cast_character',
  'name' => 'Character Name',
  'type' => 'text',
));


}
