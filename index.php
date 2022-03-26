<?php
    $method = $_SERVER["REQUEST_METHOD"];
    $request = explode("/", substr(@$_SERVER['PATH_INFO'], 1));
    $fileJSON = file_get_contents("data.json");
    header("Content-Type: application/json");

    switch($fileJSON){
        case 'GET':
            echo "GET";
            header("HTTP/1.1 200 OK");
            break;
        case 'POST':
            echo "POST";
            header("HTTP/1.1 200 OK");
            break;
    
        case 'PUT':
            echo "PUT";
            header("HTTP/1.1 200 OK");
            break;
    
        case 'DELETE':
            echo "DELETE";
            header("HTTP/1.1 200 OK");
            break;
        default:
            header("HTTP/1.1 400 BAD REQUEST");
            break;
    }
?>