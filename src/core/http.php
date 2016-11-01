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

function snagshout_fetch_deals($query = []) {
  return snagshout_http_get('api/v1/campaigns', array_merge([
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
  ], $query));
}

function snagshout_fetch_categories() {
  return snagshout_http_get('api/v1/categories');
}

function snagshout_get_category_map() {
  $categories = ['all' => 'All categories'];
  $categoriesResponse = json_decode(snagshout_fetch_categories());

  if ($categoriesResponse && $categoriesResponse->data) {
    foreach ($categoriesResponse->data as $category) {
      $categories[$category->id] = $category->name;
    }
  }

  return $categories;
}
