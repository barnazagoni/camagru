<?php
  require_once('dao/mysqli.php');
  require_once('dao/createDatabase.php');
  require_once('dao/populate.php');

  $conn = sql_connect();
  createDb($conn);
  mysqli_close($conn);
  $conn = database_connect();
  createTables($conn);
  populateDb($conn);
  mysqli_close($conn);
 ?>
