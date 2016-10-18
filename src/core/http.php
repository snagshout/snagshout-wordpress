<?php

function snagshout_http_get($uri, array $options = []) {
  $ch = curl_init(vsprintf('%s/%s?%s', [
    'https://www.snagshout.com',
    $uri,
    http_build_query($options)
  ]));

  $public_id = get_option('snagshout_public_id');
  $secret_key = get_option('snagshout_secret_key');

  $content_hash = snagshout_hash($secret_key);

  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_HEADER, 0);
  curl_setopt($ch, CURLOPT_HTTPHEADER, [
      vsprintf('Authorization: Hash %s', [$public_id]),
      vsprintf('Content-Hash: %s', [$content_hash]),
    ]);

  $result = curl_exec($ch);
  curl_close($ch);

  return $result;
}

function snagshout_fetch_deals() {
  return snagshout_http_get('api/v1/campaigns', [
    'embeds' => implode(',', [
      'product',
      'product.amazonData',
      'product.mainCategory',
      'product.featuredImage',
      'product.media',
      'product.shipping',
      'promotions',
      'promotions.promoCode'
    ]),
    'type' => 'syndicated',
  ]);
}

function snagshout_fetch_categories() {
  return snagshout_http_get('api/v1/categories');
}
