<?php require_once('../../private/initialize.php'); 

      require_login();

      if(!isset($_GET['id'])) {
        redirect_to(url_for('/admin/index.php'));
      }
      $id = $_GET['id'];
      $location = Location::find_by_id($id);
      if($location == false) {
        redirect_to(url_for('/admin/locations.php'));
      }

      if(is_post_request()) {
        $result = $location->delete();
        $session->message('The location was removed successfully.');
        redirect_to(url_for('/admin/locations.php'));
      
      } else {
        // Display form
      }

?>

<?php $page_title = 'Remove Location'; ?>
<?php include(SHARED_PATH . '/admin_header.php'); ?>

<section>
  <div class="login-form">
    <h2 class="login-sign">Remove Location</h2>
    <p>Are you sure you wish to remove this location?</p>
    <p><?php echo h($location->location_name); ?></p>

    <form action="<?php echo url_for('/admin/remove_location.php?id=' . h(u($id))); ?>" method="post">
      <input type="submit" name="commit" value="Remove Location" class="remove-button">
      <a href="<?php echo url_for('/admin/locations.php'); ?>" class="button">Cancel</a>
    </form>
  </div>
</section>

<?php include(SHARED_PATH . '/admin_footer.php'); ?>
