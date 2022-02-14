<?php

class State extends DatabaseObject {
  static protected $table_name = 'state_lookup';
  static protected $db_columns = ['id', 'state_abbreviation', 'state_name'];

  public $id;
  public $state_abbreviation;
  public $state_name;

  public function __construct($args=[]) {
    $this->state_abbreviation = $args['state_abbreviation'] ?? '';
    $this->state_name = $args['state_name'] ?? '';
  }
}
?>
