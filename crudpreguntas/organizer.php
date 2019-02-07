<?php
    if (isset($_SERVER['HTTP_ORIGIN'])) {
        header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
        header('Access-Control-Allow-Credentials: true');
    }
    
    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD'])){
            header("Access-Control-Allow-Methods: GET, POST, OPTIONS");         
        }

        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS'])){
            header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
        }

        exit(0);
    }


    $urlBase = dirname(__FILE__) . "\actions";
    
    include($urlBase . "\createQuestion.php");
    include($urlBase . "\deleteQuestion.php");
    include($urlBase . "\getQuestion.php");
    include($urlBase . "\updateQuestion.php");

    $option = $_POST["option"];
    $questionId = isset($_POST["questionId"]) ? $_POST["questionId"] : "";
    $question = isset($_POST["question"]) ? $_POST["question"] : "";
    $answer = isset($_POST["answer"]) ? $_POST["answer"] : "";

    switch ($option) {
        case 'createquestion':
            echo CreateQuestion($questionId, $question, $answer);
        break;
        case 'readquestion':
            echo ReadQuestion($_POST["current"], $_POST["rowCount"]);
        break;
        case 'updatequestion':
            echo UpdateQuestion($questionId, $question, $answer);
        break;
        case 'deletequestion':
            echo DeleteQuestion($questionId);
        break;
        default:
            echo json_encode("ERROR: NO AUTORIZADO");
        break;
    }

?>
