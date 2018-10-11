<?php

    class Model extends Entity {
        private $table;

        public function __construct($table)
        {
            $this->table = (string) $table;
            parent::__construct($table);
        }

        public function execSql($query) 
        {
            $result = $this->db()->query($query);
            $resultSet = Array();

            if ($result) {
                if ($result->num_rows > 1) {
                    while( $row = $result->fetch_object() ) {
                        array_push($resultSet, $row);
                    }
                } elseif ( $row = $result->num_rows == 1) {
                    $resultSet = $row;
                } else {
                    $resultSet = true;
                }
            } else {
                $resultSet = false;
            }

            return $resultSet;
        }            
    }

?>