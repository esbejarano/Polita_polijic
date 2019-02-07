<?php
    function ReadQuestion($current, $rowCount){
        require_once dirname(__FILE__) . "\..\core\Model.php";
        $table = parse_ini_file(dirname(__FILE__) . "\..\config"."\\tbl_qa.ini");
        $model = new Model($table['qa']);
        try {
            $result = $model->getAll($table['id']);
            $results = array(
                "current" => $current,
                "rowCount" => $current * $rowCount,
                "rows" => array_slice($result, (($current - 1) * $rowCount), ($current * $rowCount)),
                "total"=> count($result)
            );
            return json_encode($results);
        } catch(Exception $e) {
            $results = array(
                "current" => $current,
                "rowCount" => $current * $rowCount,
                "rows" => [],
                "total"=> 0
            );
            return json_encode($results);
        }
    }
?>
