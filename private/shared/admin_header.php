<!DOCTYPE html>

<html lang="en-US">
  <head>
    <meta charset="utf-8">
    <title>MagicaLocations <?php if(isset($page_title)) { echo '- ' .h($page_title); } ?></title>
    <link rel="icon" type="image/x-icon" href="../images/logo.png">
    <meta name="author" content="Aleks Marjanovic">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" media="all" href="<?php echo url_for('/css/styles.css'); ?>"/>
    <script src="https://www.google.com/recaptcha/api.js" defer></script>
    <script src="<?php echo url_for('/js/modal.js'); ?>" defer></script>
  </head>

  <body>
    <header>
        <div class="banner-image">
          <div class="banner-overlay"></div>
          <div class="banner-text">
            <div class="page-center">
              <img src="../images/logo-name.png" alt="Logo depicting mountains with a sunset background">
            </div>
          </div>
        </div>

      <nav>
      <h1> <?php echo h($page_title); ?></h1>
          <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="locations.php">Locations</a></li>
            <li><a href="new_location.php">Add a Location</a></li>
            <li><a href="members_list.php">Member List</a></li>
            <?php if($session->is_logged_in()) { ?>
            <li><a href="<?php echo url_for('../public/logout.php'); ?>">Logout: <?php echo $session->username; ?></a></li>
            <?php } ?>
          </ul>
      </nav>
    </header>
    
    <?php echo display_session_message(); ?>

    <div class="wrapper">
