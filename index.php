<?php
    $method = $_SERVER["REQUEST_METHOD"];
    $request = explode("/", substr(@$_SERVER['PATH_INFO'], 1));
    $fileJSON = file_get_contents("data.json");
    header("Content-Type: application/json");

    switch($fileJSON){
        case 'GET':
            var_dump($fileJSON);
            header("HTTP/1.1 200 OK");
            break;
        case 'POST':
            break;
    
        case 'PUT':
            break;
    
        case 'DELETE':
            break;
        default:
            header("HTTP/1.1 400 BAD REQUEST");
            break;
    }
?>