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

function snagshout_get_layout_map() {
  return [
    '2-columns' => 'Two columns',
    '1-column' => 'One column',
    '3-columns' => 'Three columns',
    '4-columns' => 'Four columns',
  ];
}

function snagshout_get_feed_map() {
  return [
    'popular' => 'Popular deals first',
    'newest' => 'Newest deals first',
  ];
}
