<?php
    $nameCode = $_GET['name'];
    $conutryCode = $_GET['country'];
    // echo 'Hi ' .$nameCode ;
    // echo ' From ' .$conutryCode ;
  ?>

  <div align="center">
    <h1>Profile</h1>
    Hi <b> <?php echo $nameCode; ?></b>
    Form <U> <?php echo $conutryCode; ?></U>
  </div>