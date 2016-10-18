<?php

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

  add_settings_section(
    'affiliate_section',
    'Affiliate',
    'snagshout_affiliate_section_callback',
    'snagshout-options'
  );

  add_settings_field(
    'snagshout_public_id',
    'Public ID',
    'snagshout_setting_callback',
    'snagshout-options',
    'authentication_section',
    [
      'name' => 'snagshout_public_id',
      'explanation' => 'The public part of the key pair (Required).'
    ]
  );

  add_settings_field(
    'snagshout_secret_key',
    'Secret Key',
    'snagshout_setting_callback',
    'snagshout-options',
    'authentication_section',
    [
      'name' => 'snagshout_secret_key',
      'explanation' => 'The secret part of the key pair (Required).'
    ]
  );

  add_settings_field(
    'snagshout_affiliate_id',
    'Affiliate ID',
    'snagshout_setting_callback',
    'snagshout-options',
    'affiliate_section',
    [
      'name' => 'snagshout_affiliate_id',
      'explanation' => 'Your Amazon Affiliate ID (Optional).'
    ]
  );

  register_setting('snagshout-options', 'snagshout_public_id');
  register_setting('snagshout-options', 'snagshout_secret_key');
  register_setting('snagshout-options', 'snagshout_affiliate_id');
}

function snagshout_authentication_section_callback() {
  echo snagshout_render_view('admin-options-authentication-description', []);
}

function snagshout_affiliate_section_callback() {
  echo snagshout_render_view('admin-options-affiliate-description', []);
}

function snagshout_setting_callback(array $options) {
  echo snagshout_render_view('admin-text-field', $options);
}
