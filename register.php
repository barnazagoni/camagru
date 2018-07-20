<!DOCTYPE php>
<html>
<?php
include('header.php');
?>
<div class="section columns is-centered">
  <div class="column is-one-quarter">
    <form method="POST">
      <div class="field">
        <h1 class="title">Create account</h1>
        <div class="control">
        <input class="input" type="text" name="login" placeholder="Username"/><br/>
      </div>
      <div class="control">
        <input class="input" type="email" name="email" placeholder="Email adress"/><br/>
      </div>
      <div class="control">
        <input class="input" type="password" name="passwd" placeholder="Password"/><br/>
      </div>
      <div class="control">
        <input class="input" type="password" name="passwdcheck" placeholder="Retype password"/> <br/>
      </div>
    </div>
    <div class="field">
      <div class="control">
        <input class="button is-primary is-outlined" type="submit" name="submit" value="Register"/>
      </div>
     </div>
    </form>
<?php
require_once("dao/userDAO.php");
if(isset($_POST["submit"]))
{
  if ($_POST["login"] != "" && $_POST["passwd"] != "" && $_POST["passwd"] == $_POST["passwdcheck"])
  {
    echo createUser($_POST["login"], hash('md5', $_POST["passwd"]), $_POST["email"]);
  }
  else
  {
    echo '<div class="notification is-warning">Invalid input</div>';
  }
}
?>
  </div>
  </div>
</body>
</html>
