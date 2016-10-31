<?php

$post_id = get_the_ID();

the_widget(SnagshoutWidget::class, [
  'layout' => get_post_meta($post_id, 'ss_layout', true),
  'category' => get_post_meta($post_id, 'ss_category', true),
  'feed' => get_post_meta($post_id, 'ss_feed', true),
  'limit' => (int) get_post_meta($post_id, 'ss_limit', true),
  'randomize' => get_post_meta($post_id, 'ss_randomize', true) === 'on',
  'catalog' => false,
], []);
