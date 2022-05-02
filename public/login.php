<?php require_once('../private/initialize.php'); 

$errors = [];
$email = '';
$password = '';

if(is_post_request()) {

  $email = $_POST['email'] ?? '';
  $password = $_POST['password'] ?? '';

  if(is_blank($email)) {
    $errors[] = "Email cannot be blank.";
  }
  if(is_blank($password)) {
    $errors[] = "Password cannot be blank.";
  }

  if(empty($errors)) {
    $admin = Admin::find_by_email($email);
    if($admin != false && $admin->verify_password($password)) {
      $session->login($admin);
      if($admin->user_level_id > 2) {
        redirect_to(url_for('member/index.php'));
      } else {
        redirect_to(url_for('admin/index.php'));
      }
 
    } else {
      $errors[] = "That combination of email and password does not exist. Try again.";
    }

  }

}


?>

<?php $page_title = 'Login'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<?php echo display_errors($errors); ?>
<section>
  <div class="login-form">
    <h2 class="login-sign">Log In</h2>
    <form action="<?php echo url_for('login.php') ?>" method="post">
      
    <label for="email">Email:<br>
        <input type="text" id="email" name="email" value="<?php echo h($email); ?>" class="input-field" required><br>
      </label>
      
      <label for="password">Password:<br>
        <input type="password" id="password" name="password" value="" class="input-field" required><br>
      </label>
      <input type="submit" name="submit" value="Log In" class="button">
    </form>
  </div>
</section>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
