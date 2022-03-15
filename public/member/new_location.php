<?php require_once('../../private/initialize.php'); 
      require_login();

      if(is_post_request()) {
        $args = $_POST['location'];
        $location = new Location($args);
        $result = $location->save();

        if($result === true) {
          $new_id = $location->id;
          $session->message('The location was created successfully.');
          redirect_to(url_for('/member/locations.php'));
        } else {

        }
      } else {
        $location = new Location;
      }
?>


<?php $page_title = 'New Location'; ?>
<?php include(SHARED_PATH . '/member_header.php'); ?>

<?php echo display_errors($location->errors); ?>

  <form action="<?php echo url_for('new_location.php'); ?>" method="post">

    <dl>
      <dt>Location Name</dt>
      <dd><input type="text" name="location[location_name]" value="<?php echo h($location->location_name); ?>" /></dd>
    </dl>

    <dl>
      <dt>Street Address</dt>
      <dd><input type="text" name="location[street_address]" value="<?php echo h($location->street_address); ?>" /></dd>
    </dl>

    <dl>
      <dt>City</dt>
      <dd><input type="text" name="location[city]" value="<?php echo h($location->city); ?>" /></dd>
    </dl>

    <dl>
      <dt>Zip Code</dt>
      <dd><input type="text" name="location[zip_code]" value="<?php echo h($location->zip_code); ?>" /></dd>
    </dl>

    <dl>
      <dt>Phone Number</dt>
      <dd><input type="text" name="location[phone_number]" value="<?php echo h($location->phone_number); ?>" /></dd>
    </dl>

    <dl>
      <dt>Short Description (up to 50 words)</dt>
      <dd><textarea type="text" name="location[short_description]" rows="5" cols="30"> <?php echo h($location->short_description); ?></textarea></dd>
    </dl>

    <dl>
      <dt>Detailed Description</dt>
      <dd><textarea type="text" name="location[detailed_description]" rows="10" cols="30"><?php echo h($location->detailed_description); ?></textarea></dd>
    </dl>

    <dl>
      <dt>Photoshoot Type</dt>
      <dd>
        <select name="location[photoshoot_id]">
          <option value=""></option>
          <?php 

            $photoshoots = Photoshoot::find_all();
            foreach($photoshoots as $photoshoot) { ?>
              <option value="<?php echo $photoshoot->id; ?>"
                             <?php if($location->photoshoot_id == $photoshoot->id) {echo 'selected';} ?>>
              <?php echo $photoshoot->photoshoot_type; ?>
              </option>
            <?php }
          ?>
        </select>
      </dd>
    </dl>
      
    <input type="submit" value="Add Location">
  </form>

<?php include(SHARED_PATH . '/member_footer.php'); ?>
