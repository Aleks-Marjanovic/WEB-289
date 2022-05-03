<?php require_once('../../private/initialize.php'); 
      require_login();

      if(is_post_request()) {
        $args = $_POST['upload'];
        $photo = new Photo($args);
        $result = $photo->save();

        if($result === true) {
          $new_id = $photo->id;
          $session->message('The photo was added successfully.');
          redirect_to(url_for('/member/image_upload.php?id=' . $id));
        } else {

        }
      } else {
        $photo = new Photo;
      }

      
?>

<?php

$id = $_GET['id'] ?? '1';
if(!$id) {
  redirect_to(url_for('member/index.php'));
}
$location = Location::find_by_id($id);

?>

<?php $page_title = $location->location_name . " - Image Upload"; ?>
<?php include(SHARED_PATH . '/member_header.php'); ?>

<section>
  <div class="login-form">
    <h2 class="login-sign">Upload Images</h2>
    <form action="<?php echo url_for('member/image_upload.php?id' . h(u($location->id))); ?>" method="post" enctype="multipart/form-data">

      <label for="upload-name">Select the image to upload:<br>
        <input type="file" id="upload-name" name="photo[photo_name]" value="<?php echo h($photo->photo_name); ?>"><br>
      </label><br>

      <label for="upload-short">Short Description:<br>
        (One Sentence)<br>
        <textarea type="text" id="upload-short" name="photo[alt_text]" rows="5" cols="30" required> <?php echo h($photo->alt_text); ?></textarea><br>
      </label>

      <div class="hide">
        <label for="upload-user">User ID:<br>
          <input type="text" id="upload-user" name="photo[user_id]" value="<?php echo h($session->admin_id); ?>" />
        </label>

        <label for="upload-location">Location ID:<br>
          <select name="photo[location_id]" id="upload-location">
            <option value="<?php echo h($location->id); ?>" selected></option>
          </select>
        </label>
      </div>

      <input type="submit" value="Upload Image" name="upload" class="button">
      <a href="<?php echo url_for('/member/locations.php'); ?>" class="remove-button">Skip</a>

    </form>
  </div>
</section>

<?php include(SHARED_PATH . '/member_footer.php'); ?>
