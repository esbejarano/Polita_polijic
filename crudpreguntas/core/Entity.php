<?php

    class Entity {
        private $table;
        private $conection;
        private $db;

        public function __construct($table)
        {
            $this->table = (string) $table;
            $this->conection = new Conection();
            $this->db = $this->conection->conect();
        }

        public function getConection() {
            return $this->conection;
        }

        public function getDb() {
            return $this->db;
        }

        public function getAll() {
            $query = $this->db->query("SELECT * FROM " . $this->table . " ORDER BY id DESC");
            
            $resultSet = array();
            while ($row = $query->fetch_object()) {
                array_push($resultSet, $row);
            }

            return $resultSet;
        }

        public function getById($id) {
            $query = $this->db->query("SELECT * FROM " . $this->table . " WHERE id = '" .$id. "'");
            
            $resultSet = array();
            if ($row = $query->fetch_object()) {
                $resultSet =  $row;
            }
            return $resultSet;
        }

        public function getBy($column, $value) {
            $query = $this->db->query("SELECT * FROM " . $this->table . " WHERE " . $column . " = '" . $value . "'");
            
            $resultSet = array();
            if ($row = $query->fetch_object()) {
                $resultSet =  $row;
            }
            return $resultSet;
        }
    }

?>