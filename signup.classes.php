<?php

class Signup extends Dbh{
    
        
    protected function setUser($name, $email, $pwd){
        $stmt = $this->connect()->prepare('INSERT INTO usertable(username, email, pwd) VALUES (?, ?, ?);');

        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);



        if(!$stmt->execute(array($name, $email, $hashedPwd))){
            $stmt = null;
            header("location: ../signup.php?error=stmtfailed");
            exit();
        }

        $stmt = null;
    }


    protected function checkUser($name, $email){
        $stmt = $this->connect()->prepare("SELECT * FROM usertable WHERE username = ? OR email = ?;");

        if(!$stmt->execute(array($name, $email))){
            $stmt = null;
            header("location: ../signup.php?error=stmtfailed");
            exit();
        }

        $resultCheck;
        if($stmt->rowCount() > 0){
            $resultCheck = false;
        }
        else{
            $resultCheck = true;
        }

        return $resultCheck;
    }


}