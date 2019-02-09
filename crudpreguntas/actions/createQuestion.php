<?php

    function CreateQuestion($questionId, $question, $answer){
        require_once dirname(__FILE__) . "\..\core\Model.php";
        require_once dirname(__FILE__) . "\utilActions.php";
        $table = parse_ini_file(dirname(__FILE__) . "\..\config"."\\tbl_qa.ini");
        $model = new Model($table['qa']);

        $query = "INSERT INTO " . $table['qa'] . 
            " (" . $table['question'] . ", " . $table['answer'] . ")". 
                " VALUES " .
            "('". sanitize($question) . "', '" . sanitize($answer) . "')";
        
        $result = $model->execSql($query);
        return json_encode($result);
    }

?>
