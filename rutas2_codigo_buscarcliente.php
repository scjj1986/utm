<?
session_start();
require("conectar.php");
$ced=$_POST["ced"];
$consulta=mysql_query("SELECT * FROM adulto where cedula='$ced'");
$lista= array();
while($rw=mysql_fetch_array($consulta)){
	$nom=$rw["nombre"];
	$lista[] = array('nom'=> $nom);
}
echo json_encode($lista);
?>