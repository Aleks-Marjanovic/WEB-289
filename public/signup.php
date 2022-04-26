<?php

require_once('../private/initialize.php');

if(is_post_request()) {
  $args = $_POST['admin'];
  $admin = new Admin($args);
  $result = $admin->save();

  if($result === true) {
    $new_id = $admin->id;
    $session->login($admin);
    $session->message('The member was added successfully.');
    redirect_to(url_for('/member/index.php'));
  } else {

    }
  } else {
    $admin = new Admin;
  }
?>

<?php
$page_title = 'Sign Up';
include(SHARED_PATH . '/public_header.php');
?>

<section>
  <?php echo display_errors($admin->errors); ?>

  <form action="<?php echo url_for('signup.php'); ?>" method="post">
    <dl>
      <dt>Username</dt>
      <dd><input type="text" name="admin[username]" value="<?php echo h($admin->username); ?>" required/></dd>
    </dl>

    <dl>
      <dt>Email</dt>
      <dd><input type="text" name="admin[email]" value="<?php echo h($admin->email); ?>" required/></dd>
    </dl>
    
    <dl>
      <dt>Password (must contain at least 8 characters and a number)</dt>
      <dd><input type="password" name="admin[password]" value="" required/></dd>
    </dl>

    <dl>
      <dt>Confirm Password</dt>
      <dd><input type="password" name="admin[confirm_password]" value="" required/></dd>
    </dl>
    <input type="submit" value="Sign Up">
  </form>
</section>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
