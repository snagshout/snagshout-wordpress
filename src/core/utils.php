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

function snagshout_ellipsis($input, $max) {
  return mb_strimwidth($input, 0, $max, "...");
}

function snagshout_parse_query($qs) {
  $result = [];

  parse_str($qs, $result);

  return $result;
}

function snagshout_mutate_query($url, $mutations) {
  $components = parse_url($url);

  $query = http_build_query(array_merge(
    isset($components['query'])
      ? snagshout_parse_query($components['query'])
      : [],
    $mutations
  ));

  $fragmented = [
    isset($components['scheme']) ? $components['scheme'] . '://' : null,
    isset($components['username'])
      ? $components['username']
        . (isset($components['password']) ? ':' . $components['password'] : '')
        . '@'
      : null,
    $components['host'],
    isset($components['port']) ? ':' . $components['port'] : null,
    $components['path'],
    $query ? '?' . $query : null,
    isset($components['anchor']) ? '#' . $components['anchor'] : null,
  ];

  return implode('', array_filter($fragmented));
}

function snagshout_get(array $values, $key, $default) {
  if (isset($values[$key])) {
    return $values[$key];
  }

  return $default;
}
