<?php
    

    function DeleteQuestion($data){
        require_once dirname(__FILE__) . "\..\core\Model.php";
        $table = parse_ini_file(dirname(__FILE__) . "\..\config"."\\tbl_qa.ini");
        $model = new Model($table['qa']);

        try {
            $result = $model->deleteById($data, $table['id']);
            $results = array('resultado' => $result, 'estado' => 200, 'excepcion' => '');
            return json_encode($results);
        } catch(Exception $e) {
            $results = array('resultado' => 'error', 'estado' => 500, 'excepcion' => $e);
                return $results;
        }
    }
?>
