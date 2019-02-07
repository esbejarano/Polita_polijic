<?php

    class Conection {
        private $driver;
        private $host;
        private $user;
        private $pass;
        private $database;
        private $chartset;
        
        public function __construct()
        {
            $dbConfig = require_once("./config/db.php");
            
            $this->driver = $dbConfig["driver"];
            $this->host = $dbConfig["host"];
            $this->user = $dbConfig["user"];
            $this->pass = $dbConfig["pass"];
            $this->database = $dbConfig["database"];
            $this->chartset = $dbConfig["chartset"];
        }

        public function conect() {
            if($this->driver == "mysql" ||  is_null($this->driver) ) {
                $conection = mysqli_connect($this->host, $this->user, $this->pass, $this->database);
                $conection->query("SET NAMES '" . $this->chartset . "'");
            }

            return $conection;
        }
    }
?>
