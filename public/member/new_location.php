<?php require_once('../../private/initialize.php'); 
      require_login();

      if(is_post_request()) {
        $args = $_POST['location'];
        $location = new Location($args);
        $result = $location->save();

        if($result === true) {
          $new_id = $location->id;
          $session->message('The location was created successfully.');
          redirect_to(url_for('/member/image_upload.php?id=' . h(u($new_id))));
        } else {

        }
      } else {
        $location = new Location;
      }
?>


<?php $page_title = 'New Location'; ?>
<?php include(SHARED_PATH . '/member_header.php'); ?>

<?php echo display_errors($location->errors);?>
<section>
  <div class="login-form">
    <h2 class="login-sign">Add a New Location</h2>
    <form action="<?php echo url_for('/member/new_location.php'); ?>" method="post">

      <label for="location-name">Location name:<br>
        <input type="text" id="location-name" name="location[location_name]" value="<?php echo h($location->location_name); ?>" required class="input-field"/><br>
      </label>

      <label for="location-address">Location Street Address:<br>
        <input type="text" id="location-address" name="location[street_address]" value="<?php echo h($location->street_address); ?>" required class="input-field"/><br>
      </label>

      <label for="location-city">Location City:<br>
        <input type="text" id="location-city" name="location[city]" value="<?php echo h($location->city); ?>" required class="input-field"/><br>
      </label>

      <label for="location-zip">Location Zip Code:<br>
        <input type="text" id="location-zip" name="location[zip_code]" value="<?php echo h($location->zip_code); ?>" required class="input-field"/><br>
      </label>

      <label for="location-phone">Location Phone Number:<br>
        <input type="text" id="location-phone" name="location[phone_number]" value="<?php echo h($location->phone_number); ?>" class="input-field"/><br>
      </label>

      <label for="location-short">Short Description (up to 50 words): <br>
        <textarea type="text" id="location-short" name="location[short_description]" rows="5" cols="30" required> <?php echo h($location->short_description); ?></textarea><br>
      </label>

      <label for="location-long">Detailed Description:<br>
        <textarea type="text" id="location-long" name="location[detailed_description]" rows="10" cols="30" required><?php echo h($location->detailed_description); ?></textarea><br>
      </label>

      <label for="location-type">Photoshoot type:<br>
        <select name="location[photoshoot_id]" id="location-type">
          <option value=""></option>
          <?php 

            $photoshoots = Photoshoot::find_all();
            foreach($photoshoots as $photoshoot) { ?>
              <option value="<?php echo h($photoshoot->id); ?>"
                            <?php if($location->photoshoot_id == $photoshoot->id) {echo 'selected';} ?>>
              <?php echo h($photoshoot->photoshoot_type); ?>
              </option>
            <?php }
          ?>
        </select><br>
      </label>
        
      <input type="submit" value="Add Location" class="button">
    </form>
  </div>
</section>

<?php include(SHARED_PATH . '/member_footer.php'); ?>
