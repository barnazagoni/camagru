<?php
  function readPosts()
  {
    require_once('dao/mysqli.php');
    $conn = database_connect();
    $sql = "SELECT * from posts ORDER BY created DESC";
    $list = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $list;
  }
  function getPostsUser($username)
  {
    require_once('dao/mysqli.php');    
    $conn = database_connect();
    $sqluser = "SELECT user.id as numericid from user
                WHERE user.name = '$username'";
    $user = mysqli_query($conn, $sqluser);
    $sql = "SELECT * from posts WHERE userid = '".mysqli_fetch_array($user)["numericid"]."' ORDER BY created DESC LIMIT 0,3";
    $list = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $list;
  }
  function getUser($user_id)
  {
    require_once('dao/mysqli.php');
    $conn = database_connect();
    $sql = "SELECT user.name as uname from user
            WHERE user.id = '$user_id'";
    $list = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $list;
  }
  function save_post($imagelink, $text, $username)
  {
    require_once('dao/mysqli.php');    
    $conn = database_connect();
    $sqluser = "SELECT user.id as numericid from user
                WHERE user.name = '$username'";
    $user = mysqli_query($conn, $sqluser);
    $sql = "INSERT INTO posts (image, text, userid)
            VALUES ('".$imagelink."', '".$text."', '".mysqli_fetch_array($user)["numericid"]."')";
    if(mysqli_query($conn, $sql))
    {
      //echo "posted";
    }
    else
    {
      //echo "couldn't post :(";
    }
    mysqli_close($conn);
  }
  function readComments($post_id)
  {
    require_once('dao/mysqli.php');
    $result = array();
    $conn = database_connect();
    $sql = "SELECT * from comments WHERE postid = '".$post_id."' ORDER BY created DESC";
    $list = mysqli_query($conn, $sql);
    mysqli_close($conn);

    while($row = mysqli_fetch_array($list))
    {
      $userA = getUser($row['userid']);
      $username = mysqli_fetch_array($userA)['uname'];
      $row['user'] = $username;
      $result[] = $row;
    } 
    return json_encode($result);
  }

  function addComment($post_id, $text)
  {
    require_once('dao/mysqli.php');   
    session_start();
    if($_SESSION["current_user"] != "")
    {
      $conn = database_connect();
      $sqluser = "SELECT user.id as numericid from user
                  WHERE user.name = '".$_SESSION['current_user']."'";
      $user = mysqli_query($conn, $sqluser);
      $sql = "INSERT INTO comments(text, userid, postid)
              VALUES ('".$text."', '".mysqli_fetch_array($user)["numericid"]."', '".$post_id."')";
      if(mysqli_query($conn, $sql))
      {
        echo "posted";
      }
      else
      {
        echo "couldn't post :(";
        var_dump(mysqli_error_list($conn));
      }
      mysqli_close($conn);
    }
  }
 ?>
