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

class SnagshoutWidget extends WP_Widget
{
  function __construct() {
    // Instantiate the parent object
    parent::__construct('snagshout-deals', 'Snagshout Deals');
  }

  function widget($args, $instance) {
    $query = [];

    if (isset($instance['category']) && $instance['category'] !== 'all') {
      $query['category'] = $instance['category'];
    }

    if (isset($instance['feed']) && $instance['feed'] === 'newest') {
      $query['sort'] = '+campaigns.ends_at';
    }

    if (isset($instance['limit'])) {
      $query['limit'] = $instance['limit'];
    }

    $response = json_decode(snagshout_fetch_deals($query));

    if ($response
      && $response->data
      && is_array($response->data)
      && $instance['randomize']
    ) {
      shuffle($response->data);
    }

    echo snagshout_render_view('widget', array_merge(
      [
        'title' => 'Featured Coupon Codes',
        'response' => $response,
        'hide_title' => false,
      ],
      $args,
      $instance
    ));
  }

  function update($new_instance, $old_instance) {
    // Save widget options
    return $new_instance;
  }

  function form($instance) {
    echo snagshout_render_view('widget-options', array_merge(
      $instance,
      [
        'widget' => $this,
        'categories' => snagshout_get_category_map(),
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
        'catalog' => false,
      ]
    ));
  }
}
