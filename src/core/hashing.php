<?php

function snagshout_hash($secret_key, $body = '') {
  return hash_hmac(
    'sha512',
    $body . (new DateTime())->format('Y-m-d H'),
    $secret_key
  );
}
