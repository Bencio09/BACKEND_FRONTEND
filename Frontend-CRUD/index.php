<?php
//Collegamento DB
include "./connessione.php";

$arrayJSON = array();

//Recuperiamo tramite POST i vari valori
$length = @$_POST["length"] ?? 10;
$start = @$_POST["start"] ?? 0; //Inizio
$search = @$_POST["search"]["value"] ?? null;//Passa parametro di ricerca

$a = $start;
$b = $length;

$query1 = "SELECT count(*) as tot FROM employees";
$result1 = mysqli_query($connessione, $query1) or die("Query fallita " . mysqli_error($connessione) . " " . mysqli_errno($connessione));
$row = mysqli_fetch_assoc($result1);
$end = $row["tot"]; //La lunghezza totale

if(!is_null($search) && !empty($search)){

    //preparo lo statement
    $searchLike = '%'.$search.'%';
    $stmt = mysqli_prepare($connessione, "SELECT * FROM employees WHERE first_name LIKE ? OR last_name LIKE ? OR id = ? LIMIT ?, ?");
    /* bind parameters for markers */
    $stmt->bind_param("sssii", $searchLike, $searchLike, $search, $a, $b);
    
    /* execute query */
    $stmt->execute();
    
    /* fetch result */
    $result = $stmt->get_result();
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
}else {
    $query = "SELECT * FROM employees LIMIT $a, $b";
    $result = mysqli_query($connessione, $query) or die("Query fallita " . mysqli_error($connessione) . " " . mysqli_errno($connessione));
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
}


$arrayJSON["data"] = $rows;

$arrayJSON["recordsFiltered"] = $end;
$arrayJSON["recordsTotal"] = $end;

echo json_encode($arrayJSON);
?>