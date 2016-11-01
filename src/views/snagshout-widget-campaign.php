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

$promoCode = $campaign->promotions[0]->promoCode->promoCode;
$price = $campaign->product->price;
$offerPrice = $campaign->promotions[0]->price;

$percentOff = round((1.0 - ($offerPrice/$price)) * 100.0);

$externalUrl = snagshout_mutate_query($campaign->product->externalUrl, [
  'tag' => get_option('snagshout_affiliate_id')
    ? get_option('snagshout_affiliate_id')
    : null
]);

$columnClass = 'ss-col-6';

switch ($layout) {
  case '1-column':
    $columnClass = 'ss-col-12';
    break;
  case '3-columns':
    $columnClass = 'ss-col-4';
    break;
  case '4-columns':
    $columnClass = 'ss-col-3';
    break;
}
?>
<div class="<?php echo $columnClass ?> ss-campaign">
  <div class="ss-campaign-card">
    <div class="ss-campaign-image">
      <?php
        if ($campaign->product && $campaign->product->featuredImage) {
          echo vsprintf('<img class="ss-expand" src="%s"/>', [
            $campaign->product->featuredImage->url,
          ]);
        }
      ?>
    </div>
    <div class="ss-campaign-title">
      <a href="<?php echo $externalUrl ?>">
        <?php echo snagshout_ellipsis($campaign->product->name, 64) ?>
      </a>
    </div>
    <div class="ss-campaign-meta">
      <?php echo vsprintf(
        '<p><ul><li><b>$%01.2f</b></li><li>(%d%% off)</li>%s</ul></p>',
        [
          $price,
          $percentOff,
          $campaign->product->amazonData->fulfillment === 'FBA'
            ? ' <li class="ss-prime">&#x26A1; Prime</li>'
            : '',
          ])
      ?>
      <div class="ss-coupon-button" data-promo-code="<?php echo $promoCode ?>">
      </div>
      <a href="<?php echo $externalUrl ?>">
        <button class="ss-amazon-button ss-expand ss-secondary ss-mar-5-top">
          <small>View on Amazon</small>
        </button>
      </a>
    </div>
  </div>
</div>
