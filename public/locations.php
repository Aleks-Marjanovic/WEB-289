<?php require_once('../private/initialize.php'); ?>

<?php $page_title = 'Locations'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<?php

  $locations = Location::find_all();

  foreach($locations as $location) { ?>
    <div>
      <h2><?php echo h($location->location_name); ?></h2>
      <img src="images/<?php echo $location->display_photo($location->id) ?>" height="500" width="500">
      <a href="<?php echo url_for('/single_location.php?id=' . h(u($location->id))); ?>">See More Info</a>
      <p>Short Description: <?php echo h($location->short_description); ?></p>
      <p>Photoshoot Type: <?php echo $location->display_photoshoot_type($location->photoshoot_id); ?></p>
    </div>
  <?php }

?>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
