<?php

    abstract class Model{

        protected $dbh;
        protected $stmt;

        public function __construct(){
           $this->dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
        }
        public function query($query){
            $this->stmt= $this->dbh->prepare($query);
        }
        public function createNew($query){
            $this->stmt= $this->dbh->exec($query);
        }
        //binds the prep statement
        public function bind($param,$value, $type=null){
            if(is_null($type)){
                switch (true) {
                   case is_int($value):
                        $type= PDO:: PARAM_INT;
                        break;
                    case is_bool($value):
                        $type= PDO::PARAM_BOOL;
                        break;
                    case is_null($value):
                        $type=PDO::PARAM_NULL;
                        break;
                    default:
                    $type= PDO::PARAM_STR;
                }
            }
            $this->stmt-> bindValue($param,$value,$type);
        }

        public function execute(){
            return $this->stmt->execute();
        }

        //get the results set
        public function resultSet(){
            $this->execute();
		return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        //gets last insert id
        public function lastInsertId(){
            return $this->dbh->lastInsertId();
        }

        //verify if matches only 1 credential
        public function single(){
            $this->execute();
            return $this->stmt->fetch(PDO::FETCH_ASSOC);
        }
        
    }