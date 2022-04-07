<?php require_once('../../private/initialize.php'); 

      require_login();

?>

<?php $page_title = 'Members List'; ?>
<?php include(SHARED_PATH . '/admin_header.php'); ?>

  <?php

  $members= Admin::find_all();

  ?>

  <table>
    <tr>
      <th>Display Name:</th>
      <th>Email:</th>
      <th>User Level:</th>
      <th>&nbsp;</th>
      <th>&nbsp;</th>
    </tr>


  <?php
  foreach($members as $member) { ?>
    <tr>
      <td><?php echo $member->username; ?></td>
      <td><?php echo $member->email; ?></td>
      <td><?php echo $member->display_user_level($member->user_level_id)?></td>
      <td><a href="<?php echo url_for('/admin/remove_member.php?id=' . h(u($member->id))); ?>">Remove</a></td>
      <td><a href="<?php echo url_for('/admin/promote.php?id=' . h(u($member->id))); ?>">Promote</a></td>
    </tr>
  <?php }

  ?>
  </table>

<?php include(SHARED_PATH . '/admin_footer.php'); ?>
