<?php require_once('initialize.php'); ?>

<body>
  <table>
    <tr>
      <th>State Abbreviation</th>
      <th>State Name</th>
    </tr>

    <?php

    $states = State::find_all();

    ?>

    <?php foreach($states as $state) { ?>
      <tr>
        <td><?php echo $state->state_abbreviation; ?></td>
        <td><?php echo $state->state_name; ?></td>
      </tr>
    <?php } ?>

  </table>

</body>


