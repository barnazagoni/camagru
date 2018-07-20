<?php
  function readAllCategories() {
    require_once('dao/mysqli.php');
    $conn = database_connect();

    $sql = "SELECT * from category";
    $list = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $list;
  }
 ?>
