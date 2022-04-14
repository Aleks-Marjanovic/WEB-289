<?php

/**
 * add the leading '/' if not present
 *
 * @param [string] $script_path
 * @return string $script_path
 */
function url_for($script_path) {
  if($script_path[0] != '/') {
    $script_path = "/" . $script_path;
  }
  return WWW_ROOT . $script_path;
}

/**
 * Encodes string for URL
 *
 * @param string $string
 * @return string $string
 */
function u($string="") {
  return urlencode($string);
}

/**
 * URL-encode according to RFC 3986
 *
 * @param string $string
 * @return string $string
 */
function raw_u($string="") {
  return rawurlencode($string);
}

/**
 * Convert special characters to HTML entities
 *
 * @param string $string
 * @return string $string
 */
function h($string="") {
  return htmlspecialchars($string);
}

/**
 * Throws a 404 error
 *
 * @return void
 */
function error_404() {
  header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found");
  exit();
}

/**
 * Throws 500 error
 *
 * @return void
 */
function error_500() {
  header($_SERVER["SERVER_PROTOCOL"] . " 500 Internal Server Error");
  exit();
}

/**
 * Redirects to desired location
 *
 * @param [string] $location
 * @return void
 */
function redirect_to($location) {
  header("Location: " . $location);
  exit;
}

/**
 * Checks whether the request sent was POST request
 *
 * @return boolean
 */
function is_post_request() {
  return $_SERVER['REQUEST_METHOD'] == 'POST';
}

/**
 * Checks whether the request sent was GET request
 *
 * @return boolean
 */
function is_get_request() {
  return $_SERVER['REQUEST_METHOD'] == 'GET';
}

?>
