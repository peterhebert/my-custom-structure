<?php
/*
Plugin Name: My Custom Structure
Version: 0.0.1
Description: Provides the content architecture for my site
Author: Peter Hebert
Author URI: https://rexrana.ca
Text Domain: structure
*/

define('MY_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

// miscellaneous custom functions
include_once('inc/misc.php');

// Custom Post Types
include_once('inc/post-types.php');
include_once('inc/taxonomy.php');

// field setup using WordPress core
include_once('inc/wp-fields.php');

/* METABOXES USING ACF
* note - only use one of ACF or CMB2 - not both
*/

// hide ACF from WordPress admin dashboard
// define( 'ACF_LITE', true );

// Advanced Custom Fields as library
// if (file_exists( dirname(__FILE__).'/lib/advanced-custom-fields/acf.php' )) {
//   include_once('lib/advanced-custom-fields/acf.php');
// }
// ACF field definitions
// include_once('inc/acf-fields.php');

/* METABOXES USING CMB2
* note - only use one of ACF or CMB2 - not both
*/
// if (file_exists( dirname(__FILE__).'/lib/cmb2/init.php' )) {
    // include_once('lib/cmb2/init.php');
// }
// include_once('lib/cmb2-field-types/text-number.php');

// CMB2 metaboxes and field definitions
// include_once('inc/cmb2-metaboxes.php');
