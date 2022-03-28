<?php
    $method = $_SERVER["REQUEST_METHOD"];
    $request = explode("/", substr(@$_SERVER['PATH_INFO'], 1));
    $fileJSON = file_get_contents("data.json");
    //echo $fileJSON;
    $data = json_decode($fileJSON, true);
    
    header("Content-Type: application/json");
    switch($method){
        case 'GET':
            echo "GET";
            echo $data[19];
            //echo var_dump($fileJSON);
            break;
        case 'POST':
            echo "POST";
            for ($i=0; $i < 20; $i++) { 
                echo $data["_embedded"]["employees"][$i];
            }
            break;
    
        case 'PUT':
            echo "PUT";
            break;
    
        case 'DELETE':
            echo "DELETE";
            break;
        default:
            header("HTTP/1.1 400 BAD REQUEST");
            break;
    }
?>