<?php

  class Rating extends DatabaseObject {

    static protected $table_name = 'rating_lookup';
    static protected $db_columns = ['id', 'rating'];

    public $id;
    public $rating;


    public function __construct($args=[]) {
      $this->rating = $args['rating'] ?? '';
    }

  }

?>
