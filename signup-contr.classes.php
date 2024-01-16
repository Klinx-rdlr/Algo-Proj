<?php

class SignupContr extends signup{
    private $name;
    private $email;
    private $pwd;
    private $pwdRepeat;

    public function __construct($name,  $email,  $pwd, $pwdRepeat){
        $this->name = $name;
        $this->email = $email;
        $this->pwd = $pwd;
        $this->pwdRepeat = $pwdRepeat;
    }

    public function signupUser(){
        if($this->emptyInput() == false){
            header("location: ../signup.php?error=emptyinput");
            exit();
        }
        if($this->invalidUid() == false){
            header("location: ../signup.php?error=invalidusername");
            exit();
        }
        if($this->invalidEmail() == false){
            header("location: ../signup.php?error=invalidemail");
            exit();
        }
        if($this->pwdMatch() == false){
            header("location: ../signup.php?error=invalidPassword");
            exit();
        }
        if($this->nameTakenCheck() == false){
            header("location: ../signup.php?error=usernameTaken");
            exit();
        }

        $this->setUser($this->name, $this->email, $this->pwd);
    }


    private function emptyInput(){
        $result;
        if(empty($this->name || $this->email || $this->pwd || $this->pwdRepeat)){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }

    private function invalidUid(){
        $result;
        if(!preg_match("/^[a-zA-Z0-9]*$/", $this->name)){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }

     private function invalidEmail(){
            $result;
            if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
                $result = false;
            }else{
                $result = true;
            }
            return $result;
        }
    
    private  function pwdMatch(){
        $result;
        if($this-> pwd !== $this->pwdRepeat){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }

    private  function nameTakenCheck(){
        $result;
        if(!$this->checkUser($this->name, $this->email)){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }


}