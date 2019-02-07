<?php
    include "./actions/createQuestion.php";
    include "./actions/deleteQuestion.php";
    include "./actions/getQuestion.php";
    include "./actions/updateQuestion.php";

    var_dump($_GET);
    var_dump($_POST);
    $option = $_POST["option"];

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
