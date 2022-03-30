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

<section class="info">
  <img src="../images/<?php echo $location->display_photo($location->id) ?>" height="500" width="500">
  <div>
    <h2><?php echo h($location->location_name); ?></h2>
    <address><?php echo h($location->street_address); ?><br>
             <?php echo h($location->city); ?>, NC <br>
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
      <img src="../images/<?php echo $photo->photo_name; ?>" height="250" width="250" alt="<?php echo $photo->alt_text; ?>">
    <?php }
  }

  ?>
</section>

<section class="ratings">
  <h3>Reviews</h3>
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
  <h4>Leave a review</a></h4> 
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

<form action="<?php echo url_for('/admin/single_location.php?id=' . h(u($location->id))); ?>" method="post">

    <dl>
      <dt>Your review:</dt>
      <dd><textarea type="text" name="review[review_text]" rows="5" cols="30" required> <?php echo h($review->review_text); ?></textarea></dd>
    </dl>

    <dl>
      <dt>Your rating:</dt>
      <dd>
        <select name="review[rating_id]">
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
        </select>
      </dd>
    </dl>

    <div class="hide">
      <dl>
        <dd>
          <select name="review[location_id]">
            <option value="<?php echo $location->id; ?>" selected></option>
          </select>
        </dd>
      </dl><br>

      <dl>
        <dd><input type="text" name="review[user_id]" value="<?php echo h($session->admin_id); ?>" /></dd>
      </dl><br>
    </div>

    <input type="submit" value="Post your review">

</form>
</section>

<?php include(SHARED_PATH . '/admin_footer.php'); ?>
