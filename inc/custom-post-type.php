<?php

// Register Custom Post Type
function sponsor_logo_post_type() {

	$labels = array(
		'name'                  => _x( 'Sponsor Logos', 'Post Type General Name', 'swarm' ),
		'singular_name'         => _x( 'Sponsor Logo', 'Post Type Singular Name', 'swarm' ),
		'menu_name'             => __( 'Sponsor Logos', 'swarm' ),
		'name_admin_bar'        => __( 'Sponsor Logo', 'swarm' ),
		'archives'              => __( 'Sponsor Logo', 'swarm' ),
		'attributes'            => __( 'Logo Attributes', 'swarm' ),
		'parent_item_colon'     => __( 'Parent Item:', 'swarm' ),
		'all_items'             => __( 'All Sponsor Logos', 'swarm' ),
		'add_new_item'          => __( 'Add New Logo', 'swarm' ),
		'add_new'               => __( 'Add New', 'swarm' ),
		'new_item'              => __( 'New Sponsor Logo', 'swarm' ),
		'edit_item'             => __( 'Edit Sponsor Logo', 'swarm' ),
		'update_item'           => __( 'Update Sponsor Logo', 'swarm' ),
		'view_item'             => __( 'View Sponsor Logo', 'swarm' ),
		'view_items'            => __( 'View Sponsor Logos', 'swarm' ),
		'search_items'          => __( 'Search Item', 'swarm' ),
		'not_found'             => __( 'Not found', 'swarm' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'swarm' ),
		'featured_image'        => __( 'Logo Image', 'swarm' ),
		'set_featured_image'    => __( 'Set logo image', 'swarm' ),
		'remove_featured_image' => __( 'Remove logo image', 'swarm' ),
		'use_featured_image'    => __( 'Use as logo image', 'swarm' ),
		'insert_into_item'      => __( 'Insert into Sponsor Logo', 'swarm' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'swarm' ),
		'items_list'            => __( 'Items list', 'swarm' ),
		'items_list_navigation' => __( 'Items list navigation', 'swarm' ),
		'filter_items_list'     => __( 'Filter items list', 'swarm' ),
	);
	$args = array(
		'label'                 => __( 'Sponsor Logo', 'swarm' ),
		'description'           => __( 'Sponsor Logo', 'swarm' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail', 'page-attributes', ),
		'taxonomies'            => array(),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => false,
		'can_export'            => true,
		'has_archive'           => false,		
		'exclude_from_search'   => true,
		'publicly_queryable'    => false,
		'rewrite'               => false,
		'capability_type'       => 'post',
	);
	register_post_type( 'sponsor_logo', $args );

}
add_action( 'init', 'sponsor_logo_post_type', 0 );

function add_sponsor_logo_meta() {

  add_meta_box(

    'location_meta',
    __('Sponsor Logo Details', 'swarm'),
    'sponsor_logo_meta_output',
    'sponsor_logo',
    'normal',
    'high'

    );

}

add_action('add_meta_boxes', 'add_sponsor_logo_meta');

function sponsor_logo_meta_output($post) {

  $sponsor_link = get_post_meta($post->ID, 'sponsor_link', true);

  $sponsor_link_target = get_post_meta($post->ID, 'sponsor_link_target', true);

  wp_nonce_field('sponsor_logo_meta_nonce_data', 'sponsor_logo_meta_nonce');

  echo '<div class="inside">';
  echo '<label for="sponsor_link_target">' . __('Sponsor Link Target', 'swarm') . ' </label>';
  echo '<select name="sponsor_link_target" id="sponsor_link_target">';
  echo '<option value="_blank"';
  echo ($sponsor_link_target == "_blank") ? ' selected="selected"' : '';
  echo '>';
  _e('Blank', 'swarm');
  echo '</option>';
  echo '<option value="_self"';
  echo ($sponsor_link_target == "_self") ? ' selected="selected"' : '';
  echo '>';
  _e('Self', 'swarm');
  echo '</option>';
  echo '</select>';
  echo '</div>';

  echo '<div class="inside">';
  echo '<label for="sponsor_link">' . __('Sponsor Link', 'swarm') . ' </label>';
  echo '<input type="text" name="sponsor_link" id="sponsor_link" value="' . esc_attr($sponsor_link) . '" >';
  echo '</div>';

}

function sponsor_logo_meta_save($post_id) {

  if (!isset($_POST['sponsor_logo_meta_nonce']))
    return;

  if (!wp_verify_nonce($_POST['sponsor_logo_meta_nonce'], 'sponsor_logo_meta_nonce_data'))
    return;

  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
    return;

  if (isset($_POST['post_type']) && $_POST['post_type'] == 'sponsor_logo') {

    if (!current_user_can('edit_page', $post_id)) {
      return;
    } else {
      if (!current_user_can('edit_post', $post_id))
        return;
    }

  }

  $sponsor_link = sanitize_text_field($_POST['sponsor_link']);

  $sponsor_link_target = $_POST['sponsor_link_target'];

  update_post_meta($post_id, 'sponsor_link', $sponsor_link);

  update_post_meta($post_id, 'sponsor_link_target', $sponsor_link_target);

}

add_action('save_post', 'sponsor_logo_meta_save');

// Register Custom Post Type
function splash_slide_post_type() {

	$labels = array(
		'name'                  => _x( 'Splash Slides', 'Post Type General Name', 'swarm' ),
		'singular_name'         => _x( 'Splash Slide', 'Post Type Singular Name', 'swarm' ),
		'menu_name'             => __( 'Splash Slides', 'swarm' ),
		'name_admin_bar'        => __( 'Splash Slide', 'swarm' ),
		'archives'              => __( 'Splash Slide', 'swarm' ),
		'attributes'            => __( 'Splash Slide Attributes', 'swarm' ),
		'parent_item_colon'     => __( 'Parent Item:', 'swarm' ),
		'all_items'             => __( 'All Splash Slides', 'swarm' ),
		'add_new_item'          => __( 'Add New Splash Slide', 'swarm' ),
		'add_new'               => __( 'Add New', 'swarm' ),
		'new_item'              => __( 'New Splash Slide', 'swarm' ),
		'edit_item'             => __( 'Edit Splash Slide', 'swarm' ),
		'update_item'           => __( 'Update Splash Slide', 'swarm' ),
		'view_item'             => __( 'View Splash Slide', 'swarm' ),
		'view_items'            => __( 'View Splash Slide', 'swarm' ),
		'search_items'          => __( 'Search Item', 'swarm' ),
		'not_found'             => __( 'Not found', 'swarm' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'swarm' ),
		'featured_image'        => __( 'Splash Slide Image', 'swarm' ),
		'set_featured_image'    => __( 'Set Splash Slide image', 'swarm' ),
		'remove_featured_image' => __( 'Remove Splash Slide image', 'swarm' ),
		'use_featured_image'    => __( 'Use as Splash Slide image', 'swarm' ),
		'insert_into_item'      => __( 'Insert into Splash Slides', 'swarm' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'swarm' ),
		'items_list'            => __( 'Items list', 'swarm' ),
		'items_list_navigation' => __( 'Items list navigation', 'swarm' ),
		'filter_items_list'     => __( 'Filter items list', 'swarm' ),
	);
	$args = array(
		'label'                 => __( 'Splash Slide', 'swarm' ),
		'description'           => __( 'Splash Slide', 'swarm' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail', 'page-attributes', ),
		'taxonomies'            => array(),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => false,
		'can_export'            => true,
		'has_archive'           => false,		
		'exclude_from_search'   => true,
		'publicly_queryable'    => false,
		'rewrite'               => false,
		'capability_type'       => 'post',
	);
	register_post_type( 'splash_slide', $args );

}
add_action( 'init', 'splash_slide_post_type', 0 );

function add_splash_slide_meta() {

  add_meta_box(

    'splash_slide_meta',
    __('Splash Slide Details', 'swarm'),
    'splash_slide_meta_output',
    'splash_slide',
    'normal',
    'high'

    );

}

add_action('add_meta_boxes', 'add_splash_slide_meta');

function splash_slide_meta_output($post) {

  $height_length = get_post_meta($post->ID, 'splash_slide_height_length', true);

  $speed = get_post_meta($post->ID, 'splash_slide_speed', true);

  wp_nonce_field('splash_slide_meta_nonce_data', 'splash_slide_meta_nonce');

  echo '<div class="inside">';
  echo '<label for="splash_slide_height_length">' . __('Height and Length', 'swarm') . ' </label>';
  echo '<input type="text" name="splash_slide_height_length" id="splash_slide_height_length" value="' . esc_attr($height_length) . '" >';
  echo '</div>';

  echo '<div class="inside">';
  echo '<label for="splash_slide_speed">' . __('Speed', 'swarm') . ' </label>';
  echo '<input type="text" name="splash_slide_speed" id="splash_slide_speed" value="' . esc_attr($speed) . '" >';
  echo '</div>';

}

function splash_slide_meta_save($post_id) {

  if (!isset($_POST['splash_slide_meta_nonce']))
    return;

  if (!wp_verify_nonce($_POST['splash_slide_meta_nonce'], 'splash_slide_meta_nonce_data'))
    return;

  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
    return;

  if (isset($_POST['post_type']) && $_POST['post_type'] == 'splash_slide') {

    if (!current_user_can('edit_page', $post_id)) {
      return;
    } else {
      if (!current_user_can('edit_post', $post_id))
        return;
    }

  }

  $height_length = sanitize_text_field($_POST['splash_slide_height_length']);

  $speed = sanitize_text_field($_POST['splash_slide_speed']);

  update_post_meta($post_id, 'splash_slide_height_length', $height_length);

  update_post_meta($post_id, 'splash_slide_speed', $speed);

}

add_action('save_post', 'splash_slide_meta_save');