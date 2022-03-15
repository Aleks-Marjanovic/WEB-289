<?php
  ob_start();

  define("PRIVATE_PATH", dirname(__FILE__));
  define("PROJECT_PATH", dirname(PRIVATE_PATH));
  define("PUBLIC_PATH", PROJECT_PATH . '/public');
  define("SHARED_PATH", PRIVATE_PATH . '/shared');

  $public_end = strpos($_SERVER['SCRIPT_NAME'], '/public') + 7;
  $doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);
  define("WWW_ROOT", $doc_root);

  require_once('database-connection.php');
  require_once('functions.php');
  require_once('validation_functions.php');
  require_once('status_error_functions.php');

  require_once('classes/databaseobject.class.php');
  require_once('classes/state.class.php');
  require_once('classes/session.class.php');
  require_once('classes/admin.class.php');
  require_once('classes/location.class.php');
  require_once('classes/photoshoot.class.php');
  require_once('classes/photo.class.php');
  require_once('classes/review.class.php');

  $database = db_connect();
  DatabaseObject::set_database($database);

  $session = new Session;

?>
