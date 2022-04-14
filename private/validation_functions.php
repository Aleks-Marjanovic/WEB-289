<?php

  /**
   * Validates data presence to make sure it is not blank
   *
   * @param [type] $value
   * @return boolean
   */
  function is_blank($value) {
    return !isset($value) || trim($value) === '';
  }

  /**
   * Validates data presence
   *
   * @param [string] $value
   * @return boolean
   */
  function has_presence($value) {
    return !is_blank($value);
  }

  /**
   * Checks that the value has length greater than the one passed with the argument
   *
   * @param [int] $value
   * @param [int] $min
   * @return boolean
   */
  function has_length_greater_than($value, $min) {
    $length = strlen($value);
    return $length > $min;
  }

  /**
   * Checks that the value has length lesser than the one passed with the argument
   *
   * @param [int] $value
   * @param [int] $max
   * @return boolean
   */
  function has_length_less_than($value, $max) {
    $length = strlen($value);
    return $length < $max;
  }

  /**
   * Checks that the value has length exactly the same as the one passed with the argument
   *
   * @param [int] $value
   * @param [int] $exact
   * @return boolean
   */
  function has_length_exactly($value, $exact) {
    $length = strlen($value);
    return $length == $exact;
  }

  /**
   * Combines has_length_greater_than, has_length_less_than, has_length_exactly
   *
   * @param [int] $value
   * @param [type] $options
   * @return boolean
   */
  function has_length($value, $options) {
    if(isset($options['min']) && !has_length_greater_than($value, $options['min'] - 1)) {
      return false;
    } elseif(isset($options['max']) && !has_length_less_than($value, $options['max'] + 1)) {
      return false;
    } elseif(isset($options['exact']) && !has_length_exactly($value, $options['exact'])) {
      return false;
    } else {
      return true;
    }
  }

  /**
   * Checks that the passed argument is included in the passed array
   *
   * @param [int] $value
   * @param [array] $set
   * @return boolean
   */
  function has_inclusion_of($value, $set) {
  	return in_array($value, $set);
  }

  /**
   * Checks that the passed argument is not included in the passed array
   *
   * @param [int] $value
   * @param [array] $set
   * @return boolean
   */
  function has_exclusion_of($value, $set) {
    return !in_array($value, $set);
  }

  /**
   * Checks that the passed argument is included in the passed string
   *
   * @param [string] $value
   * @param [string] $required_string
   * @return boolean
   */
  function has_string($value, $required_string) {
    return strpos($value, $required_string) !== false;
  }

  /**
   * Checks for the valid email format
   *
   * @param [string] $value
   * @return boolean
   */
  function has_valid_email_format($value) {
    $email_regex = '/\A[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}\Z/i';
    return preg_match($email_regex, $value) === 1;
  }

  // has_unique_username('johnqpublic')
  // * Validates uniqueness of admins.username
  // * For new records, provide only the username.
  // * For existing records, provide current ID as second argument
  //   has_unique_username('johnqpublic', 4)
  /**
   * Checks that the username provided is unique
   *
   * @param [string] $username
   * @param string $current_id
   * @return boolean
   */
  function has_unique_username($username, $current_id="0") {
    $admin = Admin::find_by_username($username);
    if($admin === false || $admin->id == $current_id) {
      // is unique
      return true;
    } else {
      // not unique
      return false;
    }
  }

?>
