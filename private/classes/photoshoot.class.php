<?php

class Photoshoot extends DatabaseObject {

  static protected $table_name = 'photoshoot_lookup';
  static protected $db_columns = ['id', 'photoshoot_type'];

  public $id;
  public $photoshoot_type;

  public function __construct($args=[]) {
    $this->photoshoot_type = $args['photoshoot_type'] ?? '';
  }

}

?>
