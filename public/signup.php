<?php

require_once('../private/initialize.php');

if(is_post_request()) {

  $args = $_POST['admin'];
  $admin = new Admin($args);
  $result = $admin->save();

  if($result === true) {
    $new_id = $admin->id;
    $session->message('The member was added successfully.');
    redirect_to(url_for('/member/index.php'));
  } else {
  }

} else {
  $admin = new Admin;
}

$page_title = 'Sign Up';
include(SHARED_PATH . '/public_header.php');
?>

<section>
  <h1>Sign Up</h1>
  <?php echo display_errors($admin->errors); ?>

  <form action="<?php echo url_for('signup.php'); ?>" method="post">
    <dl>
      <dt>Username</dt>
      <dd><input type="text" name="admin[username]" value="<?php echo h($admin->username); ?>" /></dd>
    </dl>

    <dl>
      <dt>Email</dt>
      <dd><input type="text" name="admin[email]" value="<?php echo h($admin->email); ?>" /></dd>
    </dl>

    <dl>
      <dt>Password</dt>
      <dd><input type="password" name="admin[password]" value="" /></dd>
    </dl>

    <dl>
      <dt>Confirm Password</dt>
      <dd><input type="password" name="admin[confirm_password]" value="" /></dd>
    </dl>
    <input type="submit" value="Sign Up">
  </form>
</section>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
