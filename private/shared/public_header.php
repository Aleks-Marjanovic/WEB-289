<!DOCTYPE html>

<html lang="en-US">
  <head>
    <title>MagicaLocations <?php if(isset($page_title)) { echo '- ' .h($page_title); } ?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" media="all" href="<?php echo url_for('/css/styles.css'); ?>"/>
  </head>

  <body>
    <header>
      <div class="banner-image">
        <div class="banner-overlay"></div>
        <div class="banner-text">
          <div class="page-center">
            <h1>MagicaLocations</h1>
          </div>
        </div>
      </div>

      <nav>
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="locations.php">Locations</a></li>
          <li><a href="signup.php">Sign Up</a></li>
          <li><a href="login.php">Log In</a></li>
        </ul>
      </nav>
    </header>
    