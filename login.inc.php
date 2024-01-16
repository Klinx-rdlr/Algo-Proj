
<?php

if(isset($_POST["submit"])){

    // Grabbing the data
    $email = $_POST["email"];
    $passwd = $_POST["passwd"];


    // Instantiate SignupContr class
    include "../classes/dbh.classes.php";
    include "../classes/login.classes.php";
    include "../classes/login-contr.classes.php";
    $login = new LoginContr($email, $passwd);


    // Running error handlers and user signup
    $login->loginUser();
    header("location: ../signup.php?error=none");
    //Going back to front age
}


