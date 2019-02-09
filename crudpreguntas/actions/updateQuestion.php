<?php

    function UpdateQuestion($questionId, $question, $answer){
        require_once dirname(__FILE__) . "\..\core\Model.php";
        require_once dirname(__FILE__) . "\utilActions.php";
        $table = parse_ini_file(dirname(__FILE__) . "\..\config"."\\tbl_qa.ini");
        $model = new Model($table['qa']);

        $query = "UPDATE " . $table['qa'] . 
            " SET " . 
                $table['question'] . " = '" . sanitize($question) . "', " . 
                $table['answer'] . " = '". sanitize($answer) . "' " . 
            "WHERE " . $table['id'] . " = '". sanitize($questionId) . "' ";
        
        $result = $model->execSql($query);
        return json_encode($result);
    }
?>
