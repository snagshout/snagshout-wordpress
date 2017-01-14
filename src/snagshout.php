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
 *
 *  @package Snagshout
 *  @version 0.4.7
 *
 *  Plugin Name: Snagshout
 *  Plugin URI: https://www.snagshout.com
 *  Description: The Snagshout plugin allows you to easily embed syndicated
 *  deals into your Wordpress blog.
 *  Author: Seller Labs LLC
 *  Version: 0.4.7
 *  Author URI: https://www.sellerlabs.com
 */

require_once 'admin/settings.php';
require_once 'catalog/init.php';
require_once 'core/constants.php';
require_once 'core/hashing.php';
require_once 'core/http.php';
require_once 'core/utils.php';
require_once 'core/view-engine.php';
require_once 'widget/snagshout-widget-class.php';

/**
 * Registers the main widget.
 */
function snagshout_register_widgets() {
  register_widget(SnagshoutWidget::class);
}

/**
 * Renders stylesheets for the visual appearance of the widget.
 */
function snagshout_styles() {
  echo snagshout_render_view('styles');
}

/**
 * Renders script tags for interactive functionality of the plugin.
 */
function snagshout_widget_javascript() {
  echo snagshout_render_view('widget-js');
}

// Here we register all the action hooks used by the plugin.
add_action('admin_menu', 'snagshout_menu');
add_action('admin_init', 'snagshout_register_settings');
add_action('widgets_init', 'snagshout_register_widgets');
add_action('wp_head', 'snagshout_styles');
add_action('wp_footer', 'snagshout_widget_javascript');
add_action('init', 'snagshout_register_catalogs');
add_action('save_post', 'snagshout_store_catalog', 10, 3);
add_action('the_content', 'snagshout_render_catalog');
