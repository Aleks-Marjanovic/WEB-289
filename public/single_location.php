<?php require_once('../private/initialize.php'); ?>

<?php

$id = $_GET['id'] ?? '1';
if(!$id) {
  redirect_to('index.php');
}
$location = Location::find_by_id($id);

?>

<?php $page_title = 'Location: ' . h($location->location_name); ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<article class="location-content">

  <section class="location-info">
    <img src="images/<?php echo $location->display_photo($location->id) ?>" height="500" width="500" alt="<?php echo $location->display_alt_text($location->id) ?>">
    <h2><?php echo h($location->location_name); ?></h2>
    <address><?php echo h($location->street_address); ?><br>
            <?php echo h($location->city); ?>, NC<br>
            <?php echo h($location->zip_code); ?></address>
    <p>Phone Number: <?php echo h($location->phone_number); ?></p>
    <p>Detailed Description: <?php echo h($location->detailed_description); ?></p>
  </section>

  <h3>Gallery</h3>
  <section class="gallery">
    <?php

    $photos = Photo::find_all();

    foreach($photos as $photo) {
      if($photo->location_id == $location->id) { ?>
        <img src="images/<?php echo $photo->photo_name; ?>" height="300" width="400" alt="<?php echo $photo->alt_text; ?>">
      <?php }
    }

    ?>
  </section>

  <h3>Reviews</h3>
  <section class="review-info">
    <?php

    $reviews = Review::find_all();
    foreach($reviews as $review) {
      if($review->location_id == $location->id) { ?>
      <div class="review">
        <p>User: <?php echo $review->display_user($review->user_id) ?></p>
        <p>Review: <br><?php echo h($review->review_text); ?></p>
        <p>Rating: <?php echo $review->display_rating($location->id); ?></p>
      </div>
      <?php }
    }

    ?>
  </section>

</article>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
