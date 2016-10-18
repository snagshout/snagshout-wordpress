<?php

class SnagshoutWidget extends WP_Widget
{
  function __construct() {
    // Instantiate the parent object
    parent::__construct('snagshout-deals', 'Snagshout Deals');
  }

  function widget($args, $instance) {
    echo snagshout_render_view('widget', array_merge(
      [
        'title' => 'Snagshout Deals',
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
      ]
    ));
  }
}
