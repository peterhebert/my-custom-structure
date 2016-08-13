<?php

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_film-info',
		'title' => 'Film Info',
		'fields' => array (
			array (
				'key' => 'field_57aa8ef31f067',
				'label' => 'Release Date',
				'name' => 'release_date',
				'type' => 'date_picker',
				'instructions' => 'The date the film was released.',
				'date_format' => 'yymmdd',
				'display_format' => 'RFC_1123',
				'first_day' => 1,
			),
			array (
				'key' => 'field_57af5937bc0c7',
				'label' => 'Director',
				'name' => 'director',
				'type' => 'text',
				'instructions' => 'director\'s name',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
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
