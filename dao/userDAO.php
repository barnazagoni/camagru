<?php
  function createUser($name, $password, $email) {
    require_once('dao/mysqli.php');
    $conn = database_connect();

    $sql = "INSERT INTO user(name, password, email, role)
        VALUES ('$name', '$password', '$email', 0)";
    if (mysqli_query($conn, $sql)) {
      
      $message = '<div class="notification is-success">'."User ".$name." successfully created.</div>";
    } else {
      $message = '<div class="notification is-warning">Error! The user could not be created</div>';
    }
    mysqli_close($conn);
    return $message;
  }
  function updatePass($name, $password)
  {
    require_once('dao/mysqli.php');
    $conn = database_connect();

    $sql = "UPDATE user SET password = '$password' WHERE name = '$name'";
    if (mysqli_query($conn, $sql)) {
      
      $message = '<div class="notification is-success">'."Password ".$name." successfully updated.</div>";
    } else {
      $message = '<div class="notification is-warning">Error! Update failed!</div>';
    }
    mysqli_close($conn);
    return $message;
  }

  function auth($login, $passwd)
  {
    require_once('dao/mysqli.php');
    $conn = database_connect();

    $sql = "SELECT name, password FROM user WHERE name = '$login'";
    $list = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($list);
    if ($user["password"] == hash('md5', $passwd))
    {
      return TRUE;
    }
    else
    {
      return FALSE;
    }
  }
 ?>
