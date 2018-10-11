<?php

    class FrequentQuestionModel extends Model {

        private $table;

        public function __construct($table)
        {
            $config = parse_ini_file('../config/tbl.ini');
            $this->table = $config["fq"];
            parent::__construct($this->table);
        }

    }