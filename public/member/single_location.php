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

<?php $page_title = $location->location_name; ?>
<?php include(SHARED_PATH . '/member_header.php'); ?>

<article class="location-content">

  <section class="location-info">
    <img src="<?php echo url_for('images/' . h(u($location->display_photo($location->id)))); ?>" height="500" width="500" alt="<?php echo h($location->display_alt_text($location->id)); ?>">
    <h2><?php echo h($location->location_name); ?></h2>
    
    <address><?php echo h($location->street_address); ?><br>
            <?php echo h($location->city); ?>, NC<br>
            <?php echo h($location->zip_code); ?>
    </address>
    <p>Phone Number: <?php echo h($location->phone_number); ?></p>
    <p>Detailed Description:<br> <?php echo h($location->detailed_description); ?></p>
  </section>

  <h3>Gallery</h3>
  <a href="<?php echo url_for('/member/image_upload.php?id=' . h(u($id))); ?>" class="button">Add Images to Gallery</a>
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

  <h3>Reviews</h3>
  <section class="review-info">
    <?php

    $reviews = Review::find_all();
    foreach($reviews as $review) {
      if($review->location_id == $location->id) { ?>
        <div class="review">
          <p>User: <?php echo h($review->display_user($review->user_id)); ?></p>
          <p>Review: <br> <?php echo h($review->review_text); ?></p>
          <p>Rating: <?php echo h($review->display_rating($location->id)); ?></p>
        </div>
      <?php }
    }

    ?>
  </section>

  <?php 
      if(is_post_request()) {
        $args = $_POST['review'];
        $review = new Review($args);
        $result = $review->save();
  
        if($result === true) {
          $new_id = $review->id;
          $session->message('The review was created successfully.');
          redirect_to(url_for('member/single_location.php?id=' . h(u($location->id))));
        } else {
  
        }
      } else {
        $review = new Review;
      }
  
  ?>
  
  <?php echo display_errors($review->errors);?>
  <section>
    <div class="login-form">
    <h2 class="login-sign">Leave us your review</h2>
    <form action="<?php echo url_for('/member/single_location.php?id=' . h(u($location->id))); ?>" method="post">
    
      <label for="review-text">Your Review:<br>
        <textarea type="text" id="review-text" name="review[review_text]" rows="5" cols="30" required> <?php echo h($review->review_text); ?></textarea><br>
      </label>

      <label for="review-rating">Your Rating:<br>
        <select name="review[rating_id]" id="review-rating">
          <option value=""></option>
          <?php 
  
            $ratings = Rating::find_all();
            foreach($ratings as $rating) { ?>
              <option value="<?php echo h($rating->id); ?>"
                            <?php if($review->rating_id == $rating->id) {echo 'selected';} ?>>
              <?php echo h($rating->rating); ?>
              </option>
            <?php }
          ?>
        </select><br>
      </label>
    
      <div class="hide">
        <label for="review-location">Location ID:
          <select name="review[location_id]" id="review-location">
            <option value="<?php echo h($location->id); ?>" selected></option>
          </select><br>
        </label>

        <label for="review-user">User ID:
          <input type="text" name="review[user_id]" value="<?php echo h($session->admin_id); ?>" id="review-user"/><br>
        </label>
      </div>
    
      <input type="submit" value="Post your review" class="button">
    
    </form>
    </div>
  </section>
</article>


<?php include(SHARED_PATH . '/member_footer.php'); ?>
