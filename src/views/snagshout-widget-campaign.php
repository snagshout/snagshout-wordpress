<?php
  $price = $campaign->product->price;
  $offerPrice = $campaign->promotions[0]->price;

  $percentOff = round((1.0 - ($offerPrice/$price)) * 100.0);

  $externalUrl = $campaign->product->externalUrl;

  $columnClass = 'ss-col-6';

  switch ($layout) {
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
    <a href="<?php echo $externalUrl ?>">
      <h6><?php echo snagshout_ellipsis($campaign->product->name, 64) ?></h6>
    </a>
    <?php echo vsprintf('<p><b>$%01.2f</b> (%d%% off)%s</p>', [
      $price,
      $percentOff,
      $campaign->product->amazonData->fulfillment === 'FBA'
        ? ' <span class="ss-prime">&#x26A1; Prime</span>'
        : '',
    ]) ?>
    <button type="button" class="ss-expand">Get code</button>
  </div>
</div>
