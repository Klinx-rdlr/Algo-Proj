<?php

class LoginContr extends login{

    private $email;
    private $pwd;

    public function __construct($email, $pwd){
        $this->email = $email;
        $this->pwd = $pwd;
    }

    public function loginUser(){
        if($this->emptyInput() == false){
            header("location: ../login.php?error=emptyinput");
            exit();
        }
        $this->getUser($this->email, $this->pwd);
    }


    private function emptyInput(){
        $result;
        if(empty($this->email || $this->pwd)){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }

}