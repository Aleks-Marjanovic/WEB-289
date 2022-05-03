<?php

/**
 * Checks whether the user has the access to the page
 *
 * @return void
 */
function require_login() {
  global $session;
  if(!$session->is_logged_in()) {
    redirect_to(url_for('/login.php'));
  } else {
    // Do nothing, let the rest of the page proceed
  }
}

/**
 * Checks whether the user has the access to the page
 *
 * @return void
 */
function require_admin_login() {
  global $session;
  if(!$session->is_logged_in() && $session->user_level_id > 2) {
    redirect_to(url_for('/login.php'));
  } else {
    // Do nothing, let the rest of the page proceed
  }
}

/**
 * Displays errors in a preformatted way
 *
 * @param array $errors
 * @return string $output
 */
function display_errors($errors=array()) {
  $output = '';
  if(!empty($errors)) {
    $output .= "<div class=\"errors-container\">";
    $output .= "Please fix the following errors:";
    foreach($errors as $error) {
      $output .= "<p class=\"errors\">" . h($error) . "</p>";
    }
    $output .= "</div>";
  }
  return $output;
}

/**
 * Displays session messages in a preformatted way
 *
 * @return string
 */
function display_session_message() {
  global $session;
  $msg = $session->message();
  if(isset($msg) && $msg != '') {
    $session->clear_message();
    $output = "<div class=\"modal\">";
    $output .= "<div class=\"modal-content\">";
    $output .= "<span class=\"remove-button\">OK</span>";
    $output .= "<p id=\"message\">" . h($msg) . "</p>";
    $output .= "</div>";
    $output .= "</div>";
    return $output;
  }
}

?>
