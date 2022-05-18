<?php
//Collegamento DB
include "./connessione.php";

$arrayJSON = array();

//Recuperiamo tramite POST i vari valori
$length = @$_POST["length"] ?? 10;
$start = @$_POST["start"] ?? 0; //Inizio


$a = $start;
$b = $length;

$query1 = "SELECT count(*) as tot FROM employees";
$result1 = mysqli_query($connessione, $query1) or die("Query fallita " . mysqli_error($connessione) . " " . mysqli_errno($connessione));
$row = mysqli_fetch_assoc($result1);
$end = $row["tot"]; //La lunghezza totale

$query = "SELECT * FROM employees LIMIT $a, $b";
$result = mysqli_query($connessione, $query) or die("Query fallita " . mysqli_error($connessione) . " " . mysqli_errno($connessione));
while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
}
$arrayJSON["data"] = $rows;

$arrayJSON["recordsFiltered"] = $end;
$arrayJSON["recordsTotal"] = $end;

echo json_encode($arrayJSON);
 

?>