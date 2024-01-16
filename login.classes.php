<?php

class Login extends Dbh{
    
        
    protected function getUser($email, $pwd){
        $stmt = $this->connect()->prepare('SELECT pwd FROM usertable WHERE email = ? or username = ?;');

        if(!$stmt->execute(array($email, $email))){
            $stmt = null;
            header("location: ../login.php?error=stmt-pass-array-failed");
            exit();
        }

        if($stmt->rowCount() == 0){
            $stmt = null;
            header("location: ../login.php?error=stmt-pass-failed");
            exit();
        }

        $pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPwd = password_verify($pwd, $pwdHashed[0]["pwd"]);
        
        if($checkPwd == false){
            $stmt = null;
            header("location: ../login.php?error=wrongpassword");
            exit();
        }else if($checkPwd == true){
            $stmt = $this->connect()->prepare('SELECT * FROM usertable WHERE email = ? or username = ? AND pwd = ?;');

            if(!$stmt->execute(array($email, $email, $pwd))){
                $stmt = null;
                header("location: ../login.php?error=stmt-email-failed");
                exit();
            }

            if($stmt->rowCount() == 0){
                $stmt = null;
                header("location: ../login.php?error=stmt-email-failed");
                exit();
            }

            $user = $stmt->fetchALL(PDO::FETCH_ASSOC);
            session_start();
            $_SESSION["userId"] =  $user[0]["userId"]; 
            $_SESSION["username"] = $user[0]["username"]; 
        }

        $stmt = null;
    }


}