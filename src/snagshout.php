<?php

/**
 * @package Snagshout
 * @version 0.1
 */

/*
Plugin Name: Snagshout
Plugin URI: https://www.snagshout.com
Description: The Snagshout plugin allows you to easily embed syndicated deals
onto your Wordpress blog.
Author: Seller Labs
Version: 0.1
Author URI: https://www.sellerlabs.com
 */

require_once 'admin/settings.php';
require_once 'core/hashing.php';
require_once 'core/http.php';
require_once 'core/utils.php';
require_once 'core/view-engine.php';
require_once 'widget/snagshout-widget-class.php';

function snagshout_register_widgets() {
  register_widget(SnagshoutWidget::class);
}

function snagshout_styles() {
  echo snagshout_render_view('styles');
}

function snagshout_widget_javascript() {
  echo snagshout_render_view('widget-js');
}

add_action('admin_menu', 'snagshout_menu');
add_action('admin_init', 'snagshout_register_settings');
add_action('widgets_init', 'snagshout_register_widgets');
add_action('wp_head', 'snagshout_styles');
add_action('wp_footer', 'snagshout_widget_javascript');
