<?php

    function RegisterFQ($mail, $name, $question){
        require_once dirname(__FILE__) . "\..\core\Model.php";
        $table = parse_ini_file(dirname(__FILE__) . "\..\config"."\\tbl_fq.ini");
        $model = new Model($table['fq']);

        $query = "INSERT INTO " . $table['fq'] . 
            " (" . $table['mail'] . ", " . $table['name'] . ", " . $table['question'] . ")". 
                " VALUES " .
            "('". $mail . "', '" . $name . "', '" . $question . "')";
        
        $result = $model->execSql($query);
        return json_encode($result);
    }

?>
