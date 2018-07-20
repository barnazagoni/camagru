<?php
include('header.php');
require_once('dao/categoryDAO.php');
require_once('dao/postDAO.php');
require_once('dao/userDAO.php');
session_start();

if($_SESSION["current_user"] != "")
{
    if(isset($_POST["submit"]))
    {
        if(auth($_SESSION["current_user"], $_POST["currentpass"]))
        {
            if ($_POST["passwd"] != "" && $_POST["passwd"] == $_POST["passwdcheck"])
            {
              echo updatePass($_SESSION["current_user"], hash('md5', $_POST["passwd"]));
            }
            else
            {
              echo '<div class="notification is-warning">Invalid input</div>';
            }
        }
        else
        {
            echo '<div class="notification is-warning">Wrong username or password</div>';
        }
    }
}
else
{
    header('Location: login.php');
}
?>
<html>
<div class="section columns is-centered">
  <div class="column is-one-quarter">
<form method="POST">
      <div class="field">
        <?php
            session_start();
            echo '<h1 class="title">User details for @'.$_SESSION["current_user"].'</h1>';
        ?>
      <h2 class="subtitle">Change password</h2>
      <div class="control">
        <input class="input" type="password" name="currentpass" placeholder="Old password"/><br/>
      </div>
      <div class="control">
        <input class="input" type="password" name="passwd" placeholder="New password"/><br/>
      </div>
      <div class="control">
        <input class="input" type="password" name="passwdcheck" placeholder="Retype new password"/> <br/>
      </div>
    </div>
    <div class="field">
      <div class="control">
        <input class="button is-primary is-outlined" type="submit" name="submit" value="Update password"/>
      </div>
     </div>
</form>
</div>
</div>
</html>