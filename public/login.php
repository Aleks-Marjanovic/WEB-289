<?php require_once('../private/initialize.php'); 

$errors = [];
$username = '';
$password = '';

if(is_post_request()) {

  $username = $_POST['username'] ?? '';
  $password = $_POST['password'] ?? '';

  if(is_blank($username)) {
    $errors[] = "Username cannot be blank.";
  }
  if(is_blank($password)) {
    $errors[] = "Password cannot be blank.";
  }

  if(empty($errors)) {
    $admin = Admin::find_by_username($username);
    if($admin != false && $admin->verify_password($password)) {
      $session->login($admin);
      redirect_to(url_for('member/index.php'));
    } else {
      $errors[] = "Log in was unsuccessful.";
    }

  }

}


?>

<?php $page_title = 'Login'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<section>
  <h1>Log In</h1>
  <?php echo display_errors($errors); ?>

  <form action="login.php" method="post">
    <label for="username">Username:</label>
    <input type="text" name="username" value="<?php echo h($username); ?>"><br>

    <label for="password">Password:</label>
    <input type="password" name="password" value=""><br>

    <input type="submit" name="submit" value="Submit">
  </form>
</section>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
