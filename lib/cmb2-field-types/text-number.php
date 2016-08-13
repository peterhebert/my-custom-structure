<?php
/**
 * text_number field type.
 * https://github.com/WebDevStudios/CMB2/wiki/Adding-your-own-field-types#text_number---adds-a-text-number-input
 */

// render numbers
add_action('cmb2_render_text_number', 'sm_cmb_render_text_number', 10, 5);
function sm_cmb_render_text_number($field, $escaped_value, $object_id, $object_type, $field_type_object)
{
    echo $field_type_object->input(array('class' => 'cmb2-text-small', 'type' => 'number'));
}

// sanitize the field
add_filter('cmb2_sanitize_text_number', 'sm_cmb2_sanitize_text_number', 10, 2);
function sm_cmb2_sanitize_text_number($null, $new)
{
    $new = preg_replace('/[^0-9]/', '', $new);

    return $new;
}
