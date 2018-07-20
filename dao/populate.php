<?php
function populateDb($conn) {
  $sql = "INSERT INTO user(name, password, role)
      VALUES ('admin', 'admin', 1)";
  mysqli_query($conn, $sql);

  $sql = "INSERT INTO user(name, password, role)
      VALUES ('guest', 'guest', 0)";
  mysqli_query($conn, $sql);

  $sql = "INSERT INTO category(name)
      VALUES ('telefoane')";
  mysqli_query($conn, $sql);

  $sql = "INSERT INTO category(name)
      VALUES ('laptopuri')";
  mysqli_query($conn, $sql);

  $sql = "INSERT INTO category(name)
      VALUES ('electronice')";
  mysqli_query($conn, $sql);

  $sql = "INSERT INTO product(name, price)
      VALUES ('iphone X', 1000)";
  mysqli_query($conn, $sql);

  $sql = "INSERT INTO product(name, price)
      VALUES ('samsung galaxy', 1500)";
  mysqli_query($conn, $sql);

  $sql = "INSERT INTO product(name, price)
      VALUES ('google nexus', 1300)";
  mysqli_query($conn, $sql);

  $sql = "INSERT INTO product(name, price)
      VALUES ('macbook pro', 5500)";
  mysqli_query($conn, $sql);

  $sql = "INSERT INTO product(name, price)
      VALUES ('macbook air', 4500)";
  mysqli_query($conn, $sql);

  $sql = "INSERT INTO product(name, price)
      VALUES ('samsung pro', 3500)";
  mysqli_query($conn, $sql);

  $sql = "INSERT INTO product(name, price)
      VALUES ('dell 30021', 3800)";
  mysqli_query($conn, $sql);

  $sql = "INSERT INTO cat_prod(idCat, idProd)
      VALUES (1, 1)";
  mysqli_query($conn, $sql);

  $sql = "INSERT INTO cat_prod(idCat, idProd)
      VALUES (1, 2)";
  mysqli_query($conn, $sql);

  $sql = "INSERT INTO cat_prod(idCat, idProd)
      VALUES (1, 3)";
  mysqli_query($conn, $sql);

  $sql = "INSERT INTO cat_prod(idCat, idProd)
      VALUES (2, 4)";
  mysqli_query($conn, $sql);

  $sql = "INSERT INTO cat_prod(idCat, idProd)
      VALUES (2, 5)";
  mysqli_query($conn, $sql);

  $sql = "INSERT INTO cat_prod(idCat, idProd)
      VALUES (2, 6)";
  mysqli_query($conn, $sql);

  $sql = "INSERT INTO cat_prod(idCat, idProd)
      VALUES (2, 7)";
  mysqli_query($conn, $sql);

  $sql = "INSERT INTO cat_prod(idCat, idProd)
      VALUES (3, 1)";
  mysqli_query($conn, $sql);

  $sql = "INSERT INTO cat_prod(idCat, idProd)
      VALUES (3, 2)";
  mysqli_query($conn, $sql);

  $sql = "INSERT INTO cat_prod(idCat, idProd)
      VALUES (3, 3)";
  mysqli_query($conn, $sql);

  $sql = "INSERT INTO cat_prod(idCat, idProd)
      VALUES (3, 4)";
  mysqli_query($conn, $sql);

  $sql = "INSERT INTO cat_prod(idCat, idProd)
      VALUES (3, 5)";
  mysqli_query($conn, $sql);

  $sql = "INSERT INTO cat_prod(idCat, idProd)
      VALUES (3, 6)";
  mysqli_query($conn, $sql);

  $sql = "INSERT INTO cat_prod(idCat, idProd)
      VALUES (3, 7)";
  mysqli_query($conn, $sql);
}
?>
