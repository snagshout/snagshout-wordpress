<div class="wrap">
  <h1>Snagshout Syndication Options</h1>

  <form method="post" action="options.php">
    <?php
      settings_fields('snagshout-options');
      do_settings_sections('snagshout-options');
      submit_button();
    ?>
  </form>
</div>
