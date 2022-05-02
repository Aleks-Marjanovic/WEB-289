<?php require_once('../../private/initialize.php'); 
      require_login();

?>

<?php $page_title = 'Home'; ?>
<?php include(SHARED_PATH . '/admin_header.php'); ?>

<article>
    <section class="content">
      <div class="card">
        <img src="../images/creek.jpg" alt="A photo of a creek and a small bridge in the woods" height="300" width="400">
        <div class="text-box">
          <h2>Who are We?</h2>
          <p>We are a community of professional photographers and enthusiasts who love to take their creativity outside of the studio and into the nature. The mountains of Western North Carolina are full of magical locations where you can take your new clients to impress them with jaw dropping backgrounds, or rustic cottages for your next family portrait. Take a look at our community curated list of locations to find a backdrop for your next stunning photoshoot.</p>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="card">
        <img src="../images/overlook.jpg" alt="A photo of a person standing on the rock overlooking a valley" height="300" width="400">
        <div class="text-box">
          <h2>Join Us!</h2>
          <p>Have you spent hours walking or driving around looking for that perfect spot for your next big idea? Have you just moved to the area and are looking for some inspiration? Or are you a seasoned veteran from the area who would love to share their vast knowledge about hidden treasures of Appalachian Mountains? Join our growing community if you wish to add new locations or post reviews on our current locations, and meet fellow professionals and aficionados.</p>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="card">
        <img src="../images/max_patch3.jpg" alt="Rolling mountains at a sunset with two people sitting on the grass." height="300" width="400">
        <div class="text-box">
          <h2>Help us grow</h2>
          <p>Get engaged with this growing community and contribute to it with new content. Tell us what you think about the locations you have visited. Was the description accurate? Did you have troubles reaching the location?<br>
        Our main goal is to find that perfect magical location for everyone that is looking for one, and we are grateful to our community for helping us while we work to make this possible.</p>
        </div>
      </div>
    </section>

  </article>


<?php include(SHARED_PATH . '/admin_footer.php'); ?>
