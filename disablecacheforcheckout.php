<?php
/**
 * Set NO_CACHE cookie for checkout page
 */

$friendly_path = '/checkout/';
if (preg_match('#^' . $friendly_path . '#', $_SERVER['REQUEST_URI'])) {
  $domain =  $_SERVER['HTTP_HOST'];
  setcookie('NO_CACHE', '1', time()+0, $friendly_path, $domain);
}