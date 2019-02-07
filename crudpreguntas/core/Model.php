<?php

    include(dirname(__FILE__) . "\Entity.php");

    class Model extends Entity {
        private $table;

        public function __construct($table)
        {
            $this->table = (string) $table;
            parent::__construct($table);
        }

        public function execSql($query) 
        {
            try {
                $result = $this->getDb()->query($query);
                $resultSet = Array();
                if ($result) {
                    if (!is_bool($result) && $result->num_rows > 1) {
                        while( $row = $result->fetch_object() ) {
                            array_push($resultSet, $row);
                        }
                    } elseif ( !is_bool($result) && $row = $result->num_rows == 1) {
                        array_push($resultSet, $row);
                    } else {
                        $resultSet = true;
                    }
                } else {
                    $resultSet = false;
                }
                $results = array('resultado' => $result, 'estado' => 200, 'excepcion' => '');
                return $results;
            } catch(Exception $e) {
                $results = array('resultado' => 'error', 'estado' => 500, 'excepcion' => $e);
                return $results;
            }
        }            
    }

?>