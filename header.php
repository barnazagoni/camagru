<!DOCTYPE php>
<html class=" has-navbar-fixed-top">
<head>
  <link rel="stylesheet" type="text/css" href="bulma.min.css"/>
  <link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
  <header>
    <div class="nav-menu">
      <div class="login-status">

      </div>
      <nav class="navbar is-primary is-fixed-top" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
          <!-- navbar items, navbar burger... -->
          <a role="button" class="navbar-burger" data-target="navMenu" aria-label="menu" aria-expanded="false">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
          </a>
        </div>
        <div class="navbar-menu" id="navMenu">
            <div class="navbar-start">
              <!-- navbar items -->
              <a href="index.php" class="navbar-item">
                <strong>Gallery</strong>
              </a>
              <a href="newpic.php" class="navbar-item">
                New Post
              </a>
            </div>
            <div class="navbar-end">
              <!-- navbar items -->
                <?php
                session_start();
                if ($_SESSION["current_user"] == "")
                {
                  echo '<a class="navbar-item" href="login.php">Log in</a>';
                  echo '<a class="navbar-item" href="register.php">Sign Up</a>';
                }
                else
                {
                  echo '<a class="navbar-item" href="profile.php">'.$_SESSION["current_user"].'</a>';
                  echo '<a class="navbar-item" href="logout.php">Logout</a>';
                }
                ?>
            </div>
        </div>
      </nav>
    </div>
  </header>
  <script>
  document.addEventListener('DOMContentLoaded', function () {

// Get all "navbar-burger" elements
var $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

// Check if there are any navbar burgers
if ($navbarBurgers.length > 0) {

  // Add a click event on each of them
  $navbarBurgers.forEach(function ($el) {
    $el.addEventListener('click', function () {

      // Get the target from the "data-target" attribute
      var target = $el.dataset.target;
      var $target = document.getElementById(target);

      // Toggle the class on both the "navbar-burger" and the "navbar-menu"
      $el.classList.toggle('is-active');
      $target.classList.toggle('is-active');

    });
  });
}

});
  </script>
</body>
</html>