
<?php
include_once 'header.php';
?>
    <link rel = "stylesheet" href = "css/login.css">
    <section class = "login-form">
        <h2>  Login </h2>
            <div class="login-form-form">
                <form action = "includes/login.inc.php" method = "POST">
                    <input type = "text" name = "email" placeholder = "Username/Email..">
                    <input type = "password" name = "passwd" placeholder = "Password..">
                    <button type = "submit" name = "submit"  class="login-btn"> Login </button>
                </form> 
            </div>

            <?php
                  if(isset($_GET["error"])){
                    if($_GET["error"] == "emptyinput"){
                          echo "<p> Fill in all fields! </p>";
                     }
                    else if($_GET["error"] == "wronglogin"){
                          echo "<p> Incorrect login information </p>";
                    }
                }
            ?>
    </section>
<?php 
    include_once 'footer.php';
?>