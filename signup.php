<?php
include_once 'header.php';
?>
    <link rel = "stylesheet" href = "css/signup.css">
    <section class = "signup-form">
        <h2> Sign Up </h2>
            <div class="signup-form-form">
                <form action = "includes/signup.inc.php" method = "POST">
                    <input type = "text" name = "name" placeholder = "Username..">
                    <input type = "text" name = "email" placeholder = "Email..">
                    <input type = "password" name = "pwd" placeholder = "Password..">
                    <input type = "password" name = "pwdrepeat" placeholder = "Repeat Password..">
                    <button type = "submit" name = "submit"  class="signup-btn"> Sign Up </button>
                </form> 
            </div>

            <?php
                  if(isset($_GET["error"])){
                    if($_GET["error"] == "emptyinput"){
                          echo "<p> Fill in all fields! </p>";
                     }
                    else if($_GET["error"] == "invaliduid"){
                           echo "<p> Username must have letters and numbers </p>";
                    }
                    else if($_GET["error"] == "invalidpassword"){
                          echo "<p> Password don't match </p>";
                    }
                    else if($_GET["error"] == "none"){
                        echo "<p> You have signed up! </p>";
                    }
                }
            ?>
            
    </section>


<?php 
    include_once 'footer.php';
?>