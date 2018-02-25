<?php
session_start();
require("conectar.php");

/*var_dump($_POST);
exit;*/

$id=$_POST["id"];

$consulta=mysql_query("SELECT * FROM ciudad WHERE id<>$id");

$lista= array();

while($rw=mysql_fetch_array($consulta)){

	$nom=$rw[1];
	$id=$rw[0];
	$lista[] = array('nombre'=> $nom, 'id'=> $id);


}
echo json_encode($lista);

?>