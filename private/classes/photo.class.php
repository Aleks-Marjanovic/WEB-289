<?php

class Photo extends DatabaseObject {

  static protected $table_name = 'photo';
  static protected $db_columns = ['id', 'photo_name', 'user_id', 'location_id', 'alt_text'];

  public $id;
  public $photo_name;
  public $user_id;
  public $location_id;
  public $alt_text;

  public function __construct($args=[]) {
    $this->photo_name = $args['photo_name'] ?? '';
    $this->user_id = $args['user_id'] ?? '';
    $this->location_id = $args['location_id'] ?? '';
    $this->alt_text = $args['alt_text'] ?? '';
  }

}

?>