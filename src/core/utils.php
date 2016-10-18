<?php

function snagshout_ellipsis($input, $max) {
  return mb_strimwidth($input, 0, $max, "...");
}
