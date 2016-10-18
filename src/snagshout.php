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

function snagshout_menu() {
  add_options_page(
    'Snagshout Syndication Options',
    'Snagshout',
    'manage_options',
    'snagshout-options',
    'snagshout_options'
  );
}

function snagshout_options() {
  if (!current_user_can('manage_options')) {
    wp_die(__('You do not have sufficient permissions to access this page.'));
  }

  echo snagshout_render_view('admin-options', []);
}

function snagshout_register_settings() {
  add_settings_section(
    'authentication_section',
    'Authentication',
    'snagshout_authentication_section_callback',
    'snagshout-options'
  );

  add_settings_field(
    'public_id',
    'Public ID',
    'snagshout_setting_callback',
    'snagshout-options',
    'authentication_section',
    [
      'name' => 'public_id',
      'explanation' => 'The public part of the key pair (Required).'
    ]
  );

  add_settings_field(
    'secret_key',
    'Secret Key',
    'snagshout_setting_callback',
    'snagshout-options',
    'authentication_section',
    [
      'name' => 'secret_key',
      'explanation' => 'The secret part of the key pair (Required).'
    ]
  );

  register_setting('snagshout-options', 'public_id');
  register_setting('snagshout-options', 'secret_key');
}

function snagshout_authentication_section_callback() {
  echo snagshout_render_view('admin-options-description', []);
}

function snagshout_setting_callback(array $options) {
  echo snagshout_render_view('admin-text-field', $options);
}

function snagshout_render_view($templateName, array $templateData) {
  ob_start();

  extract($templateData, EXTR_SKIP);

  include 'views/snagshout-' . $templateName . '.php';

  return ltrim(ob_get_clean());
}

add_action('admin_menu', 'snagshout_menu');
add_action('admin_init', 'snagshout_register_settings');
