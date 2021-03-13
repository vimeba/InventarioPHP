<?php
require("Conexion.php");

$catalogo= $_POST["catalogo"];
$query = "SELECT * FROM ".$catalogo; 

$res = $conexion->prepare($query);
$res->execute();
$userData = array();

while($row=$res->fetch(PDO::FETCH_ASSOC))
{ 
      $userData['catalogo'][] = $row;
}

echo json_encode($userData);

?>