<?php require_once('../private/initialize.php'); ?>

<?php

$id = $_GET['id'] ?? '1';
if(!$id) {
  redirect_to(url_for('index.php'));
}
$location = Location::find_by_id($id);

?>

<?php $page_title = 'Location: ' . h($location->location_name); ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<article class="location-content">

  <section class="location-info">
    <img src="<?php echo url_for('images/' . h(u($location->display_photo($location->id)))); ?>" height="750" width="750" alt="<?php echo h($location->display_alt_text($location->id)); ?>">
    <h3><?php echo h($location->location_name); ?></h3>
    <address><?php echo h($location->street_address); ?><br>
            <?php echo h($location->city); ?>, NC<br>
            <?php echo h($location->zip_code); ?></address>
    <p>Phone Number: <?php echo h($location->phone_number); ?></p>
    <p>Detailed Description:<br> <?php echo h($location->detailed_description); ?></p>
  </section>

  <h2>Gallery</h2>
  <section class="gallery">
    <?php

    $photos = Photo::find_all();

    foreach($photos as $photo) {
      if($photo->location_id == $location->id) { ?>
        <img src="<?php echo url_for('images/' . h(u($photo->photo_name))); ?>" height="300" width="400" alt="<?php echo h($photo->alt_text); ?>">
      <?php }
    }

    ?>
  </section>

  <h2>Reviews</h2>
  <section class="review-info">
    <?php

    $reviews = Review::find_all();
    foreach($reviews as $review) {
      if($review->location_id == $location->id) { ?>
      <div class="review">
        <p>User: <?php echo h($review->display_user($review->user_id)); ?></p>
        <p>Review: <br><?php echo h($review->review_text); ?></p>
        <p>Rating: <?php echo h($review->display_rating($location->id)); ?></p>
      </div>
      <?php }
    }

    ?>
  </section>

</article>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
