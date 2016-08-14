<?php

// format minutes in hours and minutes
function my_structure_format_minutes( $mins = 60 ) {

  $hours = floor($mins / 60);
  $minutes = ($mins % 60);
  $return = '';

  $hours_formatted = sprintf( _n( '%s hr', '%s hrs', $hours, 'structure' ), $hours );
  $mins_formatted = sprintf( _n( '%s min', '%s mins', $minutes, 'structure' ), $minutes );

  if( 0 < $hours) {
    $return .= $hours_formatted . ' ';
  }

  if( 0 < $minutes) {
    $return .= $mins_formatted;
  }

  return trim($return);

}


// Register datepicker ui for properties
function my_structure_admin_javascript(){
    global $post;
    if( $post->post_type == 'film' && is_admin() ) {
      wp_enqueue_script( 'load-datepicker', MY_PLUGIN_URL.'admin.js', array('jquery', 'jquery-ui-datepicker') );
    }
}
add_action('admin_print_scripts', 'my_structure_admin_javascript');

// Register ui styles for properties
function my_structure_admin_styles(){
    global $post;
    if($post->post_type == 'film' && is_admin()) {
      wp_enqueue_style('jquery-ui-css', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/themes/smoothness/jquery-ui.css');
    }
}
add_action('admin_print_styles', 'my_structure_admin_styles');
