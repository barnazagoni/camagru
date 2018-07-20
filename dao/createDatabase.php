<?php
  function createDb($conn) {
    $dbQuery = "DROP DATABASE camagru";
    mysqli_query($conn, $dbQuery);

    $dbQuery = "Create DATABASE if not exists camagru";
    if (mysqli_query($conn, $dbQuery)) {
      echo "da";
    } else {
      echo "nu";
    }
  }
  function createTables($conn) {
    $sql = " Create TABLE IF NOT EXISTS user(
					id int auto_increment not null PRIMARY KEY,
          name varchar(50) unique not null,
          password varchar(50) not null,
          email varchar(40) not null,
          role int not null);";
    if (mysqli_query($conn, $sql)) {
      echo "da";
      } else {
      echo "nu";
    };
      $sql = "Create TABLE IF NOT EXISTS posts (
          id int auto_increment not null PRIMARY KEY,
          image varchar(50) not null,
          text varchar(140) not null,
          created timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
          userid int not null,
          Foreign key (userid) references user(id)
          );";
          if (mysqli_query($conn, $sql)) {
            echo "da";
          } else {
            echo "nu";
          }
          $sql = "Create TABLE IF NOT EXISTS comments (
            id int auto_increment not null PRIMARY KEY,
            text varchar(140) not null,
            created timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            userid int not null,
            postid int not null,
            Foreign key (userid) references user(id),
            Foreign key (postid) references posts(id)
            );";
            if (mysqli_query($conn, $sql)) {
              echo "da";
            } else {
              echo "nu";
            }
    echo mysqli_error($conn);
  }
 ?>
