<?php

    function updateQAFile(){
        require_once dirname(__FILE__) . "\..\core\Model.php";
        $table = parse_ini_file(dirname(__FILE__) . "\..\config"."\\tbl_qa.ini");
        $folder = parse_ini_file(dirname(__FILE__) . "\..\config"."\\folders.ini");
        $model = new Model($table['qa']);

        try {
            $result = $model->getAll($table['id']);
            $results = json_decode(json_encode($result), true);
            $file = $folder["urlFile"] . "\\temp.yml";
            if (!file_exists($file)){
                $newFile = fopen($file, 'x+');

                $entry = "categories:\n- Politecnico\n";
                fwrite($newFile, $entry);
                $entry = "conversations:\n";
                fwrite($newFile, $entry);
                foreach($results as $row){
                    $entry = "- - " . $row["ds_question"] . "\n";
                    fwrite($newFile, $entry);
                    $entry = "  - " . $row["ds_answer"] . "\n";
                    fwrite($newFile, $entry);
                }
                fclose($newFile);
            }
        } catch(Exception $e) {
            
        }
    }


?>