<?php

    class Entity {
        private $table;
        private $conection;
        private $db;

        public function __construct($table)
        {
            $this->table = (string) $table;

            require_once './Conection.php';

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
            
            $result = array();
            while ($row = $query->fetch_object()) {
                array_push($result, $row);
            }

            return $result;
        }

        public function getById($id) {
            $query = $this->db->query("SELECT * FROM " . $this->table . " WHERE id = '" .$id. "'");
            
            $result = array();
            if ($row = $query->fetch_object()) {
                $result =  $row;
            }
            return $result;
        }

        public function getBy($column, $value) {
            $query = $this->db->query("SELECT * FROM " . $this->table . " WHERE " . $column . " = '" . $value . "'");
            
            $result = array();
            if ($row = $query->fetch_object()) {
                $result =  $row;
            }
            return $result;
        }

        public function deleteById($id) {
            $query  = $this->db->query("DELETE FROM " . $this->table . "WHERE id = '" . $id . "'");
        }
    }

?>