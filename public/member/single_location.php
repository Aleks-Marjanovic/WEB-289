<?php require_once('../../private/initialize.php'); 

      require_login();

?>

<?php

$id = $_GET['id'] ?? '1';
if(!$id) {
  redirect_to('member/index.php');
}
$location = Location::find_by_id($id);

?>

<?php $page_title = ''; ?>
<?php include(SHARED_PATH . '/member_header.php'); ?>

<section class="info">
  <img src="../images/<?php echo $location->display_photo($location->id) ?>" height="500" width="500">
  <div>
    <h2><?php echo h($location->location_name); ?></h2>
    <address><?php echo h($location->street_address); ?><br>
             <?php echo h($location->city); ?>, <?php echo $location->display_state($location->state_id); ?> <br>
             <?php echo h($location->zip_code); ?></address>
    <p>Phone Number: <?php echo h($location->phone_number); ?></p>
    <p>Detailed Description: <?php echo h($location->detailed_description); ?></p>
  </div>
</section>

<section class="gallery">
  <?php

  $photos = Photo::find_all();

   foreach($photos as $photo) {
    if($photo->location_id == $location->id) { ?>
      <img src="../images/<?php echo $photo->photo_name; ?>" height="250" width="250">
    <?php }
  }

  ?>
</section>

<section class="ratings">
<?php

  $reviews = Review::find_all();
  foreach($reviews as $review) {
    if($review->location_id == $location->id) { ?>
      <p>User: <?php echo $review->display_user($review->user_id) ?></p>
      <p>Review: <?php echo h($review->review_text); ?></p>
      <p>Rating: <?php echo $review->display_rating($location->id); ?></p>
    <?php }
  }

  ?>
</section>



<?php include(SHARED_PATH . '/member_footer.php'); ?>