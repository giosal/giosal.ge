<?php

include "connect.php";

$isbn = $_GET["isbn"];

OpenConn();

$sql = "SELECT * FROM books where isbn = '" . $isbn . "'";
$result = mysqli_query($conn, $sql);

$outp = new stdClass();

//lecture et affichage des résultats sur 2 colonnes, 1 résultat par ligne. 
//retourne resultat sous forme d'un tableau    
while ($row = mysqli_fetch_array($result)) {
    $outp->name = utf8_encode($row['name']);
    $outp->author = utf8_encode($row['author']);
    $outp->discipline = utf8_encode($row['discipline']);
    $outp->publication_year = utf8_encode($row['publication_year']);
    $outp->language = utf8_encode($row['language']);
    $outp->editor = utf8_encode($row['editor']);
    $outp->isbn = utf8_encode($row['isbn']);
}

$output = json_encode($outp);

echo json_encode($outp);
    
mysqli_close($conn);
?>
