<?php
  $price = $campaign->product->price;
  $offerPrice = $campaign->promotions[0]->price;

  $percentOff = round((1.0 - ($offerPrice/$price)) * 100.0);

  $externalUrl = $campaign->product->externalUrl;
?>
<div class="ss-col-6 ss-campaign">
  <?php
    if ($campaign->product && $campaign->product->featuredImage) {
      echo vsprintf('<img class="ss-expand" src="%s"/>', [
        $campaign->product->featuredImage->url,
      ]);
    }
  ?>
  <a href="<?php echo $externalUrl ?>">
    <h6><?php echo snagshout_ellipsis($campaign->name, 64) ?></h6>
  </a>
  <?php echo vsprintf('<p><b>$%01.2f</b> (%d%% off)</p>', [
    $price,
    $percentOff,
  ]) ?>
  <button type="button" class="ss-expand">Get code</button>
</div>
