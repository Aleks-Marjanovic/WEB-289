<?php
  ob_start();

  require_once('database-connection.php');
  require_once('databaseobject.class.php');
  require_once('state.class.php');

  $database = db_connect();
  DatabaseObject::set_database($database);

?>
