<?php

class Dbh {
    protected function connect(){
        try{
            $username = "root";
            $password = "";
            $dbh = new PDO('mysql:host=localhost;dbname=airline database', $username, $password);
            return $dbh;
        }
        catch(PDOExceotion $e){
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
}