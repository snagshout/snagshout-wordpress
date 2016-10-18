<?php

class SnagshoutWidget extends WP_Widget
{
  function __construct() {
    // Instantiate the parent object
    parent::__construct('snagshout-deals', 'Snagshout Deals');
  }

  function widget($args, $instance) {
    $response = snagshout_fetch_deals();

    echo snagshout_render_view('widget', array_merge(
      [
        'title' => 'Snagshout Deals',
        'response' => json_decode($response),
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
      ]
    ));
  }
}
