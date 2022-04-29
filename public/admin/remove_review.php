<?php require_once('../../private/initialize.php'); 

      require_login();

      if(!isset($_GET['id'])) {
        redirect_to(url_for('/admin/index.php'));
      }
      $id = $_GET['id'];
      $review = Review::find_by_id($id);
      if($review == false) {
        redirect_to(url_for('/admin/locations.php'));
      }

      if(is_post_request()) {
        $result = $review->delete();
        $session->message('The review was removed successfully.');
        redirect_to(url_for('/admin/locations.php'));
      
      } else {
        // Display form
      }

?>

<?php $page_title = 'Remove Review'; ?>
<?php include(SHARED_PATH . '/admin_header.php'); ?>

<section>
  <div class="login-form">
    <h2 class="login-sign">Remove Review</h2>
    <p>Are you sure you wish to remove this review?</p>
    <p><?php echo h($review->review_text); ?></p>
    <p>By: <?php echo h($review->display_user($review->user_id)); ?></p>

    <form action="<?php echo url_for('/admin/remove_review.php?id=' . h(u($id))); ?>" method="post">
      <input type="submit" name="commit" value="Remove Review" class="remove-button">
    </form>
  </div>
</section>

<?php include(SHARED_PATH . '/admin_footer.php'); ?>
