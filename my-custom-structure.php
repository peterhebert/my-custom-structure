<?php
/*
Plugin Name: My Custom Structure
Version: 0.0.1
Description: Provides the content architecture for my site
Author: Peter Hebert
Author URI: http://peterhebert.com
Text Domain: structure
*/

define('LP__PLUGIN_URL', plugin_dir_url(__FILE__));
define('LP__PLUGIN_DIR', plugin_dir_path(__FILE__));

// miscellaneous custom functions
include_once('misc.php');

// Custom Post Types
include_once('post-types.php');

/* METABOXES USING ACF
* note - only use one of ACF or CMB2 - not both
*/

// hide ACF from WordPRess admin dashboard
// define( 'ACF_LITE', true );

// Advanced Custom Fields as library
// include_once('lib/advanced-custom-fields/acf.php');

// ACF field definitions
// include_once('acf-fields.php');

/* METABOXES USING CMB2 */
if (file_exists( dirname(__FILE__).'/lib/cmb2/init.php' )) {
    include_once 'lib/cmb2/init.php';
}
include_once 'lib/cmb2-field-types/text-number.php';

include_once('cmb2-metaboxes.php');
