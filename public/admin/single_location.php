<?php require_once('../../private/initialize.php'); 

      require_login();

?>

<?php

$id = $_GET['id'] ?? '1';
if(!$id) {
  redirect_to('admin/index.php');
}
$location = Location::find_by_id($id);

?>

<?php $page_title = $location->location_name; ?>
<?php include(SHARED_PATH . '/admin_header.php'); ?>

<article class="location-content">

  <section class="location-info">
    <img src="../images/<?php echo $location->display_photo($location->id) ?>" height="500" width="500" alt="<?php echo $location->display_alt_text($location->id) ?>">
      <h2><?php echo h($location->location_name); ?></h2>

      
      <address><?php echo h($location->street_address); ?><br>
      <?php echo h($location->city); ?>, NC <br>
      <?php echo h($location->zip_code); ?></address>
      <p>Phone Number: <?php echo h($location->phone_number); ?></p>
      <p>Detailed Description: <br> <?php echo h($location->detailed_description); ?></p>
      <a href="<?php echo url_for('/admin/remove_location.php?id=' . h(u($location->id))); ?>" class="button">Remove Location</a>
  </section>

  <h3>Gallery</h3>
  <section class="gallery">
    <?php

    $photos = Photo::find_all();

    foreach($photos as $photo) {
      if($photo->location_id == $location->id) { ?>
        <img src="../images/<?php echo $photo->photo_name; ?>" height="250" width="250" alt="<?php echo $photo->alt_text; ?>">
      <?php }
    }

    ?>
  </section>

  <h3>Reviews</h3>
  <section class="location-info">
  <?php

    $reviews = Review::find_all();
    foreach($reviews as $review) {
      if($review->location_id == $location->id) { ?>
        <div class="review">
          <p>User: <?php echo $review->display_user($review->user_id) ?></p>
          <p>Review:<br> <?php echo h($review->review_text); ?></p>
          <p>Rating: <?php echo $review->display_rating($location->id); ?></p>
          <a href="<?php echo url_for('/admin/remove_review.php?id=' . h(u($review->id))); ?>" class="button">Remove Review</a>
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
          redirect_to(url_for('/admin/locations.php'));
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
    <form action="<?php echo url_for('/admin/single_location.php?id=' . h(u($location->id))); ?>" method="post">
    
    <label for="review-text">Your Review:<br>
        <textarea type="text" id="review-text" name="review[review_text]" rows="5" cols="30" required> <?php echo h($review->review_text); ?></textarea><br>
      </label>

      <label for="review-rating">Your Rating:<br>
        <select name="review[rating_id]" id="review-rating">
          <option value=""></option>
          <?php 
  
            $ratings = Rating::find_all();
            foreach($ratings as $rating) { ?>
              <option value="<?php echo $rating->id; ?>"
                            <?php if($review->rating_id == $rating->id) {echo 'selected';} ?>>
              <?php echo $rating->rating; ?>
              </option>
            <?php }
          ?>
        </select><br>
      </label>
    
      <div class="hide">
        <label for="review-location">Location ID:
          <select name="review[location_id]" id="review-location">
            <option value="<?php echo $location->id; ?>" selected></option>
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


<?php include(SHARED_PATH . '/admin_footer.php'); ?>
