<?php require_once('../../private/initialize.php'); 
      require_login();

      if(is_post_request()) {
        $args = $_POST['photo'];
        $photo = new Photo($args);
        $result = $photo->save();

        if($result === true) {
          $new_id = $photo->id;
          $session->message('The photo was added successfully.');
          redirect_to(url_for('/member/locations.php'));
        } else {

        }
      } else {
        $photo = new Photo;
      }

?>

<?php

$id = $_GET['id'] ?? '1';
if(!$id) {
  redirect_to('member/index.php');
}
$location = Location::find_by_id($id);

?>

<?php $page_title = $location->location_name . " - Image Upload"; ?>
<?php include(SHARED_PATH . '/member_header.php'); ?>

<form action="image_upload.php?id=<?php echo $location->id?>" method="post" enctype="multipart/form-data">
  <dl>
    <dt>Select image to upload:</dt>
    <dd><input type="file" name="photo[photo_name]" value="<?php echo $location->location_name?>"></dd>
  </dl>

  <dl>
    <dt>Short Description (one sentence)</dt>
    <dd><textarea type="text" name="photo[alt_text]" rows="5" cols="30" required> <?php echo h($photo->alt_text); ?></textarea></dd>
  </dl>

  <div class="hide">
    <dl>
      <dd><input type="text" name="photo[user_id]" value="<?php echo h($session->admin_id); ?>" /></dd>
    </dl>

    <dl>
      <dd>
        <select name="photo[location_id]">
          <option value="<?php echo $location->id; ?>" selected></option>
        </select>
      </dd>
    </dl>
  </div>

  <input type="submit" value="Upload Image">

</form>

<?php include(SHARED_PATH . '/member_footer.php'); ?>
