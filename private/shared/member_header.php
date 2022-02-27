<!DOCTYPE html>

<html lang="en-US">
  <head>
    <title>MagicaLocations <?php if(isset($page_title)) { echo '- ' .h($page_title); } ?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" media="all" href=""/>
  </head>

  <body>

  <navigation>
      <ul>
        <?php if($session->is_logged_in()) { ?>
        <li>User: <?php echo $session->username; ?></li>
        <li><a href="<?php echo url_for(''); ?>">Logout</a></li>
        <?php } ?>
      </ul>
    </navigation>

    <?php echo display_session_message(); ?>
