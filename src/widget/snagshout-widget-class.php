<?php

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
    $categories = ['all' => 'All categories'];
    $categoriesResponse = json_decode(snagshout_fetch_categories());

    if ($categoriesResponse && $categoriesResponse->data) {
      foreach ($categoriesResponse->data as $category) {
        $categories[$category->id] = $category->name;
      }
    }

    echo snagshout_render_view('widget-options', array_merge(
      $instance,
      [
        'widget' => $this,
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
        ]
      ]
    ));
  }
}
