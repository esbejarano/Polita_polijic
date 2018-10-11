<?php
    class FrequentQuestion extends Entity {

        private $field1;
        private $field2;
        private $field3;
        private $field4;

        public function __construct($table)
        {
            $config = parse_ini_file('../config/tbl.ini');
            $table = $config["fq"];
            parent::__construct($table);
        }

        public function getField1()
        {
            return $this->field1;
        }

        public function setField1($field1)
        {
            $this->field1 = $field1;
        }
        
        public function getField2()
        {
            return $this->field2;
        }

        public function setField2($field2)
        {
            $this->field2 = $field2;
        }

        public function getField3()
        {
            return $this->field3;
        }

        public function setField3($field3)
        {
            $this->field3 = $field3;
        }

        public function getField4()
        {
            return $this->field4;
        }

        public function setField4($field4)
        {
            $this->field4 = $field4;
        }

        public function save() {
            $query = "INSERT INTO " . $this->table . " () VALUES (
                '" . $this->field1 . "',
                '" . $this->field2 . "',
                '" . $this->field3 . "',
                '" . $this->field4 . "'
            )";

            $save = $this->getDb()->query($query);
            
            return $save;
        }
    }
?>