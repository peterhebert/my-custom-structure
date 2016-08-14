<?php

/* Fire our meta box setup function on the post editor screen. */
add_action( 'load-post.php', 'my_post_meta_boxes_setup' );
add_action( 'load-post-new.php', 'my_post_meta_boxes_setup' );

/* Meta box setup function. */
function my_post_meta_boxes_setup() {

  /* Add meta boxes on the 'add_meta_boxes' hook. */
  add_action( 'add_meta_boxes', 'my_add_post_meta_boxes' );

  /* Save post meta on the 'save_post' hook. */
  add_action( 'save_post', 'my_save_post_class_meta', 10, 2 );
}

/* Create one or more meta boxes to be displayed on the post editor screen. */
function my_add_post_meta_boxes() {

  add_meta_box(
    'film-release-date',      // Unique ID
    esc_html__( 'Release Date', 'structure' ),    // Title
    'release_date_meta_box',   // Callback function
    'film',         // Admin page (or post type)
    'normal',         // Context
    'default'         // Priority
  );
}

/* Display the post meta box. */
function release_date_meta_box( $object, $box ) { ?>

  <?php wp_nonce_field( basename( __FILE__ ), 'film_info_nonce' ); ?>

  <p>
    <label for="film-release-date"><?php _e( "Release Date.", 'example' ); ?></label>
    <br />
    <input type="date" name="film-release-date" id="film-release-date" value="<?php echo esc_attr( get_post_meta( $object->ID, 'film-release-date', true ) ); ?>" />
  </p>
<?php }

/* Save the meta box's post metadata. */
function my_save_post_class_meta( $post_id, $post ) {

  /* Verify the nonce before proceeding. */
  if ( !isset( $_POST['my_post_class_nonce'] ) || !wp_verify_nonce( $_POST['my_post_class_nonce'], basename( __FILE__ ) ) )
    return $post_id;

  /* Get the post type object. */
  $post_type = get_post_type_object( $post->post_type );

  /* Check if the current user has permission to edit the post. */
  if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
    return $post_id;

  /* Get the posted data and sanitize it for use as an HTML class. */
  $new_meta_value = ( isset( $_POST['my-post-class'] ) ? sanitize_html_class( $_POST['my-post-class'] ) : '' );

  /* Get the meta key. */
  $meta_key = 'my_post_class';

  /* Get the meta value of the custom field key. */
  $meta_value = get_post_meta( $post_id, $meta_key, true );

  /* If a new meta value was added and there was no previous value, add it. */
  if ( $new_meta_value && '' == $meta_value )
    add_post_meta( $post_id, $meta_key, $new_meta_value, true );

  /* If the new meta value does not match the old value, update it. */
  elseif ( $new_meta_value && $new_meta_value != $meta_value )
    update_post_meta( $post_id, $meta_key, $new_meta_value );

  /* If there is no new meta value but an old value exists, delete it. */
  elseif ( '' == $new_meta_value && $meta_value )
    delete_post_meta( $post_id, $meta_key, $meta_value );
}

/* Filter the post class hook with our custom post class function. */
add_filter( 'post_class', 'my_post_class' );

function my_post_class( $classes ) {

  /* Get the current post ID. */
  $post_id = get_the_ID();

  /* If we have a post ID, proceed. */
  if ( !empty( $post_id ) ) {

    /* Get the custom post class. */
    $post_class = get_post_meta( $post_id, 'my_post_class', true );

    /* If a post class was input, sanitize it and add it to the post class array. */
    if ( !empty( $post_class ) )
      $classes[] = sanitize_html_class( $post_class );
  }

  return $classes;
}

?>
