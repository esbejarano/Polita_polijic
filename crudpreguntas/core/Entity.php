<?php

    class Entity {
        private $table;
        private $conection;
        private $db;

        public function __construct($table)
        {
            $this->table = (string) $table;

            require_once dirname(__FILE__).'\Conection.php';

            $this->conection = new Conection();
            $this->db = $this->conection->conect();
        }

        public function getConection() {
            return $this->conection;
        }

        public function getDb() {
            return $this->db;
        }

        public function getAll($order) {
            $query = $this->db->query("SELECT * FROM " . $this->table . " ORDER BY '" . $order . "' DESC");
            
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

        public function deleteById($id, $column) {
            $query = "DELETE FROM " . $this->table . " WHERE " . $column . " = '" . $id . "'";
            $result  = $this->db->query($query);
            return $result;
        }
    }

?>