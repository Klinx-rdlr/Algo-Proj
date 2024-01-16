<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>A Closer Look at Functions</title>
    <link rel = "stylesheet" href = "css/index.css">
  </head>
  <body>


  <header>
  <h2 class="logo">XYZ Airline</h2>
  <nav class="navigation">
    <div class="container">
      <a href="index.php">Home</a>
      <a href="#">About</a>
      <?php
      if (isset($_SESSION["username"])) {
          echo '<a href="profile.php">Profile Page</a>';
          echo '<button class="btnLogout-popup"> Logout </button>';
      } else {
          echo '<a href="signup.php">Sign up</a>';
          echo '<button class="btnLogin-popup">Login</button>';
      }
      ?>
    </div>
  </nav>
</header>