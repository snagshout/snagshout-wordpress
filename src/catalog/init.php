<?php

/**
 * Copyright 2016 Seller Labs LLC
 *
 *  Licensed under the Apache License, Version 2.0 (the "License");
 *  you may not use this file except in compliance with the License.
 *  You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 *  Unless required by applicable law or agreed to in writing, software
 *  distributed under the License is distributed on an "AS IS" BASIS,
 *  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 *  See the License for the specific language governing permissions and
 *  limitations under the License.
 */

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
      'rewrite' => [
        'slug' => 'catalog',
      ],
      // ...
    ]
  );
}

function snagshout_flush_rewrites() {
  snagshout_register_catalogs();

  flush_rewrite_rules();
}

function snagshout_register_catalog_metabox() {
  add_meta_box(
    'ss-catalog-options',
    __('Catalog Options', 'textdomain'),
    'snagshout_render_catalog_metabox',
    'ss_catalog',
    'normal',
    'high'
  );
}

function snagshout_render_catalog_metabox($post) {
  echo snagshout_render_view('catalog-options', [
    // General data.
    'categories' => snagshout_get_category_map(),
    'layouts' => snagshout_get_layout_map(),
    'feeds' => snagshout_get_feed_map(),

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

  $update_map = [
    'ss_layout' => '3-columns',
    'ss_category' => '',
    'ss_feed' => 'popular',
    'ss_limit' => '25',
    'ss_randomize' => 'false',
  ];

  foreach ($update_map as $key => $default) {
    update_post_meta($post_id, $key, snagshout_get($_POST, $key, $default));
  }
}

function snagshout_render_catalog($content) {
  if (get_post_type() !== 'ss_catalog') {
    return $content;
  }

  return snagshout_render_view('catalog');
}

register_activation_hook( __FILE__, 'snagshout_flush_rewrites');
