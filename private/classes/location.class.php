<?php

class Location extends DatabaseObject {

  static protected $table_name = 'location';
  static protected $db_columns = ['id', 'location_name', 'street_address', 'city', 'state_id', 'zip_code', 'phone_number', 'short_description', 'detailed_description', 'photoshoot_id'];

  public $id;
  public $location_name;
  public $street_address;
  public $city;
  public $state_id;
  public $zip_code;
  public $phone_number;
  public $short_description;
  public $detailed_description;
  public $photoshoot_id;

  public function __construct($args=[]) {
    $this->id = $args['id'] ?? '';
    $this->location_name = $args['location_name'] ?? '';
    $this->street_address = $args['street_address'] ?? '';
    $this->city = $args['city'] ?? '';
    $this->state_id = $args['state_id'] ?? '';
    $this->zip_code = $args['zip_code'] ?? '';
    $this->phone_number = $args['phone_number'] ?? '';
    $this->short_description = $args['short_description'] ?? '';
    $this->detailed_description = $args['detailed_description'] ?? '';
    $this->photoshoot_id = $args['photoshoot_id'] ?? '';

  }

}
