<?php

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_film-info',
		'title' => 'Film Info',
		'fields' => array (
			array (
				'key' => 'field_57b0a05b17789',
				'label' => 'Release Date',
				'name' => 'release_date',
				'type' => 'date_picker',
				'instructions' => 'Date the film was released',
				'date_format' => 'mm/dd/yy',
				'display_format' => 'mm/dd/yy',
				'first_day' => 1,
			),
			array (
				'key' => 'field_57b0a1add8f50',
				'label' => 'Duration',
				'name' => 'duration',
				'type' => 'number',
				'instructions' => 'Length of film in minutes',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'min' => '',
				'max' => '',
				'step' => '',
			),
			array (
				'key' => 'field_57b0a1663a2e4',
				'label' => 'Director',
				'name' => 'director',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'film',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}
