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
      
      if(is_post_request()) {
        $admin->user_level_id = 2;
        $session->message('The member was promoted successfully.');
        redirect_to(url_for('/admin/members_list.php'));      
      } else {

      }

?>

<?php $page_title = 'Promote Member'; ?>
<?php include(SHARED_PATH . '/admin_header.php'); ?>

<h2>Promote Member</h2>
<?php echo display_errors($admin->errors); ?>
<p>Are you sure you wish to promote this member?</p>
<p><?php echo h($admin->username); ?></p>

<form action="<?php echo url_for('/admin/promote.php?id=' . h(u($id))); ?>" method="post">
  <input type="submit" value="Promote Member">
</form>

<?php include(SHARED_PATH . '/admin_footer.php'); ?>
