<?php

function snagshout_render_view($template_name, array $template_data = []) {
  ob_start();

  extract($template_data, EXTR_SKIP);

  include __DIR__ . '/../views/snagshout-' . $template_name . '.php';

  return ltrim(ob_get_clean());
}
