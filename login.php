<!DOCTYPE php>
<?php
include("header.php");
?>
<html>
<body>
  <div class="section columns is-centered">
    <div class="column is-one-quarter">
    <form method="POST">
      <div class="field">
        <div class="control">
          <input class="input" type="text" name="login" placeholder="Username"/><br/>
        </div>
        <div class="control">
          <input class="input" type="password" name="passwd" placeholder="Password"/><br/>
        </div>
      </div>
      <div class="field">
        <div class="control">
          <input class="button is-success is-outlined" type="submit" name="submit" value="Log in"/>
        </div>
      </div>
  </form>
  <?php
session_start();
require_once("dao/userDAO.php");
if(isset($_POST["submit"]))
{
  if (auth($_POST["login"], $_POST["passwd"]))
  {
   $_SESSION["current_user"] = $_POST["login"];
   echo $_SESSION["current_user"];
    header('Location: index.php');
  }
  else
  {
    $_SESSION["current_user"] = "";
    echo '<div class="notification is-warning">Wrong username or password</div>';
  }
}
?>
</div>
</div>
</body>
</html>