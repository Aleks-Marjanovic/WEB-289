<?php

  class Review extends DatabaseObject {

    static protected $table_name = 'review';
    static protected $db_columns = ['id', 'review_text', 'rating_id', 'location_id', 'user_id'];

    public $id;
    public $review_text;
    public $rating_id;
    public $location_id;
    public $user_id;

    public function __construct($args=[]) {
      $this->id = $args['id'] ?? '';
      $this->review_text = $args['review_text'] ?? '';
      $this->rating_id = $args['rating_id'] ?? '';
      $this->location_id = $args['location_id'] ?? '';
      $this->user_id = $args['user_id'] ?? '';
    }

  }

?>