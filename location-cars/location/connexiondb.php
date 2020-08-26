<?php

//$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
//$bdd = new PDO('mysql:host=localhost;dbname=locationvoiture;charset=utf8', 'root', '',$pdo_options);

  class bdd {

    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'locationvoiture';
    public $bdd;

    public function __construct($host = null, $username = null, $password = null, $database = null){
        if ($host != null) {
            $this->host = $host;
            $this->username = $username;
            $this->password = $password ;
            $this->database = $database;
        }

        try {
          $this->bdd = new PDO('mysql:host='.$this->host.';dbname='.$this->database , $this->username , $this->password, array(
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8',
            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
          ));
        } catch (PDOException $e) {
          die('<h1>immposible de se conecter a la base de donner </h1>');
        }

        
    }

    //fonction qui sert a faire notre requette sql
    public function query($sql , $data = array()){
      $req =$this->bdd->prepare($sql);
      $req->execute($data);
      return $req->fetchAll(PDO::FETCH_OBJ);
    }

    public function query1($sql){
      $requsers =$this->bdd->prepare($sql);
      $requsers->execute();
      return $requsers->fetch();
    }

    public function query2($sql , $data = array()){
      $requsers =$this->bdd->prepare($sql);
      $requsers->execute($data);
      return $requsers->fetch(PDO::FETCH_OBJ);
    }

    public function query5($sql){
      $req =$this->bdd->prepare($sql);
      $req->execute();
      return $req->fetchAll(PDO::FETCH_OBJ);
    }

}


?>
