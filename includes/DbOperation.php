<?php

/*perfoming database operations */

class DbOperation{

    private $con; 

    function __construct(){

        require_once dirname(__FILE__).'/DbConnect.php';

        $db = new DbConnect();

        $this->con = $db->connect();

    }

    /*adding a record to the database */

    public function createUser($name, $genre){
        
            $stmt = $this->con->prepare("INSERT INTO `artists` ( `name`, `genre`) VALUES ( ?, ?)");
            $stmt->bind_param("ss",$na,$password,$email);

           if($stmt->execute())
           return true;
           return false;

    }

    public function getArtists(){
        $stmt = $this->con->prepare("SELECT id, name, genre FROM artists");
        $stmt->execute();
        $stmt->bind_result($id, $name, $genre);
        $artists = array();
        
        while($stmt->fetch()){
        $temp = array(); 
        $temp['id'] = $id; 
        $temp['name'] = $name; 
        $temp['genre'] = $genre; 
        array_push($artists, $temp);
        }
        return $artists; 
        }

}