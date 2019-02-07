<?php
    include "./actions/createQuestion.php";
    include "./actions/deleteQuestion.php";
    include "./actions/getQuestion.php";
    include "./actions/updateQuestion.php";

    
    $option = $_GET["option"];

    switch ($option) {
        case 'createquestion':
            return CreatQuestion($data);
        break;
        case 'readquestion':
            return readQuestion();
        break;
        case 'updatequestion':
            return UpdateQuestion($data);
        break;
        case 'deletequestion':
            return DeleteQuestion($data);
        break;
        default:
            return json_encode("ERROR: NO AUTORIZADO");
        break;
    }

?>
