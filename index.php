<?php
    session_start();
    
    if(!isset($_SESSION["person"])){
        $_SESSION["person"] = '{"firstName":"Johnny","lastName":"Smitty","gender":"M"}';
    }

    $person = json_decode($_SESSION["person"], true);
    $method = $_SERVER["REQUEST_METHOD"];
    $fileJSON = file_get_contents("php://input");
    $data = json_decode($fileJSON, TRUE);

    switch($method){
        case 'GET':
            
            echo json_encode($person);
            $query = "SELECT * FROM employees limit $a, $b;";

            break;

        case 'POST':
            $_SESSION["person"] = $data;
            echo "Nuovo nome: " . $_SESSION["person"]["firstName"];
            echo "\nAggiunto con successo";
            break;
    
        case 'PUT':
            $_SESSION["person"] = $data;
            echo "Nuovo nome: " . $_SESSION["person"]["firstName"];
            echo "\nAggiunto con successo";
            break;
    
        case 'DELETE':
            $_SESSION["person"] = null;
            var_dump($data);
            echo "\nEliminato con successo";
            break;

        default:
            header("HTTP/1.1 400 BAD REQUEST");
            break;
    }
?>