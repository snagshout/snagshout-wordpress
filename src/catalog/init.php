<?php

function snagshout_register_catalogs() {
  register_post_type(
    'ss_catalog',
    [
      'labels' => [
        'name' => __('Catalogs', 'textdomain'),
        'singular_name' => __('Catalog', 'textdomain'),
        'add_new' => __('Add New', 'textdomain'),
        'add_new_item' => __('Add New Catalog', 'textdomain'),
        'new_item' => __('New Catalog', 'textdomain'),
        'edit_item' => __('Edit Catalog', 'textdomain'),
        'view_item' => __('View Catalog', 'textdomain'),
        'all_items' => __('All Catalogs', 'textdomain'),
        'search_items' => __('Search Catalogs', 'textdomain'),
        'not_found' => __('No catalogs found.', 'textdomain'),
        'not_found_in_trash' => __('No catalogs found in Trash.', 'textdomain'),
      ],
      'description' => 'Displays Snagshout deals',
      'public' => true,
      'hierarchical' => false,
      'exclude_from_search' => true,
      'menu_icon' => 'dashicons-cart',
      'register_meta_box_cb' => 'snagshout_register_catalog_metabox',
      'supports' => ['title'],
      // ...
    ]
  );
}

function snagshout_register_catalog_metabox() {
  add_meta_box(
    'ss-catalog-options',
    __('Catalog Options', 'textdomain'),
    'snagshout_render_catalog_metabox',
    'ss_catalog',
    'side',
    'high'
  );
}

function snagshout_render_catalog_metabox($post) {
  $categories = ['all' => 'All categories'];
  $categoriesResponse = json_decode(snagshout_fetch_categories());

  if ($categoriesResponse && $categoriesResponse->data) {
    foreach ($categoriesResponse->data as $category) {
      $categories[$category->id] = $category->name;
    }
  }

  $instance = [];

  echo snagshout_render_view('catalog-options', [
    // General data.
    'categories' => $categories,
    'layouts' => [
      '2-columns' => 'Two columns',
      '1-column' => 'One column',
      '3-columns' => 'Three columns',
      '4-columns' => 'Four columns',
    ],
    'feeds' => [
      'popular' => 'Popular deals first',
      'newest' => 'Newest deals first',
    ],

    // Loaded options.
    'layout' => get_post_meta($post->ID, 'ss_layout', true),
    'category' => get_post_meta($post->ID, 'ss_category', true),
    'feed' => get_post_meta($post->ID, 'ss_feed', true),
    'limit' => (int) get_post_meta($post->ID, 'ss_limit', true),
    'randomize' => get_post_meta($post->ID, 'ss_randomize', true) === 'on',
  ]);
}

function snagshout_store_catalog($post_id, $post, $update) {
  if ($post->post_type != 'ss_catalog') {
    return;
  }

  update_post_meta(
    $post_id,
    'ss_layout',
    snagshout_get($_POST, 'ss_layout', '3-columns')
  );
  update_post_meta(
    $post_id,
    'ss_category',
    snagshout_get($_POST, 'ss_category', '')
  );
  update_post_meta(
    $post_id,
    'ss_feed',
    snagshout_get($_POST, 'ss_feed', 'popular')
  );
  update_post_meta(
    $post_id,
    'ss_limit',
    snagshout_get($_POST, 'ss_limit', '25')
  );
  update_post_meta(
    $post_id,
    'ss_randomize',
    snagshout_get($_POST, 'ss_randomize', 'false')
  );
}

function snagshout_render_catalog($content) {
  if (get_post_type() !== 'ss_catalog') {
    return $content;
  }

  return snagshout_render_view('catalog');
}
