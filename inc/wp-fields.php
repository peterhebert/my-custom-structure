<?php

/* Fire our meta box setup function on the post editor screen. */
add_action('load-post.php', 'my_post_meta_boxes_setup');
add_action('load-post-new.php', 'my_post_meta_boxes_setup');

/* Meta box setup function. */
function my_post_meta_boxes_setup()
{

  /* Add meta boxes on the 'add_meta_boxes' hook. */
  add_action('add_meta_boxes', 'my_add_post_meta_boxes');

  /* Save post meta on the 'save_post' hook. */
  add_action('save_post', 'my_save_post_class_meta', 10, 2);
}

/* Create one or more meta boxes to be displayed on the post editor screen. */
function my_add_post_meta_boxes()
{
    add_meta_box(
    'film-info',      // Unique ID
    esc_html__('Film Info', 'structure'),    // Title
    'film_info_meta_box',   // Callback function
    'film',         // Admin page (or post type)
    'normal',         // Context
    'default'         // Priority
  );
}

/* Display the post meta box. */
function film_info_meta_box($object, $box) {  ?>
  <?php wp_nonce_field(basename(__FILE__), 'film_info_nonce'); ?>
  <table class="form-table">
  		<tbody>
        <tr class="form-field">
  			<th scope="row"><label for="release-date"><?php _e('Release Date', 'structure'); ?></label></th>
  			<td>
          <input style="max-width: 12em" class="datepicker" type="text" name="release-date" id="release-date" value="<?php echo esc_attr(get_post_meta($object->ID, 'release_date', true)); ?>" />
          <p class="description"><?php _e('Date the film was released.', 'structure'); ?></p>
        </td>
  		</tr>
      <tr class="form-field">
        <th scope="row">
          <label for="duration"><?php _e('Duration', 'structure'); ?></label>
        </th>
        <td>
          <input style="max-width: 6em" type="number" name="duration" id="duration" value="<?php echo esc_attr(get_post_meta($object->ID, 'duration', true)); ?>" />
          <p class="description"><?php _e('Length of film in minutes.', 'structure'); ?></p>
        </td>
      </tr>
      <tr class="form-field">
        <th scope="row">
          <label for="director"><?php _e('Director', 'structure'); ?></label>
        </th>
        <td>
          <input type="text" name="director" id="director" value="<?php echo esc_attr(get_post_meta($object->ID, 'director', true)); ?>" />
        </td>
      </tr>
  			</tbody>
      </table>
<?php
}

/* Save the meta box's post metadata. */
function my_save_post_class_meta($post_id, $post)
{

  /* Verify the nonce before proceeding. */
  if (!isset($_POST['film_info_nonce']) || !wp_verify_nonce($_POST['film_info_nonce'], basename(__FILE__))) {
      return $post_id;
  }

  /* Get the post type object. */
  $post_type = get_post_type_object($post->post_type);

  /* Check if the current user has permission to edit the post. */
  if (!current_user_can($post_type->cap->edit_post, $post_id)) {
      return $post_id;
  }

  // RELEASE DATE
  /* Get the posted data and sanitize it. */
  $new_release_date = ( isset( $_POST['release-date'] ) ? preg_replace("([^0-9/])", "", $_POST['release-date']) : '' );

  /* Get the meta value of the custom field key. */
  $old_release_date = get_post_meta($post_id, 'release_date', true);

  /* If a new meta value was added and there was no previous value, add it. */
  if ($new_release_date && '' == $old_release_date) {
      add_post_meta($post_id, 'release_date', $new_release_date, true);
  }

  /* If the new meta value does not match the old value, update it. */
  elseif ($new_release_date && $new_release_date != $old_release_date) {
      update_post_meta($post_id, 'release_date', $new_release_date);
  }

  /* If there is no new meta value but an old value exists, delete it. */
  elseif ('' == $new_release_date && $old_release_date) {
      delete_post_meta($post_id, 'release_date', $old_release_date);
  }

// Duration
/* Get the posted data and sanitize it. */
  $new_duration = ( isset( $_POST['duration'] ) ? absint( $_POST['duration'] ) : '' );

  /* Get the meta value of the custom field key. */
  $old_duration = get_post_meta( $post_id, 'duration', true );

  /* If a new meta value was added and there was no previous value, add it. */
  if ( $new_duration && '' == $old_duration ) {
    add_post_meta( $post_id, 'duration', $new_duration, true );
  }
  /* If the new meta value does not match the old value, update it. */
  elseif ( $new_duration && $new_duration != $old_duration ) {
    update_post_meta( $post_id, 'duration', $new_duration );
  }
  /* If there is no new meta value but an old value exists, delete it. */
  elseif ( '' == $new_duration && $old_duration ) {
    delete_post_meta( $post_id, 'duration', $old_duration );
  }

// Director
/* Get the posted data and sanitize it. */
  $new_director = ( isset( $_POST['director'] ) ? sanitize_text_field( $_POST['director'] ) : '' );

  /* Get the meta value of the custom field key. */
  $old_director = get_post_meta( $post_id, 'director', true );

  /* If a new meta value was added and there was no previous value, add it. */
  if ( $new_director && '' == $old_director ) {
    add_post_meta( $post_id, 'director', $new_director, true );
  }
  /* If the new meta value does not match the old value, update it. */
  elseif ( $new_director && $new_director != $old_director ) {
    update_post_meta( $post_id, 'director', $new_director );
  }
  /* If there is no new meta value but an old value exists, delete it. */
  elseif ( '' == $new_director && $old_director ) {
    delete_post_meta( $post_id, 'director', $old_director );
  }

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
