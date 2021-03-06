<?php require_once('../../private/initialize.php'); 

      require_login();

?>

<?php $page_title = 'Locations'; ?>
<?php include(SHARED_PATH . '/admin_header.php'); ?>

<?php

  $locations = Location::find_all();
?>

<article>

<?php
  foreach($locations as $location) { ?>
    <section class="content">
      <a href="<?php echo url_for('admin/single_location.php?id=' . h(u($location->id))); ?>">
      <div class="card">
        <img src="<?php echo url_for('images/' . h(u($location->display_photo($location->id)))); ?>" height="300" width="400" alt="<?php echo h($location->display_alt_text($location->id)); ?>">
        <div class="text-box">
          <h2><?php echo h($location->location_name); ?></h2>
          <p>Short Description: <br><?php echo h($location->short_description); ?></p>
          <p>Photoshoot Type: <br><?php echo h($location->display_photoshoot_type($location->photoshoot_id)); ?></p>
        </div>
      </div>
      </a>
    </section>
  <?php }

?>

</article>

<?php include(SHARED_PATH . '/admin_footer.php'); ?>
