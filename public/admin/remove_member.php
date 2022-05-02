<?php require_once('../../private/initialize.php'); 

      require_login();

      if(!isset($_GET['id'])) {
        redirect_to(url_for('/admin/index.php'));
      }
      $id = $_GET['id'];
      $admin = Admin::find_by_id($id);
      if($admin == false) {
        redirect_to(url_for('/admin/index.php'));
      }
      if($admin->user_level_id == 1) {
        $session->message('This member cannot be removed since it is a SuperAdmin.');
        redirect_to(url_for('/admin/members_list.php'));
      }
      
      if(is_post_request()) {
        $result = $admin->delete();
        $session->message('The member was removed successfully.');
        redirect_to(url_for('/admin/members_list.php'));
      
      } else {
        // Display form
      }

?>

<?php $page_title = 'Remove Member'; ?>
<?php include(SHARED_PATH . '/admin_header.php'); ?>

<section>
  <div class="login-form">
    <h2 class="login-sign">Remove Member</h2>
    <p>Are you sure you wish to remove this member?</p>
    <p><?php echo h($admin->username); ?></p>

    <form action="<?php echo url_for('/admin/remove_member.php?id=' . h(u($id))); ?>" method="post">
      <input type="submit" name="commit" value="Remove Member" class="remove-button">
      <a href="<?php echo url_for('/admin/members_list.php'); ?>" class="button">Cancel</a>
    </form>
  </div>
</section>

<?php include(SHARED_PATH . '/admin_footer.php'); ?>
