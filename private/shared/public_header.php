<!DOCTYPE html>

<html lang="en-US">
  <head>
    <meta charset="utf-8">
    <title>MagicaLocations <?php if(isset($page_title)) { echo '- ' .h($page_title); } ?></title>
    <link rel="icon" type="image/x-icon" href="images/logo.png">
    <meta name="author" content="Aleks Marjanovic">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" media="all" href="<?php echo url_for('/css/styles.css'); ?>"/>
    <script src="js/modal.js" async></script>
  </head>

  <body>
    <header>
      <div class="banner-image">
        <div class="banner-overlay"></div>
        <div class="banner-text">
          <div class="page-center">
            <img src="images/logo-name.png" alt="Logo depicting mountains with a sunset background">
          </div>
        </div>
      </div>

      <nav>
        <h1> <?php echo h($page_title); ?></h1>
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="locations.php">Locations</a></li>
          <li><a href="signup.php">Sign Up</a></li>
          <li><a href="login.php">Log In</a></li>
        </ul>
      </nav>
    </header>

    <div class="wrapper">
    