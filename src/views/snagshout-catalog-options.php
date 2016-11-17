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

?>
<h4>Appearance</h4>

</p>
  <label for="<?php echo esc_attr('ss_layout') ?>">
    <?php _e(esc_attr('Layout:')) ?>
  </label>

  <select
    id="<?php echo esc_attr('ss_layout') ?>"
    name="<?php echo esc_attr('ss_layout') ?>">
    <?php foreach ($layouts as $key => $value) {
      if ($layout === $key) {
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

<h4>Deals</h4>

</p>
  <label for="<?php echo esc_attr('ss_category') ?>">
    <?php _e(esc_attr('Category:')) ?>
  </label>

  <select
    id="<?php echo esc_attr('ss_category') ?>"
    name="<?php echo esc_attr('ss_category') ?>">
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

</p>
  <label for="<?php echo esc_attr('ss_feed') ?>">
    <?php _e(esc_attr('Feed:')) ?>
  </label>

  <select
    id="<?php echo esc_attr('ss_feed') ?>"
    name="<?php echo esc_attr('ss_feed') ?>">
    <?php foreach ($feeds as $key => $value) {
      if ($feed === $key) {
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

</p>
  <label for="<?php echo esc_attr('ss_limit') ?>">
    <?php _e(esc_attr('Maximum number of deals to show:')) ?>
  </label>

  <input
    class="tiny-text"
    type="number"
    min="1"
    max="200"
    value="<?php echo $limit ? $limit : '25' ?>"
    id="<?php echo esc_attr('ss_limit') ?>"
    name="<?php echo esc_attr('ss_limit') ?>"/>
</p>

<p>
  <input
    type="checkbox"
    class="checkbox"
    id="<?php echo esc_attr('ss_randomize') ?>"
    name="<?php echo esc_attr('ss_randomize') ?>"
    <?php echo $randomize ? 'checked' : '' ?>/>

  <label for="<?php echo esc_attr('ss_randomize') ?>">
    <?php _e(esc_attr('Randomize order')) ?>
  </label>
</p>
