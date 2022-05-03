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

<?php echo display_errors($admin->errors); ?>
<section>
  <div class="login-form">
    <h2 class="login-sign">Sign Up</h2>
    <form action="<?php echo url_for('signup.php'); ?>" method="post" id="signup-form">

      <label for="username">Username:<br>
        <input type="text" id="username" name="admin[username]" value="<?php echo h($admin->username); ?>" required class="input-field"/><br>
      </label>
      
      <label for="email">Email:<br>
        <input type="text" id="email" name="admin[email]" value="<?php echo h($admin->email); ?>" required class="input-field"/><br>
      </label>

      <label for="password">Password (must contain at least 8 characters and a number):<br>
        <input type="password" id="password" name="admin[password]" value="" required class="input-field" placeholder=""/><br>
      </label>

      <label for="confirm-password">Confirm Password:<br>
        <input type="password" id="confirm-password" name="admin[confirm_password]" value="" required class="input-field"/><br>
      </label>

      <input type="submit" value="Sign Up" class="button g-recaptcha" data-sitekey="6Lfq4rsfAAAAAJ9vhi2fSeABHybc0g1gEJ5wgfiQ"
      data-callback='onSubmit'
      data-action='submit'>
    </form>
  </div>
</section>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
