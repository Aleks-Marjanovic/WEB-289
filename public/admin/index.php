<?php require_once('../../private/initialize.php'); 
      require_login();

?>

<?php $page_title = 'Home'; ?>
<?php include(SHARED_PATH . '/admin_header.php'); ?>

  <article>
    <section>
      <img src="../images/creek.jpg" alt="A photo of a creek and a small bridge in the woods" height="500" width="625">
      <div>
        <p>We are a community of professional photographers and enthusiasts who love to take their creativity outside of the studio and into the nature. The mountains of Western North Carolina are full of magical locations where you can take your new clients to impress them with jaw dropping backgrounds, or rustic cottages for your next family portrait. Take a look at our community curated list of locations to find a backdrop for your next stunning photoshoot.</p>
      </div>
    </section>

    <a href="locations.php"><button>Browse Locations</button></a>

    <section>
      <img src="../images/overlook.jpg" alt="A photo of a person standing on the rock overlooking a valley" height="500" width="625">
      <div>
        <p>Have you spent hours walking or driving around looking for that perfect spot for your next big idea? Have you just moved to the area and are looking for some inspiration? Or are you a seasoned veteran from the area who would love to share their vast knowledge about hidden treasures of Appalachian Mountains? Join our growing community if you wish to add new locations or post reviews on our current locations, and meet fellow professionals and aficionados.</p>
      </div>
    </section>

  </article>

<?php include(SHARED_PATH . '/admin_footer.php'); ?>
