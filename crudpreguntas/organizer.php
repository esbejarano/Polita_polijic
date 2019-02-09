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
    include($urlBase . "\\registerFq.php");
    include($urlBase . "\updateQAFile.php");

    $option = $_POST["option"];
    $questionId = isset($_POST["questionId"]) ? $_POST["questionId"] : "";
    $question = isset($_POST["question"]) ? $_POST["question"] : "";
    $answer = isset($_POST["answer"]) ? $_POST["answer"] : "";

    switch ($option) {
        case 'createquestion':
            $result = CreateQuestion($questionId, $question, $answer);
            echo $result;
        break;
        case 'readquestion':
            echo ReadQuestion($_POST["current"], $_POST["rowCount"]);
        break;
        case 'updatequestion':
            $result = UpdateQuestion($questionId, $question, $answer);
            echo $result;
        break;
        case 'deletequestion':
            $result = DeleteQuestion($questionId);
            echo $result;
        break;
        case 'registerFQ':
            $mail = isset($_POST["mail"]) ? $_POST["mail"] : "";
            $name = isset($_POST["name"]) ? $_POST["name"] : "";
            $question = isset($_POST["question"]) ? $_POST["question"] : "";
            echo RegisterFQ($mail, $name, $question);
        break;
        case 'updateQAFile':
            updateQAFile();
        break; 
        default:
            echo json_encode("ERROR: NO AUTORIZADO");
        break;
    }

?>
