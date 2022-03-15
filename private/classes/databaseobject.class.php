<?php

class DatabaseObject {
  static protected $database;
  static protected $table_name = "";
  static protected $columns = [];
  public $errors = [];

  static public function set_database($database) {
    self::$database = $database;
  }

  static public function find_by_sql($sql) {
    $result = self::$database->query($sql);
    if(!$result) {
      exit("Database query failed.");
    }

    // results into objects
    $object_array = [];
    while($record = $result->fetch_assoc()) {
      $object_array[] = static::instantiate($record);
    }

    $result->free();

    return $object_array;
  }

  static public function find_all() {
    $sql = "SELECT * FROM " . static::$table_name;
    return static::find_by_sql($sql);
  }

  static protected function instantiate($record) {
    $object = new static;
    foreach($record as $property => $value) {
      if(property_exists($object, $property)) {
        $object->$property = $value;
      }
    }
    return $object;
  }

  static public function count_all() {
    $sql = "SELECT COUNT(*) FROM " . static::$table_name;
    $result_set = self::$database->query($sql);
    $row = $result_set->fetch_array();
    return array_shift($row);
  }

  static public function find_by_id($id) {
    $sql = "SELECT * FROM " . static::$table_name . " ";
    $sql .= "WHERE id='" . self::$database->escape_string($id) . "'";
    $obj_array = static::find_by_sql($sql);
    if(!empty($obj_array)) {
      return array_shift($obj_array);
    } else {
      return false;
    }
  }

  protected function validate() {
    $this->errors = [];

    // Add custom validations

    return $this->errors;
  }

  protected function create() {
    $this->validate();
    if(!empty($this->errors)) { return false; }

    $attributes = $this->sanitized_attributes();
    $sql = "INSERT INTO " . static::$table_name . " (";
    $sql .= join(', ', array_keys($attributes));
    $sql .= ") VALUES ('";
    $sql .= join("', '", array_values($attributes));
    $sql .= "')";
    $result = self::$database->query($sql);
    if($result) {
      $this->id = self::$database->insert_id;
    }
    return $result;
  }

  protected function update() {
    $this->validate();
    if(!empty($this->errors)) { return false; }

    $attributes = $this->sanitized_attributes();
    $attribute_pairs = [];
    foreach($attributes as $key => $value) {
      $attribute_pairs[] = "{$key}='{$value}'";
    }

    $sql = "UPDATE " . static::$table_name . " SET ";
    $sql .= join(', ', $attribute_pairs);
    $sql .= " WHERE id='" . self::$database->escape_string($this->id) . "' ";
    $sql .= "LIMIT 1";
    $result = self::$database->query($sql);
    return $result;
  }

  public function save() {
    // A new record will not have an ID yet
    if(isset($this->id)) {
      return $this->update();
    } else {
      return $this->create();
    }
  }

  public function merge_attributes($args=[]) {
    foreach($args as $key => $value) {
      if(property_exists($this, $key) && !is_null($value)) {
        $this->$key = $value;
      }
    }
  }

  // Properties which have database columns, excluding ID
  public function attributes() {
    $attributes = [];
    foreach(static::$db_columns as $column) {
      if($column == 'id') { continue; }
      $attributes[$column] = $this->$column;
    }
    return $attributes;
  }

  protected function sanitized_attributes() {
    $sanitized = [];
    foreach($this->attributes() as $key => $value) {
      $sanitized[$key] = self::$database->escape_string($value);
    }
    return $sanitized;
  }

  public function delete() {
    $sql = "DELETE FROM " . static::$table_name . " ";
    $sql .= "WHERE id='" . self::$database->escape_string($this->id) . "' ";
    $sql .= "LIMIT 1";
    $result = self::$database->query($sql);
    return $result;
  }

  public function display_photoshoot_type($var) {
    $sql = "SELECT photoshoot_type FROM photoshoot_lookup ";
    $sql .= "LEFT JOIN location on location.photoshoot_id = photoshoot_lookup.id ";
    $sql .= "WHERE photoshoot_lookup.id = " . $var;
    $result = self::$database->query($sql);
    $type = $result->fetch_array()[0] ?? '';
    return $type;
  }

  public function display_photo($var) {
    $sql = "SELECT photo_name FROM photo ";
    $sql .= "LEFT JOIN location on location.id = photo.location_id ";
    $sql .= "WHERE photo.location_id = " .$var;
    $result = self::$database->query($sql);
    $cover = $result->fetch_array()[0] ?? '';
    return $cover;
  }

  public function display_rating($var) {
    $sql = "SELECT rating FROM rating_lookup ";
    $sql .= "LEFT JOIN review on review.rating_id = rating_lookup.id ";
    $sql .= "WHERE review.location_id = " . $var;
    $result = self::$database->query($sql);
    $rating = $result->fetch_array()[0] ?? '';
    return $rating;
  }

  public function display_user($var) {
    $sql = "SELECT username FROM user ";
    $sql .= "LEFT JOIN review on review.user_id = user.id ";
    $sql .= "WHERE review.user_id = " . $var;
    $result = self::$database->query($sql);
    $username = $result->fetch_array()[0] ?? '';
    return $username;
  }
  
  public function display_state($var) {
    $sql = "SELECT state_abbreviation FROM state_lookup ";
    $sql .= "LEFT JOIN location on location.state_id = state_lookup.id ";
    $sql .= "WHERE state_lookup.id = " . $var;
    $result = self::$database->query($sql);
    $state = $result->fetch_array()[0] ?? '';
    return $state;
  }
}

?>
