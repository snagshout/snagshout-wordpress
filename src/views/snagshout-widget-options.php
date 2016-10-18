<p>
  <label for="<?php echo esc_attr($widget->get_field_id('title')) ?>">
    <?php _e(esc_attr('Title:')) ?>
  </label>

  <input
    class="widefat"
    id="<?php echo esc_attr($widget->get_field_id('title')) ?>"
    name="<?php echo esc_attr($widget->get_field_name('title')) ?>"
    type="text"
    value="<?php echo esc_attr($title); ?>">
</p>

</p>
  <label for="<?php echo esc_attr($widget->get_field_id('category')) ?>">
    <?php _e(esc_attr('Category:')) ?>
  </label>

  <select
    id="<?php echo esc_attr($widget->get_field_id('category')) ?>"
    name="<?php echo esc_attr($widget->get_field_name('category')) ?>">
    <?php foreach ($categories as $key => $value) {
      if ($category === $key) {
        echo vsprintf(
          '<option value="%s" selected>%s</option>',
          [$key, $value]
        );

        continue;
      }

      echo vsprintf('<option value="%s">%s</option>', [$key, $value]);
    } ?>
  </select>
</p>
