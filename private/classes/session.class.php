<?php

class Session {

  public $admin_id;
  public $username;
  public $user_level_id;
  private $last_login;

  public const MAX_LOGIN_AGE = 60*60*24; // 1 day

  public function __construct() {
    session_start();
    $this->check_stored_login();
  }

  /**
   * Creates a new session and logs in the admin
   *
   * @param [string] $admin
   * @return boolean
   */
  public function login($admin) {
    if($admin) {
      // prevent session fixation attacks
      session_regenerate_id();
      $this->admin_id = $_SESSION['admin_id'] = $admin->id;
      $this->username = $_SESSION['username'] = $admin->username;
      $this->user_level_id = $_SESSION['user_level_id'] = $admin->user_level_id;
      $this->last_login = $_SESSION['last_login'] = time();
    }
    return true;
  }

  /**
   * Checks whether the user is logged in
   *
   * @return boolean
   */
  public function is_logged_in() {
    return isset($this->admin_id) && $this->last_login_is_recent();
  }

  /**
   * Clears session data and logs out the user
   *
   * @return boolean
   */
  public function logout() {
    unset($_SESSION['admin_id']);
    unset($_SESSION['username']);
    unset($_SESSION['user_level_id']);
    unset($_SESSION['last_login']);
    unset($this->admin_id);
    unset($this->username);
    unset($this->user_level_id);
    unset($this->last_login);
    return true;
  }

  /**
   * Checks whether the log in was saved
   *
   * @return void
   */
  private function check_stored_login() {
    if(isset($_SESSION['admin_id'])) {
      $this->admin_id = $_SESSION['admin_id'];
      $this->username = $_SESSION['username'];
      $this->user_level_id = $_SESSION['user_level_id'];
      $this->last_login = $_SESSION['last_login'];
    }
  }

  /**
   * Checks if the log in was recent
   *
   * @return void
   */
  private function last_login_is_recent() {
    if(!isset($this->last_login)) {
      return false;
    } elseif(($this->last_login + self::MAX_LOGIN_AGE) < time()) {
      return false;
    } else {
      return true;
    }
  }

  /**
   * Sets of gets the session messages
   *
   * @param string $msg
   * @return void
   */
  public function message($msg="") {
    if(!empty($msg)) {
      // Then this is a "set" message
      $_SESSION['message'] = $msg;
      return true;
    } else {
      // Then this is a "get" message
      return $_SESSION['message'] ?? '';
    }
  }

  /**
   * Clears session messages
   *
   * @return void
   */
  public function clear_message() {
    unset($_SESSION['message']);
  }
}

?>
