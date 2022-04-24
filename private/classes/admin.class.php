<?php

class Admin extends DatabaseObject {

  static protected $table_name = "user";
  static protected $db_columns = ['id', 'username', 'email', 'password', 'user_level_id', 'hashed_password'];

  public $id;
  public $email;
  public $username;
  protected $hashed_password;
  public $password;
  public $confirm_password;
  protected $password_required = true;
  public $user_level_id;

  public function __construct($args=[]) {
    $this->email = $args['email'] ?? '';
    $this->username = $args['username'] ?? '';
    $this->password = $args['password'] ?? '';
    $this->confirm_password = $args['confirm_password'] ?? '';
    $this->user_level_id = $args['user_level_id'] ?? '3';
  }

  /**
   * Takes plaintext password and hashes it
   *
   * @return $hashed_password
   */
  protected function set_hashed_password() {
    $this->hashed_password = password_hash($this->password, PASSWORD_BCRYPT);
  }

  /**
   * Compares password with hashed version
   *
   * @param [string] $password
   * @return boolean
   */
  public function verify_password($password) {
    return password_verify($password, $this->hashed_password);
  }

  /**
   * Calls set_hashed_password method on current instance
   *
   * @return void
   */
  protected function create() {
    $this->set_hashed_password();
    return parent::create();
  }

  /**
   * Change the value of the password
   *
   * @return void
   */
  protected function update() {
    if($this->password != '') {
      $this->set_hashed_password();
      // validate password
    } else {
      // password not being updated, skip hashing and validation
      $this->password_required = false;
    }
    return parent::update();
  }

  /**
   * Validates user input and collects errors if there are any
   *
   * @return array of $errors
   */
  protected function validate() {
    $this->errors = [];

    if(is_blank($this->email)) {
      $this->errors[] = "Email cannot be blank.";
    } elseif (!has_length($this->email, array('max' => 255))) {
      $this->errors[] = "Last name must be less than 255 characters.";
    } elseif (!has_valid_email_format($this->email)) {
      $this->errors[] = "Email must be a valid format.";
    }

    if(is_blank($this->username)) {
      $this->errors[] = "Username cannot be blank.";
    } elseif (!has_length($this->username, array('min' => 8, 'max' => 255))) {
      $this->errors[] = "Username must be between 8 and 255 characters.";
    } elseif (!has_unique_username($this->username, $this->id ?? 0)) {
      $this->errors[] = "Username already in use. Try another.";
    }

    if($this->password_required) {
      if(is_blank($this->password)) {
        $this->errors[] = "Password cannot be blank.";
      } elseif (!has_length($this->password, array('min' => 8))) {
        $this->errors[] = "Password must contain 8 or more characters";
      } elseif (!preg_match('/[0-9]/', $this->password)) {
        $this->errors[] = "Password must contain at least 1 number";
      }

      if(is_blank($this->confirm_password)) {
        $this->errors[] = "Confirm password cannot be blank.";
      } elseif ($this->password !== $this->confirm_password) {
        $this->errors[] = "Password and confirm password must match.";
      }
    }

    return $this->errors;
  }

  /**
   * Finds users based on username
   *
   * @param [string] $username
   * @return void
   */
  static public function find_by_username($username) {
    $sql = "SELECT * FROM " . static::$table_name . " ";
    $sql .= "WHERE username='" . self::$database->escape_string($username) . "'";
    $obj_array = static::find_by_sql($sql);
    if(!empty($obj_array)) {
      return array_shift($obj_array);
    } else {
      return false;
    }
  }

  /**
   * Finds users based on email
   *
   * @param [string] $email
   * @return void
   */
  static public function find_by_email($email) {
    $sql = "SELECT * FROM " . static::$table_name . " ";
    $sql .= "WHERE email='" . self::$database->escape_string($email) . "'";
    $obj_array = static::find_by_sql($sql);
    if(!empty($obj_array)) {
      return array_shift($obj_array);
    } else {
      return false;
    }
  }

  static public function promote($id) {
    $sql = "UPDATE user ";
    $sql .= "SET `user_level_id`='2' ";
    $sql .= "WHERE `id`='" . $id . "'";
    $result = self::$database->query($sql);
  }

}

?>
