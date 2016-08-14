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
