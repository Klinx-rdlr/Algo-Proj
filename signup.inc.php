
<?php 
    /*
    if(isset($_POST["submit"])){
        $name = $_POST["name"];
        $email = $_POST["email"];
        $passwd = $_POST["pwd"];
        $passwdRepeat= $_POST["pwdrepeat"];

        require_once 'dbh.inc.php';
        require_once 'functions.inc.php';

        if(emptyInputSignup( $name, $email, $passwd, $passwdRepeat) !== false){
            header("location: ../signup.php?error=emptyinput");
            exit();
        }
        
        if(invalidUid( $name) !== false){
            header("location: ../signup.php?error=invaliduid");
            exit();
        }

        if(invalidEmail($email) !== false){
            header("location: ../signup.php?error=invalidemail");
            exit();
        }


        if(pwdMatch($passwd, $passwdRepeat) !== false){
            header("location: ../signup.php?error=invalidpassword");
            exit();
        }

        if(uidExist($conn, $name, $email) !== false){
            header("location: ../signup.php?error=usernametaken");
            exit();
        }

        createUser($conn, $name, $email, $passwd);
    }
    else{
        header("location: ../signup.php");
        exit();
    }
    */
?>


<?php

if(isset($_POST["submit"])){

    // Grabbing the data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $passwd = $_POST["pwd"];
    $passwdRepeat= $_POST["pwdrepeat"];


    // Instantiate SignupContr class
    include "../classes/dbh.classes.php";
    include "../classes/signup.classes.php";
    include "../classes/signup-contr.classes.php";
    $signup = new SignupContr($name, $email, $passwd, $passwdRepeat);


    // Running error handlers and user signup
    $signup->signupUser();
    header("location: ../signup.php?error=none");
    //Going back to front age
}
