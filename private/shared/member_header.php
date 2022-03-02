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
            <li>Home</li>
            <li>Locations</li>
            <?php if($session->is_logged_in()) { ?>
            <li>User: <?php echo $session->username; ?></li>
            <li><a href="<?php echo url_for(''); ?>">Logout</a></li>
            <?php } ?>
          </ul>
      </nav>
    </header>
    
    <?php echo display_session_message(); ?>
