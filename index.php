<?php
    session_start();
    include "./connessione.php";
    $b = 20;
    $a = $_GET["page"] * $b;
    
    
    if(!isset($_SESSION["person"])){
        $_SESSION["person"] = '{"firstName":"Johnny","lastName":"Smitty","gender":"M"}';
    }

    $person = json_decode($_SESSION["person"], true);
    $method = $_SERVER["REQUEST_METHOD"];
    $fileJSON = file_get_contents("php://input");
    $data = json_decode($fileJSON, TRUE);

    switch($method){
        case 'GET':
            //curl localhost:8080
            if(isset($_GET['id'])){
                $query = "SELECT * FROM employees WHERE id = $_GET[id];";
                $result = mysqli_query($connessione, $query) or die("Query fallita " . mysqli_error($connessione) . " " . mysqli_errno($connessione));
                while ($row = mysqli_fetch_assoc($result)) {
                    echo $row["first_name"]. " " . $row["last_name"] . "<br>";
                } 
            }else{
                $query = "SELECT * FROM employees LIMIT $a, $b";
                $result = mysqli_query($connessione, $query) or die("Query fallita " . mysqli_error($connessione) . " " . mysqli_errno($connessione));
                while ($row = mysqli_fetch_assoc($result)) {
                    echo $row["first_name"]. " " . $row["last_name"] . "<br>";
                }
            }
            

            break;

        case 'POST':
            //curl -X POST -H "Content-Type: application/json" -d "{\"firstName\":\"John\",\"lastName\":\"Smith\",\"gender\":\"M\"}" localhost:8080
            $data = json_decode(file_get_contents('php://input'), true);
            $query = "INSERT INTO employees (birth_date, first_name, last_name, gender, hire_date) VALUES ('', $data[firstName]', '$data[lastName]', '$data[gender]', '');";
            $result = mysqli_query ($connessione, $query) or die ("Query fallita " . mysqli_error($connessione) . " " . mysqli_errno($connessione));
            break;
            echo "Aggiunto con successo";
        case 'PUT':
            //PUT: curl -X PUT -H "Content-Type: application/json" -d "{\"id\":\"10003\",\"firstName\":\"John\",\"lastName\":\"Smith\",\"gender\":\"M\"}" localhost:8080
            $data = json_decode(file_get_contents('php://input'), true);
            $query =    "UPDATE employees 
                        SET first_name = '$data[firstName]', 
                            last_name = '$data[lastName]', 
                            gender = '$data[gender]'
                        WHERE id = '$data[id]'";
            $result = mysqli_query ($connessione, $query) or die ("Query fallita " . mysqli_error($connessione) . " " . mysqli_errno($connessione));
            echo "\n Modificato con successo";
            break;
    
        case 'DELETE':
            //curl -X DELETE -H "Content-Type: application/json" -d "{\"id\":\"10003\"}" localhost:8080
            $data = json_decode(file_get_contents('php://input'), true);
            $query = "DELETE FROM employees WHERE id = '$data[id]'";
            $result = mysqli_query ($connessione, $query) or die ("Query fallita " . mysqli_error($connessione) . " " . mysqli_errno($connessione));
            echo "\nEliminato con successo";
            break;

        default:
            header("HTTP/1.1 400 BAD REQUEST");
            break;
    }
