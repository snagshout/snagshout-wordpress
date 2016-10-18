<?php
  echo $before_widget;
  echo $before_title;
  echo apply_filters('widget_title', $title);
  echo $after_title;

  if ($response === null || $response->status != 200) {
    if ($response && $response->status == 400) {
      echo implode(' ', [
        'Unable to authenticate with the deals API.',
        'Please ensure your credentials are correctly setup. (Status 400)'
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
      echo snagshout_render_view('widget-campaign', ['campaign' => $campaign]);
    }

    echo '</div>';
  }

  echo $after_widget
?>
