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

if (!isset($catalog)) {
  echo $before_widget;

  if (!$hide_title) {
    echo $before_title;
    echo apply_filters(
      'widget_title',
      $title ? $title : 'Featured Coupon Codes'
    );
    echo $after_title;
  }
}

if ($response === null || $response->status != 200) {
  if ($response && $response->status == 400) {
    echo implode(' ', [
      'Unable to authenticate with the deals API.',
      'Please ensure that your credentials are correctly setup. (Status 400)'
    ]);
  } else if ($response && $response->status == 422){
    echo implode(' ', [
      'Unable to authenticate with the deals API.',
      'Please ensure that your credentials and system time are correctly',
      'setup. (Status 422)',
    ]);
  } else if ($response) {
    echo vsprintf(
      'Got unknown response from the deals API. (Status %s)',
      [$response->status]
    );
  } else {
    echo 'Unable to parse response from the deals API.';
  }
} else {
  echo '<div class="ss-grid ss-masonry">';

  foreach ($response->data as $campaign) {
    echo snagshout_render_view('widget-campaign', [
      'campaign' => $campaign,
      'layout' => $layout,
    ]);
  }

  echo '</div>';
}

if (!isset($catalog)) {
  echo $after_widget;
}
